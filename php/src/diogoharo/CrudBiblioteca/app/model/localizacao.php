<?php

namespace app\model;

/**
 * Classe Localizacao que é modelo de Localizacao
 * @package app\model
 * @author Diogo haro
 * */
class Localizacao {

    private $loccodigo;
    private $locnome;
    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getInstancia();
        ;
    }

    public function getLoccodigo() {
        return $this->loccodigo;
    }

    public function getLocnome() {
        return $this->locnome;
    }

    public function setLoccodigo($loccodigo) {
        $this->loccodigo = $loccodigo;
    }

    public function setLocnome($locnome) {
        $this->locnome = $locnome;
    }

    /**
     * Conecta com o banco de dados, e usa os atributos da classe
     * para fazer a inserção no banco de dados  na tblocalizacao.
     * @return boolean Se ocorrer tudo bem com a inserção retorna true,
     * caso contrário retornará false
     */
    public function inserir() {
        $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
        $bRetorno = false;
        $sSql = "INSERT INTO atividade.tblocalizacao (locnome) " .
                " VALUES ('{$this->locnome}')";
        $oRes = $this->conexao->query($sSql);
        $iQuantidadeLinhas = pg_affected_rows($oRes);
        if ($iQuantidadeLinhas > 0) {
            $bRetorno = true;
        }
        $this->conexao->close();
        return $bRetorno;
    }

    /**
     * Conecta com o banco de dados e usa os atributos da classe para fazer a exclusão
     * de um registro no banco de dados na tblocalizacao.
     * @return boolean Se ocorrer tudo bem, retornará  verdadeiro caso contrário retorna falso.
     */
    public function deletar() {
        $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
        $bRetorno = false;
        $sSelect = "select loccodigo from atividade.tblivro where loccodigo = {$this->loccodigo}";
        $oResposta = $this->conexao->query($sSelect);
        $iQuantLinha = pg_affected_rows($oResposta);
        if ($iQuantLinha > 0) {
            return $bRetorno;
        } else {
            $sSql = "DELETE FROM atividade.tblocalizacao "
                    . "WHERE loccodigo = {$this->loccodigo}";
            $oRes = $this->conexao->query($sSql);
            $iQuantiadeLinhas = pg_affected_rows($oRes);
            if ($iQuantiadeLinhas > 0) {
                $bRetorno = true;
            }
        }
        $this->conexao->close();
        return $bRetorno;
    }

    /**
     * Conecta com o banco de dados e usa os atributos da classe para fazer a alteração
     * de um registro no banco de dados na tblocalizacao.
     * @return boolean Se ocorrer tudo bem o retorno será true senão o retorno será false.
     */
    public function alterar() {
        $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
        $bRetorno = false;
        $sSql = "UPDATE atividade.tblocalizacao
                      SET  locnome='{$this->locnome}'
                          WHERE loccodigo='{$this->loccodigo}'";
        $oRes = $this->conexao->query($sSql);
        $iQuantidadelinhas = pg_affected_rows($oRes);
        if ($iQuantidadelinhas > 0) {
            $bRetorno = true;
        }
        $this->conexao->close();
        return $bRetorno;
    }

    /**
     * Conecta com o banco, e usa o atributo codigo para selecionar um registro
     * no banco de dados na tblocalizacao.
     * @return \Localizacao se o SELECT retornar algum registro,é retornada
     * essas informações através do objeto Localizacao.
     */
    public function selecionar() {
        $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
        $oLocalizacao = new Localizacao();
        $sSql = "SELECT * FROM atividade.tblocalizacao WHERE loccodigo={$this->loccodigo}";
        $oRes = $this->conexao->query($sSql);
        $aArray = pg_fetch_array($oRes);
        $this->conexao->close();
        if ($aArray) {
            $oLocalizacao->setLoccodigo($aArray[0]);
            $oLocalizacao->setLocnome($aArray[1]);
            return $oLocalizacao;
        } else {
            return false;
        }
    }

    /**
     * Conecta com o banco. Seleciona todos os registro da entidade tblocalizacao
     * e atribui ao array Localizacao $aLocalizacao[]
     * @return Array Localizacao
     */
    public function listar() {
        $this->conexao->conect("host=localhost dbname=postgres user=postgres password=123");
        $aLocalizacao = Array();
        $sSql = "SELECT loccodigo,locnome FROM atividade.tblocalizacao";
        $oRes = $this->conexao->query($sSql);
        while ($oLocalizacaoBanco = pg_fetch_assoc($oRes)) {
            $oLocalizacao = new Localizacao();
            $oLocalizacao->setLoccodigo($oLocalizacaoBanco['loccodigo']);
            $oLocalizacao->setLocnome($oLocalizacaoBanco['locnome']);
            $aLocalizacao[] = $oLocalizacao;
        }
        $this->conexao->close();
        return $aLocalizacao;
    }

}
