import React, { useContext } from "react";
import { Link } from "react-router-dom";
import { AuthContext } from "../context/authContext";


const Navbar = () => {
  const { currentUser, logout } = useContext(AuthContext);

  return (
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="/" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/">Action</a></li>
                <li><a class="dropdown-item" href="/">Another action</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="/">Something else here</a></li>
              </ul>
            </li>

          </ul>
          
          <span class="d-flex text-primary-emphasis border border-primary-subtle rounded-3">{currentUser?.usuario}</span>
          {currentUser ? (
            <span class="d-flex btn btn-outline-danger" onClick={logout}>Logout</span>
          ) : (
            <Link className="btn btn-outline-success" to="/login">
              Login
            </Link>
          )}

        </div>
      </div>
    </nav>



  );
};

export default Navbar;
