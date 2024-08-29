<?php

// é o nosso servidor
$servername="localhost";

//usuário padrão do servidor local
$username="root";

//senha padrão do servidor local
$password="";

//nome do banco de dados
$db_name="usuarios";

//Faz a conexão com o banco de dados, seguindo informações especificadas
$conn= new mysqli($servername,$username,$password,$db_name);

//Verifica a conexão com o banco de dados, em caso de erro
if ($conn->connect_error) {
    // o die encerra o script, e pode conter uma mensagem de erro.
    die("Falha na conexão! " . $conn->connect_error);
}

//Capturando os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

//essa variável faz uma consulta no banco de dados, e insere os dados do
//formulário na tabela
$sql = "INSERT INTO usuarios (nome, email, senha) 
VALUES('$nome', '$email', '$senha')";

//Condição que verifica se é verdadeira a consulta executada pelo 
//banco ou não.
if ($conn->query($sql) === TRUE) {
    echo "Usuário cadastrado com sucesso!";
} else {
    //$conn->error mensagem de erro MySQL se a consulta não estiver correta
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

//encerra a conexão com o banco de dados, evitando desperdício de recursos
$conn->close();


?>