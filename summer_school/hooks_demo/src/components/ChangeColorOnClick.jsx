import React, { Component } from "react";
import ChangeColorHOC from "./ChangeColorHOC";
import { NameContext } from "./NameContext";

class ChangeColorOnClick extends Component {
  render() {
    return (
      <div>
        <h2 style={{ color: this.props.color }}>{this.context}</h2>
        <button className="btn btn-primary" onClick={this.props.changeColor}>
          Change Color
        </button>
      </div>
    );
  }
}
ChangeColorOnClick.contextType = NameContext;
export default ChangeColorHOC(ChangeColorOnClick);
