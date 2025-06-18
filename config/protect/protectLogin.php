<?php 

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    die("Você não pode acessar esta página porque não está logado. <p><a href=\"index.php\"></p>");
}

// class teste {
// protected function teste2(){
//     if (isset($_POST['usuario']) && isset($_POST['senha'])) {
//   if (strlen($_POST['usuario']) == 0) {
//     echo "Preencha seu e-mail";
//   } elseif (strlen($_POST['senha']) == 0) {
//     echo "Preencha sua senha";
//   } else {
//     // Conexão MySQLi
//     $mysqli = new mysqli('mysql-db', 'root', '123', 'visitantes');

//     if ($mysqli->connect_error) {
//       die("Erro de conexão: " . $mysqli->connect_error);
//     }

//     $usuario = $mysqli->real_escape_string($_POST['usuario']);
//     $senha = $mysqli->real_escape_string($_POST['senha']);

//     $sql_code = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
//     $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

//     if ($sql_query->num_rows === 1) {
//       $usuario = $sql_query->fetch_assoc();

//       session_start();
//       $_SESSION['id'] = $usuario['id'];
//       $_SESSION['nome'] = $usuario['nome'];

//       header("Location: pages/home.php");
//       exit();
//     } else {
//       echo "<p class='erro-login'>Falha ao logar! E-mail ou senha incorretos</p>";
//     }
//   }
// }
// }
// }