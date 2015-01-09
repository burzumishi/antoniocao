<?php 
//GET FIELDS FROM YOUR HTML FORM, THE NAME PROPERTY IS PASSED IN THE $_POST ARRAY
//E.G IF YOU HAVE A FIELD WITH name="email" YOU'LL GET THE VALUE IN PHP SCRIPT
//LIKE BELOW
$email = $_POST['email'];
$name = $_POST['name'];
$message = $_POST['message'];

// EDIT THE 2 LINES BELOW AS REQUIRED
$send_email_to = "antoniocao000@gmail.com";
$email_subject = "Portfolio received an email from ".$name." (".$email.")!";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From: ".$email. "\r\n";

/*Customize your text message here*/  
$text = "<strong>Email = </strong>".$email."<br>";
$text .= "<strong>Name = </strong>".$name."<br><br>";  

if(!empty($message)) {
    $text .= "Sender did not write any message for you!<br>";
} else {
    $text .= $message."<br>";
}

@mail($send_email_to, $email_subject, $text, $headers);
 
header('Content-type: text/json');
$return_array['success'] = '1';
echo json_encode($return_array);
die();
?>

