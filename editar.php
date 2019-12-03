<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_pokemon = "SELECT * FROM pokemons WHERE id = '$id'"; // seleciona uma tabela para editar
$resultado_pokemon = mysqli_query($conn, $result_pokemon ); // executa uma consulta no banco de dados
$row_usuario = mysqli_fetch_assoc($resultado_pokemon); // Lê os dados da tabela com o resultado do query
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
    
        <form action = "proc_edit.php" method = "POST">
            <b>
            <input type = "hidden" value = "<?php echo $row_usuario['id']; ?>" name = "id"/>
                Nome do pokemon :<br/> <input type = "text" placeholder = "Novo nome" value = "<?php echo $row_usuario['nome']; ?>" name = "nome"/><br/><br/>
                Tipo(s) :<br/> <input type = "text" placeholder = "Tipo principal e/ou secundário "value = "<?php echo $row_usuario['tipo']; ?>"  name = "tipo"/><br/><br/>
                Número:<br/><input type = "text" placeholder = "Novo número" value = "<?php echo $row_usuario['numero']; ?>"  name = "numero"/><br/><br/>
                Local:<br/><input type = "text" placeholder = "Local de captura" value = "<?php echo $row_usuario['localidade']; ?>"  name = "localidade"/><br/><br/>
                <input type = "submit" value = "Editar"/><br/>
            </b>
        </form>
        <?php
        echo "<a href = 'index.php'>Registrar pokemon</a>"."<br/>";
        echo "<a href = 'listar.php'>Lista </a><br/><br/>";
        ?>
</body>
</html>
