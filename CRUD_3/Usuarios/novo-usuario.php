<link rel="stylesheet" href="./../CSS/style.css">
<h1>Cadastro de Aluno</h1>

<form action="?page=salvar" method="post" class="form-container">
    <input type="hidden" name="acao" value="cadastrar">
    <!-- Input oculto para enviar a ação para a listagem -->

    <div class="form-input-one">
        <input type="text" name="nome" id="" class="form-control" required placeholder="Nome Completo">
        <input type="text" name="cpf" id="" class="form-control" required minlength="11" maxlength="11"
            placeholder="CPF">
    </div>

    <div class="form-input-mf">
        <label for="">Data de Nascimento</label>
        <input type="date" name="data_nascimento" id="" class="form-control" required placeholder="Data de Nascimento">

        <label><input type="radio" name="sexo" value="Masculino" required> Masculino</label>
        <label><input type="radio" name="sexo" value="Feminino" required> Feminino</label>

        <select name="escolaridade" required>
            <option value="">Selecione</option>
            <option value="Ensino Fundamental">Fundamental</option>
            <option value="Ensino Médio">Médio</option>
            <option value="Ensino Técnico">Técnico</option>
            <option value="Ensino Superior">Superior</option>
        </select>
    </div>
    <div class="form-input">
        <textarea name="observacoes" rows="4" placeholder="Observações" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
</form>