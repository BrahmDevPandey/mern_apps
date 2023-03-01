// // // // console.log("First node app.");
// // // // const helpers = require("./helpers");
// // // // console.log(helpers.sum(20, 3));
// // // // console.log(helpers.power(2, 4));
// // // const http = require("http");

// // // const server = http.createServer((req, res) => {
// // //   res.writeHead(200, { "Content-Type": "text/html" });
// // //   res.end(JSON.stringify({ name: "aman" }));
// // // });

// // // server.listen(8000);

// // const filename = "target.txt";
// // const fs = require("fs");
// // fs.watch(filename, (event) => {
// //   console.log(`${filename} modified. Modification: ${event}`);
// // });

// // console.log(`Watching for changes in ${filename}...`);

let filename = "target.txt";
const fs = require("fs");

fs.watch(filename, (event) => {
  if (event === "change") {
    console.log(`${filename} contents changed.`);
    fs.readFile(filename, (err, data) => {
      if (err) {
        console.log("Error occurred: " + err);
        throw err;
      }
      console.log("New file content: ");
      console.log(data.toString());
    });
  } else {
    console.log("File renamed or deleted. Stopping watch.");
    /* throw new Error(); */
    process.exit();
  }
});
// fs.watch(filename, (event) => {
//   console.log(`${filename} contents changed.`);
//   fs.readFile(filename, (err, data) => {
//     if (err) {
//       console.log("Error occurred: " + err);
//       throw err;
//     }
//     console.log("New file content: ");
//     console.log(data.toString());
//   });
// });

console.log(`Watching ${filename} for changes...`);
const stdin = process.env;
/*console.log(stdin);*/

/* read a file synchronously */
// const fs = require("fs");
// const data = fs.readFileSync("target.txt");
// console.log("File contents are: \n" + data);
// console.log(`Watching target.txt for changes...`);
