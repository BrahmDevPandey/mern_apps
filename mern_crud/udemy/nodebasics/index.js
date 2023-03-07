/* to show functionalities of express */
const express = require("express");
const app = express();
const bodyParser = require("body-parser");
const cors = require("cors");
const morgan = require("morgan");
const authRoute = require("./routers/authRoute");

app.use(
  cors({
    origin: "http://localhost:3000",
  })
);

app.use(morgan("dev"));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));

// post request
app.use(authRoute);
app.listen(8000, () => console.log("Server listening on port 8000..."));
