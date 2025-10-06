<?php
session_start();

// Determine user info for the theme
$pname = $_SESSION['name'] ?? 'User';
$role = $_SESSION['role'] ?? 'user';

// Handle logout
if (isset($_POST['confirm_logout'])) {
    session_unset();
    session_destroy();
    header("Location: /care/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logout | CARE</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<style>
:root{
    --brand:#10b981;
    --brand2:#0ea5e9;
    --bg:#f8fafc;
    --surface:#fff;
    --muted:#64748b;
    --radius:12px;
    --shadow:0 10px 35px rgba(2,8,23,0.06);
}
body{font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial;background:var(--bg);margin:0;color:#0f172a;}
.card-logout{background:var(--surface);border-radius:var(--radius);box-shadow:var(--shadow);padding:40px;text-align:center;max-width:450px;margin:auto;margin-top:10vh;}
.btn-logout{background:linear-gradient(90deg,var(--brand),var(--brand2));color:#fff;border:none;border-radius:999px;padding:10px 25px;margin-right:10px;}
.btn-cancel{border-radius:999px;padding:10px 25px;border:1px solid var(--muted);color:var(--muted);}
.logout-icon{font-size:60px;color:var(--brand);margin-bottom:20px;}
@media(max-width:500px){
    .card-logout{padding:25px;margin-top:5vh;}
    .btn-logout,.btn-cancel{width:100%;margin:5px 0;}
}
</style>
</head>
<body>

<div class="card-logout text-center">
    <div class="logout-icon"><i class="fa fa-power-off"></i></div>
    <h3>Hello, <?= htmlspecialchars($pname) ?>!</h3>
    <p>Are you sure you want to log out from your <strong><?= htmlspecialchars(ucfirst($role)) ?></strong> account?</p>
    <form method="POST" class="d-flex justify-content-center flex-wrap mt-3">
        <button type="submit" name="confirm_logout" class="btn btn-logout">Yes, Logout</button>
        <a href="javascript:history.back()" class="btn btn-cancel">Cancel</a>
    </form>
</div>

</body>
</html>
