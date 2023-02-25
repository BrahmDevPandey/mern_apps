// console.log("First node app.");
// const helpers = require("./helpers");
// console.log(helpers.sum(20, 3));
// console.log(helpers.power(2, 4));
const http = require("http");

const server = http.createServer((req, res) => {
  res.writeHead(200, { "Content-Type": "text/html" });
  res.end(JSON.stringify({ name: "aman" }));
});

server.listen(8000);
