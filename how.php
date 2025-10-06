<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CARE — How It Works</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
/* =========================================
   THEME VARIABLES
   ========================================= */
:root {
  --bg: #f7fafc;
  --surface: #ffffff;
  --ink: #0f172a;
  --muted: #64748b;
  --brand: #10b981;        /* Main green */
  --brand-dark: #0ea371;   /* Darker shade */
  --brand-light: #34d399;  /* Lighter shade */
  --brand-2: #0ea5e9;      /* Blue accent */
  --accent: #06b6d4;
  --ok: #22c55e;
  --warn: #f59e0b;
  --error: #ef4444;
  --ring: rgba(16, 185, 129, 0.35);
  --shadow: 0 10px 35px rgba(2, 8, 23, 0.08);

  --font-primary: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial;
  --font-heading: 'Plus Jakarta Sans', Inter, sans-serif;

  --radius-sm: 0.5rem;
  --radius-md: 0.75rem;
  --radius-lg: 1rem;
  --radius-xl: 1.5rem;
  --btn-text: #ffffff;
}

/* Dark Mode */
@media (prefers-color-scheme: dark) {
  :root {
    --bg: #0f172a;
    --surface: #1e293b;
    --ink: #f8fafc;
    --muted: #94a3b8;
    --shadow: 0 10px 35px rgba(255, 255, 255, 0.05);
  }
}

/* =========================================
   RESET & BASE
   ========================================= */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

html { scroll-behavior: smooth; scroll-padding-top: 80px; }
body {
  min-height: 100vh;
  font-family: var(--font-primary);
  line-height: 1.6;
  color: var(--ink);
  background:
    radial-gradient(1200px 600px at 10% -10%, rgba(16, 185, 129, 0.08), transparent 50%),
    radial-gradient(1000px 500px at 110% 10%, rgba(14, 165, 233, 0.08), transparent 50%),
    var(--bg);
}

/* Typography */
h1,h2,h3,h4,h5,h6 { font-family: var(--font-heading); font-weight:700; color: var(--ink); }
.hero h1 { font-weight: 900; font-size: clamp(2rem,5vw+1rem,3.5rem); letter-spacing:-0.02em; }
.sub { color: var(--muted); max-width: 56ch; }
.eyebrow { text-transform: uppercase; letter-spacing:0.14em; font-weight:700; color:var(--brand); font-size:0.875rem; }



/* =========================================
   BUTTONS
   ========================================= */
.btn {
  display: inline-flex; align-items:center; justify-content:center;
  gap:0.5rem; font-weight:600; text-decoration:none;
  border-radius:25px; transition:all 0.3s ease;
  border:1px solid transparent; cursor:pointer; white-space:nowrap;
}
.btn:disabled { opacity:0.65; cursor:not-allowed; pointer-events:none; }

/* Primary button */
.btn-care {
  background-color: var(--brand) !important;
  border-color: var(--brand) !important;
  color: var(--btn-text) !important;
}
.btn-care:hover {
  background-color: var(--brand-dark) !important;
  border-color: var(--brand-dark) !important;
  color: var(--btn-text) !important;
  box-shadow: 0 4px 12px rgba(16,185,129,0.3);
}
/* Outline button */
.btn-outline-care {
  color: var(--brand) !important;
  border-color: var(--brand) !important;
}
.btn-outline-care:hover {
  background-color: var(--brand) !important;
  color: #fff !important;
}

/* =========================================
   COMPONENTS
   ========================================= */
.hero { background: linear-gradient(180deg, rgba(16,185,129,.06), rgba(14,165,233,.04)); }
.card-soft {
  background: var(--surface); border:1px solid rgba(15,23,42,0.08);
  border-radius: var(--radius-lg); box-shadow: var(--shadow);
}
.step-index {
  width:42px; height:42px; border-radius:50%; display:grid; place-items:center;
  font-weight:700; color:#fff; background: var(--brand); 
  box-shadow: 0 6px 18px rgba(16,185,129,.35);
}
.icon-wrap {
  width:56px; height:56px; border-radius:14px; display:grid; place-items:center;
  background: #ecfdf5; color: var(--brand);
}
.stat {
  border-radius: var(--radius-md); background: var(--surface);
  border:1px solid rgba(15,23,42,0.08); box-shadow: var(--shadow);
}
.timeline{position:relative;}
.timeline::before{
  content:""; position:absolute; left:28px; top:0; bottom:0; width:3px;
  background: linear-gradient(180deg, var(--brand), var(--brand-2)); opacity:.25;
}
.t-dot{
  width:16px; height:16px; border:3px solid #fff;
  background: var(--brand); border-radius:50%; box-shadow:0 0 0 4px rgba(16,185,129,.15);
}
.faq .accordion-button{ border-radius: var(--radius-md) !important; font-weight:600; }
.trust-badges img{filter: grayscale(100%); opacity:.7; transition: .2s}
.trust-badges img:hover{filter:none; opacity:1}

  </style>
