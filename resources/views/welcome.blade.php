@extends('frontend.layout')

@section('content')
<style>
    html, body {
        background: #ffffff !important;
        margin: 0 !important;
        padding: 0 !important;
        height: 100%;
        overflow-x: hidden;
    }

    .wrapper, .content-wrapper, .main-content, .page-content,
    .container-fluid, .row, .col, [class*="col-"] {
        background: #ffffff !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .container {
        background: transparent !important;
        margin: 0 !important;
        padding: 0 !important;
        max-width: 100% !important;
    }

    .hero-section {
        position: relative;
        min-height: 100vh;
        width: 100%;
        margin: 0 !important;
        padding: 0 !important;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        z-index: 1;
    }

    .hero-background {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: 0;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .hero-background.active {
        opacity: 1;
    }

    .hero-background::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 50, 0, 0.5);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 700px;
        width: 90%;
        text-align: left;
        padding: 2rem;
        margin: 0 auto !important;
        transform: translateY(-30px);
        opacity: 0;
        animation: fadeInUp 1s ease-out 0.5s forwards;
    }

    .hero-subtitle {
        color: #FFFFFF;
        font-size: 1.6em;
        font-weight: 600;
        margin-bottom: -20px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .hero-main-title {
        color: #FFFFFF;
        text-shadow: 2px 2px 4px rgba(144, 238, 144, 0.5), 0 0 15px rgba(0, 100, 0, 0.3);
        font-size: 3.5em;
        font-weight: 900;
        font-family: 'Plus Jakarta Sans', sans-serif;
        line-height: 1.3;
        white-space: normal;
    }

    .hero-description {
        color: #e0e0e0;
        font-size: 1.1em;
        margin: 15px 0;
        font-weight: bold;
        font-family: 'Inter', sans-serif;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(-10px);
        }
    }

    #rotating-text {
        overflow: hidden;
        position: relative;
        min-height: 180px !important;
        margin-bottom: 1.5rem;
    }

    .wave-container {
        display: flex;
        flex-wrap: wrap;
        gap: 12px !important;
        opacity: 0;
        transform: translateY(40px);
        animation: slideInLeft 0.8s ease-out forwards;
        margin-bottom: 15px !important;
    }

    .flavor-description {
        color: #FFFFFF;
        font-size: 1.6rem;
        font-weight: bold;
        font-family: 'Plus Jakarta Sans', sans-serif;
        opacity: 0;
        transform: translateX(-20px);
        animation: slideInLeft 0.8s ease-out 0.8s forwards;
        text-shadow: 2px 2px 4px rgba(144, 238, 144, 0.5), 0 0 15px rgba(0, 100, 0, 0.3);
    }

    .wave-word {
        display: inline-block;
        opacity: 0;
        transform: scale(0.9);
        animation: popIn 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        color: #FFFFFF;
        transition: transform 0.2s ease;
        white-space: nowrap;
    }

    .wave-word:hover {
        transform: scale(1.2);
    }

    .hero-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        align-items: center;
    }

    .hero-btn {
        padding: 15px 30px;
        border-radius: 30px;
        text-decoration: none;
        font-size: 1.2em;
        font-weight: bold;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        text-align: center;
    }

    .hero-btn-primary {
        background: linear-gradient(45deg, #006400, #00C851);
        color: #FFFFFF;
        border: none;
        box-shadow: 0 4px 15px rgba(0, 102, 0, 0.4);
        animation: pulse 2s infinite;
    }

    .hero-btn-secondary {
        background: transparent;
        color: #FFFFFF;
        border: 2px solid #00C851;
        margin-top: 30px;
        padding: 18px 40px;
        font-size: 1.3em;
    }

    .hero-btn-cta {
        position: absolute;
        bottom: 90px;
        right: 50px;
        background: #FFFFFF;
        color: #006400;
        border: none;
        padding: 22px 60px 22px 50px;
        border-radius: 30px;
        text-decoration: none;
        font-size: 1.7em;
        font-weight: bold;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        z-index: 2;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 200px;
    }

    .hero-btn-cta::after {
        content: '→';
        font-size: 0.9em;
        margin-left: 10px;
        color: #006400;
        transition: transform 0.3s ease;
    }

    .hero-btn-cta:hover {
        background: #F0F0F0;
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 10px 30px rgba(0, 102, 0, 0.4);
    }

    .hero-btn-cta:hover::after {
        transform: translateX(5px);
    }

    @keyframes popIn {
        0% { opacity: 0; transform: scale(0.9); }
        50% { opacity: 0.7; transform: scale(1.05); }
        100% { opacity: 1; transform: scale(1); }
    }

    @keyframes popOut {
        0% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(0.95); }
        100% { opacity: 0; transform: scale(0.9); }
    }

    @keyframes containerFade {
        0% { opacity: 0; transform: translateY(40px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideInLeft {
        0% { opacity: 0; transform: translateX(-20px); }
        100% { opacity: 1; transform: translateX(0); }
    }

    @keyframes slideOutRight {
        0% { opacity: 1; transform: translateX(0); }
        100% { opacity: 0; transform: translateX(20px); }
    }

    .wave-particle {
        position: absolute;
        width: 8px;
        height: 8px;
        background: radial-gradient(circle, #90EE90, rgba(144, 238, 144, 0.3));
        border-radius: 50%;
        pointer-events: none;
        animation: particleWave 2s ease-out forwards;
    }

    @keyframes particleWave {
        0% { opacity: 0; transform: translateY(0) translateX(0) scale(0.5); }
        20% { opacity: 1; transform: translateY(-25px) translateX(-10px) scale(1); }
        40% { opacity: 0.8; transform: translateY(-50px) translateX(10px) scale(0.8); }
        60% { opacity: 0.6; transform: translateY(-75px) translateX(-5px) scale(0.6); }
        80% { opacity: 0.3; transform: translateY(-100px) translateX(15px) scale(0.4); }
        100% { opacity: 0; transform: translateY(-125px) translateX(0) scale(0.2); }
    }

    @keyframes pulse {
        0% { transform: scale(1); box-shadow: 0 4px 15px rgba(0, 102, 0, 0.4); }
        50% { transform: scale(1.05); box-shadow: 0 6px 20px rgba(0, 102, 0, 0.5); }
        100% { transform: scale(1); box-shadow: 0 4px 15px rgba(0, 102, 0, 0.4); }
    }

    @media (max-width: 1200px) {
        .hero-main-title { font-size: 3.2em; }
        .hero-subtitle { font-size: 1.4em; }
        .flavor-description { font-size: 1.4rem; }
    }

    @media (max-width: 992px) {
        .hero-main-title { font-size: 2.8em; }
        #rotating-text { min-height: 160px !important; }
        .hero-btn-cta { padding: 18px 50px 18px 40px; font-size: 1.4em; min-width: 180px; }
        .hero-btn-secondary { margin-top: 25px; padding: 16px 35px; font-size: 1.2em; }
    }

    @media (max-width: 768px) {
        .hero-section { min-height: 100vh; }
        .hero-content { transform: translateY(-20px); padding: 1.5rem; }
        .hero-main-title { font-size: 2.4em; }
        .hero-subtitle { font-size: 1.2em; margin-bottom: -15px; }
        .flavor-description { font-size: 1.2rem; }
        .hero-description { font-size: 1em; }
        #rotating-text { min-height: 140px !important; }
        .wave-container { gap: 10px !important; }
        .hero-btn { padding: 12px 25px; font-size: 1.1em; }
        .hero-btn-secondary { margin-top: 20px; padding: 14px 30px; font-size: 1.1em; }
        .hero-btn-cta { padding: 16px 45px 16px 35px; font-size: 1.3em; bottom: 15px; right: 15px; min-width: 160px; }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
    }

    @media (max-width: 576px) {
        .hero-section { min-height: 100vh; }
        .hero-content { padding: 1.5rem; transform: translateY(-15px); }
        .hero-main-title { font-size: 2em; }
        .hero-subtitle { font-size: 1em; margin-bottom: -10px; }
        .flavor-description { font-size: 1rem; }
        .hero-description { font-size: 0.9em; margin: 12px 0; }
        #rotating-text { min-height: 120px !important; }
        .wave-container { gap: 8px !important; flex-direction: column; align-items: flex-start; }
        .hero-buttons { flex-direction: column; align-items: center; gap: 12px; }
        .hero-btn { width: 100%; max-width: 280px; padding: 10px 18px; font-size: 0.9em; }
        .hero-btn-secondary { margin-top: 15px; padding: 12px 25px; font-size: 1em; max-width: 300px; }
        .hero-btn-cta { position: static; width: 100%; max-width: 300px; padding: 14px 40px 14px 30px; font-size: 1.2em; margin-top: 12px; min-width: 140px; }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
    }

    @media (max-width: 480px) {
        .hero-section { min-height: 100vh; padding: 40px 0; display: flex; align-items: center; justify-content: center; }
        .hero-content { padding: 2rem 1rem; width: 100%; max-width: 440px; transform: translateY(0); text-align: center; margin: 0 auto; overflow-wrap: break-word; }
        .hero-subtitle { font-size: 1.2em; margin-bottom: 15px; padding-bottom: 0; text-align: center; font-weight: 600; }
        .hero-main-title { font-size: 2.2em; line-height: 1.1; text-align: center; margin-bottom: 20px; }
        #rotating-text { min-height: 180px !important; margin-bottom: 1.5rem; display: flex; flex-direction: column; align-items: center; justify-content: center; }
        .wave-container { gap: 8px !important; flex-direction: row; flex-wrap: wrap; align-items: center; justify-content: center; margin-bottom: 20px !important; padding: 0 15px; min-height: 80px; display: flex; }
        .wave-word { white-space: nowrap; display: inline-block; text-align: center; margin: 3px 5px; font-size: 1.5em; line-height: 1; max-width: 100%; overflow: visible; }
        .flavor-description { font-size: 1rem; line-height: 1.4; margin-top: 15px; text-align: center; padding: 0 20px; max-width: 100%; word-wrap: break-word; min-height: 50px; display: flex; align-items: center; justify-content: center; }
        .hero-description { font-size: 0.95em; margin: 25px 0; line-height: 1.5; padding: 0 20px; max-width: 100%; text-align: center; }
        .hero-buttons { flex-direction: column; align-items: center; gap: 20px; margin-top: 30px; width: 100%; }
        .hero-btn { width: 100%; max-width: 320px; padding: 16px 24px; font-size: 1.1em; border-radius: 30px; margin: 0; min-height: 54px; display: flex; align-items: center; justify-content: center; }
        .hero-btn-secondary { margin-top: 15px; padding: 14px 30px; font-size: 1.1em; max-width: 320px; }
        .hero-btn-cta { position: static; width: 100%; max-width: 320px; padding: 16px 45px 16px 35px; font-size: 1.2em; margin-top: 10px; border-radius: 30px; min-height: 58px; min-width: 140px; display: flex; align-items: center; justify-content: center; }
        .wave-word, .flavor-description, .hero-description { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
        .wave-particle { width: 5px; height: 5px; }
        .wave-word:hover { transform: scale(1.05); }
        .hero-btn:active { transform: scale(0.96); }
        .hero-btn-cta:active { transform: scale(0.96); }
        * { box-sizing: border-box; }
        .hero-content * { max-width: 100%; overflow-wrap: break-word; }
    }

    @media (max-width: 320px) {
        .hero-section { min-height: 100vh; }
        .hero-content { padding: 0.8rem; width: 95%; transform: translateY(-5px); }
        .hero-main-title { font-size: 1.5em; }
        .hero-subtitle { font-size: 0.8em; padding-bottom: 5px; }
        .flavor-description { font-size: 0.8rem; padding: 0 15px; }
        #rotating-text { min-height: 80px !important; }
        .wave-container { gap: 4px !important; padding: 0 10px; }
        .wave-word { font-size: 1.4em; margin-bottom: 4px; }
        .hero-description { font-size: 0.8em; padding: 0 15px; }
        .hero-btn { max-width: 220px; padding: 8px 12px; font-size: 0.8em; }
        .hero-btn-secondary { margin-top: 10px; padding: 10px 20px; font-size: 0.9em; max-width: 220px; }
        .hero-btn-cta { max-width: 220px; padding: 12px 30px 12px 20px; font-size: 1em; min-width: 120px; }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
    }

    .juice-bottle {
        position: absolute;
        z-index: 3;
        max-height: 800px;
        width: auto;
        opacity: 0;
        animation: dropIn 1s ease-out 1s forwards;
        pointer-events: none;
    }

    #bottle-1 {
        top: 20%;
        right: 10%;
        transform: rotate(5deg);
    }

    #bottle-2 {
        top: 30%;
        right: 5%;
        transform: rotate(-5deg);
    }

    @keyframes dropIn {
        0% { opacity: 0; transform: translateY(-100px) rotate(var(--rotate, 0deg)); }
        60% { opacity: 1; transform: translateY(20px) rotate(var(--rotate, 0deg)); }
        80% { transform: translateY(-10px) rotate(var(--rotate, 0deg)); }
        100% { opacity: 1; transform: translateY(0) rotate(var(--rotate, 0deg)); }
    }

    .juice-bottle.float {
        animation: dropIn 1s ease-out 1s forwards, float 3s ease-in-out infinite 2s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(var(--rotate, 0deg)); }
        50% { transform: translateY(-15px) rotate(var(--rotate, 0deg)); }
    }

    @media (max-width: 992px) {
        .juice-bottle { max-height: 450px; }
        #bottle-1 { top: 20%; right: 8%; }
        #bottle-2 { top: 30%; right: 3%; }
    }

    @media (max-width: 768px) {
        .juice-bottle { max-height: 350px; }
        #bottle-1 { top: 25%; right: 5%; }
        #bottle-2 { top: 35%; right: 2%; }
    }

    @media (max-width: 576px) {
        .juice-bottle { max-height: 300px; }
        #bottle-1 { top: 30%; right: 10%; }
        #bottle-2 { top: 40%; right: 5%; }
    }

    @media (max-width: 480px) {
        .juice-bottle { max-height: 350px; }
        #bottle-1 { top: 35%; right: -15%; }
        #bottle-2 { top: 45%; right: -15%; }
    }

    @media (max-width: 320px) {
        .juice-bottle { max-height: 200px; }
        #bottle-1 { top: 40%; right: 10%; }
        #bottle-2 { top: 50%; right: 5%; }
    }

    body #page-footer {
        background: linear-gradient(180deg, #191a19 0%, #373a39 100%) !important;
        color: #fff !important;
        position: relative !important;
        padding: 30px 0 15px !important;
        overflow: hidden !important;
        font-family: 'Arial', sans-serif !important;
        margin-top: 0 !important;
        border-top: none !important;
    }

    body #page-footer .footer-glow {
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

    body #page-footer .footer-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 20px !important;
        position: relative !important;
        z-index: 1 !important;
    }

    body #page-footer .footer-content {
        display: grid !important;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)) !important;
        gap: 20px !important;
        margin-bottom: 20px !important;
    }

    body #page-footer .footer-section {
        display: flex !important;
        flex-direction: column !important;
        gap: 10px !important;
    }

    body #page-footer .footer-section h4 {
        font-size: 1.1rem !important;
        font-weight: 600 !important;
        color: #64ffd6 !important;
        margin-bottom: 8px !important;
        text-transform: uppercase !important;
        letter-spacing: 1px !important;
    }

    body #page-footer .footer-section.links ul {
        list-style: none !important;
        padding: 0 !important;
        margin: 0 !important;
        display: flex !important;
        flex-direction: row !important;
        flex-wrap: wrap !important;
        gap: 15px !important;
    }

    body #page-footer .footer-section.links ul li {
        margin-bottom: 0 !important;
        white-space: nowrap !important;
    }

    body #page-footer .footer-section ul li a {
        color: #d1d1d1 !important;
        text-decoration: none !important;
        font-size: 0.9rem !important;
        transition: color 0.3s ease !important;
    }

    body #page-footer .footer-section ul li a:hover {
        color: #64ffd6 !important;
        text-decoration: none !important;
    }

    body #page-footer .social-icons {
        display: flex !important;
        gap: 12px !important;
    }

    body #page-footer .social-icon {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 36px !important;
        height: 36px !important;
        background: rgba(255, 255, 255, 0.1) !important;
        border-radius: 50% !important;
        color: #fff !important;
        text-decoration: none !important;
        font-size: 1.1rem !important;
        transition: all 0.3s ease !important;
    }

    body #page-footer .social-icon:hover {
        background: #64ffd6 !important;
        color: #1a3c34 !important;
        transform: scale(1.1) !important;
    }

    body #page-footer .contact-toggle {
        background: #64ffd6 !important;
        color: #1a3c34 !important;
        border: none !important;
        padding: 8px 16px !important;
        font-size: 0.9rem !important;
        font-weight: 600 !important;
        border-radius: 25px !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
        width: fit-content !important;
    }

    body #page-footer .contact-toggle:hover {
        background: #4ad9b8 !important;
        transform: translateY(-2px) !important;
    }

    body #page-footer .contact-form {
        display: none !important;
        flex-direction: column !important;
        gap: 8px !important;
        margin-top: 8px !important;
        width: 100% !important;
    }

    body #page-footer .contact-form.active {
        display: flex !important;
    }

    body #page-footer .contact-form textarea {
        background: rgba(255, 255, 255, 0.1) !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        border-radius: 8px !important;
        padding: 8px !important;
        color: #fff !important;
        font-size: 0.9rem !important;
        resize: vertical !important;
        min-height: 80px !important;
        outline: none !important;
        transition: border 0.3s ease !important;
        width: 100% !important;
    }

    body #page-footer .contact-form textarea:focus {
        border-color: #64ffd6 !important;
    }

    body #page-footer .contact-form button {
        background: #64ffd6 !important;
        color: #1a3c34 !important;
        border: none !important;
        padding: 8px !important;
        font-size: 0.9rem !important;
        font-weight: 600 !important;
        border-radius: 25px !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
    }

    body #page-footer .contact-form button:hover {
        background: #4ad9b8 !important;
        transform: translateY(-2px) !important;
    }

    body #page-footer .footer-bottom {
        text-align: center !important;
        padding-top: 15px !important;
        border-top: 1px solid rgba(255, 255, 255, 0.1) !important;
    }

    body #page-footer .footer-bottom p {
        font-size: 0.8rem !important;
        color: #b0b0b0 !important;
        margin: 8px 0 0 !important;
    }

    @media (max-width: 768px) {
        body #page-footer .footer-content { grid-template-columns: 1fr !important; text-align: center !important; gap: 20px !important; }
        body #page-footer .footer-section { align-items: center !important; }
        body #page-footer .footer-section.links ul { justify-content: center !important; }
        body #page-footer .social-icons { justify-content: center !important; }
        body #page-footer .contact-toggle { margin: 0 auto !important; }
    }

    @media (max-width: 480px) {
        body #page-footer { padding: 25px 0 15px !important; }
        body #page-footer .footer-content { gap: 20px !important; }
        body #page-footer .footer-section h4 { font-size: 1rem !important; }
        body #page-footer .footer-section.links ul { flex-direction: column !important; gap: 8px !important; align-items: center !important; }
    }
