<?php
namespace app\model;
/**
 * Classe Geenero que é modelo de Genero
 * @package app\model
 * @author Diogo haro
 **/
class Genero{
    private $gencodigo;
    private $gennome;
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao::getInstancia();;
    }
    
    public function getGencodigo() {
        return $this->gencodigo;
    }

    public function getGennome() {
        return $this->gennome;
    }

    public function setGencodigo($gencodigo) {
        $this->gencodigo = $gencodigo;
    }

    public function setGennome($gennome) {
        $this->gennome = $gennome;
    }
    
     /**
     * Conecta com o banco de dados, usa os atributos da classe
     * para fazer a inserção no banco de dados na tbgenero.
     * @return boolean se ocorrer tudo bem com a inserção retorna true, caso contrário 
     * retornará false.
     */
   public function inserir() {
         $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
         $bRetorno = false;
         $sSql = "INSERT INTO atividade.tbgenero (gennome) ".
                   " VALUES ('{$this->gennome}')";
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
     * de um registro no banco de dados na tbgenero.
     * @return boolean se ocorrer tudo bem retorna true, caso contrário retorna false.
     */
     public function deletar() {
         $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
         $bRetorno = false;
         $sSql = "DELETE FROM atividade.tbgenero "
                 . "WHERE gencodigo = {$this->gencodigo}";
         $oRes = $this->conexao->query($sSql);
         $iQuantiadeLinhas = pg_affected_rows($oRes);
         if($iQuantiadeLinhas > 0){
             $bRetorno= true;
         }
         $this->conexao->close();
         return $bRetorno;
     }
     
     /**
     * Conecta com o banco de dados e usa os atributos da classe para fazer
     * a alteração de um registro no banco de dados na tbgenero.
     * @return boolean se ocorrer tudo bem com a alteração,retornará true,
     * caso contrário retornará false
     */
     public function alterar() {
         $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
         $bRetorno = false;
         $sSql = "UPDATE atividade.tbgenero
                      SET  gennome='{$this->gennome}' 
                          WHERE gencodigo='{$this->gencodigo}'";
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
     * no banco de dados na tbgenero.
     * @return \Genero se o SELECT retornar algum registro,é retornada
     * essas informações através do objeto Genero.
     */
     public function selecionar() {
         $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
         $oGenero = new Genero();
         $sSql = "SELECT * FROM atividade.tbgenero WHERE gencodigo={$this->gencodigo}";
         $oRes = $this->conexao->query($sSql);
         $aArray = pg_fetch_array($oRes);
         $this->conexao->close();
         if($aArray){
             $oGenero->setGencodigo($aArray[0]);
             $oGenero->setGennome($aArray[1]);
             return $oGenero;
         }
         else{
             return false;
         }
     }
     
    /**
     * Conecta com o banco. Seleciona todos os registro da entidade tbgenero
     * e atribui ao array Generos $aGeneros[]
     * @return Array Genero 
     */
    public function listar(){
       $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
       $aGeneros = Array();
       $sSql = "SELECT gencodigo,gennome FROM atividade.tbgenero";
       $oRes = $this->conexao->query($sSql);
      while($oGeneroBanco = pg_fetch_assoc($oRes)){
            $oGenero = new Genero();
            $oGenero->setGencodigo($oGeneroBanco['gencodigo']);
            $oGenero->setGennome($oGeneroBanco['gennome']);
            $aGeneros[] = $oGenero;
        }
        $this->conexao->close();
        return $aGeneros;
    }
}

