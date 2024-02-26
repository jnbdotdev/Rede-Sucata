<!DOCTYPE html>
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
    if(isset($_POST['enviar'])){
      $item = $_POST['item'];
      $tipo = $_POST['comboBox'];
      $preco = $_POST['preco'];

      $stmt = $db->prepare("INSERT INTO itens(item, tipo, preco) VALUES(:item, :tipo, :preco)");
      $stmt->bindValue(':item', $item);
      $stmt->bindValue(':tipo', $tipo);
      $stmt->bindValue(':preco', $preco);    
      $stmt->execute();
    }

  }catch(PDOException $ex){
    echo $ex->getMessage();
  }
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
      <h1>Novo Produto</h1>
    </header>
    <div class="formulario">
      <form method='post' action='criar.php'>
        <div class="form">
          <div class="campfield">
            <h3><label for='item'>Item:</label></h3>
            <input type='text' name='item' id='item' required>
          </div>
          
          <div class="campfield">
            <h3><label for='preco'>Preço (R$):</label></h3>
            <input type='number' step='0.01' name='preco' id='preco' required>
          </div>

          <div class="campfield">
            <h3><label for='tipo'>Tipo:</label></h3>
            <br>
            <select name="comboBox" class="comboBox">
            <?php 
              $types = ['porcao', 'peixe', 'conserva', 'mix', 'lanche', 'espeto', 'cerveja_600', 'cerveja_ln', 'cerveja_lata', 'drink', 'drink_fruta', 'bebida', 'refrigerante', 'suco_lata', 'suco_natural_copo', 'suco_natural_jarra', 'vinho', 'whisky', 'cachaca_artesanal', 'cachaca_tradicional', 'licor', 'energetico', 'caldo',];
              foreach ($types as $type) {
                switch ($type) {
                  # PORÇÕES
                  case "porcao":
                    echo "<option value='".$type."' class=\"optipo\">Porção</option>";
                    break;
                  case "peixe":
                    echo "<option value='".$type."' class=\"optipo\">Peixe</option>";
                    break;
                  case "conserva":
                    echo "<option value='".$type."' class=\"optipo\">Porção em Conserva</option>";
                    break;
                  case "mix":
                    echo "<option value='".$type."' class=\"optipo\">Mix Sucata</option>";
                    break;
    
                  # LANCHES
                  case "lanche":
                    echo "<option value='".$type."' class=\"optipo\">Lanche</option>";
                    break;
                  
                  # ESPETO
                  case "espeto":
                    echo "<option value='".$type."' class=\"optipo\">Espeto</option>";
                    break;
                  
                  # BEBIDAS
                  case "cerveja_600":
                    echo "<option value='".$type."' class=\"optipo\">Cerveja (600ml)</option>";
                    break;
    
                  case "cerveja_ln":
                    echo "<option value='".$type."' class=\"optipo\">Cerveja (Long Neck)</option>";
                    break;
                  
                  case "cerveja_lata":
                    echo "<option value='".$type."' class=\"optipo\">Cerveja (Lata)</option>";
                    break;
                  
                  case "drink":
                    echo "<option value='".$type."' class=\"optipo\">Drink</option>";
                    break;
                  
                  case "drink_fruta":
                    echo "<option value='".$type."' class=\"optipo\">Drink de Fruta</option>";
                    break;
    
                  case "bebida":
                    echo "<option value='".$type."' class=\"optipo\">Bebida Leve</option>";
                    break;
    
                  case "refrigerante":
                    echo "<option value='".$type."' class=\"optipo\">Refrigerante</option>";
                    break;
                  
                  case "suco_lata":
                    echo "<option value='".$type."' class=\"optipo\">Suco em Lata</option>";
                    break;
                
                  case "suco_natural_copo":
                    echo "<option value='".$type."' class=\"optipo\">Suco Natural (Copo)</option>";
                    break;
    
                  case "suco_natural_jarra":
                    echo "<option value='".$type."' class=\"optipo\">Suco Natural (Jarra)</option>";
                    break;
                  
                  case "vinho":
                    echo "<option value='".$type."' class=\"optipo\">Vinho</option>";
                    break;
    
                  case "whisky":
                    echo "<option value='".$type."' class=\"optipo\">Whisky</option>";
                    break;
    
                  case "cachaca_artesanal":
                    echo "<option value='".$type."' class=\"optipo\">Cachaça Artesanal</option>";
                    break;
                  
                  case "cachaca_tradicional":
                    echo "<option value='".$type."' class=\"optipo\">Cachaça Tradicional</option>";
                    break;
                
                  case "licor":
                    echo "<option value='".$type."' class=\"optipo\">Licor</option>";
                    break;
    
                  case "energetico":
                    echo "<option value='".$type."' class=\"optipo\">Energético</option>";
                    break;
    
                  # CALDOS
                  case "caldo":
                    echo "<option value='".$type."' class=\"optipo\">Caldo</option>";
                    break;
    
                }
              }
            ?>
            </select>
          </div>
    
          <input type='submit' name='enviar' value='Enviar'>
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