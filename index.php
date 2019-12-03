<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body{
     text-align: center;
     }
    </style>
    <title>Pokédex</title>
</head>
<body>
    <h1>POKEDEX</h1>
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <br/>
    <br/>
    
        <form action = "pokedex.php" method = "POST">
            <b>
                Nome do pokemon :<br/> <input type = "text" placeholder = "Nome completo do Pokemon" name = "nome"/><br/><br/>
                Tipo(s) :<br/> <input type = "text" placeholder = "Tipo principal e/ou secundário" name = "tipo"/><br/><br/>
                Número:<br/><input type = "text" placeholder = "Número na pokedex" name = "numero"/><br/><br/>
                Local:<br/><input type = "text" placeholder = "Local de captura" name = "local"/><br/><br/>
                <input type = "submit" name = "registrar"/><br/>
            </b>
        </form>
        <?php
        echo "<a href = 'index.php'>Registrar pokemon</a>"."<br/>";
        echo "<a href = 'listar.php'>Lista </a><br/><br/>";
        ?>
</body>
</html>
