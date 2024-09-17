<?php

    namespace App\Model;    
    

    class ProdutoDao{
        public function create(Produto $p){
            
            $sql = "INSERT INTO produtos (nome, descricao) VALUES (?,?)";
            
            $stmt = Conexao::getConn()->prepare($sql);
            
            $stmt->bindValue(1, $p->getNome());
            $stmt->bindValue(2,$p->getDescricao());

            $stmt->execute();

            echo "Cadastro Feito com Sucesso";    

        }
    
        public function read(){
            $sql = "SELECT*FROM produtos";
            
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount()>0):
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            endif;
                echo"falha";

        }

        public function update(Produto $p){
              
            $sql = "UPDATE produtos SET  nome = ?, descricao = ? where id = ?";
            
            $stmt = Conexao::getConn()->prepare($sql);
            
            $stmt->bindValue(1, $p->getNome());
            $stmt->bindValue(2,$p->getDescricao());
            $stmt->bindValue(3,$p->getId());

            $stmt->execute();

           // echo "Update Feito com Sucesso";    

        }

        public function delete($id){
            $sql = "DELETE FROM  produtos where id = ?";
            
            $stmt = Conexao::getConn()->prepare($sql);
            
           
            $stmt->bindValue(1,$id);

            $stmt->execute();
        }
    
    
    
    
    
    }