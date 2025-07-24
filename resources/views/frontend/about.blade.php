@extends('frontend.layout')

@section('content')
<style>
    html, body {
        background: linear-gradient(to right, #fff8e1, #fff3e0) !important;
        color: #333;
        font-family: 'Segoe UI', sans-serif;
        padding: 0 !important;
        margin: 0 !important;
        width: 100%;
        overflow-x: hidden;
    }

    .about-container {
        width: 100%;
        margin: 0 !important;
        padding: 60px 20px;
        box-sizing: border-box;
    }

    .about-title {
        font-size: 3.5rem;
        font-weight: 700;
        color: #006600;
        text-align: center;
        margin-bottom: 20px;
        padding-left: 5%;
        padding-right: 5%;
    }

    .highlight {
        color: #ff6600;
    }

    .about-text {
        text-align: left;
        font-size: 1.25rem;
        margin-bottom: 40px;
        line-height: 1.6;
        color: #555;
        padding: 0 5%;
    }

    .flavors-section {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 40px;
        margin-top: 40px;
        padding: 0 20px;
    }

    .flavor-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        padding: 25px;
        width: 300px;
        text-align: center;
        transition: all 0.3s ease-in-out;
    }

    .flavor-card:hover {
        transform: translateY(-10px);
    }

    .flavor-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-radius: 15px;
        margin-bottom: 20px;
    }

    .flavor-card h4 {
        color: #009900;
        margin-bottom: 10px;
        font-size: 1.4rem;
    }

    .mission-vision {
        background: #fefefe;
        padding: 50px 40px;
        margin: 80px 0;
        border-radius: 0;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        width: 100%;
    }

    .mission-vision h3 {
        color: #ff6600;
        font-size: 2rem;
        margin-top: 20px;
        text-align: center;
        padding-left: 5%;
        padding-right: 5%;
    }

    .mission-vision p {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #444;
        text-align: left;
        padding: 0 5%;
    }

    .images-section {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 40px;
        margin-top: 40px;
        padding: 0 20px;
    }

    .image-card {
        text-align: center;
        width: 300px;
    }

    .image-card .image-container {
        width: 300px;
        height: 220px;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        flex-shrink: 0;
        margin-bottom: 15px;
    }

    .image-card .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-card h4 {
        color: #009900;
        margin-bottom: 10px;
        font-size: 1.4rem;
    }

    .why-us {
        background: linear-gradient(to right, #e0f7fa, #e8f5e9);
        padding: 60px 20px;
        margin: 0;
        border-radius: 0;
        width: 100%;
        text-align: center;
    }

    .why-us h3 {
        font-size: 2rem;
        color: #00695c;
        margin-bottom: 25px;
        text-align: center;
        padding-left: 5%;
        padding-right: 5%;
    }

    .why-us ul {
        list-style: none;
        padding: 0;
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        display: inline-block;
    }

    .why-us ul li {
        font-size: 1.15rem;
        margin-bottom: 15px;
        position: relative;
        padding-left: 40px;
        color: #333;
        text-align: left;
        display: block;
    }

    .why-us ul li::before {
        content: '✔';
        color: #2e7d32;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .why-us .description-container {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        padding: 0 5%;
    }

    .why-us .description-container p {
        font-size: 1.15rem;
        margin-bottom: 15px;
        position: relative;
        padding-left: 40px;
        color: #333;
        text-align: left;
        display: block;
    }

    .why-us .description-container p::before {
        content: '✔';
        position: absolute;
        left: 10px;
        color: #2e7d32;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .dynamic-section {
        margin: 40px 20px;
        padding: 20px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        width: calc(100% - 40px);
    }

    .dynamic-section h3 {
        color: #006600;
        font-size: 1.8rem;
        margin-bottom: 20px;
        text-align: center;
        padding-left: 5%;
        padding-right: 5%;
    }

    .dynamic-section p {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #555;
        text-align: left;
        padding: 0 5%;
    }

    .dynamic-section img {
        width: 100%;
        max-width: 400px;
        height: auto;
        border-radius: 15px;
        margin: 20px auto;
        display: block;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    #page-footer {
        background: linear-gradient(180deg, #1a3c34 0%, #0f2a22 100%) !important;
        color: #fff !important;
        position: relative !important;
        padding: 60px 0 20px !important;
        overflow: hidden !important;
        font-family: 'Arial', sans-serif !important;
        margin: 0 !important;
        border-top: none !important;
        width: 100vw !important;
        margin-left: calc(-50vw + 50%) !important;
    }

    #page-footer .footer-glow {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100% !important;
        background: radial-gradient(circle at 50% 0%, rgba(100, 255, 218, 0.2) 0%, transparent 70%) !important;
        z-index: 0 !important;
        opacity: 0.5 !important;
        pointer-events: none !important;
    }

    #page-footer .footer-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 20px !important;
        position: relative !important;
        z-index: 1 !important;
    }

    #page-footer .footer-content {
        display: grid !important;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)) !important;
        gap: 40px !important;
        margin-bottom: 40px !important;
    }

    #page-footer .footer-section {
        display: flex !important;
        flex-direction: column !important;
        gap: 15px !important;
    }

    #page-footer .footer-section h4 {
        font-size: 1.2rem !important;
        font-weight: 600 !important;
        color: #64ffd6 !important;
        margin-bottom: 10px !important;
        text-transform: uppercase !important;
        letter-spacing: 1px !important;
    }

    #page-footer .footer-section.links ul {
        list-style: none !important;
        padding: 0 !important;
        margin: 0 !important;
        display: flex !important;
        flex-direction: row !important;
        flex-wrap: wrap !important;
        gap: 15px !important;
    }

    #page-footer .footer-section.links ul li {
        margin-bottom: 0 !important;
        white-space: nowrap !important;
    }

    #page-footer .footer-section ul li a {
        color: #d1d1d1 !important;
        text-decoration: none !important;
        font-size: 0.95rem !important;
        transition: color 0.3s ease !important;
    }

    #page-footer .footer-section ul li a:hover {
        color: #64ffd6 !important;
        text-decoration: none !important;
    }

    #page-footer .social-icons {
        display: flex !important;
        gap: 15px !important;
    }

    #page-footer .social-icon {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 40px !important;
        height: 40px !important;
        background: rgba(255, 255, 255, 0.1) !important;
        border-radius: 50% !important;
        color: #fff !important;
        text-decoration: none !important;
        font-size: 1.2rem !important;
        transition: background 0.3s ease, transform 0.3s ease !important;
    }

    #page-footer .social-icon:hover {
        background: #64ffd6 !important;
        color: #1a3c34 !important;
        transform: scale(1.1) !important;
    }

    #page-footer .contact-toggle {
        background: #64ffd6 !important;
        color: #1a3c34 !important;
        border: none !important;
        padding: 10px 20px !important;
        font-size: 0.95rem !important;
        font-weight: 600 !important;
        border-radius: 25px !important;
        cursor: pointer !important;
        transition: background 0.3s ease, transform 0.3s ease !important;
        width: fit-content !important;
    }

    #page-footer .contact-toggle:hover {
        background: #4ad9b8 !important;
        transform: translateY(-2px) !important;
    }

    #page-footer .contact-form {
        display: none !important;
        flex-direction: column !important;
        gap: 10px !important;
        margin-top: 10px !important;
        width: 100% !important;
    }

    #page-footer .contact-form.active {
        display: flex !important;
    }

    #page-footer .contact-form textarea {
        background: rgba(255, 255, 255, 0.1) !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        border-radius: 8px !important;
        padding: 10px !important;
        color: #fff !important;
        font-size: 0.95rem !important;
        resize: vertical !important;
        min-height: 100px !important;
        outline: none !important;
        transition: border 0.3s ease !important;
        width: 100% !important;
    }

    #page-footer .contact-form textarea:focus {
        border-color: #64ffd6 !important;
    }

    #page-footer .contact-form button {
        background: #64ffd6 !important;
        color: #1a3c34 !important;
        border: none !important;
        padding: 10px !important;
        font-size: 0.95rem !important;
        font-weight: 600 !important;
        border-radius: 25px !important;
        cursor: pointer !important;
        transition: background 0.3s ease, transform 0.3s ease !important;
    }

    #page-footer .contact-form button:hover {
        background: #4ad9b8 !important;
        transform: translateY(-2px) !important;
    }

    #page-footer .footer-bottom {
        text-align: center !important;
        padding-top: 20px !important;
        border-top: 1px solid rgba(255, 255, 255, 0.1) !important;
        margin-top: -20px !important;
    }

    #page-footer .footer-bottom p {
        font-size: 0.85rem !important;
        color: #b0b0b0 !important;
        margin: 10px 0 0 !important;
    }

    @media (max-width: 768px) {
        .about-title {
            font-size: 2.5rem;
            padding-left: 3%;
            padding-right: 3%;
        }

        .about-text {
            padding: 0 3%;
        }

        .images-section {
            flex-direction: column;
            margin: 40px 0;
            align-items: center;
        }

        .image-card {
            width: 90%;
        }

        .image-card .image-container {
            width: 300px;
            height: 220px;
        }

        .mission-vision, .dynamic-section {
            margin: 40px 0;
            padding: 30px 20px;
        }

        .mission-vision h3, .why-us h3, .dynamic-section h3 {
            padding-left: 3%;
            padding-right: 3%;
        }

        .mission-vision p, .dynamic-section p {
            padding: 0 3%;
        }

        .why-us ul, .why-us .description-container {
            padding: 0 3%;
        }

        .why-us {
            padding: 40px 20px;
        }

        #page-footer .footer-content {
            grid-template-columns: 1fr !important;
            text-align: center !important;
            gap: 20px !important;
        }

        #page-footer .footer-section {
            align-items: center !important;
        }

        #page-footer .footer-section.links ul {
            justify-content: center !important;
        }

        #page-footer .social-icons {
            justify-content: center !important;
        }

        #page-footer .contact-toggle {
            margin: 0 auto !important;
        }
    }

    @media (max-width: 480px) {
        .about-title {
            font-size: 2rem;
            padding-left: 3%;
            padding-right: 3%;
        }

        .about-text {
            font-size: 1rem;
            padding: 0 3%;
        }

        .flavor-card {
            width: 100%;
            padding: 15px;
        }

        .mission-vision h3, .why-us h3, .dynamic-section h3 {
            font-size: 1.5rem;
            padding-left: 3%;
            padding-right: 3%;
        }

        .flavor-card {
            width: 90%;
        }

        .image-card .image-container {
            width: 280px;
            height: 200px;
        }

        .mission-vision p, .dynamic-section p {
            padding: 0 3%;
        }

        .why-us ul, .why-us .description-container {
            padding: 0 3%;
        }

        #page-footer {
            padding: 25px 0 15px !important;
        }

        #page-footer .footer-content {
            gap: 20px !important;
        }

        #page-footer .footer-section h4 {
            font-size: 1rem !important;
        }

        #page-footer .footer-section.links ul {
            flex-direction: column !important;
            gap: 8px !important;
            align-items: center !important;
        }
    }
