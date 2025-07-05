@extends('frontend.layout')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    
    .contact-hero {
        background: linear-gradient(135deg, #ff8c00 0%, #32cd32 50%, #ffd700 100%);
        position: relative;
        overflow: hidden;
    }
    
    .contact-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1.5" fill="rgba(255,255,255,0.08)"/><circle cx="50" cy="10" r="0.8" fill="rgba(255,255,255,0.12)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }
    
    .floating-shapes {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
    }
    
    .floating-shapes::before,
    .floating-shapes::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 215, 0, 0.2);
        animation: float 6s ease-in-out infinite;
    }
    
    .floating-shapes::before {
        width: 80px;
        height: 80px;
        top: 20%;
        left: 10%;
        animation-delay: -2s;
    }
    
    .floating-shapes::after {
        width: 120px;
        height: 120px;
        top: 60%;
        right: 15%;
        animation-delay: -4s;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        padding: 100px 20px 80px;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .hero-title {
        font-family: 'Inter', sans-serif;
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        margin-bottom: 20px;
        background: linear-gradient(135deg, #ffffff 0%, #fffacd 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 4px 20px rgba(255,140,0,0.3);
    }
    
    .hero-subtitle {
        font-size: 1.25rem;
        font-weight: 300;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
        text-align: center;
    }
    
    .contact-container {
        max-width: 1200px;
        margin: -60px auto 0;
        padding: 0 20px 80px;
        position: relative;
        z-index: 3;
    }
    
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-bottom: 60px;
    }
    
    @media (max-width: 768px) {
        .contact-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
    }
    
    .contact-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        position: relative;
        overflow: hidden;
    }
    
    .contact-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #ff8c00, #32cd32, #ffd700, #ff6347, #7fff00);
        transition: all 0.3s ease;
    }
    
    .contact-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
    }
    
    .contact-card:hover::before {
        height: 6px;
    }
    
    .card-icon {
        width: 64px;
        height: 64px;
        border-radius: 16px;
        background: linear-gradient(135deg, #ff8c00 0%, #32cd32 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 24px;
        font-size: 24px;
        color: white;
        box-shadow: 0 8px 32px rgba(255, 140, 0, 0.4);
    }
    
    .card-title {
        font-family: 'Inter', sans-serif;
        font-size: 1.5rem;
        font-weight: 600;
        color: #1a202c;
        margin-bottom: 16px;
    }
    
    .card-content {
        color: #4a5568;
        line-height: 1.6;
        font-size: 1rem;
    }
    
    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 16px;
        padding: 12px;
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    
    .contact-item:hover {
        background: rgba(255, 140, 0, 0.08);
        transform: translateX(8px);
    }
    
    .contact-item-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: linear-gradient(135deg, #ff8c00, #32cd32);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 16px;
        font-size: 16px;
        color: white;
        flex-shrink: 0;
    }
    
    .contact-link {
        color: #ff8c00;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        position: relative;
    }
    
    .contact-link::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #ff8c00, #32cd32);
        transition: width 0.3s ease;
    }
    
    .contact-link:hover::after {
        width: 100%;
    }
    
    .map-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba historians://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1.5" fill="rgba(255,255,255,0.08)"/><circle cx="50" cy="10" r="0.8" fill="rgba(255,255,255,0.12)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }
    
    .floating-shapes {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
    }
    
    .floating-shapes::before,
    .floating-shapes::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 215, 0, 0.2);
        animation: float 6s ease-in-out infinite;
    }
    
    .floating-shapes::before {
        width: 80px;
        height: 80px;
        top: 20%;
        left: 10%;
        animation-delay: -2s;
    }
    
    .floating-shapes::after {
        width: 120px;
        height: 120px;
        top: 60%;
        right: 15%;
        animation-delay: -4s;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        padding: 100px 20px 80px;
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .hero-title {
        font-family: 'Inter', sans-serif;
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        margin-bottom: 20px;
        background: linear-gradient(135deg, #ffffff 0%, #fffacd 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 4px 20px rgba(255,140,0,0.3);
    }
    
    .hero-subtitle {
        font-size: 1.25rem;
        font-weight: 300;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
        text-align: center;
    }
    
    .contact-container {
        max-width: 1200px;
        margin: -60px auto 0;
        padding: 0 20px 80px;
        position: relative;
        z-index: 3;
    }
    
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-bottom: 60px;
    }
    
    @media (max-width: 768px) {
        .contact-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
    }
    
    .contact-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        position: relative;
        overflow: hidden;
    }
    
    .contact-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #ff8c00, #32cd32, #ffd700, #ff6347, #7fff00);
        transition: all 0.3s ease;
    }
    
    .contact-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
    }
    
    .contact-card:hover::before {
        height: 6px;
    }
    
    .card-icon {
        width: 64px;
        height: 64px;
        border-radius: 16px;
        background: linear-gradient(135deg, #ff8c00 0%, #32cd32 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 24px;
        font-size: 24px;
        color: white;
        box-shadow: 0 8px 32px rgba(255, 140, 0, 0.4);
    }
    
    .card-title {
        font-family: 'Inter', sans-serif;
        font-size: 1.5rem;
        font-weight: 600;
        color: #1a202c;
        margin-bottom: 16px;
    }
    
    .card-content {
        color: #4a5568;
        line-height: 1.6;
        font-size: 1rem;
    }
    
    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 16px;
        padding: 12px;
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    
    .contact-item:hover {
        background: rgba(255, 140, 0, 0.08);
        transform: translateX(8px);
    }
    
    .contact-item-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: linear-gradient(135deg, #ff8c00, #32cd32);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 16px;
        font-size: 16px;
        color: white;
        flex-shrink: 0;
    }
    
    .contact-link {
        color: #ff8c00;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        position: relative;
    }
    
    .contact-link::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #ff8c00, #32cd32);
        transition: width 0.3s ease;
    }
    
    .contact-link:hover::after {
        width: 100%;
    }
    
    .map-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        margin-bottom: 40px;
        position: relative;
    }
    
    .map-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #ff8c00, #32cd32, #ffd700, #ff6347, #7fff00);
        z-index: 1;
    }
    
    .map-container iframe {
        width: 100%;
        height: 400px;
        border: none;
        filter: grayscale(20%) contrast(1.1);
        transition: filter 0.3s ease;
    }
    
    .map-container:hover iframe {
        filter: grayscale(0%) contrast(1.2);
    }
    
    .social-links {
        display: flex;
        gap: 16px;
        margin-top: 24px;
        flex-wrap: wrap;
    }
    
    .social-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: linear-gradient(135deg, #ff8c00 0%, #32cd32 100%);
        color: white;
        text-decoration: none;
        font-size: 20px;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    
    .social-link:hover {
        transform: translateY(-4px) scale(1.1);
        box-shadow: 0 12px 32px rgba(255, 140, 0, 0.5);
    }
    
    .social-link.facebook { background: linear-gradient(135deg, #1877f2, #ff8c00); }
    .social-link.instagram { background: linear-gradient(135deg, #e1306c, #ff8c00, #ffd700); }
    .social-link.whatsapp { background: linear-gradient(135deg, #25d366, #32cd32); }
    
    .cta-section {
        text-align: center;
        padding: 60px 40px;
        background: linear-gradient(135deg, #ff8c00 0%, #32cd32 50%, #ffd700 100%);
        border-radius: 24px;
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,215,0,0.2) 0%, transparent 70%);
        animation: pulse 4s ease-in-out infinite;
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 0.5; }
        50% { transform: scale(1.1); opacity: 0.8; }
    }
    
    .cta-title {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 16px;
        position: relative;
        z-index: 2;
    }
    
    .cta-text {
        font-size: 1.1rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
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

<div class="contact-hero">
    <div class="floating-shapes"></div>
    <div class="hero-content">
        <h1 class="hero-title">Let's Connect</h1>
        <p class="hero-subtitle">Ready to experience the freshest Cane flavors? Reach out to us and let's create something amazing together.</p>
    </div>
</div>
<br>
<div class="contact-container">
    <div class="contact-grid">
        <!-- Contact Information Card -->
        <div class="contact-card">
            <div class="card-icon">📍</div>
            <h3 class="card-title">Visit Our Location</h3>
            <div class="card-content">
                <div class="contact-item">
                    <div class="contact-item-icon">🏢</div>
                    <div>
                        <strong>Cane 2025 Juice HQ</strong><br>
                        Kyambogo - Banda, Kampala, Uganda
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-item-icon">📧</div>
                    <div>
                        <strong>Email Us</strong><br>
                        <a href="mailto:canetropical@gmail.com" class="contact-link">canetropical@gmail.com</a>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-item-icon">📱</div>
                    <div>
                        <strong>Call or WhatsApp</strong><br>
                        <a href="https://wa.me/256776644143" target="_blank" class="contact-link">+256 776 644143</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Connect With Us Card -->
        <div class="contact-card">
            <div class="card-icon">💬</div>
            <h3 class="card-title">Connect With Us</h3>
            <div class="card-content">
                <p>Join our community and stay updated with the latest tropical juice creations, health tips, and exclusive offers. We love hearing from our customers!</p>
                
                <div class="social-links">
                    <a href="https://facebook.com/yourpage" target="_blank" class="social-link facebook" title="Facebook">
                        📘
                    </a>
                    <a href="https://instagram.com/yourpage" target="_blank" class="social-link instagram" title="Instagram">
                        📷
                    </a>
                    <a href="https://wa.me/256776644143" target="_blank" class="social-link whatsapp" title="WhatsApp">
                        💬
                    </a>
                </div>
                
                <p style="margin-top: 24px; font-size: 0.95rem; color: #6b7280;">
                    <strong>Business Hours:</strong><br>
                    Monday - Saturday: 8:00 AM - 8:00 PM<br>
                    Sunday: 10:00 AM - 6:00 PM
                </p>
            </div>
        </div>
    </div>
<br>
    <!-- Google Map -->
    <div class="map-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7977.598859866826!2d32.62435752331524!3d0.3475854785225387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177dbc78ec382e95%3A0x5e9d295fa01b1f71!2sKyambogo%20University%2C%20Kampala!5e0!3m2!1sen!2sug!4v1719932357890!5m2!1sen!2sug"
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
<br>
    <!-- Call to Action -->
    <div class="cta-section">
        <h2 class="cta-title">Ready for Fresh Cane Flavors?</h2>
        <p class="cta-text">Contact us today and discover why we're Kampala's favorite juice destination. Your taste buds will thank you!</p>
    </div>
</div>

<br>

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