<?php
  if(!isset($_SESSION)){
     session_start();
  }   
  if(!isset($_SESSION['id'])){
     die("Você não pode acessar essa pagina <a href=\"index.php\">Realize o Login aqui</a>");
  }
?>