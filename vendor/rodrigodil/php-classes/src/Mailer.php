<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 05/11/2018
 * Time: 17:48
 */

namespace rodrigodil;

use Rain\Tpl;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer {

    const USERNAME = "rodrigodil007@gmail.com";
    const PASSWORD = "<?password?>";
    const NAME_FROM = "Projeto Simonetti";

    private $mail;

    public function __construct($toAddress, $toName, $subject, $tplName, $data = array())
    {

        $config = array(
            "base_url"      => null,
            "tpl_dir"       => $_SERVER['DOCUMENT_ROOT']."/views/email",
            "cache_dir"     => $_SERVER['DOCUMENT_ROOT']."/views-cache/",
            "debug"         => false
        );

        Tpl::configure( $config );

        $tpl = new Tpl();

        foreach ($data as $key => $value) {

            $tpl->assign($key, $value);

        }

        $html = $tpl->draw($tplName, true);

        $this -> mail = new PHPMailer;

        $this -> mail -> isSMTP();

        $this -> mail -> SMTPDebug = 0;

        $this -> mail -> Debugoutput = 'html';

        $this -> mail -> Host = 'smtp.gmail.com';

        $this -> mail -> Port = 587;

        $this->mail->isSMTP();
        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $this -> mail -> SMTPSecure = 'tls';

        $this -> mail -> SMTPAuth = true;

        $this -> mail -> Username = Mailer::USERNAME;

        $this -> mail -> Password = Mailer::PASSWORD;

        $this -> mail -> setForm  (Mailer::USERNAME, Mailer::NAME_FROM);

        $this -> mail -> addAddress  ($toAddress, $toName);

        $this -> mail -> Subject = $subject;

        $this -> mail -> msgHTML();

        $this -> mail -> AltBody = 'Teste';



    }

    public function send (){

        return $this->mail->send();

    }

}

?>