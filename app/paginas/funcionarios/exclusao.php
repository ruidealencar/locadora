<div class="card">
    <div class="card-body">
        <h4 class="card-title">Excluir Funcionário(a)</h4>
        <p class="card-text">Deseja realmente excluir esse funcionário(a)?</p>
        <form action="/locadora/app/funcoes/funcionarios/excluir.php" method="post">
            <input type="hidden" value="<?php echo $_GET['fun_codigo']?>" name="fun_codigo">
            <input type="submit" class="btn btn-danger" value="Excluir">
        </form>
    </div>
</div>