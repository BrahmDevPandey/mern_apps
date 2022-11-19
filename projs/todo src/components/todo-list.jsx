import React from "react";
import TodoItem from "./todo-item";

const TodoList = (props) => {
  return (
    <div>
      {props.todos.map((todo) => (
        <TodoItem
          key={todo.id}
          id={todo.id}
          title={todo.title}
          description={todo.description}
          onDeleteTodo={props.onDeleteTodo}
        />
      ))}
    </div>
  );
};

export default TodoList;
