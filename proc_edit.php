<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); // recebe as variáveis e filtra-as
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
$localidade = filter_input(INPUT_POST, 'localidade', FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
  



    $result_pokemons = "UPDATE pokemons SET nome = '$nome', tipo = '$tipo', numero = '$numero', localidade = '$localidade', modificado = NOW() WHERE id = '$id'";
    // RESULT POKKEMONS atualiza os dados dentro do banco de dados, para uma tabela com ID específico, com as variáveis recebidas pelo FILTER SANITIZE.
    $resultado_pokemon = mysqli_query($conn, $result_pokemons); // consulta a tabela

    if(mysqli_affected_rows($conn)) { // se alguma variável foi alterada, imprime a mensagem de sucesso
        $_SESSION['msg'] = "<p style ='color: green'>Pokémon alterado com sucesso!</p>";
        header('location: listar.php');
        }
        else{
        header('location: editar.php?id=$id');
        $_SESSION['msg'] = "<p style ='color: red'>Falha na edição do pokémon.</p>";
        }
    
    ?>
</body>
</html>
