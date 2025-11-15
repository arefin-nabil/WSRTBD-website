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

    <div class="signup-container">
      <div class="signup-card">
        <div class="signup-body">
          <form id="rescuerForm">
            <h2 style="text-align: center">
              <b>WSRTBD Rescuer Registration Form</b>
            </h2>
            <br /><br />

            <!-- Personal Information -->
            <h5 class="mb-3 fw-bold text-success">
              <i class="bi bi-person-circle me-2"></i>Personal Information
            </h5>

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label">Full Name *</label>
                <input
                  type="text"
                  class="form-control"
                  name="full_name"
                  placeholder="Enter full name"
                  required />
              </div>

              <div class="col-md-6">
                <label class="form-label">Date of Birth *</label>
                <input type="date" class="form-control" name="dob" required />
              </div>

              <div class="col-md-6">
                <label class="form-label">Gender *</label>
                <select class="form-select" name="gender" required>
                  <option selected disabled>Select gender</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label">National ID / Passport *</label>
                <input
                  type="text"
                  class="form-control"
                  name="national_id"
                  placeholder="Enter ID number"
                  required />
              </div>
            </div>

            <!-- Location Information -->
            <h5 class="mb-3 fw-bold text-success">
              <i class="bi bi-geo-alt-fill me-2"></i>Location Information
            </h5>

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label">Division *</label>
                <select class="form-select" name="division" required>
                  <option selected disabled>Select division</option>
                  <option>Dhaka</option>
                  <option>Chittagong</option>
                  <option>Rajshahi</option>
                  <option>Khulna</option>
                  <option>Barisal</option>
                  <option>Sylhet</option>
                  <option>Rangpur</option>
                  <option>Mymensingh</option>
                </select>
              </div>

              <div class="col-12">
                <label class="form-label">Full Address *</label>
                <textarea
                  class="form-control"
                  name="full_address"
                  rows="2"
                  placeholder="Village/House, Road, Thana"
                  required></textarea>
              </div>
            </div>

            <!-- Account Details -->
            <h5 class="mb-3 fw-bold text-success">
              <i class="bi bi-shield-lock-fill me-2"></i>Account Details
            </h5>

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label">Phone Number *</label>
                <input
                  type="tel"
                  class="form-control"
                  name="phone"
                  placeholder="+880 1XXX XXXXXX"
                  required />
              </div>

              <div class="col-md-6">
                <label class="form-label">Email Address *</label>
                <input
                  type="email"
                  class="form-control"
                  name="email"
                  placeholder="your@email.com"
                  required />
              </div>

              <div class="col-md-6">
                <label class="form-label">Password *</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="Create password"
                  required />
                <div
                  class="password-strength bg-secondary"
                  id="strengthBar"></div>
                <small class="text-muted">Min 8 characters, include uppercase, lowercase &
                  number</small>
              </div>

              <div class="col-md-6">
                <label class="form-label">Confirm Password *</label>
                <input
                  type="password"
                  class="form-control"
                  name="confirm_password"
                  placeholder="Confirm password"
                  required />
              </div>
            </div>

            <!-- Experience -->
            <h5 class="mb-3 fw-bold text-success">
              <i class="bi bi-award-fill me-2"></i>Experience
            </h5>

            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label">Previous Experience *</label>
                <select class="form-select" name="experience" required>
                  <option selected disabled>Select experience</option>
                  <option>No experience</option>
                  <option>Less than 1 year</option>
                  <option>1-3 years</option>
                  <option>3-5 years</option>
                  <option>5+ years</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label">Training Certification</label>
                <input
                  type="text"
                  class="form-control"
                  name="certificate_id"
                  placeholder="Certificate ID (if any)" />
              </div>

              <div class="col-12">
                <label class="form-label">Why do you want to join? *</label>
                <textarea
                  class="form-control"
                  name="motivation"
                  rows="3"
                  placeholder="Tell us your motivation..."
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
                  I agree to the
                  <a href="#" class="text-decoration-none">Terms & Conditions</a>
                  and
                  <a href="#" class="text-decoration-none">Privacy Policy</a>
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
                  Send me updates about training programs and rescue activities
                </label>
              </div>
            </div>

            <!-- Buttons -->
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary btn-register">
                <i class="bi bi-check-circle me-2"></i>Complete Registration
              </button>

              <div class="text-center mt-3">
                <p class="mb-0 small text-muted">
                  Already have an account?
                  <a
                    data-bs-toggle="modal"
                    data-bs-target="#loginModal"
                    href="#"
                    class="text-decoration-none fw-semibold">
                    Login Here
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
            <h4 class="text-success mb-2">Registration Successful</h4>

            <small>
              Your application will be reviewed by our team. You'll receive
              details via email within 3–5 business days.
            </small>

            <p class="mt-3">Thank you for joining WSRTBD!</p>

            <div class="d-grid gap-2 mt-3">
              <button
                class="btn btn-success"
                onclick="window.location.href='index.php'">
                Go to Home
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
          e.preventDefault(); // stop normal page reload

          let formData = new FormData(this);

          fetch("rescuer_registration.php", {
              method: "POST",
              body: formData,
            })
            .then((r) => r.text())
            .then((data) => {
              // Show modal after PHP saves data
              let modal = new bootstrap.Modal(
                document.getElementById("successModal")
              );
              modal.show();
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
            <!-- UPDATED FORM -->
            <form id="loginForm" method="POST" action="rescuer_login.php">
              <div class="mb-3">
                <label class="form-label fw-semibold">Email or Phone Number</label>
                <input
                  type="text"
                  id="loginIdentifier"
                  name="email"
                  class="form-control"
                  placeholder="Enter email or phone"
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

              <div
                class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    id="remember" />
                  <label class="form-check-label small" for="remember">
                    Remember me
                  </label>
                </div>
                <a href="#" class="small text-decoration-none">Forgot Password?</a>
              </div>

              <button type="submit" class="btn btn-success w-100">Login</button>

              <p class="text-center mt-3 small">
                Don’t have an account?
                <a href="signup.html" class="fw-semibold text-decoration-none">
                  Register Now
                </a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>

  </html>