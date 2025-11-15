  <?php include 'header.php'; ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us - WSRTBD</title>
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

      .hero-contact {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
          url("https://files.binarybardbd.com/Snakesbd/imgs/venom/6-Bandedkrait1.jpg");
        background-size: cover;
        background-position: center;
        padding: 120px 0;
        color: white;
        text-align: center;
      }

      .contact-card {
        border: none;
        border-radius: 15px;
        padding: 30px;
        height: 100%;
        transition: transform 0.3s;
        background: white;
      }

      .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      }

      .contact-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2rem;
      }

      .form-control:focus,
      .form-select:focus {
        border-color: #006400;
        box-shadow: 0 0 0 0.2rem rgba(42, 82, 152, 0.25);
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

    <!-- HERO SECTION -->
    <section class="hero-contact">
      <div class="container">
        <h1 class="display-4 fw-bold">যোগাযোগ করুন</h1>
        <p class="lead">
          আমরা ২৪ ঘণ্টা প্রস্তুত! উদ্ধার বা যেকোনো তথ্যের জন্য যোগাযোগ করুন।
        </p>
      </div>
    </section>

    <!-- CONTACT INFO CARDS -->
    <section class="py-5" style="background-color: #fffff0">
      <div class="container">
        <div class="row g-4">
          <!-- Emergency Hotline -->
          <div class="col-lg-3 col-md-6">
            <div
              class="contact-card shadow-sm text-center"
              style="background-color: #ffe8e8">
              <div class="contact-icon bg-danger text-white">
                <i class="bi bi-telephone-fill"></i>
              </div>
              <h5 class="fw-bold mb-3">Emergency Hotline</h5>
              <p class="text-muted mb-2">24/7 Rescue Service</p>
              <h6 class="text-danger">+880 1722 938276</h6>
              <p class="small text-muted">
                Call immediately for snake/wildlife emergency
              </p>
            </div>
          </div>

          <!-- Email -->
          <div class="col-lg-3 col-md-6">
            <div
              class="contact-card shadow-sm text-center"
              style="background-color: #e1e5ff">
              <div class="contact-icon bg-primary text-white">
                <i class="bi bi-envelope-fill"></i>
              </div>
              <h5 class="fw-bold mb-3">Email Us</h5>
              <p class="text-muted mb-2">General Inquiries</p>
              <h6 class="text-primary">wsrtbd@gmail.com</h6>
              <p class="small text-muted">Response within 24 hours</p>
            </div>
          </div>

          <!-- Office Address -->
          <div class="col-lg-3 col-md-6">
            <div
              class="contact-card shadow-sm text-center"
              style="background-color: #e7ffe7">
              <div class="contact-icon bg-success text-white">
                <i class="bi bi-geo-alt-fill"></i>
              </div>
              <h5 class="fw-bold mb-3">Head Office</h5>
              <p class="text-muted mb-2">Visit Us</p>
              <p class="small">
                123 Shahjadpur, Vatara<br />Dhaka 1000, Bangladesh
              </p>
            </div>
          </div>

          <!-- Social Media -->
          <div class="col-lg-3 col-md-6">
            <div
              class="contact-card shadow-sm text-center"
              style="background-color: #dffaff">
              <div class="contact-icon bg-info text-white">
                <i class="bi bi-share-fill"></i>
              </div>
              <h5 class="fw-bold mb-3">Follow Us</h5>
              <p class="text-muted mb-3">Stay Connected</p>
              <div class="d-flex justify-content-center gap-3">
                <a href="#" class="text-primary fs-4"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-danger fs-4"><i class="bi bi-youtube"></i></a>
                <a href="#" class="text-info fs-4"><i class="bi bi-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CONTACT FORM -->
    <section class="py-5">
      <div class="container">
        <div class="row justify-content-center g-5">
          <!-- Contact Form -->
          <div class="col-lg-6">
            <h2 class="fw-bold mb-4">Send Us a Message</h2>
            <form>
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Full Name *</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Your name"
                    required />
                </div>
                <div class="col-md-6">
                  <label class="form-label">Phone Number *</label>
                  <input
                    type="tel"
                    class="form-control"
                    placeholder="+880 1XXX XXXXXX"
                    required />
                </div>
                <div class="col-12">
                  <label class="form-label">Email Address *</label>
                  <input
                    type="email"
                    class="form-control"
                    placeholder="your@email.com"
                    required />
                </div>

                <div class="col-md-6">
                  <label class="form-label">Subject *</label>
                  <select class="form-select" required>
                    <option selected>Select Subject</option>
                    <option>Emergency Rescue Request</option>
                    <option>General Inquiry</option>
                    <option>Join as Rescuer</option>
                    <option>Partnership</option>
                    <option>Training Program</option>
                    <option>Other</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Message *</label>
                  <textarea
                    class="form-control"
                    rows="5"
                    placeholder="Tell us how we can help you..."
                    required></textarea>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      id="agreeTerms"
                      required />
                    <label class="form-check-label small" for="agreeTerms">
                      I agree to the terms and privacy policy
                    </label>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-success btn-lg w-100">
                    <i class="bi bi-send-fill me-2"></i>Send Message
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- QUICK LINKS -->
    <section class="py-5 bg-success text-white">
      <div class="container">
        <div class="row text-center g-4">
          <div class="col-md-4">
            <i class="bi bi-download display-4 mb-3"></i>
            <h5 class="fw-bold">Download Our App</h5>
            <p class="mb-3">Request rescue directly from mobile</p>
            <a
              href="https://play.google.com/store/apps/details?id=com.binarybardbd.snakesofbangladesh"
              target="_blank"
              class="btn btn-light">Get the App</a>
          </div>
          <div class="col-md-4">
            <i class="bi bi-people display-4 mb-3"></i>
            <h5 class="fw-bold">Join Our Team</h5>
            <p class="mb-3">Become a certified rescuer</p>
            <a href="signup.html" class="btn btn-light">Register Now</a>
          </div>
          <div class="col-md-4">
            <i class="bi bi-book display-4 mb-3"></i>
            <h5 class="fw-bold">Read Our Blog</h5>
            <p class="mb-3">Learn about wildlife conservation</p>
            <a
              href="https://binarybardbd.com/category/snakes-nature/"
              target="_blank"
              class="btn btn-light">Visit Blog</a>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark text-light pt-5 pb-3">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-4">
            <h5>Contact Us</h5>
            <p><i class="bi bi-telephone"></i> Phone: +880 1722 938276</p>
            <p><i class="bi bi-envelope"></i> Email: wsrtbd@gmail.com</p>
            <p><i class="bi bi-geo-alt"></i> Address: Dhaka, Bangladesh</p>
          </div>
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
          <div class="col-md-4 mb-4">
            <h5>Get Our App</h5>
            <a
              href="https://play.google.com/store/apps/details?id=com.binarybardbd.snakesofbangladesh"
              class="btn btn-success mb-2"
              target="_blank">Download App</a>
            <p class="small mt-2">Available on Android now.</p>
          </div>
        </div>
        <hr class="bg-light" />
        <div class="text-center small">
          &copy; 2025 Wildlife and Snake Rescue Team in Bangladesh (WSRTBD). All
          rights reserved.
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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