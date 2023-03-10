const express = require("express");
const app = express();
const mongoose = require("mongoose");
require("dotenv").config();
const bodyParser = require("body-parser");

// very important to be used to receive json data in post request
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));

// db connection
mongoose
  .connect(process.env.DATABASE, {
    useNewUrlParser: true,
    useUnifiedTopology: true,
  })
  .then(() => console.log("DB connected successfully."))
  .catch((err) => console.log("DB connection error: " + err));

// create an schema (just like a table)
const userSchema = new mongoose.Schema(
  {
    name: {
      type: String,
    },
    email: {
      type: String,
    },
    userType: {
      type: String,
    },
  },
  { timestamps: true }
);

const user = mongoose.model("User", userSchema);

// creating api endpoints
app.get("/users", (req, res) => {
  user
    .find()
    .then((response) => res.json({ response }))
    .catch((error) => res.json({ err }));
});

app.post("/addUser", (req, res) => {
  console.log(req.body);
  let usr = new user({
    name: req.body.name,
    email: req.body.email,
    userType: req.body.type,
  });
  usr
    .save()
    .then((response) => res.json({ response }))
    .catch((err) => res.json({ message: "An error occurred: " + err }));
});

app.listen(8000, () =>
  console.log("Server listening on port 8000 of localhost...")
);
