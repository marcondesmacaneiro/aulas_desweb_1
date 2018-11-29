<?php

class Conexao {
    static private $instancia = null;
    private $bancoDeDados = null;
    
    static public function getInstancia() {
        if(self::$instancia === NULL) {
            self::$instancia = new self();  //PEGA A CLASSE: EXEMPLO CONEXÃO COMO NESTE CASO E COLOCA AQUI DENTRO.
        }
        return self::$instancia;
    }
    
    public function conecta($sConexao) {
        $this->bancoDeDados = pg_connect($sConexao);
    }
    
    public function query($sQuery) {
        return pg_query($this->bancoDeDados, $sQuery);
    }
    
        public function close() {
            pg_close();
        }
    
}