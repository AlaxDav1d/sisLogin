<?php
    include('protect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
     <h1>Pagina Principal</h1>
     <p>Bem vindo <?php echo $_SESSION['email']?></p>
     <a href="logout.php">Sair </a>
</body>
</html>