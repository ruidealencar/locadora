<div class="card">
    <div class="card-body">
        <h4 class="card-title">Excluir forma de pagamento</h4>
        <p class="card-text">Deseja realmente excluir essa forma de pagamento?</p>
        <form action="/locadora/app/funcoes/forma_pagamento/excluir.php" method="post">
            <input type="hidden" value="<?php echo $_GET['pagamento_codigo']?>" name="pagamento_codigo">
            <input type="submit" class="btn btn-danger" value="Excluir">
        </form>
    </div>
</div>