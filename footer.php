<?php
// footer.php
require __DIR__ . "/db.php";

// Fetch settings row
$settings = $conn->query("SELECT * FROM settings WHERE id=1")->fetch_assoc();

$siteName   = $settings['site_title'] ?? "CARE - Your Health";
$siteDesc   = $settings['site_description'] ?? "Your trusted clinic system where health meets care.";
$siteEmail  = $settings['clinic_email'] ?? "admin@care.com";
$sitePhone  = $settings['clinic_phone'] ?? "+923152916858";
$siteAddr   = $settings['clinic_address'] ?? "123 Health Street, Karachi, Pakistan";

$facebook   = $settings['facebook'] ?? "#";
$twitter    = $settings['twitter'] ?? "#";
$instagram  = $settings['instagram'] ?? "#";
$linkedin   = $settings['linkedin'] ?? "#";
$whatsapp   = $settings['whatsapp'] ?? "";
?>

<footer class="footer mt-5 text-white">
  <div class="container py-5">
    <div class="row g-4">
      
      <!-- Logo / About -->
      <div class="col-md-4">
        <h4 class="fw-bold d-flex align-items-center">
          <i class="bi bi-heart-pulse-fill me-2 text-brand"></i>CARE
        </h4>
        <p class="text-light small">
          <?= htmlspecialchars($siteName); ?> — <?= nl2br(htmlspecialchars($siteDesc)); ?>
        </p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-2">
        <h6 class="fw-semibold">Quick Links</h6>
        <ul class="list-unstyled small">
          <li><a href="index.php" class="footer-link">Home</a></li>
          <li><a href="how.php" class="footer-link">How it works</a></li>
          <li><a href="story.php" class="footer-link">Stories</a></li>
          <li><a href="services.php" class="footer-link">Services</a></li>
          <li><a href="about.php" class="footer-link">About</a></li>
          <li><a href="contact.php" class="footer-link">Contact</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="col-md-3">
        <h6 class="fw-semibold">Contact Us</h6>
        <p class="small mb-1"><i class="bi bi-geo-alt me-2"></i><?= htmlspecialchars($siteAddr); ?></p>
        <p class="small mb-1"><i class="bi bi-telephone me-2"></i>
          <a href="tel:<?= preg_replace('/\D/','',$sitePhone); ?>" class="footer-link"><?= $sitePhone; ?></a>
        </p>
        <p class="small"><i class="bi bi-envelope me-2"></i>
          <a href="mailto:<?= $siteEmail; ?>" class="footer-link"><?= $siteEmail; ?></a>
        </p>
      </div>

      <!-- Social -->
      <div class="col-md-3">
        <h6 class="fw-semibold">Follow Us</h6>
        <div class="d-flex gap-3 mt-2">
          <a href="<?= htmlspecialchars($facebook); ?>" target="_blank" class="social-link"><i class="bi bi-facebook"></i></a>
          <a href="<?= htmlspecialchars($twitter); ?>" target="_blank" class="social-link"><i class="bi bi-twitter-x"></i></a>
          <a href="<?= htmlspecialchars($instagram); ?>" target="_blank" class="social-link"><i class="bi bi-instagram"></i></a>
          <a href="<?= htmlspecialchars($linkedin); ?>" target="_blank" class="social-link"><i class="bi bi-linkedin"></i></a>
          <a href="https://wa.me/<?= htmlspecialchars(preg_replace('/\D/','',$whatsapp)); ?>" target="_blank" class="social-link"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>

    </div>
  </div>

  <!-- Bottom Bar -->
  <div class="footer-bottom py-3 text-center small">
    <div class="container">
      <span>&copy; <?= date("Y"); ?> CARE Clinic. All Rights Reserved.</span>
      <br>
      <span class="text-muted">Powered by CARE Health System</span>
    </div>
  </div>
</footer>

<!-- Styles -->
<style>
.footer {
  background: linear-gradient(180deg, #0ea5e9, #10b981);
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  box-shadow: 0 -4px 20px rgba(0,0,0,0.1);
}
.footer h6, .footer h4 { color: #fff; }
.footer-link {
  color: rgba(255,255,255,0.85);
  text-decoration: none;
}
.footer-link:hover { color: #fff; text-decoration: underline; }
.social-link {
  color: #fff;
  font-size: 1.2rem;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 38px; height: 38px;
  border-radius: 50%;
  background: rgba(255,255,255,0.15);
  transition: all 0.3s;
}
.social-link:hover { background:#fff; color:#10b981; }
.footer-bottom {
  background: rgba(0,0,0,0.1);
  color: #fff;
}
.text-brand { color: #fff; }
</style>
