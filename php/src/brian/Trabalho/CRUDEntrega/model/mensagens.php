<?php

class Mensagens{
    /**
     * Mensagem utilizada para inclusões realizadas com sucesso
     * @return string
     */
    public function mensagemInclusao(){
        return 'Registro salvo com sucesso!';
    }
    /**
     * Mensagem utilizada para alteração realizada com sucesso
     * @return string
     */
    public function mensagemAlteracao(){
        return 'Registro alterado com sucesso!';
    }
    /**
     * Mensagem utilizada para remoção realizada com sucesso
     * @return string
     */
    public function mensagemRemocao(){
        return 'Registro removido com sucesso!';
    }
    
    /**
     * Mensagem utilizada para o caso de um login mal sucedido
     * @return string
     */
    public function mensagemLogin(){
        return 'Login ou senha inválido!';
    }
}
