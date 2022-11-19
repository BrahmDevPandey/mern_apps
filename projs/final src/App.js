import React from "react";
import Counters from "./components/counters";
import Navbar from "./components/navbar";
import "./components/bootstrap/dist/css/bootstrap.css";

class App extends React.Component {
  state = {
    components: [
      { id: 1, name: "item1", value: 2 },
      { id: 2, name: "item2", value: 3 },
      { id: 3, name: "item3", value: 5 },
      { id: 4, name: "item4", value: 2 },
      { id: 5, name: "item5", value: 4 },
    ],
  };

  handleReset = () => {
    var newComponents = this.state.components.map((component) => {
      component.value = 0;
      return component;
    });

    this.setState({ components: newComponents });
  };

  handleIncrement = (counter) => {
    var newComponents = [...this.state.components];
    var index = newComponents.indexOf(counter);
    newComponents[index].value++;
    this.setState({ components: newComponents });
  };

  handleDecrement = (counter) => {
    var newComponents = [...this.state.components];
    var index = newComponents.indexOf(counter);
    if (newComponents[index].value > 0) newComponents[index].value--;
    this.setState({ components: newComponents });
  };

  handleDelete = (counter) => {
    var newComponents = this.state.components.filter(
      (component) => component.id !== counter.id
    );
    this.setState({ components: newComponents });
  };

  render() {
    return (
      <React.Fragment>
        <Navbar
          totalItems={this.state.components.filter((c) => c.value !== 0).length}
        />

        <main style={{ fontSize: 20 }} className="container m-2">
          <button
            style={{ fontSize: 20 }}
            className="btn btn-primary m-2"
            onClick={this.handleReset}
          >
            Reset
          </button>

          <Counters
            components={this.state.components}
            handleIncrement={this.handleIncrement}
            handleDecrement={this.handleDecrement}
            handleDelete={this.handleDelete}
          />
        </main>
      </React.Fragment>
    );
  }
}

export default App;
