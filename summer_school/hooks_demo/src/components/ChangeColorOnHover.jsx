import React, { Component } from "react";
import ChangeColorHOC from "./ChangeColorHOC";
import { NameContext } from "./NameContext";

class ChangeColorOnHover extends Component {
  render() {
    return (
      <div>
        <h2
          onMouseOver={this.props.changeColor}
          style={{ color: this.props.color }}
        >
          {this.context}
        </h2>
      </div>
    );
  }
}
ChangeColorOnHover.contextType = NameContext;
export default ChangeColorHOC(ChangeColorOnHover);
