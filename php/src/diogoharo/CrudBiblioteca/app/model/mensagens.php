<?php
namespace app\model;
class Mensagens{
    /**
     * exibe essa mensagem ao inserir um registro.
     * @return string 
     */
    public function mensagemInclusao(){
            return 'Registro salvo com sucesso!';
        
    }
    /**
     * exibe essa mensagem ao alterar um registro.
     * @return string 
     */
    public function mensagemAlteracao(){
        
        return 'Registro Alterado com sucesso!';
    }
    /**
     * exibe essa mensagem ao excluir um registro.
     * @return string 
     */
    public function mensagemExclusao(){
        
        return 'Registro Exlcuido!!';
    }
}
