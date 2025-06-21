<?php 

    define("HOST","127.0.0.1");
    define("USER","root");
    define("PASS","");
    define("DB","user_aluno");

    $conn = mysqli_connect(HOST,USER,PASS,DB) or die ("Erro. Não concetado ao banco de dados");

?>