</style>

<!-- Include Font Awesome for social icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="about-container">
    <h2 class="about-title">About <span class="highlight"> Cane 2025</span> Juice</h2>
    <p class="about-text">
      Cane 2025 is a Ugandan beverage company specializing in the production of freshly extracted, all-natural sugarcane juice. Unlike traditional roadside vendors, we offer a hygienic, certified product that is free from added sugars, preservatives, or artificial ingredients. Our product is enriched with fresh lemon and ginger, offering both a refreshing and health-conscious alternative to sugary drinks.

      We are committed to creating value by offering a premium, all-natural beverage while supporting sustainable agricultural practices. Our goal is to expand into international markets and position Tropical Cane as a leading brand in healthy beverages.
    </p>

    @if($sections->isNotEmpty())
        @foreach($sections as $section)
            @if(!in_array($section->title, ['Lemon & Ginger', 'Tangerine & Ginger', 'Our Team', 'Juice Process', 'Our Mission', 'Our Vision', 'Why Choose Tropical Cane?']))
                <div class="dynamic-section">
                    @if($section->title)
                        <h3>{{ $section->title }}</h3>
                    @endif
                    
                    @if($section->image_path)
                        <img src="{{ Storage::url($section->image_path) }}" alt="{{ $section->title ?? 'Section Image' }}">
                    @endif
                    
                    @if($section->description)
                        <p>{{ $section->description }}</p>
                    @endif
                </div>
            @endif
        @endforeach
    @endif

    <div class="flavors-section">
        <div class="flavor-card">
            @php
                $lemonSection = $sections->where('title', 'Lemon & Ginger')->first();
            @endphp
            <img src="{{ $lemonSection && $lemonSection->image_path ? Storage::url($lemonSection->image_path) : asset('images/lemonade.jpg') }}" alt="Lemon and Ginger">
            <h4>Lemon & Ginger</h4>
            <p>{{ $lemonSection && $lemonSection->description ? $lemonSection->description : 'Refreshing, zesty, and filled with natural antioxidants that awaken your senses.' }}</p>
        </div>
        
        <div class="flavor-card">
            @php
                $tangerineSection = $sections->where('title', 'Tangerine & Ginger')->first();
            @endphp
            <img src="{{ $tangerineSection && $tangerineSection->image_path ? Storage::url($tangerineSection->image_path) : asset('images/tangerine.jpg') }}" alt="Tangerine and Ginger">
            <h4>Tangerine & Ginger</h4>
            <p>{{ $tangerineSection && $tangerineSection->description ? $tangerineSection->description : 'Sweet, citrusy, and crafted to uplift your energy – naturally.' }}</p>
        </div>
    </div>
    <br>
    <div class="mission-vision">
        @php
            $missionSection = $sections->where('title', 'Our Mission')->first();
            $visionSection = $sections->where('title', 'Our Vision')->first();
        @endphp
        
        <h3>Our Mission</h3>
        <p>{{ $missionSection && $missionSection->description ? $missionSection->description : 'To provide safe, hygienic, and all-natural sugarcane juice, sourced from locally grown sugarcanes, while promoting sustainable agriculture and offering a healthier alternative to sugary, mass-produced drinks.' }}</p>
        
        <br>
        
        <h3>Our Vision</h3>
        <p>{{ $visionSection && $visionSection->description ? $visionSection->description : 'Cane 2025’s vision is to diversify the established brand into a broader range of beverages, tapping into the global market for natural, healthy drinks. By leveraging the channels established through our core product, we will introduce new flavors and product lines while expanding our distribution footprint across Uganda and beyond. In the future, we also aim to export our products to larger international markets, positioning Tropical Cane as a globally recognized brand in the healthy beverage sector.' }}</p>
    </div>
    <br>
    <div class="flavors-section">
        <div class="flavor-card">
            @php
                $teamSection = $sections->where('title', 'Our Team')->first();
            @endphp
            <div class="image-container">
                <img src="{{ $teamSection && $teamSection->image_path ? Storage::url($teamSection->image_path) : asset('images/tc.PNG') }}" alt="Our Team">
            </div>
            <h4>Our Team</h4>
            <p>{{ $teamSection && $teamSection->description ? $teamSection->description : 'Our team during production time.' }}</p>
        </div>
        
        <div class="flavor-card">
            @php
                $processSection = $sections->where('title', 'Juice Process')->first();
            @endphp
            <div class="flavors-section">
                <img src="{{ $processSection && $processSection->image_path ? Storage::url($processSection->image_path) : asset('images/juice_process.jpg') }}" alt="Juice Process">
            </div>
            <h4>Juice Process</h4>
            <p>{{ $processSection && $processSection->description ? $processSection->description : 'The production process in progress' }}</p>
        </div>
    </div>
    <br>
    <div class="why-us">
        @php
            $whyUsSection = $sections->where('title', 'Why Choose Tropical Cane?')->first();
        @endphp
        
        <h3>Why Choose Cane 2025 Juice?</h3>
        @if($whyUsSection && $whyUsSection->description)
            <div class="description-container">
                @foreach(explode("\n", trim($whyUsSection->description)) as $item)
                    @if(trim($item))
                        <p>{{ trim($item) }}</p>
                    @endif
                @endforeach
            </div>
        @else
            <ul>
                <li>Locally sourced, fresh sugarcane pressed daily</li>
                <li>Eco-friendly packaging and zero-waste process</li>
                <li>100% natural ingredients with no artificial additives</li>
                <li>Friendly service and community-first mindset</li>
                <li>Unique, energizing flavors you won't find anywhere else</li>
            </ul>
        @endif
    </div>
    <br>
</div>

<footer id="page-footer">
    <div class="footer-glow"></div>
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-section links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="/about">About</a></li>
                    <li><a href="/juices">Juices</a></li>
                    <li><a href="/tips">Health Tips</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Connect</h4>
                <div class="social-icons">
                    <a href="https://www.facebook.com/cane2025sugarcanejuice" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://x.com/cane_juice_2025" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h4>Contact Us</h4>
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

<script>
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
</script>

@endsection