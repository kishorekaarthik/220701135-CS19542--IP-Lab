import React from "react";
import "./Services.css";

function Services() {
  return (
    <div className="services" id="services">
      <h2>Services</h2>
      <p>Here are some services I provide</p>
      <div className="service-cards">
        <div className="card">
          <img src="path/to/python-image.png" alt="Python Service" />
          <p>Lorem ipsum dolor sit amet...</p>
          <button className="service-btn">Python</button>
        </div>
        <div className="card">
          <img src="path/to/react-image.png" alt="React Service" />
          <p>Lorem ipsum dolor sit amet...</p>
          <button className="service-btn">React</button>
        </div>
      </div>
    </div>
  );
}

export default Services;
