<?php
    include $_SERVER['DOCUMENT_ROOT'].'/locadora/app/db/conexao.php';
    
    $pagamento_codigo = $_POST['pagamento_codigo'];
    $pagamento_pagamento    = $_POST['pagamento_pagamento'];
    
    $comando = $conexao->prepare("UPDATE TB_FORMA_PAGAMENTO SET PAGAMENTO_PAGAMENTO = '{$pagamento_pagamento}' WHERE PAGAMENTO_CODIGO = {$pagamento_codigo}");
    $comando->execute();
    
    header('Location: /locadora?pagina=app/paginas/forma_pagamento/listagem.php');
?>