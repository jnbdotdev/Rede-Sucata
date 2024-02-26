<?php $id = 1; ?>

<!DOCTYPE html>
<html lang= 'pt-br'>
  <head>
    <meta charset = 'utf-8'>
    <title>Sucata Arte Beer Pub</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="icon" href="../../img/favicon.jpg">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../css/styles.css">


    <script src="https://kit.fontawesome.com/2ecf3e5de6.js" crossorigin="anonymous"></script>
</head>

  <?php
    try{
      $db = new PDO('sqlite:../../database.db');    
      if(isset($_POST['editar'])){
        $id = $_POST['id'];
        $item_name = $_POST['item'];
        $preco = $_POST['preco'];
        $tipo = $_POST['comboBox'];

        $sql = "UPDATE itens SET item = '$item_name', preco = '$preco', tipo = '$tipo' WHERE id = '$id'";
        $db->exec($sql); 
      };
    }catch(PDOException $msg){
      echo $msg->getMessage();
    }
    $db = null;
  ?>

  <?php
  try{
    $db = new PDO('sqlite:../../database.db');
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $itens = $db->query("SELECT * FROM itens");
      foreach($itens as $item) {
        if($item['id'] == $id){
          $item_name = $item['item'];
          $tipo = $item['tipo'];
          $preco = $item['preco'];
        }
      };
    }else{
      $id = null;
      $item = null;
      $preco = null;
      $tipo = null;
    }
    
  }catch(PDOException $ex){
    echo $ex->getMessage();
  }
    $db = null;
  ?>

<body>
  <div id="head">
      <img src="../../img/logo.png" alt="Logo Sucata">
  </div>
  <nav>
    <ul>
      <li><a href="../main_page.php">HOME</a></li>
      <li><a href="../listar.php">CARDÁPIO</a></li>
      <li><a href="../criar.php">NOVO</a></li>
      <li><a href="../editar.php">EDITAR</a></li>
      <li><a href="../excluir.php">EXCLUIR</a></li>
    </ul>
  </nav>
  <div class="content">
    <header>
      <h1>Alterar Produto</h1>
    </header>
    <div class="formulario">
      <form method='post' action="form_editar.php">
        <div class="form">
          <div class="campfield">
            <h3><label for='id'>ID:</label></h3>
            <input type='number' min='1' name='id' id='id' value="<?php echo $id ?>" readonly>
          </div>

          <div class="campfield">
            <h3><label for='item'>Item:</label></h3>
            <input type='text' name='item' id='item' value="<?php echo $item_name ?>" required>
          </div>

          <div class="campfield">
            <h3><label for='preco'>Preço (R$):</label></h3>
            <input type='number' step='0.01' name='preco' id='preco' value="<?php echo number_format($preco, 2) ?>" required>
          </div>

          <div class="campfield">
            <h3><label for='tipo'>Tipo:</label></h3>
            <select name="comboBox" class="comboBox">
            <?php 
              $types = ['porcao', 'peixe', 'conserva', 'mix', 'lanche', 'espeto', 'cerveja_600', 'cerveja_ln', 'cerveja_lata', 'drink', 'drink_fruta', 'bebida', 'refrigerante', 'suco_lata', 'suco_natural_copo', 'suco_natural_jarra', 'vinho', 'whisky', 'cachaca_artesanal', 'cachaca_tradicional', 'licor', 'energetico', 'caldo',];
              foreach ($types as $type) {
                switch ($type) {
                  # PORÇÕES
                  case "porcao":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Porção</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Porção</option>";
                      break;
                    }
                  case "peixe":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Peixe</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Peixe</option>";
                      break;
                    }
                  case "conserva":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Porção em Conserva</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Porção em Conserva</option>";
                      break;
                    }
                  case "mix":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Mix Sucata</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Mix Sucata</option>";
                      break;
                    }
    
                  # LANCHES
                  case "lanche":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Lanche</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Lanche</option>";
                      break;
                    }
                  
                  # ESPETO
                  case "espeto":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Espeto</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Espeto</option>";
                      break;
                    }
                  
                  # BEBIDAS
                  case "cerveja_600":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Cerveja (600ml)</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Cerveja (600ml)</option>";
                      break;
                    }
    
                  case "cerveja_ln":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Cerveja (Long Neck)</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Cerveja (Long Neck)</option>";
                      break;
                    }
                  
                  case "cerveja_lata":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Cerveja (Lata)</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Cerveja (Lata)</option>";
                      break;
                    }
                  
                  case "drink":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Drink</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Drink</option>";
                      break;
                    }
                  
                  case "drink_fruta":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Drink de Fruta</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Drink de Fruta</option>";
                      break;
                    }
    
                  case "bebida":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Bebida</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Bebida</option>";
                      break;
                    }
    
                  case "refrigerante":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Refrigerante</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Refrigerante</option>";
                      break;
                    }
                  
                  case "suco_lata":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Suco em Lata</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Suco em Lata</option>";
                      break;
                    }
                
                  case "suco_natural_copo":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Suco Natural (Copo)</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Suco Natural (Copo)</option>";
                      break;
                    }
    
                  case "suco_natural_jarra":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Suco Natural (Jarra)</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Suco Natural (Jarra)</option>";
                      break;
                    }
                  
                  case "vinho":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Vinho</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Vinho</option>";
                      break;
                    }
    
                  case "whisky":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Whisky</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Whisky</option>";
                      break;
                    }
    
                  case "cachaca_artesanal":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Cachaça Artesanal</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Cachaça Artesanal</option>";
                      break;
                    }
                  
                  case "cachaca_tradicional":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Cachaça Artesanal</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Cachaça Artesanal</option>";
                      break;
                    }
                
                  case "licor":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Licor</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Licor</option>";
                      break;
                    }
    
                  case "energetico":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Energético</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Energético</option>";
                      break;
                    }
    
                  # CALDOS
                  case "caldo":
                    if ($type == $tipo) {
                      echo "<option value='".$type."' selected=\"selected\" class=\"optipo\">Caldo</option>";
                      break;
                    }else{
                      echo "<option value='".$type."' class=\"optipo\">Caldo</option>";
                      break;
                    }
                }
              }
            ?>
            </select>
          </div>

          <a id="submitref"><input type='submit' id="submitinput" name='editar' value='Editar'/></a>
          <a id="submitref" href="../listar.php"><input type='button' id="submitinput" name='voltar' value='Voltar'/></a>
        </div>
      </form>
    </div>
  <br>
  <h2 id="credits">Developed by James</h2>
  <br>
</div>
</body>
</html>