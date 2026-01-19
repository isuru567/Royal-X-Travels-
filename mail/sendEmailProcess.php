<?php

require "../mail/SMTP.php";
require "../mail/PHPMailer.php";
require "../mail/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Sanitize function for clean and protect user inputs
function sanitizeInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = sanitizeInput($_POST['first-name'] ?? '');
    $lastname = sanitizeInput($_POST['last-name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $phone = sanitizeInput($_POST['phone'] ?? '');
    $subject = sanitizeInput($_POST['subject'] ?? '');
    $message = sanitizeInput($_POST['message'] ?? '');
    $errors = [];

    if (empty($firstname)) $errors[] = "First First Name is required";

    if (empty($lastname)) $errors[] = "Last Last Name is required";

    if (empty($email)) $errors[] = "Email is required";
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format";

    if (empty($phone)) {
        $errors[] = "Mobile is required";
    } elseif (!preg_match('/^\d{10}$/', $phone)) {
        $errors[] = "Mobile should be a 10-digit number";
    }

    if (empty($subject)) $errors[] = "Subject is required";

    if (empty($message)) $errors[] = "Message is required";

    if (!empty($errors)) {
        echo $errors[0];
        exit;
    }


    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'maheeshanethmika5@gmail.com';
        $mail->Password = 'uwmp ybuo kjpb tzjv';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // -------------------------
        //  Send email to YOU
        // -------------------------
        $mail->setFrom('maheeshanethmika5@gmail.com', 'New Client Message');
        $mail->addReplyTo($email, $firstname . ' ' . $lastname);
        $mail->addAddress($email, $firstname . ' ' . $lastname);
        $mail->addAddress('uriboyka450@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'New Client Message';
        $mail->Body = "
            <div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; border: 1px solid #eee; border-radius: 10px; overflow: hidden;'>
    <div style='background: #1a1a1a; padding: 20px; text-align: center; color: #ffffff;'>
        <h2 style='margin: 0;'>New Inquiry Received</h2>
    </div>
    <div style='padding: 20px; background: #f9f9f9;'>
        <table style='width: 100%; border-collapse: collapse;'>
            <tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong>Client Name:</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$firstname} {$lastname}</td></tr>
            <tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong>Email:</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$email}</td></tr>
            <tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong>Phone:</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$phone}</td></tr>
            <tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong>Subject:</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$subject}</td></tr>
        </table>
        <div style='margin-top: 20px; padding: 15px; background: #fff; border-left: 4px solid #d9534f;'>
            <p style='margin: 0; font-weight: bold;'>Message:</p>
            <p style='color: #555;'>{$message}</p>
        </div>
    </div>
    <div style='background: #eee; padding: 10px; text-align: center; font-size: 12px; color: #777;'>
        Sent from Royal-X Travel Website Contact Form
    </div>
</div>
        ";

        if (!$mail->send()) {
            echo 'Service Unavailable. Please try again later';
            exit;
        }

        // -------------------------
        // Auto-reply to CUSTOMER
        // -------------------------
        $mail->clearAddresses();
        $mail->addReplyTo($email, $firstname . ' ' . $lastname);
        $mail->addAddress($email, $firstname . ' ' . $lastname);
        $mail->Subject = 'Thank You for Contacting Us!';
        $mail->Body = "
           <div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; border-radius: 10px; overflow: hidden; border: 1px solid #d4d4d4;'>
    <div style='background: linear-gradient(to right, #d9534f, #b52b27); padding: 30px; text-align: center; color: white;'>
        <h1 style='margin: 0;'>Thank You!</h1>
        <p style='font-size: 16px;'>We've received your message</p>
    </div>
    <div style='padding: 30px; line-height: 1.6; color: #333;'>
        <p>Hi <strong>{$firstname}</strong>,</p>
        <p>Thank you for reaching out to <strong>Royal-X Travel</strong>. We are excited to help you plan your next adventure!</p>
        <p>Our team is currently reviewing your inquiry regarding <b>'{$subject}'</b> and will get back to you within the next 24 hours.</p>
        
        <div style='text-align: center; margin: 30px 0;'>
            <a href='#' style='background: #d9534f; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold;'>Visit Our Website</a>
        </div>
        
        <p>Talk to you soon!<br>Best Regards,<br><strong>Team Royal-X Travel</strong></p>
    </div>
    <div style='background: #f4f4f4; padding: 20px; text-align: center; font-size: 12px; color: #999;'>
        Follow us on our social media for latest travel updates.<br>
        &copy; 2024 Royal-X Travel. All rights reserved.
    </div>
</div>
        ";

        
        if ($mail->send()) {
            echo 'Message Sent Successfully';
            exit;
        } else {
            echo 'Auto-reply failed, but your message was received.';
            exit;
        }
    } catch (Exception $e) {
        echo 'Service Unavailable. Please try again later';
        //  This for debugging only:
        // echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }
}
