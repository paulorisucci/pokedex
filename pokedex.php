<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<a href = 'listar.php'>Lista </a>";
    echo "<a href = index.php>Registrar</a>";
    include_once("conexao.php");
    $conexao =  mysqli_connect("localhost", "root", "", "pokemon");


    $nome = $_POST["nome"];
    $tipo = $_POST["tipo"];
    $numero = $_POST["numero"];
    $local = $_POST["local"];


    $result_pokemons = "INSERT INTO pokemons(nome, tipo, numero, localidade, capturado) VALUES('$nome', '$tipo', '$numero', '$local', NOW())";
    $resultado_pokemon = mysqli_query($conn, $result_pokemons);

    if(mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style ='color: green'>Pokémon registrado com sucesso!</p>";
    header('location: index.php');
    }
    else{
    header('location: index.php');
    $_SESSION['msg'] = "<p style ='color: red'>Falha no registro do pokémon.</p>";
    }
   
    ?>
</body>
</html>
