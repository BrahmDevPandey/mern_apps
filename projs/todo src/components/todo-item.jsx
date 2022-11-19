import React from "react";

const TodoItem = (props) => {
  return (
    <div className="m-4">
      <div className="todo-title">
        <h4>{props.title}</h4>
      </div>
      <div className="todo-description">
        <h5>{props.description}</h5>
      </div>
      <button
        className="btn-delete btn btn-danger"
        onClick={() => props.onDeleteTodo(props.id)}
      >
        Delete
      </button>
    </div>
  );
};

export default TodoItem;
