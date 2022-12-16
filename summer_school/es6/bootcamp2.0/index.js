// create a js file

// printing hello msg
// console.log("Hello Developers!");

// creating variables in js
// we use three keywords - var, let, const
// var price = 10;
// console.log(price);
// let height = 20.5;
// console.log(height);

// the primary diff b/w var and let is that variables declared with var can be 'redeclared', whereas those declared with let, can't
// var myname = "aman";
// console.log(myname);
// var myname = "adarsh";
// console.log(myname);
// let myname = "aman";
// console.log(myname);
// let myname = "adarsh";
// console.log(myname);

// the variables created with var can be accessed even before they are initialized; but that's not the case with let variables. Eg:
// console.log(x); // accessing before initialization
// var x = 20;
// console.log(x);
// console.log(y);
// let y = 30;
// console.log(y);

// creating arrays in js
// let names = ["aman", "chaman", "adarsh", 120.8, true, false]; // array need not be homogenous in js
// console.log(names);

// creating object
// let student = {
//   name: "Aman Pandey",
//   rollNo: 21,
//   course: "MCA",
//   fee: 34590,
// };
// console.log(student);
// console.log("The fee is: " + student.fee);

// conditional statements in js: if-else if-else
// let age = 68;
// if (age < 18) {
//   console.log("Not eligible for license.");
// } else if (age >= 18 && age <= 60) {
//   console.log("Eligible for license");
// } else {
//   console.log("Ab license lekar karenge bhi kya???");
// }

/* switch-case bhi hota h, par abhi skip kar raha 
ye multi-line comment h*/

// loops in js: for and while
// let i = 1;
// while (i <= 10) {
//   console.log("Hello developer.");
//   i++;
// }
// for (let i = 1; i <= 10; i++) {
//   console.log("Hello dev.");
// }

// ab isse zyada basics nhi padhenge. function pe aate hain
// function is a block of some lines of code identified by some valid name
// function printHello10Times() {
//   let i = 1;
//   while (i <= 10) {
//     console.log("Hello: " + i);
//     i++;
//   }
// }
// function printHelloNTimes(n) {
//   let i = 1;
//   while (i <= n) {
//     console.log("Hello: " + i);
//     i++;
//   }
// }

// // for executing a function, you need to call it using the name and ()
// // printHello10Times();
// printHelloNTimes(4);

// now, the main part. event handling
