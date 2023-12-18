import { db } from "../db.js";
import bcrypt from "bcryptjs";
import jwt from "jsonwebtoken";

export const register = (req, res) => {
  //Revisa si existe un usuario primero
  const q = "SELECT * FROM student WHERE correo = ? OR usuario = ?";

  db.query(q, [req.body.correo, req.body.usuario], (err, data) => {
    if (err) return res.status(500).json(err);
    if (data.length) return res.status(409).json("El usuario ya existe!");

    //Cifrado de contraseña
    const salt = bcrypt.genSaltSync(10);
    const hash = bcrypt.hashSync(req.body.contraseña, salt);

    const q = "INSERT INTO student(`nombres`,`usuario`,`contrasena`,`uid`,`cedula`,`carrera`,`sede`,`fecha_ingreso`,`correo`,`telefono`,`img`) VALUES (?)";
    const values = [req.body.nombres, req.body.usuario, hash, req.body.uid, req.body.cedula, req.body.carrera, req.body.sede, req.body.fecha_ingreso, req.body.correo, req.body.telefono, req.body.img];

    db.query(q, [values], (err, data) => {
      if (err) return res.status(500).json(err);
      return res.status(200).json("El usuario ya ha sido creado antes.");
    });
  });
};

export const login = (req, res) => {
  //CHECK USER

  const q = "SELECT * FROM student WHERE usuario = ?";

  db.query(q, [req.body.usuario], (err, data) => {
    if (err) return res.status(500).json(err);
    if (data.length === 0) return res.status(404).json("Usuario no encontrado!");

    //Check password
    const isPasswordCorrect = bcrypt.compareSync(
      req.body.contraseña,
      data[0].contraseña
    );

    if (!isPasswordCorrect)
      return res.status(400).json("Contraseña incorrecta!");

    const token = jwt.sign({ id: data[0].id }, "jwtkey");
    const { contraseña, ...other } = data[0];

    res
      .cookie("access_token", token, {
        httpOnly: true,
      })
      .status(200)
      .json(other);
  });
};

export const logout = (req, res) => {
  res.clearCookie("access_token",{
    sameSite:"none",
    secure:true
  }).status(200).json("User has been logged out.")
};
