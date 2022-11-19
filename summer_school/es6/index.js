import mySum from "./practice.js";
// // declarating a variable in es6
// var c = "aman"; // redeclaration is allowed; {var c = "aniket"} is valid
// let d = "start"; // redeclaration is not allowed, but value can be changed
// const p = "hi"; // neither redeclaration, nor updation is allowed
// console.log(c, d, p);

// // declaring arrays in es6
// var arr = [2, 3, 5, 4];
// console.log(arr);

// // declaring objects in es6
// var obj = {
//   name: "aman",
//   age: 21,
// };
// console.log(obj);
// console.log(obj.name);
// console.log(obj.age);

// /*
//     objects and arrays are reference data types
//     number and strings are non-reference data types
// */

// // functions in es6
// // method 1
// function sum(a, b) {
//   console.log(a + b);
// }
// sum(6, 7);

// // method 2 - using arrow function
// var print = (msg) => {
//   console.log(msg);
// };
// print("Hello");

// // method 3 - lambda functions
// var square = (num) => num * num;
// console.log(square(5));

// // creating class in es6
// class student {
//   constructor(name) {
//     console.log("Welcome " + name);
//   }
//   name = "ajit";
//   age = 25;
// }
// var stu = new student("ajit");
// console.log(stu.age);

// // inheritance in a class
// class MCAStudent extends student {
//   constructor(name, roll) {
//     super(name);
//     console.log("Your roll number is:" + roll);
//   }
//   roll = 21;
// }
// var mcaStu = new MCAStudent("aman", 22);
// console.log(mcaStu.age);

// // spread operator(...)
// var arr1 = [2, 3, 5, 5, 8];
// var arr2 = [...arr1, 9, 3, 10]; // without the spread operator, it will result in a nested array
// console.log(arr1);
// console.log(arr2);

// // spread operator in object
// var person = {
//   name: "aman",
//   age: "21",
// };
// var man = {
//   ...person,
//   gender: "male",
// };
// console.log(person);
// console.log(man);

// // rest operator, used to get all params from a large number of params to a function
// var arr3 = [45, 54, 32, 50];
// function printParams(...t) {
//   console.log(t);
// }
// printParams(22, 45, 43, 55);

// // destructuring an array
// var arr4 = [1, 2, 3, 4, 5];
// var [aa, bb, cc] = arr4;
// console.log(aa, bb, cc);

// // destructuring object
// var obj = {
//   name: "Akash Singh",
//   age: 32,
// };
// var { name, age } = obj;
// console.log(name, age);

// /* the variable names must be same as the instance variables of the object to be destrucutesd;
// however, in case of arrays the names of varibles are immaterial */

// // map function
// var arr = [2, 3, 5, 7, 8];
// arr.map((val) => {
//   console.log(val * val);
// });

// var doubleArr = arr.map((val) => val * 2);
// console.log("Double items array: ");
// console.log(doubleArr);

// // filer function
// var oddArr = arr.filter((x) => x % 2 == 1);
// console.log("Odd items array: ");
// console.log(oddArr);

// // reduce function
// var sumArr = arr.reduce((x, y) => x + y, 20);
// console.log("Sum of all elements: ");
// console.log(sumArr);

// // find product of all elements of an array using reduce()
// var prodArr = arr.reduce((x, y) => x * y, 1);
// console.log("Product of all elements: ");
// console.log(prodArr);

// // creating copy of an array
// var arr1 = [3, 4, 3, 6, 6];
// var arr2 = [...arr1];
// arr2[0] = 45; // won't be reflected in arr1
// console.log(arr1, arr2);

// // creating copy of objects
// var obj1 = {
//   name: "Aman",
//   age: 21,
// };
// // var obj2 = obj1; // will cause changes made to one being reflected to the other
// var obj2 = { ...obj1 };
// obj1.age = 43;
// console.log(obj1, obj2);

// import/export
console.log(mySum(85, 45));
