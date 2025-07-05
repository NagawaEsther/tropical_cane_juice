
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cane 2025 Juice</title>
  <link rel="icon" type="image/jpeg" href="{{ asset('image.s/tc_logo.PNG') }}?v={{ time() }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css?v=5" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <style>
    :root {
      --primary-green: #00C851;
      --neutral-800: #1A1A1A;
      --light-citrus: white;
    }
    * {
      margin: 0 !important;
      padding: 0 !important;
      box-sizing: border-box !important;
    }
    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif !important;
      background: white !important;
    }
    .navbar {
      background: var(--light-citrus) !important;
      width: 100% !important;
      z-index: 1000 !important;
      height: 140px !important;
      position: fixed !important;
      top: 0 !important;
      padding: 0.5rem 0 !important;
      transition: background 0.3s ease !important;
    }
    .navbar.scrolled {
      background: var(--neutral-800) !important;
    }
    .navbar-container {
      max-width: 1200px !important;
      margin: 0 auto !important;
      padding: 0 2rem !important;
      display: flex !important;
      align-items: center !important;
      justify-content: space-between !important;
      height: 100% !important;
    }
    .navbar-brand {
      display: flex !important;
      flex-direction: column !important;
      align-items: center !important;
      text-decoration: none !important;
    }
    .brand-logo {
      width: 80px !important;
      height: 80px !important;
      border-radius: 16px !important;
      margin-bottom: 0.5rem !important;
      object-fit: cover !important;
    }
    .brand-text {
      display: flex !important;
      flex-direction: column !important;
      gap: 0.25rem !important;
      text-align: center !important;
    }
    .brand-name {
      font-family: 'Plus Jakarta Sans', sans-serif !important;
      font-size: 1.5rem !important;
      font-weight: 700 !important;
      color: var(--neutral-800) !important;
      line-height: 1.2 !important;
    }
    .navbar.scrolled .brand-name {
      color: #FFFFFF !important;
    }
    .brand-tagline {
      font-size: 0.8rem !important;
      font-weight: 600 !important;
      color: var(--primary-green) !important;
      text-transform: uppercase !important;
    }
    .navbar-toggler {
      display: none !important;
      background: transparent !important;
      border: none !important;
      padding: 4px 8px !important;
      order: 1;
    }
    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2833, 37, 41, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
      width: 1.5em !important;
      height: 1.5em !important;
    }
    .navbar.scrolled .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
    }
    .navbar-collapse {
      display: flex !important;
      flex-basis: auto !important;
      background: transparent !important;
    }
    .navbar.scrolled .navbar-collapse {
      background: transparent !important;
    }
    .navbar-nav {
      display: flex !important;
      flex-direction: row !important;
      align-items: center !important;
      gap: 1rem !important;
      list-style: none !important;
    }
    .nav-link {
      font-size: 1rem !important;
      font-weight: 500 !important;
      color: var(--neutral-800) !important;
      text-decoration: none !important;
      padding: 0.5rem 1rem !important;
      border-radius: 8px !important;
      transition: background 0.3s, color 0.3s !important;
    }
    .navbar.scrolled .nav-link {
      color: #FFFFFF !important;
    }
    .nav-link:hover {
      color: var(--primary-green) !important;
      background: rgba(0, 200, 81, 0.1) !important;
    }
    .nav-link.active {
      color: white !important;
      background: var(--primary-green) !important;
    }
    .cta-button {
      background: var(--primary-green) !important;
      color: white !important;
      font-weight: 600 !important;
      padding: 0.5rem 1rem !important;
      border-radius: 8px !important;
      text-decoration: none !important;
      transition: background 0.3s !important;
      cursor: pointer !important;
    }
    .cta-button:hover {
      background: #33D474 !important;
    }
    .container {
      max-width: 1200px !important;
      margin: 140px auto 0 !important;
      padding: 2rem !important;
    }

    @media (max-width: 768px) {
      .navbar {
        height: 100px !important;
      }
      .navbar-container {
        flex-wrap: wrap;
        padding: 0 1rem !important;
      }
      .navbar-brand {
        flex-direction: row !important;
        align-items: center;
        gap: 10px;
        order: 0;
      }
      .brand-logo {
        width: 50px !important;
        height: 50px !important;
        margin-bottom: 0 !important;
      }
      .brand-name {
        font-size: 1.2rem !important;
      }
      .brand-tagline {
        font-size: 0.7rem !important;
      }
      .navbar-toggler {
        display: block !important;
      }
      .navbar-collapse {
        display: none !important;
        width: 100%;
        order: 2;
        background: var(--light-citrus) !important;
        padding: 1rem !important;
        flex-direction: column;
      }
      .navbar.scrolled .navbar-collapse {
        background: var(--neutral-800) !important;
      }
      .navbar-collapse.show {
        display: flex !important;
      }
      .navbar-nav {
        flex-direction: column !important;
        width: 100%;
        gap: 0.5rem !important;
        margin-bottom: 1rem !important;
      }
      .nav-link {
        width: 100%;
        text-align: center;
        padding: 0.75rem 1rem !important;
      }
      .cta-button {
        margin-top: 0.5rem !important;
        width: 100%;
        text-align: center;
        padding: 0.75rem 1rem !important;
      }
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="navbar-container">
      <a href="{{ url('/') }}" class="navbar-brand">
        <img src="{{ asset('image.s/tc_logo.PNG') }}" alt="Cane 2025 Logo" class="brand-logo">
        <div class="brand-text">
          <div class="brand-name">Cane 2025</div>
          <div class="brand-tagline">Fresh • Natural • Pure</div>
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About Us</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('juices') ? 'active' : '' }}" href="{{ url('/juices') }}">Our Juices</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('tips') ? 'active' : '' }}" href="{{ url('/tips') }}">Healthy Tips</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact Us</a></li>
        </ul>
        <a class="cta-button ms-2" onclick="getFreshJuiceToWhatsApp()">Get Fresh Juice</a>
      </div>
    </div>
  </nav>
  <div class="container">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    window.addEventListener('scroll', function () {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });

    function toggleContactForm() {
      const form = document.getElementById('contactForm');
      if (form) {
        form.classList.toggle('active');
      } else {
        console.error('Contact form not found');
      }
    }

    function sendToTropicalCaneWhatsApp() {
      const message = document.getElementById('contactMessage')?.value.trim();
      if (!message) {
        alert('Please enter a message before submitting.');
        return;
      }
      const whatsappNumber = '+256776644143';
      const encodedMessage = encodeURIComponent(message);
      const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
      console.log('Opening WhatsApp URL:', whatsappUrl);
      try {
        window.open(whatsappUrl, '_blank');
      } catch (error) {
        console.error('Error opening WhatsApp URL:', error);
        alert('Failed to open WhatsApp. Please try again.');
      }
      document.getElementById('contactMessage').value = '';
      document.getElementById('contactForm')?.classList.remove('active');
    }

    function getFreshJuiceToWhatsApp() {
      const defaultMessage = "Hello, I'm interested in ordering fresh juice!";
      const whatsappNumber = '+256776644143';
      const encodedMessage = encodeURIComponent(defaultMessage);
      const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
      console.log('Opening Get Fresh Juice WhatsApp URL:', whatsappUrl);
      try {
        window.open(whatsappUrl, '_blank');
      } catch (error) {
        console.error('Error opening WhatsApp URL for Get Fresh Juice:', error);
        alert('Failed to open WhatsApp. Please try again.');
      }
    }
  </script>
</body>
</html>