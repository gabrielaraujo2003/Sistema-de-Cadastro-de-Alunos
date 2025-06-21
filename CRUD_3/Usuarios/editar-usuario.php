<link rel="stylesheet" href="./../CSS/style.css">
<?php
$sql = "SELECT * FROM aluno WHERE id_aluno=" . $_REQUEST['id'];
$result = $conn->query($sql);
$row = $result->fetch_object();
?>

<h1>Editar Aluno</h1>

<form action="?page=salvar" method="post" class="form-container">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?= $row->id_aluno ?>">
    <!-- Input oculto para enviar a ação para a listagem -->

    <div class="form-input-one">
        <input type="text" name="nome" id="" class="form-control" placeholder="Nome" required value="<?= $row->nome ?>">
        <input type="text" name="cpf" id="" class="form-control" placeholder="CPF" minlength="11" maxlength="11"
            required value="<?= $row->cpf ?>">
    </div>

    <div class="form-input-mf">
        <label for="">Data de Nascimento</label>
        <input type="date" name="data_nascimento" id="" class="form-control" placeholder="Data de Nascimento" required
            value="<?= $row->data_nascimento ?>">

        <label><input type="radio" name="sexo" value="Masculino" <?= ($row->sexo == 'Masculino') ? 'checked' : '' ?>>
            Masculino</label>
        <label><input type="radio" name="sexo" value="Feminino" <?= ($row->sexo == 'Feminino') ? 'checked' : '' ?>>
            Feminino</label>

        <select name="escolaridade" required <?= $row->escolaridade ?>>
            <option value="">Selecione</option>
            <option value="Ensino Fundamental">Fundamental</option>
            <option value="Ensino Médio">Médio</option>
            <option value="Ensino Técnico">Técnico</option>
            <option value="Ensino Superior">Ensino Superior</option>
        </select>
    </div>
    <div class="form-input">
        <textarea name="observacoes" rows="4" placeholder="Observações" class="form-control"
            <?= $row->observacoes ?>></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>