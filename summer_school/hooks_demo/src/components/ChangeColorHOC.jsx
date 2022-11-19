import React, { Component } from "react";

const ChangeColorHOC = (NormalComponent) => {
  class EnhancedComponent extends Component {
    state = { color: "#000000" };

    changeColor = () => {
      const color = "#" + Math.floor(Math.random() * 6177722).toString(16);
      this.setState({ color: color });
    };

    render() {
      return (
        <NormalComponent
          color={this.state.color}
          changeColor={this.changeColor}
        />
      );
    }
  }
  return EnhancedComponent;
};

export default ChangeColorHOC;
