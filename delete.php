<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete produtos</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h2>excluir produtos</h2>
    <hr>
    <form method="post">>
        Codigo: <input type="text" name="codigo">
        <input type="submit" value="excluir">
    </form>
    <a href="index.php">create |</a>
        <a href="read.php">read |</a>
        <a href="update.php">update |</a>
        <a href="delete.php">delete</a>
    <?php
        if(!empty($_POST)) {

            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn = new mysqli('localhost', 'root', '', 'leendo');

            if($conn->connect_error){
                echo "Error: ".$conn->connect_error;
                'Falha ao conectar ao banco de dados (erro nr: ".$conn->connect_error().")';
                exit();
            }

            $codigo = $_POST['codigo'];
            $sql = "SELECT * FROM `mercadoria` WHERE `codigo` = '$codigo' LIMIT 1";
            $result = mysqli_query($conn, $sql);

            $campo = $result->fetch_assoc();
            if(!$campo){
                exit("Não encontrado!");
            }
            $codigo=$campo['CODIGO'];
            $nome=$campo['DESCRICAO'];
            $ncm=$campo['NCM'];
            $custo=$campo['PRECO_CUSTO'];
            $venda=$campo['PRECO_VENDA'];
            $estoque=$campo['ESTOQUE'];

            echo "<br><hr>";
            echo "<h2>produto excluido</h2>";
            echo "Nome: ".$nome."<br>";
            echo "<td>ncm: ".$ncm."<br>";
            echo "<td>custo: "  .$custo.  "<br>";
            echo "<td>venda: "     .$venda.     "<br>";
            echo "<td>estoque: ".$estoque."<br>";

            $sql = "DELETE FROM `cliente` WHERE `codigo` = '$codigo'";
            $result = mysqli_query($conn, $sql);
            
   
        }
    ?>

</body>
</html>