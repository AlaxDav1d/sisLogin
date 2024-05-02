//so testando uma coisa no github

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
     .tudo{
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          height: 100vh;
          width: 100vh;
          background-image: linear-gradient(to left bottom,aquamarine,rgb(53, 107, 89));
     }
     form{
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: column;
          border: 1px solid;
          height: 50vh;
          width: 50vh;
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
</style>
<body>
     <div class="tudo">
          <h1>Realize Seu Login Aqui</h1>
     <form action="" method="post">
          <label>Email</label>
          <input type="text" name="email">
          
          <label>Senha</label>
          <input type="password" name="senha" >
          <input type="submit" value="Logar">
     </form>
     </div>
</body>
</html>
