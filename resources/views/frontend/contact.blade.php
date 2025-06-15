{{-- 
@extends('frontend.layout')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    .contact-wrapper {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #ff8c00 0%, #32cd32 100%);
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }
    
    /* Animated Background Blobs */
    .blob-container {
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: 1;
        overflow: hidden;
    }
    
    .blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(40px);
        opacity: 0.7;
        animation: float-blob 20s infinite ease-in-out;
    }
    
    .blob:nth-child(1) {
        width: 300px;
        height: 300px;
        background: rgba(255, 215, 0, 0.3);
        top: 10%;
        left: -10%;
        animation-delay: 0s;
    }
    
    .blob:nth-child(2) {
        width: 200px;
        height: 200px;
        background: rgba(50, 205, 50, 0.3);
        top: 50%;
        right: -5%;
        animation-delay: -7s;
    }
    
    .blob:nth-child(3) {
        width: 250px;
        height: 250px;
        background: rgba(255, 140, 0, 0.4);
        bottom: 20%;
        left: 20%;
        animation-delay: -14s;
    }
    
    @keyframes float-blob {
        0%, 100% { transform: translateY(0px) translateX(0px) scale(1); }
        33% { transform: translateY(-30px) translateX(20px) scale(1.1); }
        66% { transform: translateY(20px) translateX(-20px) scale(0.9); }
    }
    
    /* Hero Section with Split Layout */
    .hero-section {
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 100vh;
        align-items: center;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 40px;
        gap: 80px;
    }
    
    @media (max-width: 968px) {
        .hero-section {
            grid-template-columns: 1fr;
            gap: 40px;
            padding: 80px 20px;
            min-height: auto;
        }
    }
    
    .hero-content {
        color: white;
        position: relative;
    }
    
    .hero-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        padding: 8px 20px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 500;
        margin-bottom: 30px;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    
    .hero-title {
        font-size: clamp(3rem, 6vw, 5rem);
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 25px;
        background: linear-gradient(135deg, #ffffff 0%, #fffacd 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .hero-subtitle {
        font-size: 1.3rem;
        font-weight: 300;
        line-height: 1.6;
        opacity: 0.9;
        margin-bottom: 40px;
    }
    
    .hero-stats {
        display: flex;
        gap: 40px;
        margin-bottom: 40px;
    }
    
    .stat-item {
        text-align: center;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        display: block;
    }
    
    .stat-label {
        font-size: 0.9rem;
        opacity: 0.8;
        font-weight: 400;
    }
    
    /* Contact Form Card */
    .contact-form-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 32px;
        padding: 50px;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }
    
    .contact-form-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, #ff8c00, #32cd32, #ffd700);
    }
    
    .form-header {
        text-align: center;
        margin-bottom: 40px;
    }
    
    .form-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: #1a202c;
        margin-bottom: 12px;
    }
    
    .form-subtitle {
        color: #718096;
        font-size: 1.1rem;
        font-weight: 400;
    }
    
    /* Contact Methods Grid */
    .contact-methods {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        margin-bottom: 50px;
    }
    
    .method-card {
        background: #f8fafc;
        border-radius: 20px;
        padding: 30px 25px;
        text-align: center;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
    }
    
    .method-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 140, 0, 0.1), transparent);
        transition: left 0.6s ease;
    }
    
    .method-card:hover {
        transform: translateY(-8px);
        border-color: #ff8c00;
        box-shadow: 0 20px 40px rgba(255, 140, 0, 0.15);
    }
    
    .method-card:hover::before {
        left: 100%;
    }
    
    .method-icon {
        width: 70px;
        height: 70px;
        border-radius: 18px;
        background: linear-gradient(135deg, #ff8c00, #32cd32);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 28px;
        color: white;
        box-shadow: 0 12px 32px rgba(255, 140, 0, 0.3);
    }
    
    .method-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #1a202c;
        margin-bottom: 8px;
    }
    
    .method-text {
        color: #4a5568;
        font-size: 0.95rem;
        margin-bottom: 15px;
    }
    
    .method-link {
        color: #ff8c00;
        text-decoration: none;
        font-weight: 600;
        font-size: 1.05rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    
    .method-link:hover {
        color: #32cd32;
        transform: translateX(4px);
    }
    
    /* Interactive Map Section */
    .map-section {
        margin: 80px 40px;
        max-width: 1400px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        z-index: 2;
    }
    
    .map-container {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 32px;
        overflow: hidden;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.1);
        position: relative;
    }
    
    .map-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, #ff8c00, #32cd32, #ffd700, #ff6347);
        z-index: 1;
    }
    
    .map-header {
        padding: 40px 40px 20px;
        text-align: center;
    }
    
    .map-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1a202c;
        margin-bottom: 12px;
    }
    
    .map-subtitle {
        color: #718096;
        font-size: 1.1rem;
    }
    
    .map-wrapper {
        position: relative;
        height: 450px;
        border-radius: 0 0 32px 32px;
        overflow: hidden;
    }
    
    .map-wrapper iframe {
        width: 100%;
        height: 100%;
        border: none;
        filter: saturate(1.2) contrast(1.1);
        transition: filter 0.4s ease;
    }
    
    .map-wrapper:hover iframe {
        filter: saturate(1.4) contrast(1.2);
    }
    
    /* Social Links Section */
    .social-section {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        padding: 60px 40px;
        text-align: center;
        position: relative;
        z-index: 2;
    }
    
    .social-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 20px;
    }
    
    .social-subtitle {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .social-links {
        display: flex;
        justify-content: center;
        gap: 25px;
        flex-wrap: wrap;
    }
    
    .social-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 70px;
        height: 70px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        color: white;
        text-decoration: none;
        font-size: 28px;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        border: 2px solid rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }
    
    .social-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, #ff8c00, #32cd32);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .social-link:hover {
        transform: translateY(-8px) scale(1.1);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 255, 255, 0.4);
    }
    
    .social-link:hover::before {
        opacity: 1;
    }
    
    .social-link span {
        position: relative;
        z-index: 1;
    }
    
    /* Business Hours Card */
    .hours-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 35px;
        margin: 40px auto 0;
        max-width: 500px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .hours-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1a202c;
        text-align: center;
        margin-bottom: 25px;
    }
    
    .hours-list {
        list-style: none;
    }
    
    .hours-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        color: #4a5568;
    }
    
    .hours-item:last-child {
        border-bottom: none;
    }
    
    .hours-day {
        font-weight: 500;
    }
    
    .hours-time {
        font-weight: 400;
        color: #ff8c00;
    }
    
    @media (max-width: 768px) {
        .contact-form-card {
            padding: 30px 25px;
        }
        
        .map-section {
            margin: 40px 20px;
        }
        
        .hero-stats {
            flex-direction: column;
            gap: 20px;
            text-align: center;
        }
        
        .contact-methods {
            grid-template-columns: 1fr;
        }
        
        .social-links {
            gap: 15px;
        }
        
        .social-link {
            width: 60px;
            height: 60px;
            font-size: 24px;
        }
    }
