// function to calculate sum
function sum(a, b) {
  return a + b;
}

// function to calculate power
exports.power = (x, n) => {
  let res = 1;
  while (n > 0) {
    res *= x;
    n--;
  }
  return res;
};

module.exports = {
  ...exports,
  sum,
};
