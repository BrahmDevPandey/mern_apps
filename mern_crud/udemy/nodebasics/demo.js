// let heading = document.querySelector("h1");
// heading.innerText = "my name is aman";

// // window.localStorage.setItem("username", "aman");
// document.write(localStorage.getItem("username"));

// let name = localStorage.getItem("username");
// let day = "Thursday";
// var message = `Hi, ${name}! Today is ${day}`;
// alert(message);

// const printName = ({ fname }) => {
//   console.log(`First name of student is ${fname}`);
// };

// printName({ fname: "Aman", lname: "Pandey" });

class Student {
  constructor(name, roll, dob) {
    this.name = name;
    this.roll = roll;
    this.dob = dob;
  }

  info() {
    console.log(
      `{Name: ${this.name}, Roll no.: ${this.roll}, DoB: ${
        this.dob.toLocaleString().split(",")[0]
      }}`
    );
  }
}

const newStu = new Student("Nand Kishore", 31, new Date(2000, 8, 8));
newStu.info();
