<?php
namespace app\model;
/**
 * Classe Autor que é modelo de Autor
 * @package app\model
 * @author Diogo haro
 **/
class Autor{
    private $autcodigo;
    private $autnome;
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao::getInstancia();
    }
    
    //Métodos de Acesso Get e Set.
    public function getAutcodigo() {
        return $this->autcodigo;
    }

    public function getAutnome() {
        return $this->autnome;
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function setAutcodigo($autcodigo) {
        $this->autcodigo = $autcodigo;
    }

    public function setAutnome($autnome) {
        $this->autnome = $autnome;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }
     /**
     * Conecta com o banco de dados, e usa os atributos da classe
     * para fazer a inserção no banco de dados  na tbautor.
     * @return boolean Se ocorrer tudo bem com a inserção retorna true,
     * caso contrário retornará false
     */
    public function inserir() {
         $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
         $bRetorno = false;
         $sSql = "INSERT INTO atividade.tbautor (autnome) ".
                   " VALUES ('{$this->autnome}')";
         $oRes = $this->conexao->query($sSql);
         $iQuantidadeLinhas = pg_affected_rows($oRes);
         if($iQuantidadeLinhas > 0){
             $bRetorno = true;
         }
         $this->conexao->close();
         return $bRetorno;
     }
     
     /**
      * Conecta com o banco de dados e usa os atributos da classe para fazer a exclusão
      * de um registro no banco de dados na tbautor.
      * @return boolean Se ocorrer tudo bem, retornará  verdadeiro caso contrário retorna falso.
      */
     public function deletar() {
         $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
         $bRetorno = false;
         $sSql = "DELETE FROM atividade.tbautor "
                 . "WHERE autcodigo = {$this->autcodigo}";
         $oRes = $this->conexao->query($sSql);
         $iQuantiadeLinhas = pg_affected_rows($oRes);
         if($iQuantiadeLinhas > 0){
             $bRetorno= true;
         }
         $this->conexao->close();
         return $bRetorno;
     }
     /**
      * Conecta com o banco de dados e usa os atributos da classe para fazer a alteração 
      * de um registro no banco de dados na tbautor.
      * @return boolean Se ocorrer tudo bem o retorno será true senão o retorno será false.
      */
     public function alterar() {
         $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
         $bRetorno = false;
         $sSql = "UPDATE atividade.tbautor
                      SET  autnome='{$this->autnome}' 
                          WHERE autcodigo='{$this->autcodigo}'";
         $oRes = $this->conexao->query($sSql);
         $iQuantidadelinhas = pg_affected_rows($oRes);
         if($iQuantidadelinhas > 0){
             $bRetorno = true;
         }
         $this->conexao->close();
         return $bRetorno;
     }
     /**
     * Conecta com o banco, e usa o atributo codigo para selecionar um registro
     * no banco de dados na tbautor.
     * @return \Autor se o SELECT retornar algum registro,é retornada
     * essas informações através do objeto Autor.
     */
     public function selecionar() {
         $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
         $oAutor = new Autor();
         $sSql = "SELECT * FROM atividade.tbautor  WHERE autcodigo={$this->autcodigo} ";
         $oRes = $this->conexao->query($sSql);
         $aArray = pg_fetch_array($oRes);
         $this->conexao->close();
         if($aArray){
             $oAutor->setAutcodigo($aArray[0]);
             $oAutor->setAutnome($aArray[1]);
             return $oAutor;
         }
         else{
             return false;
         }
     }
     
    /**
     * Conecta com o banco. Seleciona todos os registro da entidade tbautor
     * e atribui ao array Autores $aAutors[]
     * @return Array Autor 
     */
    public function listar(){
       $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
       $aAutors = Array();
       $sSql = "SELECT autcodigo,autnome FROM atividade.tbautor";
       $oRes = $this->conexao->query($sSql);
      while($oAutorBanco = pg_fetch_assoc($oRes)){
            $oAutor = new Autor();
            $oAutor->setAutcodigo($oAutorBanco['autcodigo']);
            $oAutor->setAutnome($oAutorBanco['autnome']);
            $aAutors[] = $oAutor;
        }
        $this->conexao->close();
        return $aAutors;
    }
    
   
    
}