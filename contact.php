<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';   // Composer autoloader
require __DIR__ . '/db.php';                // DB connection

$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name']);
    $email   = trim($_POST['email']);
    $phone   = trim($_POST['phone']);
    $request = trim($_POST['request']);
    $message = trim($_POST['message']);

    if (empty($name)) $errors[] = "Name is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
    if (empty($phone)) $errors[] = "Phone is required.";
    if (empty($request)) $errors[] = "Request type is required.";
    if (empty($message)) $errors[] = "Message is required.";

    if (empty($errors)) {
        // Insert into DB
        $stmt = $conn->prepare("INSERT INTO contacts (name,email,phone,request_type,message,status,created_at) VALUES (?, ?, ?, ?, ?, 'new', NOW())");
        if($stmt){
            $stmt->bind_param("sssss", $name, $email, $phone, $request, $message);
            if ($stmt->execute()) {
                // Auto-reply to user
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username = 'uroobasaleem572@gmail.com';
            $mail->Password = 'fmuf dnnk totu mlse'; // Gmail App Password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    $mail->setFrom('your_smtp_email@gmail.com', 'CARE Support'); 
                    $mail->addAddress($email, $name);

                    $mail->isHTML(true);
                    $mail->Subject = "We Received Your Message - CARE Team";
                    $mail->Body = "
                        <h3>Hello {$name},</h3>
                        <p>Thank you for contacting CARE. We've received your message and will respond as soon as possible.</p>
                        <hr>
                        <p><b>Your Request:</b> {$request}</p>
                        <p><b>Message:</b><br>{$message}</p>
                        <br>
                        <p>Best regards,<br>CARE Support Team</p>
                    ";
                    $mail->send();

                    $success = "Your message has been sent successfully! Check your inbox for confirmation.";
                } catch (Exception $e) {
                    $errors[] = "Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                $errors[] = "Database Error: " . $stmt->error;
            }
        } else {
            $errors[] = "Database Error: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CARE - Contact Us</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
:root{--brand:#10b981;--brand-dark:#0ea5e9;--bg:#f8fafc;--surface:#fff;--muted:#64748b;--radius:12px;--shadow:0 10px 35px rgba(2,8,23,0.06)}
body{font-family:'Inter',sans-serif;background:var(--bg);margin:0;color:#0f172a;}
.page-title{text-align:center;font-size:2.5rem;font-weight:700;background:linear-gradient(90deg,var(--brand),var(--brand-dark));-webkit-background-clip:text;-webkit-text-fill-color:transparent;margin-bottom:2rem;}
.contact-card{background:var(--surface);border-radius:var(--radius);box-shadow:var(--shadow);padding:2rem;max-width:700px;margin:auto;}
.contact-info{max-width:700px;margin:auto;margin-bottom:2rem;text-align:center;color:var(--muted);}
.form-control,.form-select,.btn{border-radius:8px;}
.btn-brand{background:linear-gradient(90deg,var(--brand),var(--brand-dark));color:#fff;font-weight:600;border:none;transition: transform .2s ease, box-shadow .2s ease;}
.btn-brand:hover{transform:scale(1.05);box-shadow:0 4px 15px rgba(16,185,129,0.3);}
.alert-custom{max-width:700px;margin:1rem auto;border-radius:var(--radius);box-shadow:var(--shadow);}
</style>
</head>
<body>
<?php include "navbar.php"; ?>

<div class="container py-5">
<h1 class="page-title">Contact CARE</h1>

<div class="contact-info">
<p>We’re here to help! Reach out to us for donations, support, feedback, or any inquiries. Our team will respond promptly.</p>
<p><i class="bi bi-geo-alt-fill"></i> 123 CARE Street, City, Country | <i class="bi bi-telephone-fill"></i> +92 300 1234567 | <i class="bi bi-envelope-fill"></i> info@care.org</p>
</div>

<?php if (!empty($errors)): ?>
<div class="alert alert-danger alert-custom">
<?php foreach ($errors as $e) echo "<div>$e</div>"; ?>
</div>
<?php endif; ?>

<?php if (!empty($success)): ?>
<div class="alert alert-success alert-custom"><?= $success ?></div>
<?php endif; ?>

<div class="contact-card">
<form method="post">
  <div class="mb-3">
    <label class="form-label">Full Name</label>
    <input type="text" name="name" class="form-control" placeholder="John Doe" required pattern="^[A-Za-z\s]{2,}$" title="Name should contain only letters and spaces.">
  </div>
  <div class="mb-3">
    <label class="form-label">Email Address</label>
    <input type="email" name="email" class="form-control" placeholder="john@gmail.com" required pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$" title="Please enter a valid Gmail address.">
  </div>
  <div class="mb-3">
    <label class="form-label">Phone</label>
    <input type="tel" name="phone" class="form-control" placeholder="+92 300 1234567" required pattern="^[0-9+\-\s()]{7,20}$" title="Phone should only contain numbers, spaces, or + - ( )">
  </div>
  <div class="mb-3">
    <label class="form-label">Type of Request</label>
    <select name="request" class="form-select" required>
      <option value="">--Select--</option>
      <option value="donation">Donation</option>
      <option value="support">Support</option>
      <option value="feedback">Feedback</option>
      <option value="general">General Inquiry</option>
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Message</label>
    <textarea name="message" rows="5" class="form-control" placeholder="Write your message here..." required></textarea>
  </div>
  <button type="submit" class="btn btn-brand w-100">Send Message <i class="bi bi-send ms-2"></i></button>
</form>
</div>
<?php include "footer.php"; ?>
</body>
</html>