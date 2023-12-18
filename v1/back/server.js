import express from "express";
import authRoutes from "./routes/auth.js";
import cookieParser from "cookie-parser";


const puerto=8800;

const app = express()

app.use(express.json());
app.use(cookieParser());

app.use("/api/auth", authRoutes);

app.listen(puerto, ()=>{
    console.log("Servidor LEVANTAMIENTO DE LA INFORMACIÓN conectado en el puerto "+puerto)
})
