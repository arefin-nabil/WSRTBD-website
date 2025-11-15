  <?php include 'header.php'; ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - WSRTBD</title>
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

      @media (max-width: 768px) {
        .timeline::before {
          left: 20px;
        }
      }
    </style>
  </head>

  <body>

    <h1>This is admin panel</h1>

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