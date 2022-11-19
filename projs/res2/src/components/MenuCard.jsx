import React from "react";
import "../bootstrap/css/bootstrap.min.css";
import image from "./image.png";

const MenuCard = (props) => {
  return (
    <>
      <div className="col-sm-4 col-md-3 m-3 column-md column">
        <div className="card border-black margin-sm card-border">
          <div className="sequence">{props.item.id}</div>
          <div className="category">{props.item.category}</div>
          <div className="card-body">
            <div className="card-title h1">{props.item.name}</div>
            <div className="card-text">{props.item.description}</div>
            <img
              src={image}
              alt="Picture of the item"
              className="item-image img-fluid"
            />
          </div>
          <button className="order-btn">Order now</button>
        </div>
      </div>
    </>
  );
};

export default MenuCard;
