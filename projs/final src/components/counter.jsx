import React from "react";
import "./bootstrap/dist/css/bootstrap.css";

class Counter extends React.Component {
  render() {
    return (
      <div>
        <span style={{ fontSize: 25, fontWeight: "bold" }} className="m-2">
          {this.props.counter.name}
        </span>
        <span style={{ fontSize: 20 }} className={this.getClasses()}>
          {this.props.counter.value}
        </span>
        <button
          className="btn btn-secondary m-2"
          onClick={() => this.props.onIncrement(this.props.counter)}
        >
          Increment
        </button>
        <button
          className="btn btn-secondary m-2"
          onClick={() => this.props.onDecrement(this.props.counter)}
        >
          Decrement
        </button>
        <button
          className="btn btn-danger m-2"
          onClick={() => this.props.onDelete(this.props.counter)}
        >
          Delete
        </button>
      </div>
    );
  }

  getClasses() {
    var classes = "badge m-2 badge-";
    classes += this.props.counter.value === 0 ? "warning" : "primary";
    return classes;
  }
}

export default Counter;
