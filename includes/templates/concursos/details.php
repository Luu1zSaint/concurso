<main class="ac-content_widget">
    <section class="ac-banner">
        <div class="ac-banner_img">
            <img class="ac-img_mobile" src="<?= AC_TERREIRO_PATH ?>/includes/img/image_mobile.png" alt="img">
            <img class="ac-img_tablet" src="<?= AC_TERREIRO_PATH ?>/includes/img/img_tablet.png" alt="img">
            <img class="ac-img_desktop" src="<?= AC_TERREIRO_PATH ?>/includes/img/img-desktop2.png" alt="img">
        </div>
        <div class="ac-banner_desc">
        <p class="ac-title">Sobre o concurso de sorte:</p>
        <pre>
🎉Grande Concurso de Sorte em Prol do Terreiro de Candomblé "Ilê Axé Xangô e Ogum"🎉

É com imensa alegria que anunciamos o nosso Concurso de Sorte em benefício do Terreiro de Candomblé "Ilê Axé Xangô e Ogum"! Este é um momento especial para fortalecer nossa comunidade e apoiar as tradições que nos conectam com nossas raízes.

Participe e concorra a prêmios incríveis que serão sorteados no dia 28 de agosto de 2024. Cada número da sorte custa apenas 10 reais e toda a arrecadação será revertida para apoiar as atividades e o desenvolvimento do nosso terreiro.

💫Prêmios Imperdíveis
Ao adquirir seu número, além de concorrer, você estará contribuindo diretamente para a preservação e continuidade de nossa herança cultural e espiritual. Junte-se a nós nesta corrente de solidariedade e fé!

🔮Como Participar?
Adquira quantos números desejar e aumente suas chances de ganhar! Cada número custa R$10,00 e estará disponível até o dia do sorteio. Não perca esta oportunidade de fazer parte de algo maior!

🌟 Sorteio: 28/08/2024
🌟 Valor do Número: R$150,00

Venha com a gente, traga sua energia positiva e participe deste grande movimento em prol do nosso querido Ilê Axé! Axé para todos! ✨

Boa sorte e que Xangô e Ogum abençoem a todos!</pre>
        </div>
    </section>
    <section class="ac-numbers_select">
        <div class="ac-select">
            <h4 class="h4-title ac-select-title">Selecione seus números</h4>
            <div class="ac-btns_selection">
                <button type="button" class="ac-btn_select ac-active">Selecionar Manualmente</button>
                <button type="button" class="ac-btn_select ac-btn_select_auto" onclick="window.dialog.showModal();">Selecionar Automaticamente</button>
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
        <div class="ac-allow_nums">
            <p>Númeor disponíveis: </p>
        </div>
        <div class="ac-grid_numbers">
            <?php for ($i=1; $i < 101; $i++) { ?>
                <button type="button" class="ac-grid_item"><?=$i?></button>
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