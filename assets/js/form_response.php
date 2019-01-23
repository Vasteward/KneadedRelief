<?php 
/*    $subject = $_POST['subject'];
    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name'];
    $comment = $_POST['comment'];
    $number = $_POST['phone'];
    $email = $_POST['email'];

?>

<?php 
    $personal_email = "evansm29@gmail.com";
    $email_subject = "New From Submission";
    $email_body = "Aloha, lady!\n You have received a new message from $f_name $l_name about $subject.\n Message: $comment.\n They can be reached via email or phone:\n email: $email\n phone: "

?>


<?php
$subject = $_POST['subject'];
$f_name = $_POST['first_name'];
$l_name = $_POST['last_name'];
$comment = $_POST['comment'];
$number = $_POST['phone'];
$email = $_POST['email'];
?>

<?php 
$personal_email = "evansm29@gmail.com";
$myEmail = "vinci.allensteward@gmail.com";
$email_subject = "New From Submission";
$email_body = "Aloha, lady!\n You have received a new message from $f_name $l_name about $subject.\n Message: $comment.\n They can be reached via email or phone:\n email: $email\n phone: "
?>
*/
?>

<?php>
    //if condition sees if the posted data for the variable s are all se
    //isset() is a function
    //checking for a post method, called 
    if(isset($_POST['s']) && isset($_POST['fn']) && isset($_POST['ln'])&& isset($_POST['m'])&& isset($_POST['p']) && isset($_POST['e'])&& isset($_POST['pPref'])&& isset($_POST['ePref']) ){
    // create local php variables for our variables we want to utilize form the form 
    $subject = $_POST['s'];
    $f_name = $_POST['fn']; //use preg-replace() to filter the data to ensure that it is good data(ie no numbers)
    $l_name = $_POST['ln'];
    // nl2br is a function that turns any new lines the user puts into the comment box and turns them into break tags, <br>; changes new lines into break tags, which helps us preserve any new lines they placed
    $comment = nl2br($_POST['m']);
    $number = $_POST['p'];
    $email = $_POST['e'];
    $phonePref = $_POST['pPref'];
    $emailPref = $_POST['ePref'];

    //creates te to variable, whoever we want ot send the message to
    $to = "vinci.allensteward@gmail.com";
    $from = $e;
    $intro = 'Aloha lady!'
    $message = '<h3>Name:</h3>' .$f_name. .$l_name. '<br><h3>Subject:</h3>' .$subject. '<br><h3>Email Address:</h3>' .$email. '<br><h3>Phone number:</h3>'.$number. '<br><h3>Communication preference:</h3>' .$phonePref. .$emailPref. '<br><p>Message:' .$comment'</p>';
    //specify who the email is from
    $headers = "From: $from\n";
    $headers = "MIME-Version: 1.0\n";
    //states that we are sending an html formatted email; we can use any html elements in the message
    $headers = "Content-type: text/html; charset=iso-8859-1\n";
    //mail send the email
    if(mail($to, $intro, $message, $headers)){
        echo "success";
        header("Location: index.php?mailsend");
    } else {
        echo "The server failed to send the message. Please try again later.";
    }
}
?>


<?php
    echo 'Hello All'
?>