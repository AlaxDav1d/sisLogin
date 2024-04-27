<?php
    $host = 'localhost';
    $user = 'root';
    $senha = '';
    $bd = 'login';
    
    $mysqli = new mysqli($host,$user,$senha,$bd);
    if($mysqli->connect_errno){
          error_log('Erro ao conectar ao banco de dados' . $mysqli->connect_error);
    }

    if(isset($_POST['email']) || isset($_POST['senha'])){
          if(strlen($_POST['email']) == 0){
               echo 'Campo Email Vazio';
          }else if(strlen($_POST['senha']) == 0){
               echo 'Campo de Senha Vazio';
          }else{
               $email = $mysqli->real_escape_string($_POST['email']);
               $senha = $mysqli->real_escape_string($_POST['senha']);

               $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
               $sql_query = $mysqli->query($sql_code) or die('Erro ao Executar a Query SQL' . $mysqli->error);
               $linhas = $sql_query->num_rows;
               
               $valoresUser = $sql_query->fetch_assoc();

               //Iniciando SESSION se ela não existir
               if($linhas >= 1){
                    if(!isset($_SESSION)){
                         session_start();
                    }
                    //Adicionando valor a SESSION
                    $_SESSION['id'] = $valoresUser['id'];
                    $_SESSION['email'] = $valoresUser['email'];
                    header('Location: principal.php');
     
               }else{
                    echo 'Email ou senha incorretos';
               }
          };
    }else{
         echo 'Todos Campos Vazios';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Sistema de Login</title>
</head>
<body>
     <h1>Realize Seu Login Aqui</h1>
     <form action="" method="post">
          <label>Email</label>
          <input type="text" name="email">
          
          <label>Senha</label>
          <input type="password" name="senha" >
          <input type="submit" value="Logar">
     </form>
</body>
</html>