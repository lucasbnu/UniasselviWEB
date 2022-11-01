<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class cliente{

  /**
   * Identificador único da cliente
   * @var integer
   */
  public $id;

  /**
   * Título da cliente
   * @var string
   */
  public $titulo;

  /**
   * Descrição da cliente (pode conter html)
   * @var string
   */
  public $descricao;

  /**
   * Define se a cliente ativa
   * @var string(s/n)
   */
  public $ativo;


  /**
   * Método responsável por cadastrar uma nova cliente no banco
   * @return boolean
   */
  public function cadastrar(){

    //INSERIR A cliente NO BANCO
    $obDatabase = new Database('clientes');
    $this->id = $obDatabase->insert([
                                      'titulo'    => $this->titulo,
                                      'descricao' => $this->descricao,
                                      'ativo'     => $this->ativo
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar a cliente no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('clientes'))->update('id = '.$this->id,[
                                                                'titulo'    => $this->titulo,
                                                                'descricao' => $this->descricao,
                                                                'ativo'     => $this->ativo
                                                              ]);
  }

  /**
   * Método responsável por excluir a cliente do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('clientes'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter as clientes do banco de dados
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
   * Método responsável por buscar uma cliente com base em seu ID
   * @param  integer $id
   * @return cliente
   */
  public static function getcliente($id){
    return (new Database('clientes'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

}