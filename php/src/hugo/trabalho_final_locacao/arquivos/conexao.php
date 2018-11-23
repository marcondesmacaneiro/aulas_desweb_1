<?php
    function getConexao(){
        global $aConfig;
        
        $sHost     = $aConfig['host'];
        $sPort     = $aConfig['port'];
        $sDbName   = $aConfig['dbname'];
        $sUser     = $aConfig['user'];
        $sPassword = $aConfig['password'];

        $sConexao = "host=$sHost
                     port=$sPort
                     dbname=$sDbName
                     user=$sUser
                     password=$sPassword";
        
        return $sConexao;
    }
    
    function conecta(){
        return pg_connect(getConexao());
    }
    
    function desconecta(){
        return pg_close(conecta());
    }
    
    function executa($sSQL){
        $oConexao = conecta();
        
        $oQuery = pg_query($oConexao, $sSQL);
        
        $aRetorno = [];
        
        while ($oResultado = pg_fetch_array($oQuery, null, PGSQL_ASSOC)){
            $aRetorno[] = $oResultado;
        }
        
        desconecta();
        
        return $aRetorno;
    }
    function insere($sTabela, $aColunas, $aValores){
        executa('INSERT INTO '.$sTabela.' ('.implode(',',$aColunas).') VALUES ('.implode(',', trataValores($aValores)).');');
    }
    function deleta($sTabela, $aColuna, $aValor){
        executa('DELETE FROM '.$sTabela.' WHERE '.$aColuna.'= '.$aValor.';');
    }
    function atualiza($sTabela, $aColuna, $aValor, $aColunaCondicao, $aCondicao){
        executa('UPDATE '.$sTabela.' set '.$aColuna.'= '.trataValores($aValor).' where '.$aColunaCondicao.'= '.$aCondicao.' ;');
    }


    function trataValores($aValores){
        if(is_array($aValores)){
                foreach ($aValores as $iIndice => $xValor){
                if(is_string($xValor)){
                    $aValores[$iIndice] = '\''.$xValor.'\'';
                }
            }
            return $aValores;
        }
        $aValores = '\''.$aValores.'\'';
        return $aValores;
    }