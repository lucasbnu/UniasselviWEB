<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class funcionario{

  /**
   * Identificador único do funcionario
   * @var integer
   */
  public $id_funcionario;

  /**
   * Título do funcionario
   * @var string
   */
  public $nome_funcionario;

  /**
   * Descrição do funcionario (pode conter html)
   * @var string
   */
  public $idade;

  /**
   * Define se o funcionario ativa
   * @var string(s/n)
   */
  public $situacao;


  /**
   * Método responsável por cadastrar um novo funcionario no banco
   * @return boolean
   */
  public function cadastrar(){

    //INSERIR o funcionario NO BANCO
    $obDatabase = new Database('funcionarios');
    $this->id_funcionario = $obDatabase->insert([
                                      'nome_funcionario'    => $this->nome_funcionario,
                                      'idade' => $this->idade,
                                      'situacao'     => $this->situacao
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar o funcionario no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('funcionarios'))->update('id_funcionario = '.$this->id_funcionario,[
                                                                'nome_funcionario'    => $this->nome_funcionario,
                                                                'idade' => $this->idade,
                                                                'situacao'     => $this->situacao
                                                              ]);
  }

  /**
   * Método responsável por excluir o funcionario do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('funcionarios'))->delete('id_funcionario = '.$this->id_funcionario);
  }

  /**
   * Método responsável por obter as funcionarios do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getfuncionarios($where = null, $order = null, $limit = null){
    return (new Database('funcionarios'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar um funcionario com base em seu id_funcionario
   * @param  integer $id_funcionario
   * @return funcionario
   */
  public static function getfuncionario($id_funcionario){
    return (new Database('funcionarios'))->select('id_funcionario = '.$id_funcionario)
                                  ->fetchObject(self::class);
  }

}