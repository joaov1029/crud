<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create produtos</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h1>Cadastrar produtos</h1>
    <hr>
    <form method="post">
  
    nome: <input type="text" name="nome">         
    ncm: <input type="text" name="ncm">
    preço: <input type="text" name="preço">
    venda: <input type="text" name="venda">      
    estoque: <input type="text" name="estoque">
    <input type="submit" value="enviar">
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

            $stmt = $conn->prepare("INSERT INTO `mercadoria` (DESCRICAO, NCM, PRECO_CUSTO, PRECO_VENDA, ESTOQUE) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $nome, $ncm, $preco, $venda, $estoque);

            $nome = $_POST['nome'];
            $ncm = $_POST['ncm'];
            $preco = $_POST['preço'];
            $venda = $_POST['venda'];
            $estoque = $_POST['estoque'];

            $stmt->Execute();

            echo "<br><br><hr>";
            echo "<h2>Aqui está seu registro</h2><br>";
            echo "Nome: ".$nome."<br>";
            echo "ncm:".$ncm."<br>";
            echo "preço: ".$preco."<br>";
            echo "venda: ".$venda."<br>";
            echo "estoque: ".$estoque."<br>";
    
        }
    ?>

</body>
</html>