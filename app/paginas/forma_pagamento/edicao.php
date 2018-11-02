<?php
    include $_SERVER['DOCUMENT_ROOT'].'/locadora/app/db/conexao.php';
    $pagamento_codigo = $_GET['pagamento_codigo'];
    $query = $conexao->query("SELECT PAGAMENTO_CODIGO, PAGAMENTO_PAGAMENTO FROM TB_FORMA_PAGAMENTO   WHERE PAGAMENTO_CODIGO = {$pagamento_codigo}");
    $pagamento = $query->fetch(PDO::FETCH_ASSOC);
?>

<form action="/locadora/app/funcoes/forma_pagamento/editar.php" method="post">
    <div class="card">
        <div class="card-header">
            Editar forma de pagamento
        </div>
        <div class="card-body">
            <input type="hidden" value="<?php echo $pagamento['PAGAMENTO_CODIGO']?>" name="pagamento_codigo">

            <label for="pagamento_pagamento">Forma de Pagamento</label>
            <input type="text" value="<?php echo $pagamento['PAGAMENTO_PAGAMENTO']; ?>" class="form-control" name="pagamento_pagamento" autofocus> 
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-primary" value="Editar">
        </div>
    </div>
</form>