</style>

<div class="contact-wrapper">
    <!-- Animated Background Blobs -->
    <div class="blob-container">
        <div class="blob"></div>
        <div class="blob"></div>
        <div class="blob"></div>
    </div>

    <!-- Hero Section with Split Layout -->
    <div class="hero-section">
        <div class="hero-content">
            <div class="hero-badge">🥤 Fresh & Natural</div>
            <h1 class="hero-title">Let's Create Something Fresh Together</h1>
            <p class="hero-subtitle">Experience the purest taste of tropical sugarcane juice. We're here to serve you the best, freshest flavors straight from nature.</p>
            
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <span class="stat-label">Natural</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Available</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">5★</span>
                    <span class="stat-label">Rated</span>
                </div>
            </div>
        </div>

        <div class="contact-form-card">
            <div class="form-header">
                <h2 class="form-title">Get in Touch</h2>
                <p class="form-subtitle">Choose your preferred way to connect with us</p>
            </div>

            <div class="contact-methods">
                <div class="method-card">
                    <div class="method-icon">📍</div>
                    <h3 class="method-title">Visit Us</h3>
                    <p class="method-text">Kyambogo - Banda<br>Kampala, Uganda</p>
                    <a href="https://maps.google.com" target="_blank" class="method-link">
                        Get Directions →
                    </a>
                </div>

                <div class="method-card">
                    <div class="method-icon">📞</div>
                    <h3 class="method-title">Call Us</h3>
                    <p class="method-text">Ready to take your order</p>
                    <a href="tel:+256776644143" class="method-link">
                        +256 776 644143 →
                    </a>
                </div>

                <div class="method-card">
                    <div class="method-icon">💬</div>
                    <h3 class="method-title">WhatsApp</h3>
                    <p class="method-text">Quick chat & instant orders</p>
                    <a href="https://wa.me/256776644143" target="_blank" class="method-link">
                        Message Now →
                    </a>
                </div>

                <div class="method-card">
                    <div class="method-icon">📧</div>
                    <h3 class="method-title">Email</h3>
                    <p class="method-text">For business inquiries</p>
                    <a href="mailto:info@tropicalcane.com" class="method-link">
                        Send Email →
                    </a>
                </div>
            </div>

            <div class="hours-card">
                <h3 class="hours-title">Business Hours</h3>
                <ul class="hours-list">
                    <li class="hours-item">
                        <span class="hours-day">Monday - Friday</span>
                        <span class="hours-time">8:00 AM - 8:00 PM</span>
                    </li>
                    <li class="hours-item">
                        <span class="hours-day">Saturday</span>
                        <span class="hours-time">8:00 AM - 9:00 PM</span>
                    </li>
                    <li class="hours-item">
                        <span class="hours-day">Sunday</span>
                        <span class="hours-time">10:00 AM - 6:00 PM</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Interactive Map Section -->
    <div class="map-section">
        <div class="map-container">
            <div class="map-header">
                <h2 class="map-title">Find Our Tropical Paradise</h2>
                <p class="map-subtitle">Located in the heart of Kampala, easy to reach and always fresh</p>
            </div>
            <div class="map-wrapper">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7977.598859866826!2d32.62435752331524!3d0.3475854785225387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177dbc78ec382e95%3A0x5e9d295fa01b1f71!2sKyambogo%20University%2C%20Kampala!5e0!3m2!1sen!2sug!4v1719932357890!5m2!1sen!2sug"
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>

    <!-- Social Links Section -->
    <div class="social-section">
        <h2 class="social-title">Stay Connected</h2>
        <p class="social-subtitle">Follow us for daily fresh updates, health tips, and exclusive tropical juice recipes</p>
        
        <div class="social-links">
            <a href="https://facebook.com/yourpage" target="_blank" class="social-link">
                <span>📘</span>
            </a>
            <a href="https://instagram.com/yourpage" target="_blank" class="social-link">
                <span>📷</span>
            </a>
            <a href="https://wa.me/256776644143" target="_blank" class="social-link">
                <span>💬</span>
            </a>
            <a href="https://twitter.com/yourpage" target="_blank" class="social-link">
                <span>🐦</span>
            </a>
        </div>
    </div>
