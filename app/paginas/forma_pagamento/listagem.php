<?php
    include $_SERVER['DOCUMENT_ROOT'].'/locadora/app/db/conexao.php';
    $query = $conexao->query("SELECT PAGAMENTO_CODIGO, PAGAMENTO_PAGAMENTO FROM TB_FORMA_PAGAMENTO");
?>

<div class="card">
    <div class="card-header">
        Cadastro das formas de pagamento
    </div>
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Forma de Pagamento</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while($pagamento = $query->fetch(PDO::FETCH_ASSOC)){ ?>
                <tr>
                    <td>
                        <?php echo $pagamento['PAGAMENTO_CODIGO']; ?>
                    </td>
                    <td>
                        <?php echo $pagamento['PAGAMENTO_PAGAMENTO']; ?>
                    </td>
                    <td>
                        <a href=<?php echo "/locadora/?pagina=app/paginas/forma_pagamento/exclusao.php&pagamento_codigo={$pagamento['PAGAMENTO_CODIGO']}"; ?> class="btn btn-danger btn-sm">Excluir</a>
                        <a href=<?php echo "/locadora/?pagina=app/paginas/forma_pagamento/edicao.php&pagamento_codigo={$pagamento['PAGAMENTO_CODIGO']}"; ?> class="btn btn-primary btn-sm">Editar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="card-footer">
        <a href=<?php echo "/locadora/?pagina=app/paginas/forma_pagamento/cadastro.php"; ?> class="btn btn-primary btn-sm">Cadastrar nova forma de pagamento</a>
    </div>
</div>