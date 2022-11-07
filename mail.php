<?php

$date = date("D M j G:i:s T Y");
$subject = urldecode($_GET["action"]);
$name = urldecode($_GET["name"]);
$email = urldecode($_GET["email"]);
$mobile = urldecode($_GET["mobile"]);
$company = urldecode($_GET["company"]);
$game = urldecode($_GET["game"]);
$comments = urldecode($_GET["comments"]);

$tomail = urldecode($_GET["tomail"]);
$fromsite = urldecode($_GET["fromsite"]);

$message = "----------------------------\ndate: $date\naction: $subject\nname: $name\nemail: $email\nmobile: $mobile\ncompany: $company\ngame\n: $game\ncomments: $comments\n";

$f = fopen("mail.txt", "a") or die("Unable to open file!");

fwrite($f, $message);

$headers = array(
    "Reply-To" => $tomail,
    "X-Mailer" => "PHP/" . phpversion()
);

$email_from = "info@agilesimulations.co.uk";
ini_set("SMTP", "websmtp.livemail.co.uk");
ini_set("sendmail_from", "$email_from");

if (!empty($comments)) {
  mail($tomail, $subject, $message, $headers, '-f'.$email_from);
}

?>
