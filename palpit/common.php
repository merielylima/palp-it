<?php

    require_once 'PHPMailer/src/PHPMailer.php';
	require_once 'PHPMailer/src/SMTP.php';
	require_once 'PHPMailer/src/Exception.php';

	use PHPMailer\PHPMailer\PHPMailer;
	//use PHPMailer\PHPMailer\SMTP;
	//use PHPMailer\PHPMailer\Exception;


    function smtpmailer ($para, $de, $de_nome, $assunto, $corpo) { 
	    $mail = new PHPMailer();
		$mail -> IsSMTP ();
	    $mail -> SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	    $mail -> SMTPAuth = true;		// Autenticação ativada
	    $mail -> SMTPSecure = 'tls';	// SSL REQUERIDO pelo GMail
	    $mail -> Host = 'smtp.gmail.com';	// SMTP utilizado
	    $mail -> Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
	    $mail -> Username = 'baille.hub@gmail.com';
	    $mail -> Password = 'NuMeBrHu';
	    $mail -> SetFrom ($de, $de_nome);
	    $mail -> Subject = $assunto;
	    $mail -> Body = $corpo;
	    $mail -> AddAddress ($para);
		$mail -> CharSet = 'UTF-8';                                  // Set email format to HTML
		

	    if (!$mail -> Send ()) {
            echo 'Mail error: '.$mail->ErrorInfo; 
		    return 0;
	    } else {
		    return 1;
	    }
    }


?>