</head>
<body>
  <?php include "navbar.php"; ?>
  <!-- HERO -->
  <section class="hero py-5 py-lg-6">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-lg-7">
          <span class="hero-badge mb-3"><i class="bi bi-shield-check"></i> Safe, simple & reliable care</span>
          <h1 class="display-5 fw-bold mb-3">How CARE Works</h1>
          <p class="lead text-secondary mb-4">From booking to follow‑up—see the full journey in 5 clear steps. No confusing forms. No long waits. Just quality care when you need it.</p>
          
          <div class="row g-3 mt-4">
            <div class="col-6 col-md-4">
              <div class="stat p-3 text-center">
                <div class="fs-3 fw-bold">4.9</div>
                <div class="small text-secondary">Average rating</div>
              </div>
            </div>
            <div class="col-6 col-md-4">
              <div class="stat p-3 text-center">
                <div class="fs-3 fw-bold">24/7</div>
                <div class="small text-secondary">Support</div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="stat p-3 text-center">
                <div class="fs-3 fw-bold">10k+</div>
                <div class="small text-secondary">Patients served</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card-soft p-4">
            <div class="d-flex align-items-center gap-3 mb-3">
              <div class="icon-wrap"><i class="bi bi-journal-medical fs-4"></i></div>
              <div>
                <div class="fw-bold">Quick Booking</div>
                <div class="text-secondary small">60-second appointment request</div>
              </div>
            </div>
            <hr/>
            <ul class="list-unstyled m-0">
              <li class="d-flex align-items-start gap-3 mb-3"><i class="bi bi-check-circle mt-1"></i><span>Verified doctors & secure records</span></li>
              <li class="d-flex align-items-start gap-3 mb-3"><i class="bi bi-check-circle mt-1"></i><span>In‑clinic & telehealth options</span></li>
              <li class="d-flex align-items-start gap-3"><i class="bi bi-check-circle mt-1"></i><span>Transparent pricing—no surprises</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- STEPS -->
  <section id="steps" class="py-5">
    <div class="container">
      <div class="text-center mb-4">
        <span class="badge text-bg-light border">5 simple steps</span>
        <h2 class="fw-bold mt-2">Your Care Journey</h2>
        <p class="text-secondary">Follow these steps from signup to recovery.</p>
      </div>

      <div class="row g-4">
        <!-- Step 1 -->
        <div class="col-md-6 col-lg-4">
          <div class="card-soft p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div class="icon-wrap"><i class="bi bi-person-plus"></i></div>
              <div class="step-index">1</div>
            </div>
            <h5 class="fw-bold mb-2">Create your account</h5>
            <p class="text-secondary">Sign up with basic details. Your data is encrypted end‑to‑end for privacy.</p>
          </div>
        </div>
        <!-- Step 2 -->
        <div class="col-md-6 col-lg-4">
          <div class="card-soft p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div class="icon-wrap"><i class="bi bi-clipboard2-pulse"></i></div>
              <div class="step-index">2</div>
            </div>
            <h5 class="fw-bold mb-2">Tell us your need</h5>
            <p class="text-secondary">Describe symptoms or upload reports. We triage to the right specialty.</p>
          </div>
        </div>
        <!-- Step 3 -->
        <div class="col-md-6 col-lg-4">
          <div class="card-soft p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div class="icon-wrap"><i class="bi bi-calendar2-check"></i></div>
              <div class="step-index">3</div>
            </div>
            <h5 class="fw-bold mb-2">Book & confirm</h5>
            <p class="text-secondary">Choose a slot for clinic visit or video call. Instant confirmation & reminders.</p>
          </div>
        </div>
        <!-- Step 4 -->
        <div class="col-md-6 col-lg-4">
          <div class="card-soft p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div class="icon-wrap"><i class="bi bi-person-heart"></i></div>
              <div class="step-index">4</div>
            </div>
            <h5 class="fw-bold mb-2">Consult the doctor</h5>
            <p class="text-secondary">Meet your specialist. Get a diagnosis, prescription, and next steps.</p>
          </div>
        </div>
        <!-- Step 5 -->
        <div class="col-md-6 col-lg-4">
          <div class="card-soft p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div class="icon-wrap"><i class="bi bi-emoji-smile"></i></div>
              <div class="step-index">5</div>
            </div>
            <h5 class="fw-bold mb-2">Ongoing care</h5>
            <p class="text-secondary">Access care plan, order tests, and chat with support—anytime.</p>
          </div>
        </div>
        <!-- Step 6 (optional add-on) -->
        <div class="col-md-6 col-lg-4">
          <div class="card-soft p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <div class="icon-wrap"><i class="bi bi-shield-lock"></i></div>
              <div class="step-index"><i class="bi bi-plus-lg"></i></div>
            </div>
            <h5 class="fw-bold mb-2">Secure records</h5>
            <p class="text-secondary">All prescriptions & reports stored safely for future visits.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- TIMELINE / PROCESS DETAIL -->
  <section class="py-5 bg-white">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-6">
          <h3 class="fw-bold mb-3">From first click to follow‑up</h3>
          <p class="text-secondary mb-4">Here is what happens behind the scenes after you book with CARE.</p>

          <div class="timeline ps-5">
            <div class="d-flex gap-3 mb-4 align-items-start">
              <div class="t-dot mt-1"></div>
              <div>
                <h6 class="fw-semibold mb-1">Smart triage</h6>
                <p class="text-secondary mb-0">Our system checks your symptoms and suggests the right department.</p>
              </div>
            </div>
            <div class="d-flex gap-3 mb-4 align-items-start">
              <div class="t-dot mt-1" style="background:var(--care-accent)"></div>
              <div>
                <h6 class="fw-semibold mb-1">Doctor matching</h6>
                <p class="text-secondary mb-0">We match you with verified specialists based on experience & ratings.</p>
              </div>
            </div>
            <div class="d-flex gap-3 mb-4 align-items-start">
              <div class="t-dot mt-1"></div>
              <div>
                <h6 class="fw-semibold mb-1">Pre‑visit checklist</h6>
                <p class="text-secondary mb-0">Reminders, required documents, and tests (if any) are shared via app/email.</p>
              </div>
            </div>
            <div class="d-flex gap-3 mb-4 align-items-start">
              <div class="t-dot mt-1" style="background:var(--care-accent)"></div>
              <div>
                <h6 class="fw-semibold mb-1">Consultation</h6>
                <p class="text-secondary mb-0">In‑clinic or video. Your notes and prescription are added to your profile.</p>
              </div>
            </div>
            <div class="d-flex gap-3 align-items-start">
              <div class="t-dot mt-1"></div>
              <div>
                <h6 class="fw-semibold mb-1">Follow‑up & support</h6>
                <p class="text-secondary mb-0">Chat with support, book tests, and manage refills directly from CARE.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="row g-3">
            <div class="col-12">
              <div class="card-soft p-4 h-100">
                <div class="d-flex align-items-center gap-3 mb-2"><i class="bi bi-shield-check fs-4 text-success"></i><h6 class="m-0">Quality & Trust</h6></div>
                <p class="text-secondary m-0">All doctors are verified. We follow HIPAA‑inspired best practices and use SSL for secure data transfer.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-soft p-4 h-100">
                <div class="d-flex align-items-center gap-3 mb-2"><i class="bi bi-cash-coin fs-4"></i><h6 class="m-0">Transparent pricing</h6></div>
                <p class="text-secondary m-0">See fees before booking. No hidden charges.</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-soft p-4 h-100">
                <div class="d-flex align-items-center gap-3 mb-2"><i class="bi bi-clock-history fs-4"></i><h6 class="m-0">On‑time reminders</h6></div>
                <p class="text-secondary m-0">Auto reminders for appointments and medicines.</p>
              </div>
            </div>
            <div class="col-12 trust-badges text-center">
              <div class="d-flex flex-wrap justify-content-center align-items-center gap-4 py-2">
                <img src="https://dummyimage.com/120x40/ffffff/aaa.png&text=ISO+27001" alt="ISO" width="120" height="40" loading="lazy">
                <img src="https://dummyimage.com/120x40/ffffff/aaa.png&text=PCI+Ready" alt="PCI" width="120" height="40" loading="lazy">
                <img src="https://dummyimage.com/120x40/ffffff/aaa.png&text=Trusted+Clinic" alt="Clinic" width="120" height="40" loading="lazy">
              </div>
              <div class="small text-secondary">Trusted by clinics & patients nationwide</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- BENEFITS -->
  <section id="benefits" class="py-5">
    <div class="container">
      <div class="text-center mb-4">
        <span class="badge text-bg-light border">Why CARE</span>
        <h2 class="fw-bold mt-2">Benefits at a glance</h2>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <div class="card-soft p-4 h-100 text-center">
            <i class="bi bi-phone fs-2 mb-2"></i>
            <h6 class="fw-semibold">Book in 60 seconds</h6>
            <p class="text-secondary small m-0">Simple flow on web & mobile.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="card-soft p-4 h-100 text-center">
            <i class="bi bi-people fs-2 mb-2"></i>
            <h6 class="fw-semibold">Top specialists</h6>
            <p class="text-secondary small m-0">Verified profiles & ratings.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="card-soft p-4 h-100 text-center">
            <i class="bi bi-shield-lock fs-2 mb-2"></i>
            <h6 class="fw-semibold">Data security</h6>
            <p class="text-secondary small m-0">Best‑practice encryption.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="card-soft p-4 h-100 text-center">
            <i class="bi bi-headset fs-2 mb-2"></i>
            <h6 class="fw-semibold">24/7 support</h6>
            <p class="text-secondary small m-0">We’re here whenever you need us.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section id="faq" class="py-5 bg-white faq">
    <div class="container">
      <div class="row g-4 align-items-start">
        <div class="col-lg-5">
          <h3 class="fw-bold mb-2">Frequently asked questions</h3>
          <p class="text-secondary">Quick answers to common doubts about booking, payments, and telehealth.</p>
        </div>
        <div class="col-lg-7">
          <div class="accordion" id="faqAcc">
            <div class="accordion-item border-0 mb-3 card-soft">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f1">
                  Do I need to pay before the visit?
                </button>
              </h2>
              <div id="f1" class="accordion-collapse collapse" data-bs-parent="#faqAcc">
                <div class="accordion-body">You only pay the consultation fee to confirm your slot. Any extra lab tests are optional and shown transparently.</div>
              </div>
            </div>
            <div class="accordion-item border-0 mb-3 card-soft">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f2">
                  Can I reschedule my appointment?
                </button>
              </h2>
              <div id="f2" class="accordion-collapse collapse" data-bs-parent="#faqAcc">
                <div class="accordion-body">Yes. You can reschedule up to 2 hours before the visit without any extra charge.</div>
              </div>
            </div>
            <div class="accordion-item border-0 mb-3 card-soft">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f3">
                  How are my medical records stored?
                </button>
              </h2>
              <div id="f3" class="accordion-collapse collapse" data-bs-parent="#faqAcc">
                <div class="accordion-body">Your records are encrypted and can only be accessed by you and your doctor. You can download them anytime.</div>
              </div>
            </div>
            <div class="accordion-item border-0 card-soft">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#f4">
                  Do you offer telemedicine?
                </button>
              </h2>
              <div id="f4" class="accordion-collapse collapse" data-bs-parent="#faqAcc">
                <div class="accordion-body">Yes, we support secure video consultations. Prescriptions are issued digitally after the call.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section id="cta" class="py-5">
    <div class="container">
      <div class="card-soft p-4 p-lg-5 text-center">
        <div class="mb-2"><span class="badge text-bg-success-subtle border border-success-subtle text-success">Get started</span></div>
        <h3 class="fw-bold mb-2">Ready to book your first appointment?</h3>
        <p class="text-secondary mb-4">Create your CARE account in under a minute and see available slots instantly.</p>
        <div class="d-flex flex-column flex-sm-row gap-2 justify-content-center">
          <a class="btn btn-brand btn-lg" data-bs-toggle="modal" data-bs-target="#authModal"><i class="bi bi-person-plus me-1"></i>Create your account</a>         
        </div>
      </div>
    </div>
  </section>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('year').textContent = new Date().getFullYear();
  </script>