</style>

<!-- Preload images for performance (optional, using static as fallback) -->
@php
    $lemonBg = $heroImages->where('title', 'Lemon Ginger Background')->first();
    $tangerineBg = $heroImages->where('title', 'Tangerine Ginger Background')->first();
    $lemonBottle = $heroImages->where('title', 'Lemon Ginger Bottle')->first();
    $tangerineBottle = $heroImages->where('title', 'Tangerine Ginger Bottle')->first();
@endphp
<link rel="preload" href="{{ $lemonBg && $lemonBg->image_path ? Storage::url($lemonBg->image_path) : asset('images/ginger_lemon.jpg') }}" as="image">
<link rel="preload" href="{{ $tangerineBg && $tangerineBg->image_path ? Storage::url($tangerineBg->image_path) : asset('images/ginger_tangerine1.jpg') }}" as="image">
<link rel="preload" href="{{ $lemonBottle && $lemonBottle->image_path ? Storage::url($lemonBottle->image_path) : asset('images/juice1.png') }}" as="image">
<link rel="preload" href="{{ $tangerineBottle && $tangerineBottle->image_path ? Storage::url($tangerineBottle->image_path) : asset('images/tangerine_and_ginger_1-removebg-preview.png') }}" as="image">

<div class="hero-section">
    <div class="hero-background" id="bg-1" style="background-image: url('{{ $lemonBg && $lemonBg->image_path ? Storage::url($lemonBg->image_path) : asset('images/ginger_lemon.jpg') }}');"></div>
    <div class="hero-background" id="bg-2" style="background-image: url('{{ $tangerineBg && $tangerineBg->image_path ? Storage::url($tangerineBg->image_path) : asset('images/ginger_tangerine1.jpg') }}');"></div>

    <img src="{{ $lemonBottle && $lemonBottle->image_path ? Storage::url($lemonBottle->image_path) : asset('images/juice1.png') }}" alt="Lemon Ginger Juice" class="juice-bottle float" id="bottle-1" style="--rotate: 5deg;">
    <img src="{{ $tangerineBottle && $tangerineBottle->image_path ? Storage::url($tangerineBottle->image_path) : asset('images/tangerine_and_ginger_1-removebg-preview.png') }}" alt="Tangerine Ginger Juice" class="juice-bottle float" id="bottle-2" style="--rotate: -5deg;">

    <div class="hero-content">
        <h2 class="hero-subtitle">Explore Our Fresh Juices</h2>
        <h1 id="rotating-text" class="hero-main-title">
            <div class="wave-container" id="wave-container"></div>
            <div class="flavor-description" id="flavor-description"></div>
        </h1>
        <p class="hero-description">
            "Available in 420ml bottles – perfect for retail sales! We also take custom orders for events and parties."
        </p>
        <div class="hero-buttons">
            <a href="{{ url('/juices') }}" class="hero-btn hero-btn-secondary"
               onmouseover="this.style.background='#00C851'; this.style.color='#FFFFFF';"
               onmouseout="this.style.background='transparent'; this.style.color='#FFFFFF';">
                Our Juices
            </a>
        </div>
    </div>
    <a href="{{ url('/order') }}" class="hero-btn-cta">Order</a>
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
    const phrases = [
        { text: "Lemon Ginger Cane", flavor: "Sugarcane Juice Infused with Lemon & Ginger" },
        { text: "Tangerine Ginger Cane", flavor: "Sugarcane Juice Infused with Tangerine & Ginger" }
    ];

    const backgrounds = [
        document.getElementById('bg-1'),
        document.getElementById('bg-2')
    ];

    const bottles = [
        document.getElementById('bottle-1'),
        document.getElementById('bottle-2')
    ];

    let index = 0;
    const container = document.getElementById('wave-container');
    const flavorContainer = document.getElementById('flavor-description');

    function createWaveParticles() {
        const rect = container.getBoundingClientRect();
        for (let i = 0; i < 12; i++) {
            const particle = document.createElement('div');
            particle.className = 'wave-particle';
            particle.style.left = Math.random() * rect.width + 'px';
            particle.style.top = Math.random() * rect.height + 'px';
            container.appendChild(particle);
            setTimeout(() => { if (particle.parentNode) particle.remove(); }, 2000);
        }
    }

    function animateWordsOut() {
        const words = container.querySelectorAll('.wave-word');
        words.forEach((word, i) => {
            setTimeout(() => {
                word.style.animation = `popOut 0.5s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards`;
            }, i * 50);
        });
        flavorContainer.style.animation = 'slideOutRight 0.5s ease-out forwards';
    }

    function animateBottles() {
        bottles.forEach(bottle => {
            if (bottle) {
                bottle.style.opacity = '0';
                bottle.style.animation = 'none';
            }
        });
        const currentBottle = bottles[index];
        if (currentBottle) {
            setTimeout(() => {
                currentBottle.style.opacity = '1';
                currentBottle.style.animation = 'dropIn 1s ease-out forwards, float 3s ease-in-out infinite 1s';
            }, 600);
        }
    }

    function createWaveText(text) {
        container.innerHTML = '';
        const words = text.split(' ');
        words.forEach((word, i) => {
            const wordElement = document.createElement('div');
            wordElement.className = 'wave-word';
            wordElement.textContent = word + (i < words.length - 1 ? ' ' : '');
            wordElement.style.setProperty('--delay', `${i * 0.1}s`);
            wordElement.style.animationDelay = `${i * 0.15}s`;
            container.appendChild(wordElement);
        });
        setTimeout(() => { createWaveParticles(); }, 500);
    }

    function updateFlavorDescription(flavor) {
        flavorContainer.textContent = flavor;
        flavorContainer.style.animation = 'slideInLeft 0.8s ease-out 0.8s forwards';
    }

    function updateBackground() {
        backgrounds.forEach(bg => bg.classList.remove('active'));
        backgrounds[index].classList.add('active');
    }

    function changeContent() {
        animateWordsOut();
        setTimeout(() => {
            index = (index + 1) % phrases.length;
            createWaveText(phrases[index].text);
            updateFlavorDescription(phrases[index].flavor);
            updateBackground();
            animateBottles();
        }, 600);
    }

    createWaveText(phrases[index].text);
    updateFlavorDescription(phrases[index].flavor);
    backgrounds[index].classList.add('active');
    animateBottles();
    setInterval(changeContent, 8000);
    setInterval(() => { if (Math.random() < 0.5) createWaveParticles(); }, 2500);
</script>

@endsection