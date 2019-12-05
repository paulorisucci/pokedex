<?php
session_start();
include_once("conexao.php");
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
    $result_pokemons = "SELECT * FROM pokemons";
    // selecionou todas as tabelas
    $resultado_pokemons = mysqli_query($conn, $result_pokemons);
    while($row_pokemon = mysqli_fetch_assoc($resultado_pokemons))
    // mysqli_fetch_assoc retorna uma matriz associativa com os dados de todas as tabelas do banco 
    {

        echo "Nome do Pokémon: ".$row_pokemon['nome']."<br/>";
        echo "Tipo:  ".$row_pokemon['tipo']."<br/>";
        echo "Número na pokédex: ".$row_pokemon['numero']. "<br/>";
        echo "Local de captura: ".$row_pokemon['localidade']. "<br/>";
        echo "<a href = 'editar.php?id=".$row_pokemon['id']. "'>Editar</a><br/>";
        echo "<a href = 'proc_apagar.php?id=".$row_pokemon['id']."'>Apagar</a><br/><hr> ";
    }
    echo "<a href = index.php>Registrar pokemon</a>"."<br/>";
        echo "<a href = 'listar.php'>Lista </a><br/><br/>";
    ?>
    <br/>
    <br/>
</body>
</html>
