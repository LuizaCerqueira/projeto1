<?php
include_once 'C:/xampp/htdocs/projeto1/PHP01/model/Conecta.php';
include_once 'C:/xampp/htdocs/projeto1/PHP01/model/Produto.php';

class daoProduto {

    public function inserir(Produto $produto){

        $conn= new Conecta();
        if ($conn->conectadb()){

            $nomeProduto = $produto->getnomeproduto();
            $tVlrCompra = $produto->getVlrCompra();
            $VlrVenda = $produto->getVlrVenda();
            $QtdEstoque = $produto->getQtdEstoque();
            $sql = "insert into produto values (null,'$nomeProduto', '$tVlrCompra', '$VlrVenda', '$QtdEstoque')";
            if (mysqli_query($conn->conectadb(),$sql)){
                $msg="<p style='color: blue;'>"."Dados Castrados com sucesso</p>";
            }
            else{
                $msg = "<p style='color: red;'>"."Erro na inserção dos dados</p>";
            }
              
        }else{
            $msg = "<p style='color: red;'>"."Erro na conexão com o banco de dados.</p>";
        }
        mysqli_close($conn->conectadb());
        return $msg;
        
    }
       
    
}
?>
