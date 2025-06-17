@extends('frontend.layout')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #fff8e1, #fff3e0); 
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

    .row .image-container {
        width: 100%;
        max-width: 400px; /* Fixed max-width for both images */
        height: 300px; /* Fixed height for uniform size */
        overflow: hidden;
        border-radius: 20px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    .row .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures images fill container uniformly */
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

    .dynamic-section {
        margin: 40px 0;
        padding: 20px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .dynamic-section h3 {
        color: #006600;
        font-size: 1.8rem;
        margin-bottom: 20px;
        text-align: center;
    }

    .dynamic-section p {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #555;
        text-align: center;
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

        .row .image-container {
            max-width: 90%;
            height: 250px; /* Slightly smaller height for mobile */
        }
    }
</style>

<div class="about-container">
    <h2 class="about-title">About <span class="highlight">Tropical Cane</span> Juice</h2>
    <p class="about-text">
        At Tropical Cane, we are passionate about delivering fresh, 100% natural sugarcane juices that invigorate your body and mind. 
        Every sip combines nature's sweetness with health-boosting flavors like Lemon & Ginger or Tangerine & Ginger — crafted to energize and nourish.
    </p>

    {{-- Dynamic Sections from Backend (Excluding Specific Image Sections) --}}
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

    <div class="mission-vision">
        @php
            $missionSection = $sections->where('title', 'Our Mission')->first();
            $visionSection = $sections->where('title', 'Our Vision')->first();
        @endphp
        
        <h3>Our Mission</h3>
        <p>{{ $missionSection && $missionSection->description ? $missionSection->description : 'To deliver 100% pure sugarcane juice made with love – no additives, no water, no preservatives. Just the real thing.' }}</p>
        
        <br>
        
        <h3>Our Vision</h3>
        <p>{{ $visionSection && $visionSection->description ? $visionSection->description : 'To lead the East African beverage market by promoting wellness and joy, one refreshing bottle at a time.' }}</p>
    </div>
<br>
    <div class="row">
        <div class="col-md-5">
            @php
                $teamSection = $sections->where('title', 'Our Team')->first();
            @endphp
            <div class="image-container">
                <img src="{{ $teamSection && $teamSection->image_path ? Storage::url($teamSection->image_path) : asset('images/tc.PNG') }}" alt="Our Team">
            </div>
        </div>
        
        <div class="col-md-5">
            @php
                $processSection = $sections->where('title', 'Juice Process')->first();
            @endphp
            <div class="image-container">
                <img src="{{ $processSection && $processSection->image_path ? Storage::url($processSection->image_path) : asset('images/juice_process.jpg') }}" alt="Juice Process">
            </div>
        </div>
    </div>

    <br>

    <div class="why-us">
        @php
            $whyUsSection = $sections->where('title', 'Why Choose Tropical Cane?')->first();
        @endphp
        
        <h3>Why Choose Tropical Cane?</h3>
        @if($whyUsSection && $whyUsSection->description)
            <div style="max-width: 900px; margin: 0 auto; text-align: left;">
                {!! nl2br(e($whyUsSection->description)) !!}
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
</div>

@include('frontend.footer')

@endsection