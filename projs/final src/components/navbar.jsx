import React from "react";
import "./bootstrap/dist/css/bootstrap.css";

const Navbar = (props) => {
  return (
    <nav className="navbar navbar-light bg-light">
      <a href="#" className="navbar-brand">
        <h3 style={{ fontWeight: "bold" }}>
          Total items: {props.totalItems}
        </h3>
      </a>
    </nav>
  );
};

export default Navbar;
