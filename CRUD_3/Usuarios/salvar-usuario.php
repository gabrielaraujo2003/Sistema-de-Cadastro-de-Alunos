<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $data_nascimento = $_POST['data_nascimento'];
        $sexo = $_POST['sexo'];
        $escolaridade = $_POST['escolaridade'];
        $observacoes = $_POST['observacoes'];


        $cp = $conn->prepare("SELECT id_aluno FROM aluno WHERE cpf = ?");  //aqui ele verifica o cpf dentro da tabela
        $cp->bind_param("s", $cpf);
        $cp->execute();
        $cp->store_result();

        //Aqui ele vai procurar dentro da tabela se já existe algum CPF já cadastro
        if ($cp->num_rows > 0) {
            echo "<script>alert('Erro: Este CPF já está cadastrado!');</script>";       //se o cpf já existir na tabela ele vai exibir está mensagem
            echo "<script>location.href='?page=cadastrar';</script>";

            //Se não tiver nenhum CPF igual ele vai continuar o código
        } else {
            $cp = $conn->prepare("INSERT INTO aluno (nome, cpf, data_nascimento, sexo, escolaridade, observacoes)
            VALUES (?, ?, ?, ?, ?, ?)");                                                                                //vai preparar para cadastrar todos os dados para cadastrar
            $cp->bind_param("ssssss", $nome, $cpf, $data_nascimento, $sexo, $escolaridade, $observacoes);

            //Aqui ele vai executar, se não tiver nenhum CPF igual cadastrado ele vai cadastrar e vai exibir a mensagem: Cadastrado com Sucesso
            if ($cp->execute()) {
                echo "<script>alert('Cadastrado com Sucesso!');</script>";
                echo "<script>location.href='?page=listar';</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar!');</script>";
            }
        }

        $cp->close();
        break;

    case 'editar':
        $nome = $_POST['nome'];  //Estamos recebendo as informações do formulário 'editar'
        $cpf = $_POST['cpf'];
        $data_nascimento = $_POST['data_nascimento'];
        $sexo = $_POST['sexo'];
        $escolaridade = $_POST['escolaridade'];
        $observacoes = $_POST['observacoes'];

        $sql = "UPDATE aluno SET
        nome='{$nome}',
        cpf='{$cpf}',
        data_nascimento='{$data_nascimento}',
        sexo='{$sexo}',
        escolaridade='{$escolaridade}',
        observacoes='{$observacoes}'
        WHERE id_aluno =" . $_REQUEST['id'];

        $result = $conn->query($sql);

        if ($result == true) {
            print("<script>alert('Editado com Sucesso!')</script>");
            print("<script>location.href='?page=listar'</script>");
        } else {
            print("<script>alert('Não foi possível editar!')</script>");
        }
        break;

    case 'excluir':
        $sql = "DELETE FROM aluno WHERE  id_aluno =" . $_REQUEST['id'];

        $result = $conn->query($sql);

        if ($result == true) {
            print("<script>alert('Excluido com Sucesso!')</script>");
            print("<script>location.href='?page=listar'</script>");
        } else {
            print("<script>alert('Não foi possível editar!')</script>");
        }
        break;
}
