

@extends('frontend.layout')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #fff8e1, #fff3e0); /* Soft lemon-tangerine vibe */
        color: #333;
        font-family: 'Segoe UI', sans-serif;
        padding: 0;
        margin: 0;
    }

    .about-container {
        max-width: 1300px;
        margin: 0 auto;
        padding: 60px 20px;
    }

    .about-title {
        font-size: 3.5rem;
        font-weight: 700;
        color: #006600;
        text-align: center;
        margin-bottom: 20px;
    }

    .highlight {
        color: #ff6600;
    }

    .about-text {
        text-align: center;
        font-size: 1.25rem;
        margin-bottom: 40px;
        line-height: 1.6;
        color: #555;
        padding: 0 10%;
    }

    .flavors-section {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 40px;
        margin-top: 40px;
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
        margin-top: 80px;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        text-align: center;
    }

    .mission-vision h3 {
        color: #ff6600;
        font-size: 2rem;
        margin-top: 20px;
    }

    .mission-vision p {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #444;
    }

    .row {
        margin-top: 80px;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        gap: 40px;
    }

    .row img {
        border-radius: 20px;
        max-height: 320px;
        width: 100%;
        object-fit: cover;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    .why-us {
        background: linear-gradient(to right, #e0f7fa, #e8f5e9);
        padding: 60px 30px;
        margin-top: 80px;
        border-radius: 20px;
        text-align: center;
    }

    .why-us h3 {
        font-size: 2rem;
        color: #00695c;
        margin-bottom: 25px;
    }

    .why-us ul {
        list-style: none;
        padding: 0;
        max-width: 900px;
        margin: 0 auto;
    }

    .why-us ul li {
        font-size: 1.15rem;
        margin-bottom: 15px;
        position: relative;
        padding-left: 25px;
        color: #333;
    }

    .why-us ul li::before {
        content: '✔';
        position: absolute;
        left: 0;
        color: #2e7d32;
        font-weight: bold;
    }

    @media(max-width: 768px) {
        .about-title {
            font-size: 2.5rem;
        }

        .about-text {
            padding: 0;
        }

        .row {
            flex-direction: column;
        }

        .flavor-card {
            width: 90%;
        }
    }
</style>

<div class="about-container">
    <h2 class="about-title">About <span class="highlight">Tropical Cane</span> Juice</h2>
    <p class="about-text">
        At Tropical Cane, we are passionate about delivering fresh, 100% natural sugarcane juices that invigorate your body and mind. 
        Every sip combines nature’s sweetness with health-boosting flavors like Lemon & Ginger or Tangerine & Ginger — crafted to energize and nourish.
    </p>

    <div class="flavors-section">
        <div class="flavor-card">
            <img src="{{ asset('storage/images/lemonade.jpg') }}" alt="Lemon and Ginger">
            <h4>Lemon & Ginger</h4>
            <p>Refreshing, zesty, and filled with natural antioxidants that awaken your senses.</p>
        </div>
        <div class="flavor-card">
            <img src="{{ asset('storage/images/tangerine.jpg') }}" alt="Tangerine and Ginger">
            <h4>Tangerine & Ginger</h4>
            <p>Sweet, citrusy, and crafted to uplift your energy – naturally.</p>
        </div>
    </div>

    <div class="mission-vision">
        <h3>Our Mission</h3>
        <p>To deliver 100% pure sugarcane juice made with love – no additives, no water, no preservatives. Just the real thing.</p>
<br>
        <h3>Our Vision</h3>
        <p>To lead the East African beverage market by promoting wellness and joy, one refreshing bottle at a time.</p>
    </div>

    <div class="row">
        <div class="col-md-5">
            <img src="{{ asset('storage/images/tc.PNG') }}" alt="Our Team" class="img-fluid">
        </div>
        <div class="col-md-5">
            <img src="{{ asset('storage/images/juice process.jpg') }}" alt="Juice Process" class="img-fluid">
        </div>
    </div>

<br>

    <div class="why-us">
        <h3>Why Choose Tropical Cane?</h3>
        <ul>
            <li>Locally sourced, fresh sugarcane pressed daily</li>
            <li>Eco-friendly packaging and zero-waste process</li>
            <li>100% natural ingredients with no artificial additives</li>
            <li>Friendly service and community-first mindset</li>
            <li>Unique, energizing flavors you won’t find anywhere else</li>
        </ul>
    </div>
</div>

@include('frontend.footer')

@endsection