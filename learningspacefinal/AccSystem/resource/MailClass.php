<?php

class MailClass {

    function sendMail($sendto, $subject, $body, $targetpath = null) {
   
        global $errorSendEmail;
        try {
            $transport = new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
            $transport->setUsername('projectcrudacc@gmail.com');
            $transport->setPassword('Projectcrudacc2');
            
            $mailer = new Swift_Mailer($transport);

            $message = new Swift_Message("MY test");
            $message->setTo($sendto);
            $message->setSubject($subject);
            $message->setBody($body,'text/html');
            $message->setFrom("projectcrudacc@gmail.com", "NoReply - LearningSpace");
            
            if (!empty($targetpath)) {
                $message->attach(Swift_Attachment::fromPath($targetpath));
            }

            return $mailer->send($message);
//            if ($result) {
//                echo "Number of emails sent: $result";
//                echo '<script language="javascript">';
//                echo 'alert("Number of emails sent: {$result}")';
//                echo '</script>';
//            } else {
//                echo "Couldn't send email";
//                echo '<script language="javascript">';
//                echo 'alert("Couldnt send email")';
//                echo '</script>';
//            }
        } catch (Exception $ex) {
            return FALSE;
        }
    }

}
