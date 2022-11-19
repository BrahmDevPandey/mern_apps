import React from "react";
import TodoList from "./components/todo-list";
import "./App.css";
import AddTodo from "./components/add-todo";

class App extends React.Component {
  state = {
    section: "list",
    todos: [
      {
        id: 0,
        title: "Demo",
        description: "This is a demo todo. You can delete it.",
      },
    ],
  };

  render() {
    return (
      <React.Fragment>
        <nav className="my-navbar">
          <button
            id="todos-nav-btn"
            style={{ textDecoration: "underline" }}
            onClick={this.setContentList}
            className="nav-btn"
          >
            Your todos
          </button>
          <button
            id="add-nav-btn"
            onClick={this.setContentAdd}
            className="nav-btn"
          >
            Add a todo
          </button>
        </nav>

        <main className="main-container">
          {this.state.section === "list" ? (
            <TodoList
              todos={this.state.todos}
              onDeleteTodo={this.handleDelete}
            />
          ) : (
            <AddTodo todos={this.state.todos} onAddTodo={this.handleAdd} />
          )}
        </main>
      </React.Fragment>
    );
  }

  setContentList = () => {
    this.setState({ section: "list" });
    document.getElementById("todos-nav-btn").style.textDecoration = "underline";
    document.getElementById("add-nav-btn").style.textDecoration = "none";
  };

  setContentAdd = () => {
    this.setState({ section: "add" });
    document.getElementById("todos-nav-btn").style.textDecoration = "none";
    document.getElementById("add-nav-btn").style.textDecoration = "underline";
  };

  handleDelete = (todoId) => {
    // console.log("handle delete todo called");
    const newTodos = this.state.todos.filter((todo) => todo.id !== todoId);
    this.setState({ todos: newTodos });
  };

  handleAdd = (title, description) => {
    // console.log("handle add called");
    var { todos } = this.state;
    const newId = todos.length !== 0 ? todos[todos.length - 1].id + 1 : 0;
    todos = [...todos, { id: newId, title: title, description: description }];
    this.setState({ todos: todos });
  };
}

export default App;
