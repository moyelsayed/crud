<?php
session_start();
include('dbcon.php');
// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Database connection
$conn = mysqli_connect("localhost","root","","loginsystem");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to send email
function sendEmail($email, $event_date) {
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'midoprof92@gmail.com';
        $mail->Password   = 'dtlxhsszlarrxfpb';
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom("midoprof92@gmail.com", "Event Notification");
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Event Reminder';
        $mail->Body    = "Reminder: You have an event on " . $event_date;

        $mail->send();
        echo 'Message has been sent to ' . $email . '<br>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Today's date
$today = new DateTime();

// Query to fetch all events
$sql = "SELECT * FROM events";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $event_date = new DateTime($row['event_date']);
        $diff = $today->diff($event_date)->days;
        $sendEmail = false;

        switch ($row['event_period']) {
            case '1 tag':
                if ($diff == 1) $sendEmail = true;
                break;
            case '2 tage':
                if ($diff == 2) $sendEmail = true;
                break;
            case '4 tage':
                if ($diff == 4) $sendEmail = true;
                break;
            case '1 woche':
                if ($diff == 7) $sendEmail = true;
                break;
            case '2 wochen':
                if ($diff == 14) $sendEmail = true;
                break;
        }

        if ($sendEmail) {
            sendEmail($row['event_email'], $row['event_date']);
        }
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
