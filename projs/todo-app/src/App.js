import "./App.css";
import { useEffect } from "react";

const days = [
  "Monday",
  "Tuesday",
  "Wednesday",
  "Thursday",
  "Friday",
  "Saturday",
  "Sunday",
];
const tasks = [
  "Get up before 7.00 am",
  "To bed before 12.30 am",
  "Some exercise",
  "No junk food",
  "NO FAP",
];
var checkedBoxes = [];

function App() {
  useEffect(() => {
    days.forEach((day) => {
      tasks.forEach((task, idx) => {
        // console.log("checking " + day + "-" + idx);
        if (localStorage.getItem(day + "-" + idx) === "true") {
          checkedBoxes.push(day + "-" + idx);
          var box = document.getElementById(day + "-" + idx);
          box.setAttribute("checked", "true"); // check the box
          box.setAttribute("disabled", "true"); // disable it
          // console.log("found " + day + "-" + idx);
        }
      });
    });
    console.log(checkedBoxes);
  }, []);

  const check = (id) => {
    // console.log("Checked " + id);
    const box = document.getElementById(id);
    box.setAttribute("disabled", "true");
    localStorage.setItem(id, "true");
  };

  return (
    <section>
      <div className="heading">Self assessment</div>
      <table>
        {/* table header */}
        <thead>
          <tr>
            <th>Day</th>
            {tasks.map((task, idx) => (
              <th key={idx}>{task}</th>
            ))}
          </tr>
        </thead>
        {/* table body */}
        <tbody>
          {days.map((day) => (
            <tr key={day}>
              <td>
                <strong>{day}</strong>
              </td>
              {tasks.map((task, idx) => (
                <td key={idx}>
                  <input
                    type="checkbox"
                    id={day + "-" + idx}
                    onChange={() => check(day + "-" + idx)}
                  />
                  <span>{task}</span>
                </td>
              ))}
            </tr>
          ))}
        </tbody>
      </table>
    </section>
  );
}

export default App;
