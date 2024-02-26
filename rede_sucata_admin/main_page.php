<!DOCTYPE html>
<html lang='pt-br'>

<?php
  try {
    $db = new PDO('sqlite:../database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $res = $db->exec(
      "CREATE TABLE IF NOT EXISTS itens (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        tipo TEXT NOT NULL,
        item TEXT NOT NULL,
        preco REAL NOT NULL
      )"
    );
    
  // Verifica se banco de dados está vazio e captura o erro.
    $db = null;
  } catch (PDOException $ex) {
    echo $ex->getMessage();
  }
?>

  <head>
    <meta charset = 'utf-8'>
    <title>Sucata Arte Beer Pub</title>
    <link rel='stylesheet' href='css/styles.css'>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="icon" href="../img/favicon.jpg">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">


    <script src="https://kit.fontawesome.com/2ecf3e5de6.js" crossorigin="anonymous"></script>
  </head>

  <body>
    <div id="head">
        <img src="../img/logo.png" alt="Logo Sucata">
    </div>
      <nav>
        <ul>
          <li><a href="main_page.php">HOME</a></li>
          <li><a href="listar.php">CARDÁPIO</a></li>
          <li><a href="criar.php">NOVO</a></li>
          <li><a href="editar.php">EDITAR</a></li>
          <li><a href="excluir.php">EXCLUIR</a></li>
        </ul>
      </nav>
    <div id="content">
      <header>
        <h1>Sucata Arte Beer</h1>
        <p>Seja bem vindo à Rede Sucata!<br><br>
          Esta é a área de administradores, onde é possível adicionar novos itens ao cardápio,<br>ou até mesmo, alterá-los ou excluí-los. Podemos dar início acessando o <a href="listar.php">cardápio</a> interno.</p>
      </header>
    <br>
    <h2 id="credits">Developed by James</h2>
    <br>
  </body>
</html>
