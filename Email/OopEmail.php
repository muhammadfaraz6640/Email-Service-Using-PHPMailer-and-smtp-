<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="index.php" enctype="multipart/form-data">
        <label >Email</label>    <br />
        <input type="email" name="Email"><br />
        <label >Subject</label>    <br />
        <input type="text" name="Subject"><br />
        <label >Body</label>    <br />
        <textarea name="Body" cols="30" rows="10"></textarea><br />
        <input type="submit" name="Send" value="Send"><br />
        <?php
            class EmailSend{
                //attributes
                public $Email;
                public $Subject;
                public $Body;

                //method

                public function SendEmail(){
                    require_once('PHPMailerAutoload.php');
                    require_once('class.phpmailer.php');
                    require_once('class.smtp.php');
                    $mail = new PHPMailer;

                    $mail->SMTPDebug = 4;                               // Enable verbose debug output

                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'appartmentmanagement200@gmail.com';                 // SMTP username
                    $mail->Password = 'karachi94';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to

                    $mail->setFrom('appartmentmanagement200@gmail.com', 'The Tutors Provider');
                    $mail->addAddress($Email);     // Add a recipient        
                    $mail->addReplyTo('appartmentmanagement200@gmail.com');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');

                    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                    $mail->isHTML(true);                                  // Set email format to HTML

                    $mail->Subject = $Subject;
                    $mail->Body    = $Body;
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    if(!$mail->send()) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    } else {
                        echo 'Message has been sent';
                    }    
                            }
            }
    

            if(isset($_POST['Send']))
            {
                $MyMail = new EmailSend();
                $MyMail->Email = $_POST['Email'];
                $MyMail->Body = $_POST['Subject'];
                $MyMail->Subject = $_POST['Body'];
                $MyMail->SendEmail();
            }
        ?>    
    </form>
</body>
</html>

