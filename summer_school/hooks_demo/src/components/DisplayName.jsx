import React, { Component } from "react";

class DisplayName extends Component {
  state = {
    name: this.props.name,
  };

  flag = true;

  componentWillUnmount() {
    console.log("In componentWillUnmount of DisplayName.");
  }

  shouldComponentUpdate() {
    console.log("In shouldComponentUpdate of DisplayName.");
    if (this.flag !== true) return false;
    return true;
  }

  // used to get a snapshot of the component before it goes for update
  getSnapshotBeforeUpdate(prevState, prevProps) {
    console.log("In getSnapshotBeforeUpdate of DisplayName.");
    this.flag = this.state.name === prevState.name ? false : true;
    return null;
  }

  componentDidUpdate(precProps, prevState, snapshot) {
    console.log("In componentDidUpdate of DisplayName.");
  }

  render() {
    console.log("In render of DisplayName.");
    return (
      <div>
        <h2>{this.state.name}</h2>
      </div>
    );
  }
}

export default DisplayName;
