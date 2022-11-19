import { useState } from "react";

function HookCounter(props) {
  const [count, setCount] = useState(props.counter.count);

  const increment = () => {
    setCount((prevCount) => prevCount + 1);
  };

  const decrement = () => {
    setCount((prevCount) => prevCount - 1);
  };

  const increase5 = () => {
    increment();
    increment();
    increment();
    increment();
    increment();
  };

  const decrease5 = () => {
    decrement();
    decrement();
    decrement();
    decrement();
    decrement();
  };

  return (
    <div className="my-3">
      <button onClick={decrement} className="btn btn-primary mx-3">
        Decrement
      </button>
      <span className="btn btn-warning mx-3">{count}</span>
      <button onClick={increment} className="btn btn-primary mx-3">
        Increment
      </button>
      <button onClick={decrease5} className="btn btn-primary mx-3">
        Decrease 5
      </button>
      <button onClick={increase5} className="btn btn-primary mx-3">
        Increase 5
      </button>
    </div>
  );
}

export default HookCounter;
