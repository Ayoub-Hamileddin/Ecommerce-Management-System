let plus = document.querySelector(".counterPlus");
let Minus = document.querySelector(".counterMinus");
let quntite = Number(document.querySelector("#qty ").value);
let qty = document.querySelector("#qty ");
// console.log( Number(qty));
plus.addEventListener("click", () => {
  quntite = quntite + 1;
  qty.value = quntite;
});
Minus.addEventListener("click", () => {
  if (quntite > 0) {
    quntite = quntite - 1;
    qty.value = quntite;
  } else {
    qty.value = quntite;
  }
});
