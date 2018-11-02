<?php
    include $_SERVER['DOCUMENT_ROOT'].'/locadora/app/db/conexao.php';
    $query = $conexao->query("SELECT LOC_CODIGO, CAR_MODELO, CLI_NOME, LOC_DATA_LOCACAO, LOC_DATA_ENTREGA, LOC_CAR_CODIGO, LOC_CLI_CODIGO, LOC_FUN_CODIGO, FUN_FUNCIONARIO, PAGAMENTO_PAGAMENTO, LOC_ODOMETRO_INICIAL, LOC_ODOMETRO_FINAL
    FROM tb_locacoes 
    inner join tb_carros c on LOC_CAR_CODIGO = CAR_CODIGO
    inner join tb_clientes  on CLI_CODIGO = LOC_CLI_CODIGO
    inner join tb_funcionarios  on FUN_CODIGO = LOC_FUN_CODIGO
    inner join tb_forma_pagamento on PAGAMENTO_CODIGO = LOC_PAGAMENTO_CODIGO");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>CRUD com Bootstrap</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">

</head>
<body>

    <div class="container">

        <div class="card">
            <div class="card-header">
                Locações em andamento
            </div>
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Data da locação</th>
                        <th>Carro</th>
                        <th>Odômetro inicial</th>
                        <th>Cliente</th>
                        <th>Forma de Pagamento</th>
                        <th>Funcionário</th>                
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($locacao = $query->fetch(PDO::FETCH_ASSOC)){ ?>
                        <tr>
                            <td>
                                <?php echo $locacao['LOC_CODIGO']; ?>
                            </td>
                            <td>
                                <?php echo $locacao['LOC_DATA_LOCACAO']; ?>
                            </td>
                            <td>
                                <?php echo $locacao['CAR_MODELO']; ?>
                            </td>
                            <td>
                                <?php echo $locacao['LOC_ODOMETRO_INICIAL']; ?>
                            </td>
                            <td>
                                <?php echo $locacao['CLI_NOME']; ?>
                            </td>
                            <td>
                                <?php echo $locacao['PAGAMENTO_PAGAMENTO']; ?>
                            </td>
                            <td>
                                <?php echo $locacao['FUN_FUNCIONARIO']; ?>
                            </td>
                            <td>
                                <a href=<?php echo "/locadora/?pagina=app/paginas/locacoes/exclusao.php&loc_codigo={$locacao['LOC_CODIGO']}"; ?> class="btn btn-danger btn-sm">Excluir</a>
                                <a href=<?php echo "/locadora/?pagina=app/paginas/locacoes/edicao.php&loc_codigo={$locacao['LOC_CODIGO']}"; ?> class="btn btn-primary btn-sm">Editar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="card-footer">
                <a href=<?php echo "/locadora/?pagina=app/paginas/locacoes/cadastro.php"; ?> class="btn btn-primary btn-sm">Nova locação</a>
            </div>
        </div>
    </div>