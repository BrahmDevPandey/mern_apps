import React, { Component } from "react";

class Web extends Component {
  state = {
    data: [
      { id: "1", name: "student1", course: "mca1" },
      { id: "2", name: "student2", course: "mca2" },
      { id: "3", name: "student3", course: "mca3" },
      { id: "4", name: "student4", course: "mca4" },
      { id: "5", name: "student5", course: "mca5" },
      { id: "6", name: "student6", course: "mca6" },
    ],
  };
  render() {
    return (
      <div>
        <h2>Student Information</h2>
        <div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Course</th>
              </tr>
            </thead>
            <tbody>
              {this.state.data.map((student) => (
                <tr key={student.id}>
                  <th scope="row">{student.id}</th>
                  <td>{student.name}</td>
                  <td>{student.course}</td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    );
  }
}

export default Web;
