<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 05/11/2018
 * Time: 17:54
 */

require_once ("vendor/autoload.php");

$mail = new PHPMailer;

$mail -> isSMTP();

$mail -> SMTPDebug = 2;

$mail -> Debugoutput = 'html';

$mail -> Host = 'smtp.gmail.com';

$mail -> Port = 587;

$mail -> SMTPSecure = 'tls';

$mail -> SMTPAuth = true;

$mail -> Username = "rodrigodil@live.com";

$mail -> Password = "123456";

$mail -> setForm  ('rodrigodil@live.com', 'Projeto');

$mail -> addAddress  ('rodrigodil@live.com', 'ProjetoSimonetti');

$mail -> Subject = 'Testando email';

$mail -> msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

$mail -> AltBody = 'Teste';

if (!$mail -> send()) {

    echo "Mailer Error: " . $mail -> ErrorInfo;

} else {

    echo "Mensagem enviada!";
}


?>