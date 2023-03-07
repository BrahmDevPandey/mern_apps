import { useState } from "react";

function App() {
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [type, setType] = useState("");
  const [allUsers, setAllUsers] = useState([]);
  const [alertMsg, setAlertMsg] = useState("");

  const handleSubmit = (event) => {
    event.preventDefault();
    fetch("http://localhost:8000/setUser", {
      method: "POST",
      body: JSON.stringify({
        name,
        email,
        type,
      }),
      headers: {
        Accept: "*/*",
        "Content-type": "application/json; charset=UTF-8",
      },
    });
    console.log(name, email, type);
  };

  const fetchData = () => {
    fetch("http://localhost:8000/getUsers", {
      method: "GET",
    })
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        setAllUsers(data);
      })
      .catch((err) => {
        alert(err);
      });
  };

  const sweetAlert = (msg) => {
    setAlertMsg(msg);
    const alertBox = document.getElementById("my-alert");
    alertBox.style.display = "block";
    setTimeout(() => {
      alertBox.style.display = "none";
    }, 2000);
  };

  return (
    <div className="m-5">
      <div
        className="alert alert-danger"
        style={{ display: "none" }}
        id="my-alert"
      >
        {alertMsg}
      </div>
      <div className="text-center display-6 mb-5">Add User</div>
      <div className="text-center">
        <form onSubmit={handleSubmit}>
          <input
            type="text"
            name="name"
            placeholder="Name"
            value={name}
            className="form-control mb-3"
            onChange={(event) => setName(event.target.value)}
            required
          />
          <input
            type="email"
            name="email"
            placeholder="Email"
            value={email}
            className="form-control mb-3"
            onChange={(event) => setEmail(event.target.value)}
            required
          />
          <select
            name="type"
            placeholder="User Type"
            value={type}
            className="form-control mb-3"
            onChange={(event) => setType(event.target.value)}
            required
          >
            <option value={""}>--Select--</option>
            <option value={"user"}>User</option>
            <option value={"admin"}>Admin</option>
          </select>

          <button type="submit" className="btn btn-primary mx-3">
            Submit
          </button>
        </form>
        <button onClick={fetchData} className="btn btn-success mt-3">
          Fetch Data
        </button>
        <button
          onClick={() => sweetAlert("Hi there...")}
          className="btn btn-success mt-3"
        >
          Show alert
        </button>
      </div>
      <div className="mt-5">
        <h3>All Users</h3>
        <table className="table">
          <thead>
            <tr>
              <th className="border-1">Name</th>
              <th>Email</th>
              <th>Type</th>
            </tr>
          </thead>
          <tbody>
            {allUsers.map((user) => (
              <tr key={user.email}>
                <td>{user.name}</td>
                <td>{user.email}</td>
                <td>{user.type}</td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
}

export default App;
