<?php   
  
  require_once 'vendor/autoload.php';

  use App\Model\Produto;
  use App\Model\ProdutoDao;




  $produtoDao = new ProdutoDao();
  $produtoDao ->delete(19);
  $produtoDao ->read();
  foreach($produtoDao->read() as $produto):
    echo $produto['nome']."<br>".$produto['descricao']."<hr>";
  endforeach;

  //;var_dump($produto);