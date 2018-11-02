<?php
    include $_SERVER['DOCUMENT_ROOT'].'/locadora/app/db/conexao.php';

    $pagamento_codigo = $_POST['pagamento_codigo'];

    $comando = $conexao->prepare("DELETE FROM TB_FORMA_PAGAMENTO WHERE PAGAMENTO_CODIGO = {$pagamento_codigo}");
    $comando->execute();

    header('Location: /locadora?pagina=app/paginas/forma_pagamento/listagem.php');
?>