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
    <script type = "text/javascript">
        function validar(){
            let nome = formpokemon.nome.value; //Tem acesso aos dados do formulário pelo nome na tabela
            let tipo = formpokemon.tipo.value;
            let numero = formpokemon.numero.value;
            numero = parseFloat(numero);
            let local = formpokemon.local.value;  
            if(nome == ""){
                alert("Preencha o campo nome");
                formpokemon.nome.focus();
                return false;
        }
            if(tipo == ""){
                alert("Preencha o campo tipo");
                formpokemon.tipo.focus();
                return false; 
        }
            if(numero == "" || numero == NaN){
                alert("Preencha o campo número.");
                formpokemon.numero.focus();
                return false;
        }
            if(local == ""){
                alert("Preencha o campo local.");
                formpokemon.local.focus();
                return false;
        }
            }
    </script>
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
        <form name = "formpokemon" action = "pokedex.php" method = "POST">
        <!--O formulário e os campos precisam ter um name para editá-los no javascript-->
            <b>
                Nome do pokemon :<br/> <input type = "text" placeholder = "Nome completo do Pokemon" name = "nome" /><br/><br/>
                Tipo(s) :<br/> <input type = "text" placeholder = "Tipo principal e/ou secundário" name = "tipo" /><br/><br/>
                Número:<br/><input type = "number" placeholder = "Número na pokedex" name = "numero" /><br/><br/>
                Local:<br/><input type = "text" placeholder = "Local de captura" name = "local" /><br/><br/>
                <input type = "submit" onclick= "return validar()"/><br/> 
                <!--O comando onclick registra o clique e retorna o resultado da função validar-->

            </b>
        </form>
        <?php
        echo "<a href = 'index.php'>Registrar pokemon</a>"."<br/>";
        echo "<a href = 'listar.php'>Lista </a><br/><br/>";
        ?>
</body>
</html>
