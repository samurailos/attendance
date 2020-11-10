<?php 
    require_once 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to, $subject, $content){
            $key = 'E86A23D7A191EC8A43E0A5A1B14EDEA39E99A07AEC3BE4135E2AD7A20E10E20A6B71564E8F8130778F48A83F2D5DA994';
            $url = 'https://api.elasticemail.com/v2/email/send';
            
            /* Sendgrid Alternative
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("llowlynsmith@gmail.com", "Llowlyn Smith");
            $email->addTo($to);
            $email->setSubject($subject);
            $email->addContent("text/plain", $content);

            //$email->addContent("text/html", $content);
            $sendgrid = new \SendGrid($key);
            */
            try {
                $email = array('from' => 'llowlynsmith@gmail.com',
                'fromName' => 'I.T. Conference 2020',
                'apikey' => $key,
                'subject' => $subject,
                'to' => $to,
                'bodyHtml' => $content,
                'bodyText' => $content,
                'isTransactional' => false);
                
                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $email,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER => false,
                    CURLOPT_SSL_VERIFYPEER => false
                ));
                
                $result=curl_exec ($ch);
                curl_close ($ch);
                
                }catch (Exception $e) {
                echo 'Email exception Caught : ' . $e->getMessage() . "\n";
                return false;
            }
        }
    }
?>