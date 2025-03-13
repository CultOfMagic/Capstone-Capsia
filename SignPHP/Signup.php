<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ministry Login</title>
  <link rel="stylesheet" href="./Signup.css"> <!-- Ensure the CSS file path is correct -->
  </head>
<body>
  <div class="container">
    <div class="forms-container">
      <!-- Admin Signin Form -->
      <div class="form-control signin-form">
        <form method="post" action="login.php" autocomplete="off">
          <h2>Ministry Login</h2>
          
          <!-- Username Field -->
          <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required />
          </div>
          
          <!-- Password Field -->
          <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required />
            <span id="togglePassword" style="cursor: pointer;">👁️</span>
          </div>
          
          <!-- Submit Button -->
          <input type="submit" class="button" value="Sign In" name="signin">
          
          <!-- Forgot Password Link -->
          <div class="forgot-password">
            <a href="forgot_password.php">Forgot Password?</a>
          </div>
          
          <!-- Error Message -->
          <?php if (isset($_GET['error'])): ?>
          <div class="error-message">
            <p><?php echo htmlspecialchars($_GET['error']); ?></p>
          </div>
          <?php endif; ?>
        </form>
      </div>
    </div>

    <!-- Intro Sections -->
    <div class="intros-container">
      <!-- Sign-in Intro -->
      <div class="intro-control signin-intro">
        <div class="intro-control__inner">
          <h2>Welcome back!</h2>
          <p>
            Welcome back! We are so happy to have you here. It's great to see you again. We hope you had a safe and enjoyable time away.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional: Add JavaScript for additional functionality -->
  <script>
    // Toggle password visibility
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    togglePassword.onclick = function() {
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
      } else {
        passwordInput.type = 'password';
      }
    };
  </script>
</body>