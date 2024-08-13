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
            <h4 class="h4-title ac-select-title">Selecione seus números</h4>
            <div class="ac-btns_selection">
                <button type="button" class="ac-btn_select ac-active">Selecionar Manualmente</button>
                <button type="button" class="ac-btn_select" onclick="window.dialog.showModal();">Selecionar Automaticamente</button>
            </div>
                <dialog id="dialog">
                    <h2>Quantidade de números aleatórios</h2>
                    <input type="number" id="ac-qtd_nums">
                    <div class="ac-btns_choises">
                        <button type="button" class="ac-btn_modal" value="1">+1</button>
                        <button type="button" class="ac-btn_modal" value="5">+5</button>
                        <button type="button" class="ac-btn_modal" value="10">+10</button>
                    </div>
                    <button type="button" id="ac-btn_confirmar" class="ac-btn_modal ac-x" onclick="window.dialog.close();">Confirmar</button>
                    <button type="button" class="ac-btn_modal ac-x" onclick="window.dialog.close();" aria-label="close">Fechar</button>
                </dialog>
        </div>
        <div class="ac-grid_numbers">
            <?php for ($i=1; $i < 101; $i++) { ?>
                <button type="button" class="ac-grid_item <?= $i > 50 ? 'ac-item_block' : '' ?>"><?=$i?></button>
            <?php } ?>
        </div> 
        <div class="ac-show_numbers">
            <h4 class="ac-h4-title" id="ac-nums_selected">Número selecionado:</h4>
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
                <input id="ac-whats" class="ac-celular" type="text" name="whats" required>
            </div>
        </form>
    </section>
    <section class="ac-payment">
        <div class="ac-container_pay">
            <div class="ac-total">
                <p id="ac-qtd_num_select">Número selecionado</p>
                <p class="ac-valor_total">R$ 00,00</p>
            </div>
            <button class="ac-btn_payment" type="button">Ir para o pagamento</button>
        </div>
    </section>
</main>