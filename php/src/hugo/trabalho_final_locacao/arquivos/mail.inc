<?php
    include('PHPMailer.php');
    include('SMTP.php');

    function getMail(){
        global $aConfig;

        $oMail = new PHPMailer();
        $oMail->isSMTP();
        $oMail->isHTML();
        $oMail->SMTPAuth   = true;
        $oMail->SMTPSecure = $aConfig['SMTPSecure'];
        $oMail->Host       = $aConfig['Host'];
        $oMail->Port       = $aConfig['Port'];
        $oMail->Username   = $aConfig['Username'];
        $oMail->Password   = $aConfig['Password'];
        $oMail->From       = $aConfig['From'];
        $oMail->FromName   = $aConfig['FromName'];
        $oMail->CharSet    = 'ISO-8859-1';

        return $oMail;
    }

    function enviaEmail($sEmailDestino, $sAsunto, $sMensagem, $aAnexos = []){
        $oMail = getMail();
        $oMail->addAddress($sEmailDestino);
        $oMail->Subject = $sAsunto;
        $oMail->Body    = $sMensagem;

        if(!empty($aAnexos)){
            foreach($aAnexos as $sArquivo => $sNomeArquivo){
                $oMail->addAttachment($sArquivo, $sNomeArquivo);
            }
        }

        $oMail->send();
  echo '<h1>'.getInformacaoErro($oMail).'</h1>';
    }

    function getInformacaoErro($oMail){
        return $oMail->ErrorInfo;
    }
