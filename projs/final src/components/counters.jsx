import React from "react";
import Counter from "./counter";

class Counters extends React.Component {
  render() {
    return (
      <div>
        {this.props.components.map((component) => (
          <Counter
            key={component.id}
            counter={component}
            onIncrement={this.props.handleIncrement}
            onDecrement={this.props.handleDecrement}
            onDelete={this.props.handleDelete}
          ></Counter>
        ))}
      </div>
    );
  }
}

export default Counters;
