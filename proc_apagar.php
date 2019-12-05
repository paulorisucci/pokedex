<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//Recebe o ID do pokémon clicado pelo método GET
$result_pokemon = "DELETE FROM pokemons WHERE id = '$id'";
//Deleta toda a tabela com o ID correspondente
$resultado_pokemon = mysqli_query($conn, $result_pokemon);
//Executa a consulta na tabela após os dados serem apagados
if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style ='color: green'>Pokémon apagado com sucesso!</p>";
    header('location: listar.php');
}
else{
    header('location: editar.php?id=$id');
    $_SESSION['msg'] = "<p style ='color: red'>O Pokémon não foi apagado.</p>";
    }
?>
