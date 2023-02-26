/* to show functionalities of express */
const express = require("express");
const app = express();

// get request
app.get("/test", (req, res) => {
  let query = req.query;
  let name = query.name;
  let age = query.age;
  let msg = `Hello, ${name}! Glad to know that you are ${age} years old!`;
  console.log(msg);
  res.send(`<h1>${msg}</h1>`);
});

app.get("/calc", (req, res) => {
  let num1 = parseFloat(req.query.num1);
  let num2 = parseFloat(req.query.num2);
  let op = req.query.op[0];

  // calculation
  let operation = "",
    result = 0;
  switch (op) {
    case "+":
      operation = "sum";
      result = num1 + num2;
      break;
    case "-":
      operation = "difference";
      result = num1 - num2;
      break;
    case "*":
      operation = "product";
      result = num1 * num2;
      break;
    case "/":
      operation = "quotient";
      result = num1 / num2;
      break;
    default:
      res.send('<h2 style="color: red;">Operation Not supported.</h2>');
      return;
  }
  res.send(`<h1>The ${operation} of ${num1} and ${num2} is: ${result}</h1>`);
});
app.listen(8000, () => console.log("Server listening on port 8000..."));
