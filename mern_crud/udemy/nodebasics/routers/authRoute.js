const express = require("express");
const router = express.Router();
const { getUsers, setUser } = require("../controllers/auth");

router.post("/setUser", setUser);

router.get("/getUsers", getUsers);

module.exports = router;
