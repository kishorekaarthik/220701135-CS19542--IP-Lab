import React from "react";
import "./Subscription.css";

function Subscription() {
  return (
    <div className="subscription" id="subscribe">
      <h2>Subscribe</h2>
      <div className="subscribe-form">
        <input type="email" placeholder="Enter your email" />
        <button className="subscribe-btn">Continue</button>
      </div>
    </div>
  );
}

export default Subscription;
