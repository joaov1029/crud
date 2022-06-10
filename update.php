<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update produtos</title>
</head>
<body>
    <h2>Editar produtos</h2>
    <hr>
    <form method="post">
            Codigo: <input type="text" name="codigo">
            <input type="submit" value="Consultar">
    </form>
        <a href="index.php">create |</a>
        <a href="read.php">read |</a>
        <a href="update.php">update |</a>
        <a href="delete.php">delete</a>
    <hr>

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

            echo '<br><hr>';
            echo '<h2>editar produto</h2>';
            echo '<form method="post">';
            echo 'Código: <input type="text" value="'.$codigo.'" name="codigo">';
            echo 'nome: <input type="text" value="'.$nome.'" name="nome">';
            echo 'ncm: <input type="text" value="'.$ncm.'" name="ncm">';
            echo 'custo: <input type="text" value="'.$custo.'" name="custo">';
            echo 'venda: <input type="text" value="'.$venda.'" name="venda">';
            echo 'estoque: <input type="text" value="'.$estoque.'" name="estoque">';
            echo '<br>';
            echo '<input type="submit" value="enviar">';
            echo '</form>';

            if(!Empty($_POST['nome'])){ 
                $sql = "UPDATE mercadoria SET descricao=?, ncm=?, preco_custo=?,
                    preco_venda=?, estoque=?
                    WHERE codigo = ? LIMIT 1";
                $stmt=$conn->prepare($sql);
                $stmt->bind_param("sssssi", $nome, $ncm, $custo,
                                               $venda, $estoque, $codigo);
                
            $codigo = $_POST['codigo'];    
            $nome = $_POST['nome'];
            $ncm = $_POST['ncm'];
            $custo = $_POST['custo'];
            $venda = $_POST['venda'];
            $estoque = $_POST['estoque'];
               
                $stmt->execute();
            }

            mysqli_close($conn);
        }
    ?>

</body>
</html>