<!-- GSAP Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<!-- Animation Script -->
<script>
  gsap.registerPlugin(ScrollTrigger);

  gsap.utils.toArray(".animate").forEach((elem) => {
    gsap.from(elem, {
      y: 80, 
      opacity: 0,
      duration: 1,
      scrollTrigger: {
        trigger: elem,
        start: "top 80%",
      }
    });
  });
</script>
<!-- Auth Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="authModalLabel">Welcome to CARE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <!-- Tabs -->
        <ul class="nav nav-tabs" id="authTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#loginTab" type="button" role="tab">Login</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signupTab" type="button" role="tab">Sign Up</button>
          </li>
        </ul>

        <div class="tab-content mt-3" id="authTabContent">

          <!-- Login Form -->
          <div class="tab-pane fade show active" id="loginTab" role="tabpanel">
            <form action="login.php" method="POST">
              <?php if (!empty($login_errors)): ?>
                <div class="alert alert-danger">
                  <?= implode("<br>", array_map("htmlspecialchars", $login_errors)) ?>
                </div>
              <?php endif; ?>

              <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>

              <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>

              <button type="submit" id="ab" class="btn btn-primary w-100">Login</button>
            </form>
          </div>

          <!-- Signup Form -->
          <div class="tab-pane fade" id="signupTab" role="tabpanel">
            <form action="signup.php" method="POST">
              <?php if (!empty($signup_errors)): ?>
                <div class="alert alert-danger">
                  <?= implode("<br>", array_map("htmlspecialchars", $signup_errors)) ?>
                </div>
              <?php endif; ?>

              <?php if (!empty($signup_success)): ?>
                <div class="alert alert-success">
                  <?= htmlspecialchars($signup_success) ?>
                </div>
              <?php endif; ?>

              <div class="mb-3">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>

              <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>

              <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>

              <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" required>
              </div>

              <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required>
              </div>

              <div class="mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control" required></textarea>
              </div>

              <div class="mb-3">
                <label>City</label>
                <select name="city_id" class="form-select" required>
                  <option value="">-- Select City --</option>
                  <option value="1">Karachi</option>
                  <option value="2">Lahore</option>
                  <option value="3">Islamabad</option>
                </select>
              </div>

              <button type="submit" class="btn btn-success w-100">Sign Up</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

 <?php include "footer.php"; ?>
