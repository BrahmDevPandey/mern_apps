// console.log("Hello and welcome to bootcamp");
// console.log("this is fifth day of bootcamp");

// // var, let, const
// var price = 30;
// console.log(price);
// price = "Aman";
// console.log(price);
// var price = 50;
// console.log(price);

// let name = "ajit";
// console.log(name);
// name = 30.8;
// // let name = "aman";
// console.log(name);

// const pi = 3.14;
// console.log(pi);
// pi = 8;
// // console.log(pi);

// let age = 67;
// if (age < 18) {
//   console.log("not eligible");
// } else if (age >= 18 && age <= 60) {
//   console.log("eligible");
// } else {
//   console.log("age limit exceeded");
// }

// let sec = "S";
// switch (sec) {
//   case "A":
//     console.log("Section is A");
//     break;
//   case "B":
//     console.log("Section is B");
//     break;
//   case "C":
//     console.log("Section is C");
//     break;
//   default:
//     console.log("Invalid Section");
//     break;
// }

// let count = 1; //initialization
// while (count <= 5) {
//   // condition
//   console.log("Hello World");
//   console.log("in loop");
//   count = count + 1; // update
// }

// for (let count = 1; count <= 5; count = count + 1) {
//   console.log("Hello World");
// }

// let arr = [10, "Ajay", 30, 3.14, true];
// console.log(arr);
// console.log(arr[3]);
// arr[3] = "Chaya";
// console.log(arr[3]);

// let student = {
//   name: "Aman",
//   roll: 21,
//   dept: "CSE",
//   fee: 138000,
// };

// // console.log(student);
// console.log(student.name);
// console.log(student.dept);

function printHello10Times() {
  for (let i = 1; i <= 10; i++) {
    console.log("Hello");
  }
}

function printHelloNTimes(n) {
  for (let i = 1; i <= n; i++) {
    console.log(`Hello: ${i} and the value of n is ${n}`);
  }
}

// printHello10Times();
printHelloNTimes(5);
