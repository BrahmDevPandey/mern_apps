/* to show functionalities of express */
const express = require("express");
const app = express();
const bodyParser = require("body-parser");
const cors = require("cors");

app.use(
  cors({
    origin: "http://localhost:3000",
  })
);
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));

let users = [];

// post request
app.post("/setUser", (req, res) => {
  let user = req.body;
  let name = user.name;
  let email = user.email;
  let type = user.type;
  if (users.map((usr) => usr.email).indexOf(email) === -1)
    users = [...users, { name, email, type }];
  res.send({ status: 200 });
});

// get request
app.get("/getUsers", (req, res) => {
  res.json(users);
});

app.listen(8000, () => console.log("Server listening on port 8000..."));
