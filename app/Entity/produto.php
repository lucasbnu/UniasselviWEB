<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class produto{

  /**
   * Identificador único do produto
   * @var integer
   */
  public $id_produto;

  /**
   * Título do produto
   * @var string
   */
  public $descricao_produto;

  /**
   * Descrição do produto (pode conter html)
   * @var string
   */
  public $preco;

  /**
   * Define se o produto ativa
   * @var string(s/n)
   */
  public $situacao;


  /**
   * Método responsável por cadastrar um novo produto no banco
   * @return boolean
   */
  public function cadastrar(){

    //INSERIR o produto NO BANCO
    $obDatabase = new Database('produtos');
    $this->id_produto = $obDatabase->insert([
                                      'descricao_produto'    => $this->descricao_produto,
                                      'preco' => $this->preco,
                                      'situacao'     => $this->situacao
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar o produto no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('produtos'))->update('id_produto = '.$this->id_produto,[
                                                                'descricao_produto'    => $this->descricao_produto,
                                                                'preco' => $this->preco,
                                                                'situacao'     => $this->situacao
                                                              ]);
  }

  /**
   * Método responsável por excluir o produto do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('produtos'))->delete('id_produto = '.$this->id_produto);
  }

  /**
   * Método responsável por obter as produtos do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getprodutos($where = null, $order = null, $limit = null){
    return (new Database('produtos'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar um produto com base em seu id_produto
   * @param  integer $id_produto
   * @return produto
   */
  public static function getproduto($id_produto){
    return (new Database('produtos'))->select('id_produto = '.$id_produto)
                                  ->fetchObject(self::class);
  }

}