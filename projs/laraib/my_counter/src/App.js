import { useState } from "react";

function App() {
  const upperBound = 10;
  const lowerBound = -10;
  const [state, setState] = useState({
    value: 0,
    bgColor: "bg-white",
  });

  const increment = () => {
    const val = state.value + 1; // get updated value
    setState({
      value: val,
      bgColor: val >= upperBound ? "bg-primary" : "bg-light",
    });
  };

  const decrement = () => {
    const val = state.value - 1; // get updated value
    setState({
      value: val,
      bgColor: val <= lowerBound ? "bg-danger" : "bg-light",
    });
  };

  return (
    <div className={state.bgColor}>
      <div
        className="row align-items-center text-center"
        style={{ minHeight: "100vh" }}
      >
        <div className="col-md-12">
          <button
            onClick={increment}
            className="btn btn-success p-3"
            disabled={state.value >= upperBound}
          >
            Increment
          </button>
          <div className="m-5">
            <h1>{state.value}</h1>
          </div>
          <button
            onClick={decrement}
            className="btn btn-success p-3"
            disabled={state.value <= lowerBound}
          >
            Decrement
          </button>
        </div>
      </div>
    </div>
  );
}

export default App;
