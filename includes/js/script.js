document.querySelectorAll(".ac-grid_item").forEach(function (botao) {
  botao.addEventListener("click", function () {
    if (this.classList.contains("selected")) {
      this.classList.remove("selected");
      this.classList.add("normal");
    } else {
      this.classList.add("selected");
    }
  });
});
document.getElementById("btn_manual").addEventListener("click", function () {
  let btn_auto = document.getElementById("btn_auto");
  if (
    !this.classList.contains("btn_select") &&
    btn_auto.classList.contains("btn_select")
  ) {
    btn_auto.classList.remove("btn_select");
    this.classList.add("btn_select");
  } else {
    this.classList.toggle("btn_select");
  }
});
document.getElementById("btn_auto").addEventListener("click", function () {
  let btn_manual = document.getElementById("btn_manual");
  if (
    !this.classList.contains("btn_select") &&
    btn_manual.classList.contains("btn_select")
  ) {
    btn_manual.classList.remove("btn_select");
    this.classList.add("btn_select");
  } else {
    this.classList.toggle("btn_select");
  }
});
