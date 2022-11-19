import React, { Component } from "react";

class WebForm extends Component {
  state = {
    username: "",
    password: "",
  };

  handleSubmit = (event) => {
    event.preventDefault();
  };

  handleChange = (event) => {
    const { name, value } = event.target;
    this.setState({
      [name]: value,
    });
  };

  render() {
    const { username, password } = this.state;
    return (
      <div style={{ alignItems: "center" }}>
        <form className="w-50 m-auto" onSubmit={this.handleSubmit}>
          <div className="mb-3">
            <label htmlFor="username" className="form-label">
              Username
            </label>
            <input
              name="username"
              onChange={this.handleChange}
              type="text"
              value={username}
              className="form-control"
              id="username"
            />
          </div>
          <div className="mb-3">
            <label htmlFor="password" className="form-label">
              Password
            </label>
            <input
              onChange={this.handleChange}
              name="password"
              type="password"
              value={password}
              className="form-control"
              id="password"
            />
          </div>
          <button type="submit" className="btn btn-primary">
            Submit
          </button>
          <br />
          {JSON.stringify(this.state)}
        </form>
      </div>
    );
  }
}

export default WebForm;
