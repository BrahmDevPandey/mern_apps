let users = [];

const setUser = (req, res) => {
  let user = req.body;
  let name = user.name;
  let email = user.email;
  let type = user.type;
  if (users.map((usr) => usr.email).indexOf(email) === -1)
    users = [...users, { name, email, type }];
  res.send({ status: 200 });
};

const getUsers = (req, res) => {
  res.json(users);
};

module.exports = { setUser, getUsers };
