  <?php include 'header.php'; ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rescuer Registration - WSRTBD</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link
      href="https://fonts.maateen.me/solaiman-lipi/font.css"
      rel="stylesheet" />

    <link rel="icon" type="image/png" href="/wsrtbd.png">

    <style>
      /* Custom Styles */
      body {
        font-family: "SolaimanLipi", sans-serif;
        padding-top: 66px;
      }

      .navbar-custom {
        background: linear-gradient(135deg, #006400 0%, #005600 100%);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }

      .navbar-brand img {
        height: 40px;
        margin-right: 10px;
      }

      .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
        color: white !important;
      }

      .dropdown-item:active,
      .dropdown-item:focus {
        background-color: #b8cfb5 !important;
        color: inherit !important;
      }

      body {
        min-height: 100vh;
        background-color: #fffdf3;
      }

      .signup-container {
        max-width: 700px;
        margin: 0 auto;
      }

      .signup-card {
        background: white;
        margin: 20px;
        border-radius: 5px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
      }

      .signup-header {
        background: linear-gradient(135deg, #167923 0%, #158a1b 100%);
        color: white;
        padding: 40px 30px;
        text-align: center;
      }

      .signup-body {
        padding: 40px 30px;
      }

      .form-control:focus,
      .form-select:focus {
        border-color: #0e640e;
        box-shadow: 0 0 0 0.2rem rgba(42, 82, 152, 0.25);
      }

      .btn-register {
        background: linear-gradient(135deg, #005600 0%, #46c446 100%);
        border: none;
        padding: 12px;
        font-weight: 600;
        transition: transform 0.3s;
      }

      .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 234, 131, 0.4);
      }

      .back-home {
        max-width: 700px;
        margin: 0 auto 20px;
      }

      .password-strength {
        height: 5px;
        border-radius: 3px;
        margin-top: 5px;
        transition: all 0.3s;
      }

      footer {
        background: #1a1a2e;
      }

      footer h5 {
        color: #fff;
        font-weight: bold;
        margin-bottom: 20px;
      }

      footer a {
        color: #adb5bd;
        text-decoration: none;
        transition: color 0.3s;
      }

      footer a:hover {
        color: #fff;
      }

      #loginError {
        background: #ffe3e3;
        border-left: 5px solid #ff4d4d;
        padding: 10px 14px;
        border-radius: 6px;
        font-weight: 500;
        animation: fadeIn 0.3s ease-in-out;
      }

      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(-6px);
        }

        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
    </style>
  </head>

  <body>

    <div class="container">
      <!-- Terms Card -->
      <div
        class="card shadow-sm mb-5 mx-auto"
        style="max-width: 700px; margin-top: 20px">
        <div class="card-header bg-success text-white">
          <h5 class="mb-0" style="text-align: center">
            রেসকিউয়ার রেজিস্ট্রেশনের শর্তাবলী
          </h5>
        </div>
        <div class="card-body">
          <ol style="list-style-type: bengali; text-align: justify">
            <li>
              রেজিস্ট্রেশন করার জন্য রেসকিউয়ারকে অবশ্যই বাংলাদেশের স্থায়ী নাগরিক
              হতে হবে।
            </li>
            <li>
              রেসকিউয়ার হতে ইচ্ছুক প্রার্থীকে অবশ্যই প্রয়োজনীয় প্রশিক্ষণ এবং
              সনদপত্র পেতে হবে।
            </li>
            <li>
              রেসকিউয়ারকে প্রাণী ও মানুষের নিরাপত্তা নিশ্চিত করতে হবে এবং
              কোনোরূপ অবৈধ, বন্যপ্রাণী নিয়ে খেলাধুলা বা ঝুঁকিপূর্ণ কাজ করা যাবে
              না।
            </li>
            <li>
              রেসকিউয়ারকে দলে যোগদানের পর নির্ধারিত নিয়মাবলী ও নির্দেশিকা মানতে
              হবে।
            </li>
            <li>
              ব্যক্তিগত তথ্য (নাম, ফোন, ঠিকানা, ইমেইল ইত্যাদি) সঠিকভাবে প্রদান
              করা বাধ্যতামূলক।
            </li>
            <li>
              সংগঠনে থাকাকালীন যে কোনোরূপ অদক্ষতা, অবহেলা বা অমার্জনীয় আচরণ করলে
              কর্তৃপক্ষ রেজিস্ট্রেশন বাতিল করার অধিকার রাখে।
            </li>
            <li>
              রেসকিউয়ার হিসেবে কাজ করার সময় সামাজিক ও আইনগত দায়িত্ব পালন করতে
              হবে।
            </li>
          </ol>
          <h5 style="text-align: center; margin-top: 20px">
            <b> সম্মত ‍থাকলে নিচের ফরম পূরণ করুন </b>
          </h5>
        </div>
      </div>
    </div>

    <!-- sign up container  -->
    <div class="signup-container">
      <div class="signup-card">
        <div class="signup-body">
          <form id="rescuerForm">
            <h2 style="text-align: center">
              <b>WSRTBD রেসকিউয়ার নিবন্ধন ফরম</b>
            </h2>
            <br /><br />

            <!-- Personal Information -->
            <h5 class="mb-3 fw-bold text-success">
              <i class="bi bi-person-circle me-2"></i>ব্যক্তিগত তথ্য
            </h5>

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label">পূর্ণ নাম *</label>
                <input
                  type="text"
                  class="form-control"
                  name="full_name"
                  placeholder="আপনার পূর্ণ নাম লিখুন"
                  required />
              </div>

              <div class="col-md-6">
                <label class="form-label">জন্ম তারিখ *</label>
                <input type="date" class="form-control" name="dob" required />
              </div>

              <div class="col-md-6">
                <label class="form-label">লিঙ্গ *</label>
                <select class="form-select" name="gender" required>
                  <option selected disabled>লিঙ্গ নির্বাচন করুন</option>
                  <option>পুরুষ</option>
                  <option>মহিলা</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label">জাতীয় পরিচয়পত্র / পাসপোর্ট *</label>
                <input
                  type="text"
                  class="form-control"
                  name="national_id"
                  placeholder="আইডি নম্বর লিখুন"
                  required />
              </div>
            </div>

            <!-- Location Information -->
            <h5 class="mb-3 fw-bold text-success">
              <i class="bi bi-geo-alt-fill me-2"></i>অবস্থানের তথ্য
            </h5>

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label">বিভাগ *</label>
                <select class="form-select" name="division" required>
                  <option selected disabled>বিভাগ নির্বাচন করুন</option>
                  <option>ঢাকা</option>
                  <option>চট্টগ্রাম</option>
                  <option>রাজশাহী</option>
                  <option>খুলনা</option>
                  <option>বরিশাল</option>
                  <option>সিলেট</option>
                  <option>রংপুর</option>
                  <option>ময়মনসিংহ</option>
                </select>
              </div>

              <div class="col-12">
                <label class="form-label">সম্পূর্ণ ঠিকানা *</label>
                <textarea
                  class="form-control"
                  name="full_address"
                  rows="2"
                  placeholder="গ্রাম/বাড়ি নং, রাস্তা, থানা"
                  required></textarea>
              </div>
            </div>

            <!-- Account Details -->
            <h5 class="mb-3 fw-bold text-success">
              <i class="bi bi-shield-lock-fill me-2"></i>অ্যাকাউন্টের তথ্য
            </h5>

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label">মোবাইল নম্বর *</label>
                <input
                  type="tel"
                  class="form-control"
                  name="phone"
                  placeholder="০১xxxxxxxxx"
                  maxlength="11"
                  pattern="[0-9]{11}"
                  title="ঠিক ১১ সংখ্যা লিখুন"
                  required />
              </div>

              <div class="col-md-6">
                <label class="form-label">ইমেইল ঠিকানা *</label>
                <input
                  type="email"
                  class="form-control"
                  name="email"
                  placeholder="your@email.com"
                  required />
              </div>

              <div class="col-md-6">
                <label class="form-label">পাসওয়ার্ড *</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="পাসওয়ার্ড তৈরি করুন"
                  required />
                <div
                  class="password-strength bg-secondary"
                  id="strengthBar"></div>
                <small class="text-muted">কমপক্ষে ৮ অক্ষর, বড় হাতের, ছোট হাতের ও সংখ্যা থাকতে হবে</small>
              </div>

              <div class="col-md-6">
                <label class="form-label">পাসওয়ার্ড নিশ্চিত করুন *</label>
                <input
                  type="password"
                  class="form-control"
                  name="confirm_password"
                  placeholder="পাসওয়ার্ড আবার লিখুন"
                  required />
              </div>
            </div>

            <!-- Experience -->
            <h5 class="mb-3 fw-bold text-success">
              <i class="bi bi-award-fill me-2"></i>অভিজ্ঞতা
            </h5>

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label">পূর্ববর্তী রেসকিউ এর অভিজ্ঞতা *</label>
                <select class="form-select" name="experience" required>
                  <option selected disabled>অভিজ্ঞতা নির্বাচন করুন</option>
                  <option>কোন অভিজ্ঞতা নেই</option>
                  <option>১ বছরের কম</option>
                  <option>১-৩ বছর</option>
                  <option>৩-৫ বছর</option>
                  <option>৫+ বছর</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label">প্রশিক্ষণ সার্টিফিকেট</label>
                <input
                  type="text"
                  class="form-control"
                  name="certificate_id"
                  placeholder="সার্টিফিকেট / রেসকিউয়ার আইডি নম্বর (যদি থাকে)" />
              </div>

              <div class="col-12">
                <label class="form-label">আপনি কেন WSRTBD তে যোগ দিতে চান? *</label>
                <textarea
                  class="form-control"
                  name="motivation"
                  rows="3"
                  placeholder="আপনার উদ্দেশ্য সম্পর্কে বলুন..."
                  required></textarea>
              </div>
            </div>

            <!-- Terms -->
            <div class="mb-4">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="terms"
                  name="terms"
                  required />
                <label class="form-check-label small" for="terms">
                  আমি
                  <a href="#" class="text-decoration-none">শর্তাবলী</a>
                  এবং
                  <a href="#" class="text-decoration-none">গোপনীয়তা নীতি</a>
                  তে সম্মত
                </label>
              </div>

              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="newsletter"
                  name="newsletter"
                  value="1" />
                <label class="form-check-label small" for="newsletter">
                  প্রশিক্ষণ কর্মসূচি এবং রেসকিউ কার্যক্রম সম্পর্কে আপডেট পাঠান
                </label>
              </div>
            </div>

            <!-- Buttons -->
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary btn-register">
                <i class="bi bi-check-circle me-2"></i>নিবন্ধন সম্পন্ন করুন
              </button>

              <div class="text-center mt-3">
                <p class="mb-0 small text-muted">
                  ইতিমধ্যে অ্যাকাউন্ট আছে?
                  <a
                    data-bs-toggle="modal"
                    data-bs-target="#loginModal"
                    href="#"
                    class="text-decoration-none fw-semibold">
                    এখানে লগইন করুন
                  </a>
                </p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Registration SUCCESS MODAL -->
    <div
      class="modal fade"
      id="successModal"
      tabindex="-1"
      data-bs-backdrop="static"
      data-bs-keyboard="false">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
          <div class="modal-body text-center">
            <div class="mb-3">
              <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
            </div>
            <h4 class="text-success mb-3">নিবন্ধন সফল হয়েছে!</h4>

            <p class="text-muted">
              আপনার আবেদনটি পর্যালোচনা করে আমাদের টিম থেকে ৩-৫ কার্যদিবসের মধ্যে ইমেইলের মাধ্যমে বিস্তারিত তথ্য পাঠানো হবে।
            </p>

            <p class="fw-bold text-success mt-3">WSRTBD তে যোগ দেওয়ার জন্য ধন্যবাদ!</p>

            <div class="d-grid gap-2 mt-4">
              <button
                class="btn btn-success btn-lg"
                onclick="window.location.href='index.php'">
                <i class="bi bi-house-fill me-2"></i>হোম পেজে যান
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Password strength indicator
      document
        .getElementById("password")
        .addEventListener("input", function() {
          const password = this.value;
          const strengthBar = document.getElementById("strengthBar");
          let strength = 0;

          if (password.length >= 8) strength++;
          if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
          if (/[0-9]/.test(password)) strength++;
          if (/[^a-zA-Z0-9]/.test(password)) strength++;

          strengthBar.style.width = strength * 25 + "%";

          if (strength === 1) {
            strengthBar.className = "password-strength bg-danger";
          } else if (strength === 2) {
            strengthBar.className = "password-strength bg-warning";
          } else if (strength === 3) {
            strengthBar.className = "password-strength bg-info";
          } else if (strength === 4) {
            strengthBar.className = "password-strength bg-success";
          }
        });

      // data post to database
      document
        .getElementById("rescuerForm")
        .addEventListener("submit", function(e) {
          e.preventDefault();

          let formData = new FormData(this);

          // Submit button disable করুন
          const submitBtn = this.querySelector('button[type="submit"]');
          submitBtn.disabled = true;
          submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>অপেক্ষা করুন...';

          fetch("rescuer_registration.php", {
              method: "POST",
              body: formData,
            })
            .then((r) => r.text())
            .then((data) => {
              // Modal দেখান
              let modal = new bootstrap.Modal(
                document.getElementById("successModal")
              );
              modal.show();
            })
            .catch((error) => {
              // Error হলে
              alert('❌ নিবন্ধন করতে সমস্যা হয়েছে। আবার চেষ্টা করুন।');
              console.error('Error:', error);
              submitBtn.disabled = false;
              submitBtn.innerHTML = '<i class="bi bi-check-circle me-2"></i>নিবন্ধন সম্পন্ন করুন';
            });
        });
      // Simple login form handler
      document
        .getElementById("loginForm")
        .addEventListener("submit", function(e) {
          e.preventDefault(); // prevent default form submission

          const identifier = document.getElementById("loginIdentifier").value;
          const password = document.getElementById("loginPassword").value;

          // Redirect to homepage with credentials in URL
          // (for demo/testing purposes only, no real security)
          const url = `http://localhost/WSRTBD-Website/index.php?identifier=${encodeURIComponent(
            identifier
          )}&password=${encodeURIComponent(password)}`;
          window.location.href = url;
        });
    </script>

    <!-- Footer -->
    <footer class="bg-dark text-light pt-5 pb-3">
      <div class="container">
        <div class="row">
          <!-- Contact Info -->
          <div class="col-md-4 mb-4">
            <h5>Contact Us</h5>
            <p><i class="bi bi-telephone"></i> Phone: +880 1722 938276</p>
            <p><i class="bi bi-envelope"></i> Email: wsrtbd@gmail.com</p>
            <p><i class="bi bi-geo-alt"></i> Address: Dhaka, Bangladesh</p>
          </div>

          <!-- Social Media -->
          <div class="col-md-4 mb-4">
            <h5>Follow Us</h5>
            <p>
              <a
                href="https://www.facebook.com/wsrtbd"
                class="text-light me-3"
                target="_blank"><i class="bi bi-facebook"></i> Facebook Page</a>
            </p>
            <p>
              <a
                href="https://www.facebook.com/groups/www.wsrtbd.epizy.co"
                class="text-light"
                target="_blank"><i class="bi bi-facebook"></i> Facebook Group</a>
            </p>
          </div>

          <!-- Download App -->
          <div class="col-md-4 mb-4">
            <h5>Get Our App</h5>
            <a
              href="https://play.google.com/store/apps/details?id=com.binarybardbd.snakesofbangladesh"
              class="btn btn-primary mb-2"
              target="_blank"
              rel="noopener noreferrer">Download App</a>
            <p class="small mt-2">Available on Android now.</p>
          </div>
        </div>

        <hr class="bg-light" />

        <!-- Copyright -->
        <div class="text-center small">
          &copy; 2025 Wildlife and Snake Rescue Team in Bangladesh (WSRTBD). All
          rights reserved.
        </div>
      </div>
    </footer>

    <!-- Login Modal -->
    <div
      class="modal fade"
      id="loginModal"
      tabindex="-1"
      aria-labelledby="loginModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title" id="loginModalLabel">Rescuer Login</h5>
            <button
              type="button"
              class="btn-close btn-close-white"
              data-bs-dismiss="modal"></button>
          </div>

          <div class="modal-body p-4">

            <!-- ERROR MESSAGE (Initially hidden) -->
            <p id="loginError" class="text-danger text-center mb-2" style="display: none;"></p>

            <!-- Login Form -->
            <form id="loginForm">
              <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input
                  type="text"
                  id="loginIdentifier"
                  name="email"
                  class="form-control"
                  placeholder="Enter email address"
                  required />
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input
                  type="password"
                  id="loginPassword"
                  name="password"
                  class="form-control"
                  placeholder="Enter password"
                  required />
              </div>

              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember" />
                  <label class="form-check-label small" for="remember">
                    Remember me
                  </label>
                </div>
                <a href="#" class="small text-decoration-none">Forgot Password?</a>
              </div>

              <button type="submit" class="btn btn-success w-100">Login</button>

              <p class="text-center mt-3 small">
                Don’t have an account?
                <a href="signup.php" class="fw-semibold text-decoration-none">
                  Register Now
                </a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- AJAX LOGIN SCRIPT -->
    <script>
      document.getElementById("loginForm").addEventListener("submit", function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch("rescuer_login.php", {
            method: "POST",
            body: formData
          })
          .then(res => res.text())
          .then(response => {
            const errorBox = document.getElementById("loginError");
            response = response.trim();

            if (response === "success") {
              window.location.href = "profile.php";
            } else if (response === "invalid") {
              errorBox.style.display = "block";
              errorBox.textContent = "Wrong password!";
            } else if (response === "not_found") {
              errorBox.style.display = "block";
              errorBox.textContent = "Email not found!";
            } else {
              errorBox.style.display = "block";
              errorBox.textContent = "Unexpected error!";
            }
          });
      });
    </script>
  </body>

  </html>