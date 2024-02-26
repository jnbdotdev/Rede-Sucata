<!DOCTYPE html>
<html lang="pt-br">

<?php
    try {
    $db = new PDO('sqlite:database.db');
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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cardápio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="img/favicon.jpg">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"> 


        <link href="https://fonts.googleapis.com/css2?family=Signika:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/styles.css">


        <script src="https://kit.fontawesome.com/2ecf3e5de6.js" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>

    </head>

    <body>
        <div id="head">
            <a href="rede_sucata_admin/main_page.php" target="_blank"><img src="img/logo.png" alt="Logo Sucata"></a>
        </div>
        <nav>
            <ul>
                <li><a href="#porcoes">PORÇÕES</a></li>
                <li><a href="#lanches">LANCHES</a></li>
                <li><a href="#espetos">ESPETOS</a></li>
                <li><a href="#bebidas">BEBIDAS</a></li>
                <li><a href="#caldos">CALDOS</a></li>
            </ul>
        </nav>
        <header id="inicio">
            <h1>CARDÁPIO</h1>
            <p>
                O cardápio conta com uma enorme variedade de itens, os quais incluem porções, acompanhamentos, petiscos, bebidas, entre outros. Também é possível personalizar seu pedido ao solicitar para um de nossos garçons.
            </p>
        </header>

<!--
        SESSÕES
--> 

        <section id="porcoes">
            <h2>PORÇÕES</h2>


            <h3>GRANDES PORÇÕES</h3>
            <div class="division">...</div>
            <div>
                <?php
                # GRANDES PORÇÕES
                try{
                    $db = new PDO('sqlite:database.db');
                    $itens = $db->query("SELECT * FROM itens WHERE tipo = 'porcao'");
                }catch(PDOException $ex){
                    echo $ex->getMessage();
                }
                $db = new PDO('sqlite:database.db');
                
                $query = "SELECT count(*) FROM itens WHERE tipo = 'porcao';";
                $result = $db->query($query);
                $numRows = $result->fetch(PDO::FETCH_ASSOC);

                $count = $numRows["count(*)"];

                if ($numRows > 0) {
                    foreach ($itens as $item) {
                        echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                        $count -= 1;
                        if ($count > 0) {
                            echo "<hr>";
                        }else{
                            echo "<div class=\"division\">.</div>";
                        }
                    }
                }else{
                    echo "<p class='alertasql'>Não há itens no cardápio</p>";
                }

                ?>
            </div>

            <h3>PEIXES</h3>
            <div class="division">...</div>
            <div>  
                <?php

                    # PEIXES
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'peixe'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'peixe';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>

            <h3>PORÇÕES EM CONSERVA</h3>
            <div class="division">...</div>
            <div>
                <?php
                    # CONSERVA
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'conserva'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'conserva';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>

            <h3>MIX SUCATA</h3>
            <div class="division">...</div>
            <div>
                <?php
                    # MIX SUCATA
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'mix'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'mix';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>
        </section>

        <section id="lanches">
            <h2>LANCHES</h2>

            <div class="division">...</div>    
            <div>
                <?php
                    # LANCHES
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'lanche'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'lanche';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>
        </section>

        <section id="espetos">
            <h2>ESPETOS</h2>

            <div class="division">...</div>
            <div>
                <?php 
                    # ESPETOS
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'espeto'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'espeto';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>
        </section>

        <section id="bebidas">
            <h2>BEBIDAS</h2>
            
            <h3>CERVEJAS (600ml)</h3>
            <div class="division">...</div>
            <div>
                <?php 
                    # CERVEJAS (600ml)
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'cerveja_600'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'cerveja_600';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>

            <h3>CERVEJAS (LONG NECK)</h3>
            <div class="division">...</div>
            <div>
                <?php
                    # CERVEJAS (Long Leck)
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'cerveja_ln'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'cerveja_ln';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>

            <h3>CERVEJAS (LATA)</h3>
            <div class="division">...</div>
            <div>
                <?php
                    # CERVEJAS (Lata)
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'cerveja_lata'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'cerveja_lata';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>

            <h3>DRINKS</h3>
            <div class="division">...</div>
            <div>
                <?php
                    # DRINKS
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'drink'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'drink';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>

            <h3>DRINKS DE FRUTA</h3>
            <div class="division">...</div>
            <div>
                <?php
                    # DRINKS DE FRUTA
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'drink_fruta'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'drink_fruta';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>

            <h3>BEBIDAS LEVES</h3>
            <div class="division">...</div>
            <div>
                <?php
                    # BEBIDAS LEVES
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'bebida'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'bebida';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>
            
            <h3>REFRIGERANTES</h3>
            <div class="division">...</div>
            <div>
                <?php
                    # REFRIGERANTES
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'refrigerante'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'refrigerante';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>

            <h3>SUCO EM LATA</h3>
            <div class="division">...</div>
            <div>
                <?php
                    # SUCO EM LATA
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'suco_lata'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'suco_lata';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>

            <h3>SUCO NATURAL (COPO)</h3>
            <div class="division">...</div>
            <div>
                <?php
                    # SUCO NATURAL (COPO)
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'suco_natural_copo'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'suco_natural_copo';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>

            <h3>SUCO NATURAL (JARRA)</h3>
            <div class="division">...</div>
            <div>
                <?php 
                    # SUCO NATURAL (JARRA)
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'suco_natural_jarra'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'suco_natural_jarra';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>

            <h3>VINHOS</h3>
            <div class="division">...</div>
            <div>
                <?php
                    # VINHOS
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'vinho'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'vinho';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
                <h4 class="itens"><?php echo "\u{25BA}"?> Garrafa de Vinho</h4><h4 class="preco">Consultar a casa</h4>
                <div class="division">.</div>
            </div>
            
            <h3>WHISKY</h3>
            <div class="division">...</div>
            <div>
                <?php
                    # WHISKY
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'whisky'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'whisky';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>
            
            <h3>CACHAÇAS ARTESANAIS</h3>
            <div class="division">...</div>
            <div>
                <?php
                # CACHAÇAS ARTESANAIS
                try{
                    $db = new PDO('sqlite:database.db');
                    $itens = $db->query("SELECT * FROM itens WHERE tipo = 'cachaca_artesanal'"); 
                }catch(PDOException $ex){
                    echo $ex->getMessage();
                }
                $db = new PDO('sqlite:database.db');
                
                $query = "SELECT count(*) FROM itens WHERE tipo = 'cachaca_artesanal';";
                $result = $db->query($query);
                $numRows = $result->fetch(PDO::FETCH_ASSOC);

                $count = $numRows["count(*)"];

                if ($numRows > 0) {
                    foreach ($itens as $item) {
                        echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                        $count -= 1;
                        if ($count > 0) {
                            echo "<hr>";
                        }else{
                            echo "<div class=\"division\">.</div>";
                        }
                    }
                }else{
                    echo "<p class='alertasql'>Não há itens no cardápio</p>";
                }
                ?>
            </div>

            <h3>CACHAÇAS TRADICIONAIS</h3>
            <div class="division">...</div>
            <div>
                <?php
                    # CACHAÇAS TRADICIONAIS
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'cachaca_tradicional'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'cachaca_tradicional';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>

            <h3>LICOR</h3>
            <div class="division">...</div>
            <div>
                <?php
                    # LICOR
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'licor'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'licor';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>

            <h3>ENERGÉTICOS</h3>
            <div class="division">...</div>
            <div>
                <?php
                    # ENERGÉTICOS
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'energetico'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'energetico';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>
        </section>

        <section id="caldos">
            <h2>CALDOS</h2>    
            <div class="division">...</div>
            <div>
                <?php
                    # CALDOS
                    try{
                        $db = new PDO('sqlite:database.db');
                        $itens = $db->query("SELECT * FROM itens WHERE tipo = 'caldo'"); 
                    }catch(PDOException $ex){
                        echo $ex->getMessage();
                    }
                    $db = new PDO('sqlite:database.db');
                    
                    $query = "SELECT count(*) FROM itens WHERE tipo = 'caldo';";
                    $result = $db->query($query);
                    $numRows = $result->fetch(PDO::FETCH_ASSOC);

                    $count = $numRows["count(*)"];

                    if ($numRows > 0) {
                        foreach ($itens as $item) {
                            echo "<h4 class=\"itens\">\u{25BA} ".$item['item']."</h4><h4 class=\"preco\">R$ ".number_format($item['preco'], 2)."</h4>";
                            $count -= 1;
                            if ($count > 0) {
                                echo "<hr>";
                            }else{
                                echo "<div class=\"division\">.</div>";
                            }
                        }
                    }else{
                        echo "<p class='alertasql'>Não há itens no cardápio</p>";
                    }
                ?>
            </div>
        </section>
        
        <a href="#" class="float" id="floatButton">
            <i class="fa-sharp fa-solid fa-chevron-up my-float"></i>
        </a>

        <br>
        <h5 id="credits">Developed by James</h5>
        <br>
    </body>
</html>
