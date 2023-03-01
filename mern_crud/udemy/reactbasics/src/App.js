import { useState } from "react";

function App() {
  const [name, setName] = useState("aman pandey");
  const [email, setEmail] = useState("aman@gmail.com");

  const handleSubmit = (event) => {
    event.preventDefault();
    fetch("https://localhost:8000/setUser", {
      method: "POST",
      body: {
        name,
        email,
      },
      headers: {
        Accept: "*/*",
        "Content-type": "application/json; charset=UTF-8",
      },
    });
    console.log(name, email);
  };

  const fetchData = () => {
    fetch("http://localhost:8000/getUser", {
      method: "GET",
    })
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        setName(data.name);
        setEmail(data.email);
      })
      .catch((err) => {
        alert(err);
      });
  };

  return (
    <div className="m-5">
      <div className="text-center display-6 mb-5">Learning React</div>
      <div className="text-center">
        <form onSubmit={handleSubmit}>
          <input
            type="text"
            name="name"
            value={name}
            className="form-control mb-3"
            onChange={(event) => setName(event.target.value)}
          />
          <input
            type="email"
            name="email"
            value={email}
            className="form-control mb-3"
            onChange={(event) => setEmail(event.target.value)}
          />
          <button type="submit" className="btn btn-primary mx-3">
            Submit
          </button>
          <button onClick={fetchData} className="btn btn-success">
            Fetch Data
          </button>
        </form>
      </div>
    </div>
  );
}

export default App;
