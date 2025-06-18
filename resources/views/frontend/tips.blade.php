

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthy Tips - Tropical Cane Juice</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/TC_LOGO.jpg') }}?v={{ time() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css?v=5" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @php
        $lemonBottle = $tipsImages->where('title', 'Lemon Ginger Bottle')->first();
        $tangerineBottle = $tipsImages->where('title', 'Tangerine Ginger Bottle')->first();
    @endphp
    <link rel="preload" href="{{ $lemonBottle && $lemonBottle->image_path ? Storage::url($lemonBottle->image_path) : asset('images/juice1.png') }}" as="image">
    <link rel="preload" href="{{ $tangerineBottle && $tangerineBottle->image_path ? Storage::url($tangerineBottle->image_path) : asset('images/tangerine_and_ginger_1-removebg-preview.png') }}" as="image">
    <style>
        :root {
            --primary-green: #00C851;
            --neutral-800: #1A1A1A;
            --light-citrus: white;
        }

        /* Navbar and Footer Styles */
        .navbar * {
            margin: 0 !important;
            padding: 0 !important;
            box-sizing: border-box !important;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif !important;
            background: linear-gradient(135deg, #2a6a2a 0%, #4a9a4a 100%) !important;
            min-height: 100vh;
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

        .navbar.scrolled .brand-name {
            color: #FFFFFF !important;
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

        .cta-button.navbar-cta {
            background: var(--primary-green) !important;
            color: white !important;
            font-weight: 600 !important;
            padding: 0.5rem 1rem !important;
            border-radius: 8px !important;
            text-decoration: none !important;
            transition: background 0.3s !important;
        }

        .cta-button.navbar-cta:hover {
            background: #33D474 !important;
        }

        footer {
            background: linear-gradient(180deg, #1a3c34 0%, #0f2a22 100%);
            color: #fff;
            position: relative;
            padding: 60px 0 20px;
            overflow: hidden;
            font-family: 'Arial', sans-serif;
        }

        .footer-glow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 50% 0%, rgba(100, 255, 218, 0.2) 0%, transparent 70%);
            z-index: 0;
            opacity: 0.5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .footer-section h4 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #64ffd6;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
            margin: flex;
            display: flex;
            gap: 15px;
        }

        .footer-section ul li {
            margin-bottom: 0;
        }

        .footer-section ul li a {
            color: #d1d1d1;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #64ffd6;
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: #fff;
            text-decoration: none;
            font-size: 1.2rem;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .social-icon:hover {
            background: #64ffd6;
            color: #1a3c34;
            transform: scale(1.1);
        }

        .contact-toggle {
            background: #64ffd6;
            color: #1a3c34;
            border: none;
            padding: 10px 20px;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 25px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .contact-toggle:hover {
            background: #4ad9b8;
            transform: translateY(-2px);
        }

        .contact-form {
            display: none;
            flex-direction: column;
            gap: 10px;
            margin-top: 10px;
        }

        .contact-form.active {
            display: flex;
        }

        .contact-form textarea {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            padding: 10px;
            color: #fff;
            font-size: 0.95rem;
            resize: vertical;
            min-height: 100px;
            outline: none;
            transition: border 0.3s ease;
        }

        .contact-form textarea:focus {
            border-color: #64ffd6;
        }

        .contact-form button {
            background: #64ffd6;
            color: #1a3c34;
            border: none;
            padding: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 25px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .contact-form button:hover {
            background: #4ad9b8;
            transform: translateY(-2px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: -20px;
        }

        .footer-bottom p {
            font-size: 0.85rem;
            color: #b0b0b0;
            margin: 10px 0 0;
        }

        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .footer-section ul {
                flex-direction: row;
                justify-content: center;
                flex-wrap: wrap;
            }

            .social-icons {
                justify-content: center;
            }

            .contact-form {
                align-items: center;
            }
        }

        /* Content Styles */
        .content-container {
            max-width: 1400px;
            margin: 140px auto 0;
            padding: 40px 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .product-info {
            color: white;
            animation: slideInLeft 1s ease-out;
        }

        .product-title {
            font-size: 4rem;
            font-weight: bold;
            line-height: 1.1;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            opacity: 0;
            animation: fadeInUp 1s ease-out 0.3s forwards;
        }

        .product-subtitle {
            font-size: 1.2rem;
            margin-bottom: 40px;
            opacity: 0.9;
            font-weight: 300;
            opacity: 0;
            animation: fadeInUp 1s ease-out 0.6s forwards;
        }

        .product-details {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            opacity: 0;
            animation: fadeInUp 1s ease-out 0.9s forwards;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-details:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .detail-title {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #ffd700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .info-description {
            font-size: 0.95rem;
            line-height: 1.6;
            opacity: 0.9;
        }

        .benefits-list {
            list-style: none;
            font-size: 0.95rem;
            line-height: 1.6;
            opacity: 0.9;
        }

        .benefit-item {
            margin-bottom: 10px;
        }

        .nutrition-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
            color: white;
        }

        .nutrition-table th,
        .nutrition-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nutrition-table th {
            font-weight: bold;
            color: #ffd700;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .nutrition-table td {
            opacity: 0.9;
        }

        .nutrition-table tr:last-child td {
            border-bottom: none;
        }

        .cta-button {
            background: linear-gradient(45deg, #3a6a3a, #5a9a5a);
            color: white;
            border: none;
            padding: 18px 40px;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 50px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(58, 106, 58, 0.4);
            opacity: 0;
            animation: fadeInUp 1s ease-out 1.2s forwards;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(58, 106, 58, 0.6);
            background: linear-gradient(45deg, #5a9a5a, #3a6a3a);
        }

        .cta-button:active {
            transform: translateY(-1px);
        }

        .product-visual {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: slideInRight 1s ease-out;
        }

        .product-image {
            width: 400px;
            height: 600px;
            object-fit: cover;
            border-radius: 30px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
            transition: transform 0.5s ease;
            opacity: 0;
            animation: zoomIn 1s ease-out 0.5s forwards;
        }

        .product-image:hover {
            transform: scale(1.05) rotate(2deg);
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .floating-circle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .circle-1 {
            width: 80px;
            height: 80px;
            top: 10%;
            right: 10%;
            animation-delay: 0s;
        }

        .circle-2 {
            width: 120px;
            height: 120px;
            bottom: 20%;
            left: -10%;
            animation-delay: 2s;
        }

        .circle-3 {
            width: 60px;
            height: 60px;
            top: 60%;
            right: -5%;
            animation-delay: 4s;
        }

        .flavor-navigation {
            position: absolute;
            bottom: -80px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            opacity: 0;
            animation: fadeInUp 1s ease-out 1.5s forwards;
        }

        .flavor-button {
            background: linear-gradient(45deg, #3a6a3a, #5a9a5a);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(58, 106, 58, 0.3);
            pointer-events: auto;
            z-index: 1;
        }

        .flavor-button:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(58, 106, 58, 0.5);
            background: linear-gradient(45deg, #5a9a5a, #3a6a3a);
        }

        .flavor-button.active {
            border: 2px solid #ffd700;
            background: linear-gradient(45deg, #5a9a5a, #3a6a3a);
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-100px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(100px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes zoomIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .glow-effect {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255, 215, 0, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulse 4s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .navbar { height: 120px !important; }
            .navbar-container { padding: 0 1rem !important; flex-direction: row !important; }
            .navbar-brand { flex-direction: row !important; align-items: center !important; gap: 0.5rem !important; }
            .brand-text { text-align: left !important; align-items: flex-start !important; }
            .brand-logo { width: 60px !important; height: 60px !important; margin-bottom: 0 !important; }
            .brand-name { font-size: 1.2rem !important; }
            .brand-tagline { font-size: 0.7rem !important; }
            .navbar-toggler { display: block !important; position: absolute !important; right: 1rem !important; top: 1.2rem !important; z-index: 1001 !important; }
            .navbar-collapse { position: absolute !important; top: 120px !important; left: 0 !important; width: 100% !important; background: var(--light-citrus) !important; z-index: 999 !important; padding: 1rem !important; flex-direction: column !important; align-items: flex-start !important; display: none !important; }
            .navbar-collapse.show { display: flex !important; }
            .navbar.scrolled .navbar-collapse { background: var(--neutral-800) !important; }
            .navbar-collapse .navbar-nav { flex-direction: column !important; width: 100% !important; gap: 0.5rem !important; }
            .navbar-collapse .nav-link { padding: 0.5rem 1rem !important; width: 100% !important; }
            .navbar-collapse .cta-button.navbar-cta { margin-top: 0.5rem !important; width: 100% !important; text-align: center !important; }
            .content-container { margin-top: 120px; grid-template-columns: 1fr; text-align: center; }
            .product-title { font-size: 2.5rem; }
            .product-image { width: 300px; height: 450px; }
        }

        @media (max-width: 576px) {
            .navbar { height: 100px !important; }
            .navbar-toggler { top: 0.5rem !important; }
            .brand-logo { width: 50px !important; height: 50px !important; }
            .brand-name { font-size: 1rem !important; }
            .brand-tagline { font-size: 0.6rem !important; }
            .navbar-collapse { top: 100px !important; }
            .content-container { margin-top: 100px; }
        }

        @media (max-width: 480px) {
            .flavor-navigation {
                left: 0;
                transform: translateX(0);
                justify-content: flex-start;
            }
            footer {
                margin-top: 4rem !important;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="/" class="navbar-brand">
                <img src="{{ asset('images/TC_LOGO.jpg') }}" alt="Tropical Cane Logo" class="brand-logo">
                <div class="brand-text">
                    <div class="brand-name">Tropical Cane</div>
                    <div class="brand-tagline">Fresh • Natural • Pure</div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/juices">Our Juices</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/tips">Healthy Tips</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact Us</a></li>
                </ul>
                <a href="/contact" class="cta-button navbar-cta ms-2">Get Fresh Juice</a>
            </div>
        </div>
    </nav>

    <div class="content-container">
        <div class="product-info">
            <h1 class="product-title" id="main-title">CITRUS GINGER CANE</h1>
            <p class="product-subtitle" id="main-subtitle">420ml Fresh Daily</p>
            <div class="product-details">
                <h3 class="detail-title">Description</h3>
                <p class="info-description" id="product-description">
                    Fresh organic ginger blended with zesty lemon and natural sugarcane juice.
                    Made daily with premium ingredients, this energizing blend delivers a perfect balance
                    of warmth from ginger and brightness from fresh citrus.
                </p>
            </div>
            <div class="product-details">
                <h3 class="detail-title">Health Benefits</h3>
                <ul class="benefits-list" id="benefits-list">
                    <li class="benefit-item">Immunity boost from vitamin C and antioxidants</li>
                    <li class="benefit-item">Anti-inflammatory properties from fresh ginger</li>
                    <li class="benefit-item">Digestive aid and nausea relief</li>
                    <li class="benefit-item">Natural energy from sugarcane</li>
                    <li class="benefit-item">Metabolism support and detox benefits</li>
                </ul>
            </div>
            <div class="product-details">
                <h3 class="detail-title">Nutritional Content</h3>
                <table class="nutrition-table" id="nutrition-table">
                    <thead>
                        <tr>
                            <th>Ingredient</th>
                            <th>Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Fresh Ginger</td>
                            <td>15g</td>
                        </tr>
                        <tr>
                            <td>Lemon Juice</td>
                            <td>120ml</td>
                        </tr>
                        <tr>
                            <td>Sugarcane Juice</td>
                            <td>285ml</td>
                        </tr>
                        <tr>
                            <td>Natural Sugars</td>
                            <td>28g</td>
                        </tr>
                        <tr>
                            <td>Vitamin C</td>
                            <td>45mg</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="cta-button" onclick="orderNow()">Order Now</button>
        </div>
        <div class="product-visual">
            <div class="glow-effect"></div>
            <div class="floating-elements">
                <div class="floating-circle circle-1"></div>
                <div class="floating-circle circle-2"></div>
                <div class="floating-circle circle-3"></div>
            </div>
            <img src="{{ $lemonBottle && $lemonBottle->image_path ? Storage::url($lemonBottle->image_path) : asset('images/juice1.png') }}" alt="Ginger Lemon Cane Juice" class="product-image" id="productImage">
            <div class="flavor-navigation">
                <button class="flavor-button active" data-flavor="ginger-lemon" onclick="changeFlavor('ginger-lemon', this)">Lemon</button>
                <button class="flavor-button" data-flavor="ginger-tangerine" onclick="changeFlavor('ginger-tangerine', this)">Tangerine</button>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-glow"></div>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Explore</h4>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/juices">Our Juices</a></li>
                        <li><a href="/tips">Healthy Tips</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Connect</h4>
                    <div class="social-icons">
                        <a href="https://facebook.com" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="https://instagram.com" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Contact</h4>
                    <button class="contact-toggle" onclick="toggleContactForm()">Message Us</button>
                    <div class="contact-form" id="contactForm">
                        <textarea placeholder="Your message..." id="contactMessage"></textarea>
                        <button onclick="sendToWhatsApp()">Send</button>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 Tropical Cane Juice. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar Scroll Behavior
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Navbar Toggle for Mobile
        document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    bootstrap.Collapse.getInstance(navbarCollapse).hide();
                }
            });
        });

        // Content Scripts
        let currentFlavor = 'ginger-lemon';

        const flavorData = {
            'ginger-lemon': {
                title: 'CITRUS GINGER CANE',
                subtitle: '420ml Fresh Daily',
                image: '{{ $lemonBottle && $lemonBottle->image_path ? Storage::url($lemonBottle->image_path) : asset('images/juice1.png') }}',
                description: 'Fresh organic ginger blended with zesty lemon and natural sugarcane juice. Made daily with premium ingredients, this energizing blend delivers a perfect balance of warmth from ginger and brightness from fresh citrus.',
                benefits: [
                    'Immunity boost from vitamin C and antioxidants',
                    'Anti-inflammatory properties from fresh ginger',
                    'Digestive aid and nausea relief',
                    'Natural energy from sugarcane',
                    'Metabolism support and detox benefits'
                ],
                nutrition: [
                    ['Fresh Ginger', '15g'],
                    ['Lemon Juice', '120ml'],
                    ['Sugarcane Juice', '285ml'],
                    ['Natural Sugars', '28g'],
                    ['Vitamin C', '45mg']
                ],
                background: 'linear-gradient(135deg, #2a6a2a 0%, #4a9a4a 100%)'
            },
            'ginger-tangerine': {
                title: 'CITRUS TANGERINE CANE',
                subtitle: '420ml Fresh Daily',
                image: '{{ $tangerineBottle && $tangerineBottle->image_path ? Storage::url($tangerineBottle->image_path) : asset('images/tangerine_and_ginger_1-removebg-preview.png') }}',
                description: 'Warming ginger root combined with sweet tangerine and pure sugarcane juice. This vibrant blend offers a tropical twist with the same energizing benefits, delivering natural sweetness and citrus brightness in every sip.',
                benefits: [
                    'Energy surge from natural citrus and cane sugars',
                    'Metabolism boost from fresh ginger root',
                    'Mental clarity from citrus essential oils',
                    'Digestive support and warming properties',
                    'Rich in vitamin C and natural antioxidants'
                ],
                nutrition: [
                    ['Fresh Ginger', '15g'],
                    ['Tangerine Juice', '125ml'],
                    ['Sugarcane Juice', '280ml'],
                    ['Natural Sugars', '30g'],
                    ['Vitamin C', '52mg']
                ],
                background: 'linear-gradient(135deg, #4a9a4a 0%, #2a6a2a 100%)'
            }
        };

        function changeFlavor(flavor, element) {
            console.log("Changing to flavor:", flavor);
            if (flavor === currentFlavor) return;

            currentFlavor = flavor;
            const data = flavorData[flavor];

            document.querySelectorAll('.flavor-button').forEach(button => {
                button.classList.remove('active');
            });
            element.classList.add('active');

            const elements = {
                title: document.getElementById('main-title'),
                subtitle: document.getElementById('main-subtitle'),
                image: document.getElementById('productImage'),
                description: document.getElementById('product-description'),
                benefitsList: document.getElementById('benefits-list'),
                nutritionTable: document.getElementById('nutrition-table').querySelector('tbody')
            };

            Object.values(elements).forEach(el => {
                if (el) el.style.opacity = '0';
            });

            document.body.style.background = data.background;

            setTimeout(() => {
                elements.title.textContent = data.title;
                elements.subtitle.textContent = data.subtitle;
                elements.image.src = data.image;
                elements.image.alt = `${flavor} drink can`;
                elements.description.textContent = data.description;

                elements.benefitsList.innerHTML = data.benefits.map(benefit =>
                    `<li class="benefit-item">${benefit}</li>`
                ).join('');

                elements.nutritionTable.innerHTML = data.nutrition.map(([content, amount]) =>
                    `<tr><td>${content}</td><td>${amount}</td></tr>`
                ).join('');

                Object.values(elements).forEach(el => {
                    if (el) el.style.opacity = '1';
                });
            }, 300);
        }

        function orderNow() {
            const flavorTitle = flavorData[currentFlavor].title;
            const message = `I want to order ${flavorTitle} juice`;
            const whatsappNumber = '+256776644143';
            const encodedMessage = encodeURIComponent(message);
            const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
            try {
                window.open(whatsappUrl, '_blank');
            } catch (error) {
                console.error('Error opening WhatsApp URL:', error);
                alert('Failed to open WhatsApp. Please try again.');
            }
        }

        function toggleContactForm() {
            const form = document.getElementById('contactForm');
            form.classList.toggle('active');
        }

        function sendToWhatsApp() {
            const message = document.getElementById('contactMessage').value.trim();
            if (!message) {
                alert('Please enter a message before submitting.');
                return;
            }
            const whatsappNumber = '+256776644143';
            const encodedMessage = encodeURIComponent(message);
            const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
            window.open(whatsappUrl, '_blank');
            document.getElementById('contactMessage').value = '';
            document.getElementById('contactForm').classList.remove('active');
        }

        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;

            document.querySelector('.floating-elements').style.transform = `translateY(${rate}px)`;
        });

        document.addEventListener('mousemove', (e) => {
            const mouseX = e.clientX / window.innerWidth;
            const mouseY = e.clientY / window.innerHeight;

            document.querySelectorAll('.floating-circle').forEach((circle, index) => {
                const speed = (index + 1) * 20;
                const x = (mouseX - 0.5) * speed;
                const y = (mouseY - 0.5) * speed;

                circle.style.transform = `translate(${x}px, ${y}px)`;
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.flavor-button').forEach(button => {
                button.addEventListener('click', () => {
                    const flavor = button.getAttribute('data-flavor');
                    changeFlavor(flavor, button);
                });
            });
        });
    </script>
</body>
</html>

