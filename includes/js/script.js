jQuery(document).ready(function($){

  let num_choices = [];
  let unit_val = 150.00;

  $(".ac-btn_select").on('click', function(){
    $(".ac-btn_select").removeClass('ac-active');
    $(this).toggleClass('ac-active');
  });

  function format_nums() {
    let n_text = num_choices.join(', ');
    let lastIndex = n_text.lastIndexOf(', ');
    if (lastIndex !== -1) {
      n_text = n_text.substring(0, lastIndex) + ' e ' + n_text.substring(lastIndex + 1);
    }
    return n_text;
  }

  function in_array(num) {
    var index = num_choices.indexOf(num);
    if(index !== -1){
      num_choices.splice(index, 1);
      return true;
    } else {
      num_choices.push(num);
      return false;
    }
  }

  function att_grid() {
    let att_grid = fun_allow_nums();
    let length_grid = att_grid.array_item.length;
    if (length_grid >= 10) {
      $('.ac-allow_nums').text("Números disponíveis: "+length_grid);
      $(".ac-btn_select_auto").removeClass('ac-disabled');
    }
    else if (length_grid == 0) {
      $(".ac-btn_select_auto").addClass('ac-disabled');
      $('.ac-allow_nums').text("Nenhum número disponível");
    }
    else{
      $('.ac-allow_nums').text("Números disponíveis: "+length_grid);
      $(".ac-btn_select_auto").addClass('ac-disabled');
    }
  }

  function fun_allow_nums() {
    let grid_nums = $(".ac-grid_numbers button:not(.ac-item_block, .ac-active)");
    let allow_nums = [];
    grid_nums.each(function() {
      allow_nums.push($(this).text());
    });
    return {
      array_nums: allow_nums, 
      array_item: grid_nums
    };
  }
  
  function number_gem(n, array_item) {
    let i = 0;

    while (i < n) {
      let array_nums_allow = fun_allow_nums();
      let random_num = Math.floor(Math.random()*101);
      if($.inArray(String(random_num), array_nums_allow.array_nums) !== -1){
        
        var index = num_choices.indexOf(random_num);
        if(index !== -1){
          continue;
        } else {
          num_choices.push(random_num);
        }

        array_item.each(function() {
          if ($(this).text() == String(random_num)) {
            $(this).addClass("ac-active")
          }});

        i++;
      }
    }
    
    num_choices.sort(function(a, b) {
      return a - b;
    });

    let n_text = format_nums();
    let text_choice = num_choices.length > 1 ? "Números selecionados:" : "Número selecionado:";
    let val_total = num_choices.length * parseFloat(unit_val);

    return [n_text, text_choice, val_total];
  }
  $("#ac-btn_confirmar").on('click', function() {
    let allow_nums = fun_allow_nums()
    check_length = allow_nums.array_nums.length;

    let qtd_nums = check_length > parseInt($("#ac-qtd_nums").val()) ? parseInt($("#ac-qtd_nums").val()) : check_length;

    let result = number_gem(qtd_nums, allow_nums.array_item);

    if(num_choices.length > 0){
      $(".ac-show_numbers, .ac-payment, #ac-qtd_num_selects").show();
    } else{
      $(".ac-show_numbers, .ac-payment, #ac-qtd_num_selects").hide();
    }

    att_grid();

    $('#ac-resultNums').text(result[0]);
    $('#ac-nums_selected, #ac-qtd_num_select').text(result[1]);
    $('#ac-qtd_num_select').text(num_choices.length+" "+result[1]);
    $('.ac-valor_total').text(result[2].toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }));
  });

  $(".ac-btn_modal").on('click', function() {
    var value_add = parseInt($(this).attr('value'));
    var current_value = parseInt($("#ac-qtd_nums").val()) || 0;
    var new_value = current_value + value_add;
    $("#ac-qtd_nums").val(new_value);
    
  });

  $(".ac-grid_item").on('click', function(){
    $(this).toggleClass('ac-active');
    var this_n = parseInt($(this).text());

    in_array(this_n);

    num_choices.sort(function(a, b) {
        return a - b;
    });

    let n_text = format_nums();
    
    if(num_choices.length > 0){
      $(".ac-show_numbers, .ac-payment, #ac-qtd_num_selects").show();
    } else{
      $(".ac-show_numbers, .ac-payment, #ac-qtd_num_selects").hide();
    }

    let text_choice = num_choices.length > 1 ? "Números selecionados:" : "Número selecionado:";
    let val_total = num_choices.length * parseFloat(unit_val);

    att_grid();

    $('#ac-resultNums').text(n_text);
    $('#ac-nums_selected, #ac-qtd_num_select').text(text_choice);
    $('#ac-qtd_num_select').text(num_choices.length+" "+text_choice);
    $('.ac-valor_total').text(val_total.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }));
    console.log(num_choices);
  });

  $(document).on('focus', '.ac-celular', function(){
    $(this).mask('(00) 00000-0000');
  });

  att_grid();
});
