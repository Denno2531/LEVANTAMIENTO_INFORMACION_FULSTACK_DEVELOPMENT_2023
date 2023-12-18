import React from "react";
import { useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import axios from "axios";

const Register = () => {
  const [inputs, setInputs] = useState({
    nombres: "",
    usuario: "",
    contraseña: "",
    uid: "",
    cedula: "",
    carrera: "",
    sede: "",
    fecha_ingreso: "",
    correo: "",
    telefono: "",
    img: ""
  });
  const [err, setError] = useState(null);

  const navigate = useNavigate();

  const handleChange = (e) => {
    setInputs((prev) => ({ ...prev, [e.target.name]: e.target.value }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await axios.post("/auth/register", inputs);
      console.log("Usuario registrado exitosamente!")
      navigate("/login");
    } catch (err) {
      setError(err.response.data);
      console.log(err.response.data)
    }
  };

  return (


    <form>
      <h1>Registro</h1>
      <div class="form-group row">
        <label for="nombres" class="col-sm-2 col-form-label">Nombres completos: </label>
        <div class="col-sm-6">
          <input
            required
            type="text"
            id="nombres"
            class="form-control"
            placeholder="Nombres"
            name="nombres"
            onChange={handleChange}
          /></div>
      </div>
      <div class="form-group row">
        <label for="usuario" class="col-sm-2 col-form-label">Usuario: </label>
        <div class="col-sm-6">
          <input
            required
            type="text"
            id="usuario"
            class="form-control"
            placeholder="Usuario"
            name="usuario"
            onChange={handleChange}
          /></div>
      </div>
      <div class="form-group row">
        <label for="contraseña" class="col-sm-2 col-form-label">Contraseña: </label>
        <div class="col-sm-6">
          <input
            required
            type="password"
            id="contraseña"
            class="form-control"
            placeholder="contraseña"
            name="contraseña"
            onChange={handleChange}
          /></div>
      </div>
      <div class="form-group row">
        <label for="uid" class="col-sm-2 col-form-label">ID: </label>
        <div class="col-sm-6">
          <input
            required
            type="text"
            id="uid"
            class="form-control"
            placeholder="ID"
            name="uid"
            onChange={handleChange}
          /></div>
      </div>
      <div class="form-group row">
        <label for="cedula" class="col-sm-2 col-form-label">Cedula: </label>
        <div class="col-sm-6">
          <input
            required
            type="text"
            id="cedula"
            class="form-control"
            placeholder="Cedula"
            name="cedula"
            onChange={handleChange}
          /></div>
      </div>
      <div class="form-group row">
        <label for="carrera" class="col-sm-2 col-form-label">Carrera: </label>
        <div class="col-sm-6">
          <input
            required
            type="text"
            id="carrera"
            class="form-control"
            placeholder="Carrera"
            name="carrera"
            onChange={handleChange}
          /></div>
      </div>
      <div class="form-group row">
        <label for="sede" class="col-sm-2 col-form-label">Sede: </label>
        <div class="col-sm-6">
          <input
            required
            type="text"
            id="sede"
            class="form-control"
            placeholder="sede"
            name="sede"
            onChange={handleChange}
          /></div>
      </div>
      <div class="form-group row">
        <label for="fecha_ingreso" class="col-sm-2 col-form-label">Fecha de ingreso: </label>
        <div class="col-sm-6">
          <input
            required
            type="text"
            id="fecha_ingreso"
            class="form-control"
            placeholder="Ej. 21/02/2022"
            name="fecha_ingreso"
            onChange={handleChange}
          /></div>
      </div>
      <div class="form-group row">
        <label for="correo" class="col-sm-2 col-form-label">Correo: </label>
        <div class="col-sm-6">
          <input
            required
            type="text"
            id="correo"
            class="form-control"
            placeholder="Correo"
            name="correo"
            onChange={handleChange}
          /></div>
      </div>
      <div class="form-group row">
        <label for="telefono" class="col-sm-2 col-form-label">Celular: </label>
        <div class="col-sm-6">
          <input
            required
            type="text"
            id="telefono"
            class="form-control"
            placeholder="Celular"
            name="telefono"
            onChange={handleChange}
          /></div>
      </div>
      <div class="form-group row">
        <label for="img" class="col-sm-2 col-form-label">Img: </label>
        <div class="col-sm-6">
          <input
            required
            type="text"
            id="img"
            class="form-control"
            placeholder="img"
            name="img"
            onChange={handleChange}
          /></div>
      </div>


      <div class="form-group row">
        <div class="col-sm-10">
          <button class="btn btn-primary" onClick={handleSubmit}>Register</button>
          
          <span>
            Do you have an account? <Link to="/login">Login</Link>
          </span>
        </div></div>
        
    </form>

  );
};

export default Register;
