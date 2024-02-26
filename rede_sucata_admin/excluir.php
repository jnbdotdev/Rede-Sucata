<!DOCTYPE htm>
<html lang='pt-br'>
  <head>
    <meta charset = 'utf-8'>
    <title>Sucata Arte Beer Pub</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="icon" href="../img/favicon.jpg">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="css/styles.css">


    <script src="https://kit.fontawesome.com/2ecf3e5de6.js" crossorigin="anonymous"></script>
  </head>
  <?php

    try{
      $db = new PDO('sqlite:../database.db');
    }catch(PDOException $ex){
      echo $ex->getMessage();
    }

    if(isset($_POST['excluir'])){
      $id = $_POST['id'];
      
      $sql = "DELETE FROM itens WHERE id = '$id'";
      $db->query($sql);
    
    };
    $db = null;                                
  ?>
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
  <div class="content">
    <header>
      <h1>Excluir Produto</h1>
    </header>
    <div class="formulario">
      <form method='post' action='excluir.php'>
        <div class="form">
          <div class="campfield">
            <h3><label for='id'>ID:</label></h3>
            <input type='number' min='1' name='id' id='id' required>
          </div>
          <input type='submit' name='excluir' value="Excluir">
          <a id="submitref" href="main_page.php"><input type='button' id="submitinput" name='voltar' value='Voltar'></a>
        </div>
      </form>
    </div>
    <br>
    <h2 id="credits">Developed by James</h2>
    <br>
  </div>
</body>
</html>