</div>

@endsection --}}


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
</style>

<div class="contact-hero">
    <div class="floating-shapes"></div>
    <div class="hero-content">
        <h1 class="hero-title">Let's Connect</h1>
        <p class="hero-subtitle">Ready to experience the freshest tropical flavors? Reach out to us and let's create something amazing together.</p>
    </div>
</div>

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
                        <strong>Tropical Cane Juice HQ</strong><br>
                        Kyambogo - Banda, Kampala, Uganda
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-item-icon">📧</div>
                    <div>
                        <strong>Email Us</strong><br>
                        <a href="mailto:info@tropicalcane.com" class="contact-link">info@tropicalcane.com</a>
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

    <!-- Google Map -->
    <div class="map-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7977.598859866826!2d32.62435752331524!3d0.3475854785225387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177dbc78ec382e95%3A0x5e9d295fa01b1f71!2sKyambogo%20University%2C%20Kampala!5e0!3m2!1sen!2sug!4v1719932357890!5m2!1sen!2sug"
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <!-- Call to Action -->
    <div class="cta-section">
        <h2 class="cta-title">Ready for Fresh Tropical Flavors?</h2>
        <p class="cta-text">Contact us today and discover why we're Kampala's favorite juice destination. Your taste buds will thank you!</p>
    </div>
</div>

@include('frontend.footer')

@endsection

