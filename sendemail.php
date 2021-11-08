<?php
    require 'vendor/autoload.php';

    class sendemail{
        public static function SendMail($to,$subject,$content){
            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("douglas.lemar@gmail.com", "Lemar Douglas");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            //$email->addContent("text/html", $content);

            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception caught: '.$e->getMessage()."\n";
                return false;

            }

        }
    }
?>