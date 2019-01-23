<?php
//want data to persist
    session_start();


    use PHPMailer\PHPMailer\PHPMailer;
    require '../vendor/autoload.php';
    $errors = [];
    //if variables in the form have been posted through to the page
    //to see what variable is specified in the super global
    // print_r($_POST);

    //everything that was posted via a POST request will be available through the super global $_['POST']
    if(isset($_POST['subject'], $_POST['first_name'], $_POST['last_name'], $_POST['phone'], $_POST['email'], $_POST['message'], $_POST['preference'])) {
        // echo 'all set';
        $fields = [
            'subject' => $_POST['subject'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'message' => $_POST['message'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'preference' => $_POST['preference']
        ];

        // iterate over each field
        // field is key
        // data is the value
        foreach($fields as $field => $data){
            //check if the data is empty
            if(empty($data)){
                $errors[] = 'The '. $field. ' field is required';
            }
        }
        if(empty($errors)){

            $mail = new PHPMailer;
            $mail->isSMTP();            //Tell PHPMailer to use SMTP
            $mail->SMTPDebug = 1;            //Enable SMTP debugging
            $mail->Host = 'smtp.gmail.com';            //Set the hostname of the mail server

            // if your network does not support SMTP over IPv6
            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';            //Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPAuth = true;            //Whether to use SMTP authentication
            $mail->Username = "vinci.allensteward@gmail.com";            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Password = "hubotzcnkiviliiw";            //Password to use for SMTP authentication

            //Set who the message is to be sent from
            $mail->setFrom($fields['email'], $fields['first_name']);


            //WHO IT GOES TO
            $mail->AddAddress('vinci.allensteward@gmail.com', 'Desert Rose');    

            $mail->isHTML(true);            //States that we do want to send an HTML email
            //Set the subject line
            $mail->Subject = 'Kneaded Relief - Message';
            $mail->Body = '<strong>From: </strong>'.$fields['first_name'].' '.$fields['last_name'].'('.$fields['email'].')<p><strong>Subject: </strong>'.$fields['subject'].'</p><p>'.$fields['message'].'</p>'.'<p><strong>Communication preference: </strong>'.$fields['preference'].'</p><p><strong>Email: </strong>'.$fields['email'].'/<p><p><strong>Phone Number: </strong></p>'.$fields['phone'].'</p>';
            $mail->FromName = 'Kneaded Relief';

            //Read an HTML message body from an external fiale, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            // $mail->msgHTML(file_get_contents('contents.php'), __DIR__);
            //Replace the plain text body with one created manually
            //piain text represneation of what is sent in the body
            $mail->AltBody = 'This is a plain-text message body';
            //Attach an image file
            // $mail->addAttachment('images/phpmailer_mini.png');
            //send the message, check for errors

            if (!$mail->send()) {
                // $errors[] = 'Sorry, could not send email. Try again later.';
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                //redirect us back to contact.php
                header('Location: contact.php');
                die();
            }

        }
        $thankYou = 'Hey ' .$fields['first_name']. '! Thanks for contacting me. I will respond to you as soon as I can.'; 

        //preserve the formatting <pre>
        // echo '<pre>', print_r($errors), '</pre>';
        // kills the page
        // die();
    } else {
        $errors[] = 'something went wrong';
    }
    //where we will store the messages taht were created from our if statmnet
    $_SESSION['errors'] = $errors;
    //so the user wont lose their data if they've made  amistake and want to resend the data
    $_SESSION['fields'] = $fields;
    $_SESSION['thanks'] = $thankYou;

    header('Location: contact.php');

    //if the user inputs a wonky email address, it will return an invalid address from the root@localhost as well as the mailereerror comignf from linne 70