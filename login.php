<?php
     include('conexao.php');  
     

     if(strlen($_POST['email']) !=0 || strlen($_POST['senha']) !=0 ){
          if(strlen($_POST['email']) == 0){
               echo 'o Campo de Email não pode ficar vazio';
          }else if(strlen($_POST['senha']) == 0){
               echo 'o Campo de Senha não pode ficar vazio';
          }else{
               $email = $mysqli->real_escape_string($_POST['email']);
               $senha = $mysqli->real_escape_string($_POST['senha']);
               $sql_code = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
               $sql_query = $mysqli->query($sql_code) or die('Erro ao Executar a Query SQL' . $mysqli->error);
               $valoresUser = $sql_query->fetch_assoc();
               if(password_verify($senha,$valoresUser['senha'])){
                    if(!isset($_SESSION)){
                         session_start();
                    }
                     //Adicionando valor a SESSION
                    $_SESSION['id'] = $valoresUser['id'];
                    $_SESSION['email'] = $valoresUser['email'];
                    header('Location: principal.php');
               }
           //Iniciando SESSION se ela não existir
              
          };
    }else{
         echo 'Todos os campos estão vazios';
    }
?>