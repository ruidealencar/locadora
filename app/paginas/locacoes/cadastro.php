<?php
    include $_SERVER['DOCUMENT_ROOT'].'/locadora/app/db/conexao.php';
    
    $queryCarros = $conexao->query("SELECT CAR_CODIGO, CAR_MODELO FROM TB_CARROS WHERE CAR_DISPONIVEL = 's'");
    $queryClientes = $conexao->query("SELECT CLI_CODIGO, CLI_NOME FROM TB_CLIENTES");
    $queryPagamentos = $conexao->query("SELECT PAGAMENTO_CODIGO, PAGAMENTO_PAGAMENTO FROM TB_FORMA_PAGAMENTO");
    $queryFuncionarios = $conexao->query("SELECT FUN_CODIGO, FUN_FUNCIONARIO FROM TB_FUNCIONARIOS WHERE FUN_DATA_DEMISSAO IS NULL");
?>

<body background="https://www.jutarnji.hr/autoklub/aktualno/bmw-tricajpg/7722120/alternates/LANDSCAPE_980/bmw%20trica.jpg">

    <div class="container">

<form action="/locadora/app/funcoes/locacoes/cadastrar.php" method="post">
    <div class="card">
        <div class="card-header">
            Cadastrar locação
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label for="loc_data_locacao">Data da locação</label>
                    <input type="date" value="" class="form-control" name="loc_data_locacao" required="required" autofocus> 
                </div>
                <div class="col">
                    <label for="loc_odometro_inicial">Odômetro inicial</label>
                    <input type="number" value="" class="form-control" name="loc_odometro_inicial" required="required" autofocus > 
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="loc_car_codigo">Carro</label>
                    <select name="loc_car_codigo" class="form-control">
                    <?php while($carro = $queryCarros->fetch(PDO::FETCH_ASSOC)){ ?>
                        <option value="<?php echo $carro['CAR_CODIGO']; ?>">
                            <?php echo $carro['CAR_MODELO']; ?>
                        </option>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="loc_cli_codigo">Cliente</label>
                    <select name="loc_cli_codigo" class="form-control">
                    <?php while($cliente = $queryClientes->fetch(PDO::FETCH_ASSOC)){ ?>
                        <option value="<?php echo $cliente['CLI_CODIGO']; ?>">
                            <?php echo $cliente['CLI_NOME']; ?>
                        </option>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="pagamento_pagamento">Forma de Pagamento</label>
                    <select name="pagamento_pagamento" class="form-control">
                    <?php while($pagamento = $queryPagamentos->fetch(PDO::FETCH_ASSOC)){ ?>
                        <option value="<?php echo $pagamento['PAGAMENTO_CODIGO']; ?>">
                            <?php echo $pagamento['PAGAMENTO_PAGAMENTO']; ?>
                        </option>
                    <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="loc_fun_codigo">Funcionário</label>
                    <select name="loc_fun_codigo" class="form-control">
                    <?php while($funcionario = $queryFuncionarios->fetch(PDO::FETCH_ASSOC)){ ?>
                        <option value="<?php echo $funcionario['FUN_CODIGO']; ?>">
                            <?php echo $funcionario['FUN_FUNCIONARIO']; ?>
                        </option>
                    <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-primary" value="Cadastrar">
        </div>
    </div>
</form>