<!-- GSAP Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<!-- Animation Script -->
<script>
  gsap.registerPlugin(ScrollTrigger);

  // ====================
  // Page Load Animation
  // ====================
  gsap.from(".hero h1", {
    y: -50,
    opacity: 0,
    duration: 1,
    ease: "back"
  });
  gsap.from(".hero p", {
    y: 30,
    opacity: 0,
    duration: 1,
    delay: 0.5
  });
  gsap.from(".hero .btn", {
    scale: 0.8,
    opacity: 0,
    duration: 0.8,
    delay: 1,
    stagger: 0.2
  });

  // ====================
  // Scroll Animations
  // ====================
  gsap.utils.toArray(".card-soft, .stat, .timeline .d-flex, .faq .accordion-item").forEach((elem) => {
    gsap.from(elem, {
      y: 80,
      opacity: 0,
      duration: 1,
      ease: "power2.out",
      scrollTrigger: {
        trigger: elem,
        start: "top 85%",
        toggleActions: "play none none none"
      }
    });
  });

 // ====================
// Hover Animations 
// ====================
document.querySelectorAll(".card-soft").forEach((card) => {
  
  card.addEventListener("mouseenter", () => {
    gsap.to(card, {
      scale: 1.05,
      boxShadow: "0 12px 25px rgba(0,0,0,0.15)",
      duration: 0.3,
      ease: "power2.out"
    });
  });

  
  card.addEventListener("mouseleave", () => {
    gsap.to(card, {
      scale: 1,
      boxShadow: "0 5px 15px rgba(0,0,0,0.1)",
      duration: 0.3,
      ease: "power2.inOut"
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const stats = document.querySelectorAll(".stat .fw-bold");

  function animateValue(el, start, end, duration) {
    let startTime = null;

    function step(timestamp) {
      if (!startTime) startTime = timestamp;
      const progress = Math.min((timestamp - startTime) / duration, 1);

      if (typeof end === "number") {
        el.textContent = (start + (end - start) * progress).toFixed(
          end % 1 !== 0 ? 1 : 0
        );
      } else {
        // For values like "24/7" or "10k+"
        el.textContent = end;
      }

      if (progress < 1 && typeof end === "number") {
        requestAnimationFrame(step);
      }
    }

    requestAnimationFrame(step);
  }

  const observer = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const el = entry.target;
          const text = el.textContent.trim();

          if (!isNaN(parseFloat(text))) {
            animateValue(el, 0, parseFloat(text), 1500);
          } else {
            // Directly show text like "24/7" or "10k+"
            el.textContent = text;
          }

          obs.unobserve(el);
        }
      });
    },
    { threshold: 0.6 }
  );

  stats.forEach((el) => observer.observe(el));
});

</script>

</body>
</html>
