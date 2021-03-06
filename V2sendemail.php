<?php
// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
//require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("./sendgrid-php.php");
// If not using Composer, uncomment the above line

class SendEmail{

    public static function SendMail($to, $subject, $content){
        $url = 'https://api.elasticemail.com/v2/email/send';
        $key = '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';
        
       
        //$email = new \SendGrid\Mail\Mail();
        //$email->setFrom("llowlynsmith@gmail.com");

        try{
            $email = array('from' => 'llowlynsmith@gmail.com',
            'fromName' => 'I.T Conference',
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
                                         

            } catch (Exception $e) {
                echo 'Email exception Caught : ' . $e->getMessage() . "\n";
                return false;
            }
        }
    }
?>




<!-- $email = new \SendGrid\Mail\Mail();
$email->setFrom("test@example.com", "Example User");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("test@example.com", "Example User");
$email->addContent(
    "text/plain", "and easy to do anywhere, even with PHP"
);
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}-->