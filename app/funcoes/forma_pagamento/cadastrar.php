<?php
    include $_SERVER['DOCUMENT_ROOT'].'/locadora/app/db/conexao.php';
    
    $pagamento_pagamento = $_POST['pagamento_pagamento'];
    
    $comando = $conexao->prepare("INSERT INTO TB_FORMA_PAGAMENTO (PAGAMENTO_PAGAMENTO) VALUES ('{$pagamento_pagamento}')");
    $comando->execute();
    
    header('Location: /locadora?pagina=app/paginas/forma_pagamento/listagem.php');
?>