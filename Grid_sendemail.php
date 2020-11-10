<?php
    //require "vendor/autoload.php";
    

    class SendEail{

        public static function SendMail($to, $subject, $content){
            $key = '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';

            $email = new \SendGrid\Mail\Mail();

            $email->setFrom("llowlynsmith@gmail.com", "Llowlyn Smith");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);

            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;

            }catch(Exception $e){
                echo 'Email Exception Caught : ' . $e->getMessage() . "\n";
                return false;

            }


        }

    }




?>