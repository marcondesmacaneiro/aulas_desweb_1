<?php

/**
 * Classe AutorLivro que é modelo de AutorLivro
 * @package app\model
 * @author Diogo Haro
 */
namespace app\model;
class AutorLivro{
    /**
     *
     * @var Autor $autor 
     */
    private $autor;
    /**
     *
     * @var Livro $livro
     */
    private $livro;
   /**
    *
    * @var array Codigo de autores
    */
    private $arrayCodigo= Array();
    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getInstancia();
        $this->livro = new Livro();
        $this->autor = new Autor();
    }
    
    public function getAutor() {
        return $this->autor;
    }

    public function getLivro(){
        return $this->livro;
    }

    public function getArrayCodigo() {
        return $this->arrayCodigo;
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function setAutor(Autor $autor) {
        $this->autor = $autor;
    }

    public function setLivro(Livro $livro) {
        $this->livro = $livro;
    }

    public function setArrayCodigo($arrayCodigo) {
        $this->arrayCodigo = $arrayCodigo;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

    
    /**
     * Conecta com o banco de dados, e usa os atributos da classe livro,autor 
     * para fazer a inserção no banco de dados.
     * @return boolean Se ocorrer tudo bem com a inserção retorna true,
     * caso contrário retornará false
     */
    public function inserir() {
         $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
         $bRetorno = false;
            $sSql = "INSERT INTO atividade.tbautorlivro (autcodigo, livcodigo)"
                . "VALUES({$this->getAutor()->getAutcodigo()},{$this->getLivro()->getLivcodigo()}) ";
            $oRes = $this->conexao->query($sSql);
            $iQuantidadeLinhas = pg_affected_rows($oRes);
            if($iQuantidadeLinhas > 0){
                $bRetorno= true;
            }
            $this->conexao->close();
            return $bRetorno;
    }
    
     /**
     * Conecta com o banco de dados e usa o código do livro  da classe livro para fazer a exclusão 
     * de um registro no banco de dados na tbautorlivro.
     * @return boolean se ocorrer tudo bem retorna true, caso contrário retorna false.
     */   
     public function deletar() {
        $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
        $bRetorno = false;
        $sSql = "DELETE FROM atividade.tbautorlivro "
                . "WHERE livcodigo={$this->getLivro()->getLivcodigo()}";
        $oRes = $this->conexao->query($sSql);
        $iQuantidadeLinhas = pg_affected_rows($oRes);
        if($iQuantidadeLinhas > 0){
            $bRetorno= true;
        }
        $this->conexao->close();
        return $bRetorno;
    }
}


