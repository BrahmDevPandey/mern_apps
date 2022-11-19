import React, { Component } from "react";
import DisplayName from "./DisplayName";

class ChangeName extends Component {
  /* MOUNTING PHASE FUNCTIONS */
  //   the first function that will be executed
  constructor(props) {
    super(props);
    this.state = { name: "MCA React", toggle: true };
    console.log("In constructor of ChangeName.");
  }

  // this is called after the constructor just before the update phase starts
  static getDerivedStateFromProps(props, state) {
    console.log("In getDerivedStateFromProps of ChangeName.");
    return null;
  }

  // this fucntion is called just aftet the component is loaded in the DOM for the first time
  componentDidMount() {
    console.log("In componentDidMount of ChangeName.");
  }

  /* UPDATING PHASE FUNCTIONS */
  // used to control whether a component is allowed to update or not depending upon some condtion
  shouldComponentUpdate() {
    console.log("In shouldComponentUpdate of ChangeName.");
    return true;
  }

  // used to get a snapshot of the component before it goes for update
  getSnapshotBeforeUpdate(prevState, prevProps) {
    console.log("In getSnapshotBeforeUpdate of ChangeName.");
    return null;
  }

  // called right after the component is updated in the DOM
  componentDidUpdate(precProps, prevState, snapshot) {
    console.log("In componentDidUpdate of ChangeName.");
  }

  /* UNMOUNTING PHASE */
  // used to perform close-up activities just before a component is about to be unmounted
  componentWillUnmount() {
    console.log("In componentWillUnmount of ChangeName.");
  }

  changeName = () => {
    this.setState({ name: "React Name Changed" });
  };

  toggleDisplay = () => {
    this.setState({ toggle: !this.state.toggle });
  };

  render() {
    console.log("In render of ChangeName.");
    return (
      <div className="text-centre">
        {this.state.toggle && <DisplayName name={this.state.name} />}
        <button className="btn btn-primary" onClick={this.changeName}>
          Change Name
        </button>
        <br />
        <button className="btn btn-danger my-3" onClick={this.toggleDisplay}>
          Toggle
        </button>
      </div>
    );
  }
}

export default ChangeName;
