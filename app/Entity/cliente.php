<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class cliente{

  /**
   * Identificador único da cliente
   * @var integer
   */
  public $id_cliente;

  /**
   * Título da cliente
   * @var string
   */
  public $nome_cliente;

  /**
   * Descrição da cliente (pode conter html)
   * @var string
   */
  public $idade;

  /**
   * Define se o cliente ativa
   * @var string(s/n)
   */
  public $situacao;


  /**
   * Método responsável por cadastrar uma nova cliente no banco
   * @return boolean
   */
  public function cadastrar(){

    //INSERIR o cliente NO BANCO
    $obDatabase = new Database('clientes');
    $this->id_cliente = $obDatabase->insert([
                                      'nome_cliente'    => $this->nome_cliente,
                                      'idade' => $this->idade,
                                      'situacao'     => $this->situacao
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar o cliente no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('clientes'))->update('id_cliente = '.$this->id_cliente,[
                                                                'nome_cliente'    => $this->nome_cliente,
                                                                'idade' => $this->idade,
                                                                'situacao'     => $this->situacao
                                                              ]);
  }

  /**
   * Método responsável por excluir o cliente do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('clientes'))->delete('id_cliente = '.$this->id_cliente);
  }

  /**
   * Método responsável por obter os clientes do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getclientes($where = null, $order = null, $limit = null){
    return (new Database('clientes'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar um cliente com base em seu id_cliente
   * @param  integer $id_cliente
   * @return cliente
   */
  public static function getcliente($id_cliente){
    return (new Database('clientes'))->select('id_cliente = '.$id_cliente)
                                  ->fetchObject(self::class);
  }

}