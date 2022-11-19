let mydiv = document.getElementById("mydiv");
let myp = document.getElementById("myp");

mydiv.addEventListener("mouseover", () => {
  mydiv.style.fontSize = "50px";
  console.log("event fired");
  mydiv.style.backgroundColor = "white";
});

mydiv.addEventListener("mouseout", () => {
  mydiv.style.fontSize = "30px";
  console.log("event fired");
  mydiv.style.backgroundColor = "red";
});
