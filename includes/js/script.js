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

function formatResult(array) {
  array.sort((a, b) => a - b);
  document.getElementById("resultNums").textContent = array.join(', ');
}
function qtdNums(array) {
  console.log(array);
  let qtdArray = array.length;
  if (qtdArray == 1 ){
    document.getElementById("qtd_num_select").textContent = qtdArray + " Número Selecionado :";
    document.getElementById("nums_selected").textContent ="Número Selecionado";
    document.getElementById("second_total").classList.remove('hidden');
  }else if(qtdArray > 1 ){
    document.getElementById("qtd_num_select").textContent = qtdArray + " Números Selecionados :";
    document.getElementById("nums_selected").textContent ="Números Selecionados";
  }else{
    document.getElementById("nums_selected").textContent ="";
    document.getElementById("qtd_num_select").textContent =" ";
  }
}
let arrayBtn = [];
document.querySelectorAll(".ac-grid_item").forEach((buttom) =>{
  buttom.addEventListener("click", () => {
    let btnValue = buttom.value;
    if (arrayBtn.includes(btnValue)){
      let index = arrayBtn.indexOf(btnValue);
      arrayBtn.splice(index, 1);
    }else{
      arrayBtn.push(btnValue);
    }
    formatResult(arrayBtn);
    qtdNums(arrayBtn)
})})
