import React from "react";
import "./Navbar.css";

function Navbar() {
  return (
    <nav className="navbar">
      <div className="logo">ReactJS Project</div>
      <ul className="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#features">Features</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#subscribe">Subscribe</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <a href="#app" className="to-app">To App</a>
    </nav>
  );
}

export default Navbar;
