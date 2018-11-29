<?php

class Login{
    private $login;
    private $senha;
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao::getInstancia();
    }
    
    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }
    
    public function requisicaoLogin(){
        $this->conexao->conecta("host=localhost dbname=entrega "
                . "user=postgres password=postgres");
        $bRetorno = false;
        $sSql = "SELECT * FROM entrega.tbusuario WHERE  
                    usulogin='{$this->login}' AND ususenha='{$this->senha}'";
        $oRes = $this->conexao->query($sSql);
        $aResultado = pg_fetch_array($oRes);
    
        if($aResultado){
            $bRetorno = true;
        }
        $this->conexao->close();
        return $bRetorno;
    }

}