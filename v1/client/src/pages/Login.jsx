
import React, { useState } from "react";
import { useContext } from "react";
import { Link, useNavigate } from "react-router-dom";
import { AuthContext } from "../context/authContext";

const Login = () => {
  const [inputs, setInputs] = useState({
    usuario: "",
    contraseña: "",
  });
  const [err, setError] = useState(null);

  const navigate = useNavigate();

  const { login } = useContext(AuthContext);


  const handleChange = (e) => {
    setInputs((prev) => ({ ...prev, [e.target.name]: e.target.value }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await login(inputs)
      navigate("/");
    } catch (err) {
      setError(err.response.data);
    }
  };
  return (
    <div className="auth">
      <h1>Login</h1>
      <form>
      <div class="form-group row">
        <label for="usuario" class="col-sm-2 col-form-label">Usuario: </label>
        <div class="col-sm-6">
          <input
            required
            type="text"
            id="usuario"
            class="form-control"
            placeholder="usuario"
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
        
        <button onClick={handleSubmit}>Login</button>
        <span>
          Don't you have an account? <Link to="/register">Register</Link>
        </span>
      </form>
    </div>
  );
};

export default Login;
