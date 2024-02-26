<!DOCTYPE html>
<html lang= 'pt-br'>
  <head>
    <meta charset = 'utf-8'>
    <title>Sucata Arte Beer Pub</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="icon" href="../img/favicon.jpg">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="css/styles.css">


    <script src="https://kit.fontawesome.com/2ecf3e5de6.js" crossorigin="anonymous"></script>
  </head>
  <?php
  try{
    $db = new PDO('sqlite:../database.db');
    $itens = $db->query("SELECT * FROM itens"); 
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
    <h1>CARDÁPIO</h1>
  </header>
    <table>
      <thead>
        <tr>
        <th class="tidh">ID</th>
        <th class="tnomeh">Item</th>
        <th class="tprecoh">Preço</th>
        <th class="ttipoh">Tipo</th>
        <th class="tactionsh">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($itens as $item){  
            echo "<tr>
                  <td class=\"tid\">".$item['id']."</td>
                  <td class=\"titem\">".$item['item']."</td>
                  <td class=\"tpreco\">R$ ".number_format($item['preco'], 2)."</td>";
            switch ($item['tipo']) {
              # PORÇÕES
              case "porcao":
                echo "<td class=\"ttipo\">Porção</td>";
                break;
              case "peixe":
                echo "<td class=\"ttipo\">Peixe</td>";
                break;
              case "conserva":
                echo "<td class=\"ttipo\">Porção em Conserva</td>";
                break;
              case "mix":
                echo "<td class=\"ttipo\">Mix Sucata</td>";
                break;

              # LANCHES
              case "lanche":
                echo "<td class=\"ttipo\">Lanche</td>";
                break;
              
              # ESPETO
              case "espeto":
                echo "<td class=\"ttipo\">Espeto</td>";
                break;
              
              # BEBIDAS
              case "cerveja_600":
                echo "<td class=\"ttipo\">Cerveja (600ml)</td>";
                break;

              case "cerveja_ln":
                echo "<td class=\"ttipo\">Cerveja (Long Neck)</td>";
                break;
              
              case "cerveja_lata":
                echo "<td class=\"ttipo\">Cerveja (Lata)</td>";
                break;
              
              case "drink":
                echo "<td class=\"ttipo\">Drink</td>";
                break;
              
              case "drink_fruta":
                echo "<td class=\"ttipo\">Drink de Fruta</td>";
                break;

              case "bebida":
                echo "<td class=\"ttipo\">Bebida Leve</td>";
                break;

              case "refrigerante":
                echo "<td class=\"ttipo\">Refrigerante</td>";
                break;
              
              case "suco_lata":
                echo "<td class=\"ttipo\">Suco em Lata</td>";
                break;
            
              case "suco_natural_copo":
                echo "<td class=\"ttipo\">Suco Natural (Copo)</td>";
                break;

              case "suco_natural_jarra":
                echo "<td class=\"ttipo\">Suco Natural (Jarra)</td>";
                break;
              
              case "vinho":
                echo "<td class=\"ttipo\">Vinho</td>";
                break;

              case "whisky":
                echo "<td class=\"ttipo\">Whisky</td>";
                break;

              case "cachaca_artesanal":
                echo "<td class=\"ttipo\">Cachaça Artesanal</td>";
                break;
              
              case "cachaca_tradicional":
                echo "<td class=\"ttipo\">Cachaça Tradicional</td>";
                break;
            
              case "licor":
                echo "<td class=\"ttipo\">Licor</td>";
                break;

              case "energetico":
                echo "<td class=\"ttipo\">Energético</td>";
                break;

              # CALDOS
              case "caldo":
                echo "<td class=\"ttipo\">Caldo</td>";
                break;

            }
            echo "<td class=\"tactions\">
                    <button><a class=\"tactions\" href='forms/form_editar.php?id={$item['id']}'>Editar</a></button>
                    <button><a class=\"tactions\" href='forms/form_excluir.php?id={$item['id']}'>Excluir</a></button>
                  </td>
                  </tr>";
          };
          ?>  
      </tbody>
    </table>
  </div>
  <br>
  <h2 id="credits">Developed by James</h2>
  <br>
</body>
</html>