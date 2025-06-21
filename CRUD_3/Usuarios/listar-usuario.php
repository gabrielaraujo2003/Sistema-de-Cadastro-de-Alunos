<h1 class="mt-4 mb-3 text-center text-primary">Listar Alunos</h1>

<?php
$sql = "SELECT * FROM aluno";
$result = $conn->query($sql);
$qtd = $result->num_rows;   // Todos os registros das colunas serão mostrados em uma linha
if ($qtd > 0) {
    print '<table class="table table-bordered table-striped table-hover shadow-sm">
            <thead class="thead-dark text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Escolaridade</th>
                    <th scope="col">Observações</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>';

    while ($row = $result->fetch_object()) {
        print "<tr class='text-center'>";
        print "<td>" . $row->id_aluno . "</td>";
        print "<td>" . $row->nome . "</td>";
        print "<td>" . $row->cpf . "</td>";
        print "<td>" . date("d/m/Y", strtotime($row->data_nascimento)) . "</td>";
        print "<td>" . $row->sexo . "</td>";
        print "<td>" . $row->escolaridade . "</td>";
        print "<td>" . $row->observacoes . "</td>";

        print("<td class='d-flex justify-content-center'>
                <button onclick=\"location.href='?page=editar&id=" . $row->id_aluno . "';\" class='btn btn-outline-success me-3'>
                    <i class='bi bi-pencil'></i> Editar
                </button>
                <button onclick=\"if(confirm('Deseja Excluir?')){location.href='?page=salvar&acao=excluir&id=" . $row->id_aluno . "';}\" class='btn btn-outline-danger'>
                    <i class='bi bi-trash'></i> Excluir
                </button>
              </td>");
        print("</tr>");
    }
    print('</tbody></table>');
} else {
    print("<p class='alert alert-warning text-center'> Não há resultados para exibir </p>");
}
?>