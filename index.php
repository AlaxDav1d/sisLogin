<?php
     include('login.php');
     //ADICIONANDO VALORES AS VARIAVEIS;
     $emailCad = $mysqli->real_escape_string($_POST['emailCad']);
     $senhaCad = $mysqli->real_escape_string($_POST['senhaCad']);
     $senhaCrip = password_hash($senhaCad,PASSWORD_DEFAULT);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Sistema de Login</title>
</head>
<style>
     *{
          padding: 0;
          margin: 0;
          box-sizing: border-box;
     }
     body{
          background-image: linear-gradient(to left bottom,aquamarine,rgb(53, 107, 89));
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          height: 100vh;
     }

     .some{
          transform: scale(0%);
          transition: 400ms;
     }
     .aparece{
          transform: scale(100%);
          transition: 600ms;
     }
     .surprise{
          transition: 1s;
          font-size: 3vh;
          text-shadow: 2px 2px 10px yellow;
     }
     form{
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          border: 1px solid;
          height:300px;
          width: 500px;
          padding: 1%;
     }
     label{
          color: white;
          text-shadow: 1px 1px 1px black;
          margin: 2%;
          font-size: 130%;
     }
     input{
          padding: 2%;
          width: 70%;
          border-radius: 10px;
          border:3px solid aquamarine;
          transition: 600ms;
     }
     input:focus{
          outline: none;
          width: 60%;
          background-color: black;
          color: #fff;
     }
     input[type='submit']{
          margin: 5%;
          width: 50%;
          border: 3px solid aquamarine;
     }
     h1{
          text-shadow: 1px 1px 1px black;
          color: white;
     }
     h2{
          color: blue;
          text-decoration: underline;
          cursor: pointer;
          font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
          font-size: 120%;
          transition: 500ms;
          margin: 2% 0;
          position: relative;
          top: 10px;
     }
     h2:hover{
          color: red;
     }
     h3{
          color: red;
          font-size: larger;
          margin: 1% 0;
     }
     #formCima{
          height:300px;
          width: 500px;
          position: relative;
          top: 10px;
          transition: 500ms;

     }
     #formCima input[type='submit']{
          cursor: pointer;
          
          transition: 600ms;
     }
     #formCima input[type='submit']:hover{
          width: 30%;
          background-color: black;
          color: #fff;
     }
     #formCima input[type='submit']:focus{
          outline: none;
          width: 30%;
     }
</style>
<body>
          <form action="" method="post" id="formCima">
               <h1>Cadastrar Usuario</h1>
               <label for="Email">Email</label>
               <input type="text" name="emailCad">
               <label for="Senha">Senha</label>
               <input type="text" name="senhaCad">
               <input type="submit" value="Cadastrar">
          </form>
          <?php 
               if(strlen($emailCad) == 0 || strlen($senhaCad) == 0){
                    ?>
                    <h3>existem campos vazios</h3>
                    <?php
               }else{
                    $sql_linha = "SELECT * from usuarios WHERE email = '$emailCad' ";
                    $sql_query = $mysqli->query($sql_linha) or die('Erro Ao Executar' . $mysqli->error);
                    $linhas = $sql_query->num_rows;
                    if($linhas > 0){?>

                         <h3 class='surprise'>Esse Email ja esta em uso</h3>
                         <?php
                    }else{
                    $sql_code = "INSERT INTO usuarios (email,senha) VALUES ('$emailCad','$senhaCrip')";
                    $sql_query = $mysqli->query($sql_code) or die ('Erro ao executar' . $mysqli->error);
                    ?>
                    <h3 class='surprise'>Usuario Criado com sucesso</h3>
                    <?php           
                    }
     
               }
          ?>
          <h2 onclick="muda()" id='h2'>Ja tenho login</h2>
          <div id="login" class="some">
               <form action="" method="post">
                    <label>Email</label>
                    <input type="text" name="email">
                    <label>Senha</label>
                    <input type="password" name="senha" >
                    <input type="submit" value="Logar">
               </form>
          </div>
</body>
<script>
     const divLogin =document.getElementById('login') ;
     const form = document.getElementById('formCima');
     const h2 = document.getElementById('h2');
     function muda(){     
          if(divLogin.classList.contains('some')){
               divLogin.classList.remove('some');
               divLogin.classList.add('aparece');
               h2.style.top = '0px'
               h2.style.position = 'relative';
               form.style.position = 'relative';
               form.style.top = '0px';
          }else{
               divLogin.classList.add('some');
               divLogin.classList.remove('aparece');
               form.style.top = '10px';
               h2.style.top = '10px';
          }
}

</script>
</html>