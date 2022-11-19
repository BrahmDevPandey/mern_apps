const express = require("express");
const mongoose = require("mongoose");
const UserModel = require("./models/Users");
const cors = require("cors");

const app = express();
// to automatically parse the sent json data to object
app.use(express.json());
app.use(cors());

mongoose.connect(
  "mongodb+srv://brahmdevpandey:mongodb@cluster0.yjphykw.mongodb.net/mern_crud_database?retryWrites=true&w=majority"
);

app.get("/getUsers", (req, res) => {
  UserModel.find({}, (err, result) => {
    if (err) {
      console.log("Error occurred.");
      console.log(err);
      res.json(err);
    } else {
      console.log(req);
      console.log(result);
      res.json(result);
    }
  });
});

app.post("/createUser", async (req, res) => {
  const user = req.body;
  const newUser = new UserModel(user);
  await newUser.save();

  res.json(user);
});

app.listen(3001, () => {
  console.log("Server running perfectly.");
});
