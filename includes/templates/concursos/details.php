<main class="ac-content_widget">
    <section class="ac-banner">
        <div class="ac-banner_img">
            <img class="ac-img_mobile" src="<?= AC_TERREIRO_PATH ?>/includes/img/image_mobile.png" alt="img">
            <img class="ac-img_tablet" src="<?= AC_TERREIRO_PATH ?>/includes/img/img_tablet.png" alt="img">
            <img class="ac-img_desktop" src="<?= AC_TERREIRO_PATH ?>/includes/img/img-desktop2.png" alt="img">
        </div>
        <div class="ac-banner_desc">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur incidunt voluptatum dolores a quidem tempora. Nihil, porro itaque pariatur quidem alias nesciunt a! Nemo minima iusto eligendi reprehenderit facere nobis?</p>
        </div>
    </section>
    <section class="ac-numbers_select">
        <div class="ac-select">
            <h4 class="h4-title ac-select-title">Selecione os Números: </h4>
            <div class="ac-btns_selection">
                <button type="button"  class="ac-btn_select ac-active" aut="m">Selecionar Manualmente</button>
                <button type="button" class="ac-btn_select" aut="a">Selecionar Automaticamente</button>
            </div>
        </div>
        <div class="ac-grid_numbers">
            <button type="button" class="ac-grid_item">0001</button>
            <button type="button" class="ac-grid_item">0002</button>
            <button type="button" class="ac-grid_item">0003</button>
            <button type="button" class="ac-grid_item">0004</button>
            <button type="button" class="ac-grid_item">0005</button>
            <button type="button" class="ac-grid_item">0006</button>
            <button type="button" class="ac-grid_item">0007</button>
            <button type="button" class="ac-grid_item">0008</button>
            <button type="button" class="ac-grid_item">0009</button>
            <button type="button" class="ac-grid_item">0010</button>
            <button type="button" class="ac-grid_item">0018</button>
            <button type="button" class="ac-grid_item">0029</button>
            <button type="button" class="ac-grid_item">0055</button>
            <button type="button" class="ac-grid_item">0078</button>
            <button type="button" class="ac-grid_item">0099</button>
        </div> 
        <div class="ac-show_numbers ">
            <h4 class="ac-h4-title" id="ac-nums_selected"></h4>
            <p id="ac-resultNums"></p>
        </div>
    </section>
    <section class="ac-form_info">
        <form action="#" method="post">
            <div class="ac-input_name">
                <label for="ac-name">Seu Nome:</label>
                <input id="ac-name" type="text" name="name" required>
            </div>
            <div class="ac-input_wpp">
                <label for="ac-whats">Seu Whatsapp:</label>
                <input id="ac-whats" type="text" name="whats" required>
            </div>
        </form>
    </section>
    <section class="ac-payment">
        <div class="ac-container_pay">
            <div class="ac-total">
                <p id="ac-qtd_num_select"></p>
                <p class="ac-valor_total">R$ 207,90</p>
            </div>
            <button class="ac-btn_payment" type="button">Ir para o pagamento</button>
        </div>
    </section>
</main>