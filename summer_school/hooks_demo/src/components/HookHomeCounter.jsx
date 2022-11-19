import { useState } from "react";
import HookCounter from "./HookCounter";

const HookHomeCounter = () => {
  const myCounters = [
    { id: 1, count: 3 },
    { id: 2, count: 4 },
    { id: 3, count: 6 },
    { id: 4, count: 0 },
  ];

  const [counters, setCounters] = useState(myCounters);
  return (
    <div>
      {counters.map((counter) => (
        <HookCounter key={counter.id} counter={counter} />
      ))}
    </div>
  );
};

export default HookHomeCounter;
