<?php
namespace app\model;
class Conexao{
    static private $instancia = null;
    private $bandoDeDados = null;
    
    static public function getInstancia(){
        if(self::$instancia===NULL){
            self::$instancia = new self();
        }
        return self::$instancia;
    }
    public function conect($sConexao){
        $this->bandoDeDados = pg_connect($sConexao);
    }
    
    public function query($sQuery){
        return pg_query($this->bandoDeDados, $sQuery);
    }
    
    public function close(){
        pg_close();
    }
}
