<?php
namespace app\model;
/**
 * Classe Livro que é modelo de Livro
 * @package app\model
 * @author Diogo Haro
 */
class Livro{
    private $livcodigo;
    private $livnome;
    /**
     *
     * @var Genero $genero 
     */
    private $genero;
    /**
     *
     * @var Localizacao $localizacao
     */
    private $localizacao;
    private $conexao;
    /**
     *
     * @var Autor $autor
     */
    private $autor;
    
    public function __construct() {
        $this->conexao = Conexao::getInstancia();
        $this->genero = new Genero();
        $this->localizacao = new Localizacao();
        $this->autor = new Autor();
    }
    public function getAutor() {
        return $this->autor;
    }

    public function setAutor(Autor $autor) {
        $this->autor = $autor;
    }

        public function getLivcodigo() {
        return $this->livcodigo;
    }

    public function getLivnome() {
        return $this->livnome;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function getLocalizacao(){
        return $this->localizacao;
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function setLivcodigo($livcodigo) {
        $this->livcodigo = $livcodigo;
    }

    public function setLivnome($livnome) {
        $this->livnome = $livnome;
    }

    public function setGenero(Genero $genero) {
        $this->genero = $genero;
    }

    public function setLocalizacao(Localizacao $localizacao) {
        $this->localizacao = $localizacao;
    }

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }
      /**
     * Conecta com o banco de dados, usa os atributos da classe livro,gênero e localização
     * para fazer a inserção no banco de dados.
     * @return boolean se ocorrer tudo bem com a inserção retorna o array $aRetorno na posição 0, caso contrário 
     * retornará false.
     */
    public function inserir(){
        $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
        $bRetorno = false;
        $sSql = "INSERT INTO atividade.tblivro (livnome,gencodigo,loccodigo)"
                . "VALUES('{$this->livnome}',{$this->getGenero()->getGencodigo()},{$this->getLocalizacao()->getLoccodigo()}) RETURNING livcodigo";
        $oRes = $this->conexao->query($sSql);
        $iQuantidadeLinhas = pg_affected_rows($oRes);
        if($iQuantidadeLinhas > 0){
            $aRetorno = pg_fetch_row($oRes);
            $bRetorno= $aRetorno[0];
        }
        $this->conexao->close();
        return $bRetorno;
    }
    
      /**
     * Conecta com o banco de dados e usa os atributos da classe para fazer a exclusão 
     * de um registro no banco de dados da entidade tblivro.
     * @return boolean se ocorrer tudo bem retorna true, caso contrário retorna false.
     */
    public function deletar() {
        $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
        $bRetorno = false;
        $sSql = "DELETE FROM atividade.tblivro "
                . "WHERE livcodigo={$this->livcodigo}";
        $oRes = $this->conexao->query($sSql);
        $iQuantidadeLinhas = pg_affected_rows($oRes);
        if($iQuantidadeLinhas > 0){
            $bRetorno= true;
        }
        $this->conexao->close();
        return $bRetorno;
    }
    
    /**
     * Conecta com o banco. Seleciona todos os registro da entidade tblivro
     * e atribui ao array Livros $aLivro[]
     * @return Array Livro 
     */
    public function listar() {
        $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
        $aLivro= Array();
        $sSql = "SELECT livcodigo,livnome,tbgenero.gencodigo,tblocalizacao.loccodigo FROM atividade.tblivro "
                . "INNER JOIN atividade.tbgenero ON tblivro.gencodigo = tbgenero.gencodigo "
                . "INNER JOIN atividade.tblocalizacao ON tblocalizacao.loccodigo = tblivro.loccodigo ";
        $oRes = $this->conexao->query($sSql);
        while($oLivroBanco = pg_fetch_assoc($oRes)){
            $oLivro = new Livro();
            $oGenero = new Genero();
            $oLocalizacao = new Localizacao();
            $oLivro->setLivcodigo($oLivroBanco['livcodigo']);
            $oLivro->setLivnome($oLivroBanco['livnome']);
            $oGenero->setGencodigo($oLivroBanco['gencodigo']);
            $oLocalizacao->setLoccodigo($oLivroBanco['loccodigo']);
            $oLivro->setGenero($oGenero);
            $oLivro->setLocalizacao($oLocalizacao);
            $aLivro[] = $oLivro;
        }
        $this->conexao->close();
        return $aLivro;
    }
     /**
      *  Conecta com o banco e seleciona todas as informações  daquele livro selecionado.
      * @param checkbox 
      * @return Array Livro $aLivro
      */
      public function listarSelecionados($check){
       $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
       $aLivro = Array();
       $sSql = "SELECT * FROM atividade.tbautorlivro "
               . "INNER JOIN atividade.tbautor ON tbautorlivro.autcodigo = tbautor.autcodigo "
               . "INNER JOIN atividade.tblivro ON tbautorlivro.livcodigo = tblivro.livcodigo "
               . "INNER JOIN atividade.tbgenero ON tblivro.gencodigo = tbgenero.gencodigo "
               . "INNER JOIN atividade.tblocalizacao ON tblivro.loccodigo = tblocalizacao.loccodigo "
               . "WHERE tblivro.livcodigo={$check}";
       $oRes = $this->conexao->query($sSql);
      while($oBanco = pg_fetch_assoc($oRes)){
            $oAutor = new Autor();
            $oLivro = new Livro();
            $oLocalizacao = new Localizacao();
            $oGenero = new Genero();
            $oLivro->setLivcodigo($oBanco['livcodigo']);
            $oLivro->setLivnome($oBanco['livnome']);
            $oGenero->setGennome($oBanco['gennome']);
            $oAutor->setAutnome($oBanco['autnome']);
            $oLocalizacao->setLocnome($oBanco['locnome']);
            $oLivro->setGenero($oGenero);
            $oLivro->setLocalizacao($oLocalizacao);
            $oLivro->setAutor($oAutor);
            $aLivro[] = $oLivro;
        }
        $this->conexao->close();
        return $aLivro;
    }
}
