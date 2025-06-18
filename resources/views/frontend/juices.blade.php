

@extends('frontend.layout')

@section('content')
<style>
    /* Container Styles */
    .juices-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
        box-sizing: border-box;
    }

    .juices-title {
        font-size: 3.5rem;
        font-weight: 700;
        color: #006600;
        text-align: center;
        margin-bottom: 40px;
        font-family: 'Segoe UI', sans-serif;
    }

    .juices-title .highlight {
        color: #ff6600;
    }

    .juices-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: center;
    }

    .juice-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        padding: 25px;
        width: 350px;
        text-align: center;
        transition: all 0.3s ease-in-out;
    }

    .juice-card:hover {
        transform: translateY(-10px);
    }

    .juice-card img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 15px;
        margin-bottom: 20px;
    }

    .juice-card h3 {
        color: #009900;
        font-size: 1.6rem;
        margin-bottom: 10px;
    }

    .juice-card p.description {
        color: #555;
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .juice-card p.price {
        color: #ff6600;
        font-size: 1.2rem;
        font-weight: bold;
    }

    /* Footer Styles from About Us */
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
        .juices-title {
            font-size: 2.5rem;
        }

        .juice-card {
            width: 100%;
            max-width: 350px;
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
        .juices-title {
            font-size: 2rem;
        }

        .juice-card {
            width: 100%;
            padding: 15px;
        }

        .juice-card img {
            height: 250px;
        }

        .juice-card h3 {
            font-size: 1.4rem;
        }

        .juice-card p.description {
            font-size: 1rem;
        }

        .juice-card p.price {
            font-size: 1.1rem;
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

<!-- Include Font Awesome for footer social icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="juices-container">
    <h1 class="juices-title">Our <span class="highlight">Juices</span></h1>

    <div class="juices-grid">
        @forelse($juices as $juice)
            <div class="juice-card">
                @if($juice->image)
                    <img src="{{ asset('storage/' . $juice->image) }}" alt="{{ $juice->name }}">
                @else
                    <p>No image available</p>
                @endif
                <h3>{{ $juice->name }}</h3>
                <p class="description">{{ $juice->description }}</p>
                <p class="price">UGX {{ number_format($juice->price) }}</p>
            </div>
        @empty
            <p>No juices found.</p>
        @endforelse
    </div>
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
                    <a href="https://facebook.com" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
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