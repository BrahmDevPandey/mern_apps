import React from "react";

class AddTodo extends React.Component {
  render() {
    return (
      <div>
        {/* <form onSubmit={this.addTodo}> */}
        <div className="title">
          <h4>Title</h4>
        </div>
        <input
          id="title-input"
          style={{ width: "50vh" }}
          type="text"
          placeholder="Enter title of Todo"
        />

        <div className="description">
          <h5>Description</h5>
        </div>
        <textarea
          id="description-input"
          type="text"
          placeholder="Enter description of Todo"
          style={{ height: "40vh", width: "100vh" }}
        />
        <button
          className="btn btn-primary"
          style={{
            display: "block",
            marginTop: 5,
            backgroundColor: "green",
          }}
          onClick={this.addTodo}
        >
          Add
        </button>
        {/* </form> */}
      </div>
    );
  }

  addTodo = () => {
    const inputField = document.getElementById("title-input");
    const descriptionField = document.getElementById("description-input");

    if (inputField.value === "" || descriptionField.value === "")
      alert("Title and description are required");
    else {
      this.props.onAddTodo(inputField.value, descriptionField.value);
      inputField.value = "";
      descriptionField.value = "";
      alert("New todo added!");
    }
  };
}

export default AddTodo;
