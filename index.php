<?php
include_once "./includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.1/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>
<main class="main">
  <!-- Header -->
  <header class="header">
    <div class="container flex-between">
      <div class="logo">
        <a href="#">
          <img src="assets/logo/pendekin.svg" alt="" />
        </a>
      </div>
      <nav class="main-navgation flex-between flex-ver-top">
        <div class="nav-links">
          <a href="#features">Features</a>
          <a href="#pricing">Pricing</a>
          <a href="#resources">Resources</a>
        </div>
        <div class="nav-buttons">
          <a href="#" class="log-in"> Login</a>
          <a href="#" class="sign-up btn btn-sm">Sign Up</a>
        </div>
      </nav>
      <div class="burger-menu">
        <i class="fa-regular fa-bars icon"></i>
      </div>
    </div>
  </header>
  <!-- Landing -->
  <section class="landing">
    <div class="landing-text">
      <h1>Simple, powerful & recognizable links</h1>
      <p>
        Build your brand’s recognition and get detailed insights on how your
        links are performing.
      </p>
      <a href="#url-shorten-form" class="btn btn-lg">Get Started</a>
    </div>
    <div class="landing-image">
      <img src="assets/logo/work-illustration.svg" alt="Working Illustration" />
    </div>
  </section>
  <!-- Features -->
  <section class="features" id="features">
    <div class="container">
      <!-- Short URL Feature -->
      <div class="url-shorten-feature">
        <form class="url-shorten-form" id="url-shorten-form" method="POST">
          <div id="results">
            <input type="url"  name="url" class="url-input" placeholder="Shorten a link here..." autocomplete="off" value="<?=(isset($_POST['url']) ? htmlspecialchars($_POST['url']) : '')?>"/>
            <span class="alert"></span>
          </div>
          <button type="submit" name="submit" class="btn btn-lg btn-plus-icon">Shorten It!</button>
        </form>
        <?php include './includes/url_submit.php' ?>
  
        <div class="url-shorten-results"></div>
      </div>
      <!-- Advanced Features -->
      <div class="more-features">
        <div class="section-header">
          <h2>Advanced Statistics</h2>
          <p>
            Track how your links are performing across the web with our
            advanced statistics dashboard.
          </p>
        </div>
        <div class="more-features-content">
          <div class="feature">
            <div class="feature-illustration">
              <img src="assets/logo/illustration-icon.svg" alt="Feature Illustration Icon" />
            </div>
            <div class="feature-details">
              <h3>Brand Recognition</h3>
              <p>
                Boost your brand recognition with each click. Generic links
                don’t mean a thing. Branded links help instil confidence in
                your content.
              </p>
            </div>
          </div>
          <div class="feature">
            <div class="feature-illustration">
              <img src="assets/logo/illustration-icon-2.svg" alt="Feature Illustration Icon" />
            </div>
            <div class="feature-details">
              <h3>Detailed Records</h3>
              <p>
                Gain insights into who is clicking your links. Knowing when
                and where people engage with your content helps inform
                better decisions.
              </p>
            </div>
          </div>
          <div class="feature">
            <div class="feature-illustration">
              <img src="assets/logo/illustration-icon-3.svg" alt="Feature Illustration Icon" />
            </div>
            <div class="feature-details">
              <h3>Fully Customizable</h3>
              <p>
                Improve brand awareness and content discoverability through
                customizable links, supercharging audience engagement.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Pricing -->
  <section class="pricing" id="pricing">
    <div class="container">
      <div class="section-header">
        <h2>Boost your links today</h2>
        <a href="#" class="btn btn-lg">Get Started</a>
      </div>
    </div>
  </section>
  <!-- Footer -->
  <footer class="footer" id="resources">
    <div class="container">
      <!-- Website Logo -->
      <div class="logo">
        <a href="#">
          <img src="assets/logo/pendekin-putih.svg" alt="" />
        </a>
      </div>
      <!-- Quick Links -->
      <div class="quick-links">
        <div class="links-group">
          <span>Features</span>
          <div>
            <a href="#">Link Shortening</a>
            <a href="#">Branded Links</a>
            <a href="#">Analytics</a>
          </div>
        </div>
        <div class="links-group">
          <span>Resources</span>
          <div>
            <a href="#">Blog</a>
            <a href="#">Developers</a>
            <a href="#">Support</a>
          </div>
        </div>
        <div class="links-group">
          <span>Company</span>
          <div>
            <a href="#">About</a>
            <a href="#">Our Team</a>
            <a href="#">Careers</a>
            <a href="#">Contact</a>
          </div>
        </div>
      </div>
      <!-- Social Media -->
      <div class="social-media">
        <a href="">
          <img src="assets/logo/facebook.svg" alt="Facebook Logo">
        </a>
        <a href="#">
          <img src="assets/logo/twitter.svg" alt="Twitter Logo">
        </a>
        <a href="https://linkedin.com/in/kaka-maulana-abdillah">
          <img src="assets/logo/pinterest.svg" alt="Pinterest Logo">
        </a>
        <a href="https://instagram.com/_kakamaulana">
          <img src="assets/logo/instagram.svg" alt="Instagram Logo">
        </a>
      </div>
    </div>
    <!-- Made By -->
    <div class="attribution">
      &copy; 2022 - Pendek.In. Made with <i class="fa fa-heart pulse"></i> by <a href="https://km-dev.or.id">KM Developer.</a> All Rights Reserved.
    
    </div>
  </footer>
</main>
</body>
      <script>
            const salinLink = document.getElementById('salin-link');
            salinLink.addEventListener('click', (e) =>
            {
                e.preventDefault();

                const cop = document.createElement('textarea');
                cop.value = document.getElementById('url-short').textContent;
                document.body.appendChild(cop);
                cop.select();
                document.execCommand('copy');
                document.body.removeChild(cop);

                salinLink.text = 'Link disalin';

                setTimeout(() => {salinLink.text = 'Salin'}, 2000);
            });
        </script>
</html>