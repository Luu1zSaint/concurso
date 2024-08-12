// document.querySelectorAll(".ac-grid_item").forEach(function (botao) {
//   botao.addEventListener("click", function () {
//     if (this.classList.contains("selected")) {
//       this.classList.remove("selected");
//       this.classList.add("normal");
//     } else {
//       this.classList.add("selected");
//     }
//   });
// });

// function formatResult(array) {
//   array.sort((a, b) => a - b);
//   document.getElementById("resultNums").textContent = array.join(', ');
// }
// function qtdNums(array) {
//   console.log(array);
//   let qtdArray = array.length;
//   if (qtdArray == 1 ){
//     document.getElementById("qtd_num_select").textContent = qtdArray + " Número Selecionado :";
//     document.getElementById("nums_selected").textContent ="Número Selecionado";
//     document.getElementById("second_total").classList.remove('hidden');
//   }else if(qtdArray > 1 ){
//     document.getElementById("qtd_num_select").textContent = qtdArray + " Números Selecionados :";
//     document.getElementById("nums_selected").textContent ="Números Selecionados";
//   }else{
//     document.getElementById("nums_selected").textContent ="";
//     document.getElementById("qtd_num_select").textContent =" ";
//   }
// }
// let arrayBtn = [];
// document.querySelectorAll(".ac-grid_item").forEach((buttom) =>{
//   buttom.addEventListener("click", () => {
//     let btnValue = buttom.value;
//     if (arrayBtn.includes(btnValue)){
//       let index = arrayBtn.indexOf(btnValue);
//       arrayBtn.splice(index, 1);
//     }else{
//       arrayBtn.push(btnValue);
//     }
//     formatResult(arrayBtn);
//     qtdNums(arrayBtn)
// })})


jQuery(document).ready(function($){

  let num_choices = [];
  let unit_val = 150.00;

  $(".ac-btn_select").on('click', function(){
    $(".ac-btn_select").removeClass('ac-active');
    $(this).toggleClass('ac-active');
  });

  $(".ac-grid_item").on('click', function(){
    $(this).toggleClass('ac-active');
    var this_n = $(this).text();
    var index = num_choices.indexOf(this_n);

    if(index !== -1){
      num_choices.splice(index, 1);
    } else {
      num_choices.push(this_n);
    }

    num_choices.sort(function(a, b) {
        return a - b;
    });

    let n_text = num_choices.join(', ');
    let lastIndex = n_text.lastIndexOf(', ');
    if (lastIndex !== -1) {
      n_text = n_text.substring(0, lastIndex) + ' e ' + n_text.substring(lastIndex + 1);
    }

    let text_choice = num_choices.length > 1 ? "Números selecionados:" : "Número selecionado:";

    if(num_choices.length > 0){
      $(".ac-show_numbers, .ac-payment").show();
    } else{
      $(".ac-show_numbers, .ac-payment").hide();
    }

    let val_total = num_choices.length * parseFloat(unit_val);

    $('#ac-resultNums').text(n_text);
    $('#ac-nums_selected').text(text_choice);
    $('.ac-valor_total').text(val_total.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }));
  });

  $(document).on('focus', '.ac-celular', function(){
    $(this).mask('(00) 00000-0000');
  });

});