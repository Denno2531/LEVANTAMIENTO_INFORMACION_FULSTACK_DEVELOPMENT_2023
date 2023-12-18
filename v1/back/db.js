import mysql from "mysql"

export const db = mysql.createConnection({
  host:"localhost",
  user:"root",
  password: "1234",
  database:"linfodatabase"
})

// Conexión a la base de datos
db.connect((err) => {
  if (err) {
    console.error('Error al conectarse a la base de datos: ' + err.stack);
    return;
  }

  console.log('Conectado a la base de datos.');
});