@extends('layouts.app')

@section('title', 'Home - KKN Desa Plaosan')

@php $bodyClass = 'has-hero'; @endphp

@section('styles')
<style>
    /* Final Refined Sketch-based layout */
    .greetings-section {
        padding: 8rem 5% 6rem; /* Increased top padding to 8rem */
        background: #f8fafc;
        overflow: hidden;
    }

    .greetings-section .carousel-container {
        position: relative;
        max-width: 750px !important; /* MATCH CARD WIDTH EXACTLY TO ONLY SHOW ONE CARD */
        margin: 0 auto;
    }

    .greetings-section .carousel-track {
        display: flex !important;
        gap: 2rem !important; /* Elegant spacing between cards */
        overflow-x: auto !important;
        scroll-snap-type: x mandatory !important;
        scroll-behavior: smooth !important;
        scrollbar-width: none !important;
        padding: 1rem 0 !important; /* Set to 0 so card matches container edge exactly */
    }

    .greetings-section .carousel-track::-webkit-scrollbar { display: none !important; }

    .auto-scroll-gallery {
        scrollbar-width: thin;
        scrollbar-color: var(--primary) #f1f5f9;
    }
    .auto-scroll-gallery::-webkit-scrollbar {
        height: 6px;
    }
    .auto-scroll-gallery::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }
    .auto-scroll-gallery::-webkit-scrollbar-thumb {
        background: var(--primary);
        border-radius: 10px;
    }

    .greetings-section .carousel-card {
        flex: 0 0 100% !important;
        max-width: 750px !important;
        scroll-snap-align: center !important;
        display: flex !important;
        flex-direction: row !important;
        background: #ffffff !important;
        border-radius: 24px !important;
        overflow: hidden !important;
        border: 2px solid #3b82f6 !important; /* Elegant blue border */
        height: 320px !important;
        margin: 20px auto !important;
        position: relative !important;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05) !important;
        transition: none !important; /* Disable hover translation transitions */
    }

    /* Disable the compiled CSS gradient top block */
    .greetings-section .carousel-card::before {
        content: none !important;
        display: none !important;
    }

    /* Disable hover rise effects */
    .greetings-section .carousel-card:hover {
        transform: none !important;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05) !important;
        border-color: #3b82f6 !important;
    }

    .greetings-section .card-image-wrapper {
        flex: 0 0 38% !important;
        height: 100% !important;
        width: auto !important;
        margin: 0 !important;
        border: none !important;
        border-radius: 0 !important;
        box-shadow: none !important;
        overflow: hidden !important;
        z-index: 1 !important;
    }

    .greetings-section .card-image-wrapper img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        object-position: center top !important; /* Perfect natural centering and vertical alignment */
    }

    /* Adjust Ts. Khairul Anuar (2nd card) to lift his face higher in the circle */
    .greetings-section .carousel-card:nth-child(2) .card-image-wrapper img { 
        object-position: center -15px !important; 
    }

    /* Only adjust Dr. Mhd Azmin (4th card) to center his face beautifully in the circle */
    .greetings-section .carousel-card:nth-child(4) .card-image-wrapper img { 
        object-position: center 20% !important; 
    }

    .greetings-section .card-content-wrapper {
        flex: 1 !important;
        padding: 2.5rem 3rem !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: center !important;
        align-items: flex-start !important;
        text-align: left !important;
        background: transparent !important;
        position: relative !important;
    }
    
    .greetings-section .leadership-header {
        background: transparent !important;
        padding: 0 !important;
        margin: 0 0 1rem 0 !important;
        z-index: 1 !important;
        width: 100% !important;
        border-radius: 0 !important;
    }
    .greetings-section .leadership-header h3 { 
        font-size: 1.5rem !important; 
        font-weight: 800 !important; 
        margin-bottom: 0.3rem !important; 
        color: var(--text-main) !important; 
    } 
    .greetings-section .leadership-header .leadership-title { 
        font-size: 0.85rem !important; 
        font-weight: 700 !important; 
        text-transform: uppercase !important; 
        letter-spacing: 0.5px !important; 
        color: var(--primary) !important; 
    }

    /* Modal Overlay - Centered on screen */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(15, 23, 42, 0.8);
        backdrop-filter: blur(8px);
        display: none;
        justify-content: center;
        align-items: center; /* Center vertically */
        z-index: 100000;
        overflow-y: auto;
        padding: 20px; /* Safe area for mobile */
    }

    .modal-overlay.active { display: flex; }

    .modal-content {
        background: #ffffff;
        width: 90%;
        max-width: 800px;
        border-radius: 32px;
        padding: 3rem;
        position: relative;
        margin-bottom: 50px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        animation: modalFadeUp 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes modalFadeUp {
        from { opacity: 0; transform: translateY(30px) scale(0.95); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }

    .close-modal {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        font-size: 2rem;
        color: var(--text-light);
        cursor: pointer;
        line-height: 1;
        transition: color 0.3s ease;
    }

    .close-modal:hover { color: #ef4444; }

    .modal-header {
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #f1f5f9;
    }

    .modal-header h3 {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--text-main);
        margin-bottom: 0.3rem;
    }

    .modal-header span {
        color: var(--primary);
        font-weight: 700;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .modal-body {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--text-light);
    }

    .modal-body p { margin-bottom: 1.5rem; }

    .card-content-wrapper h3 {
        font-size: 1.4rem;
        font-weight: 800;
        color: var(--text-main);
        margin-bottom: 0.2rem;
        line-height: 1.1;
    }

    .card-content-wrapper .leadership-title {
        color: var(--primary);
        font-weight: 700;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 1.2rem;
        display: block;
    }

    .card-content-wrapper .greeting-text {
        font-size: 0.95rem;
        line-height: 1.5;
        color: var(--text-light);
        font-style: italic;
        margin-bottom: 1.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .btn-premium-read {
        align-self: flex-start;
        padding: 0.6rem 1.5rem;
        background: var(--primary);
        color: white;
        border-radius: 50px;
        font-weight: 800;
        font-size: 0.85rem;
        border: none;
        cursor: pointer;
    }

    /* Navigation Buttons - Adjusted color to Primary and position for clarity */
    .banner-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background: var(--primary); /* Matched web color */
        border: none;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .banner-nav-btn:hover {
        background: #047857; /* Darker primary */
        transform: translateY(-50%) scale(1.1);
    }

    .prev-banner-btn { left: -22px !important; }
    .next-banner-btn { right: -22px !important; }

    /* Centered Bottom Dots - Moved UP slightly */
    .banner-dots {
        position: absolute;
        bottom: 52px; /* Positioned inside the card at the bottom center */
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 8px;
        z-index: 10;
    }

    .b-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #cbd5e1;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .b-dot.active {
        background: var(--primary); /* Matched web color */
        transform: scale(1.2);
    }

    @media (max-width: 768px) {
        .cta-buttons { flex-direction: row; gap: 10px; width: 100%; justify-content: center; margin-top: 1.5rem; }
        .hero .btn { min-width: auto; flex: 1; padding: 0.8rem 1rem; font-size: 0.9rem; }
        
        .greetings-section { padding: 4rem 5% 3rem; } 
        .carousel-container { padding-top: 0px; } 
        
        /* Responsive Horizontal Greetings Card to Vertical on Mobile */
        .greetings-section .carousel-card { 
            flex-direction: column !important; 
            height: auto !important; 
            max-width: 100% !important; 
            margin: 10px auto !important;
        } 
        .greetings-section .card-image-wrapper { 
            width: 120px !important; 
            height: 120px !important; 
            margin: 2rem auto 0.5rem !important; /* Centered with beautiful top spacing */
            border-radius: 50% !important; /* Perfect circular avatar */
            border: 3px solid #3b82f6 !important; /* Matching premium blue border */
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.15) !important; /* Elegant blue shadow */
            overflow: hidden !important;
            flex: 0 0 120px !important; 
        }
        .greetings-section .card-content-wrapper { 
            padding: 1.5rem !important; 
            align-items: center !important;
            text-align: center !important;
        } 
        .greetings-section .leadership-header {
            margin: 0 0 1rem 0 !important;
        }
        .greetings-section .leadership-header h3 { 
            font-size: 1.2rem !important; 
        } 
        .greetings-section .leadership-header .leadership-title { 
            font-size: 0.75rem !important; 
        }
        .greetings-section .card-content-wrapper .greeting-text { 
            font-size: 0.95rem !important; 
            text-align: center !important; 
            margin-bottom: 1.2rem !important; 
        }
        .greetings-section .btn-premium-read {
            align-self: center !important;
        }
        
        .results-section { padding: 5rem 5% !important; }

        /* Mobile: horizontal scroll for report cards */
        .results-grid {
            display: flex !important;
            overflow-x: auto !important;
            scroll-snap-type: x mandatory !important;
            -webkit-overflow-scrolling: touch !important;
            gap: 1rem !important;
            padding-bottom: 1rem !important;
            scrollbar-width: none !important;
        }
        .results-grid::-webkit-scrollbar { display: none; }
        .results-grid .result-card {
            flex: 0 0 260px !important;
            scroll-snap-align: start !important;
            border-radius: 20px !important;
        }
        .results-grid .result-card > div:first-child {
            height: 140px !important; /* Smaller image */
        }
        .results-grid .result-card > div:last-child {
            padding: 1.2rem !important; /* Compact padding */
        }
        .results-grid .result-card h3 {
            font-size: 1rem !important;
            margin-bottom: 0.5rem !important;
        }
        .results-grid .result-card p {
            font-size: 0.8rem !important;
            margin-bottom: 1rem !important;
        }
        .results-grid .result-card .btn-read-more {
            padding: 0.7rem !important;
            font-size: 0.85rem !important;
        }
        .banner-dots { bottom: 40px; } 
        
        .banner-nav-btn { width: 40px; height: 40px; top: 55%; }
        .prev-banner-btn { left: -10px; }
        .next-banner-btn { right: -10px; }

        /* Make modal content much wider and more readable on mobile */
        .modal-overlay {
            padding: 10px !important;
        }
        .modal-content {
            width: 95% !important;
            max-width: 95% !important;
            padding: 1.5rem !important;
            border-radius: 24px !important;
        }
        
        /* Specifically style report modals with green banner to be wide and clean */
        .modal-overlay[id^="report-"] .modal-content {
            padding: 0 !important; /* Keep container padding 0 for full-bleed banner */
        }
        .modal-overlay[id^="report-"] .modal-content > div:first-child {
            padding: 1.8rem 1.5rem !important; /* Responsive header padding */
        }
        .modal-overlay[id^="report-"] .modal-content > div:last-child {
            padding: 1.8rem 1.5rem !important; /* Responsive body padding */
        }
        .modal-overlay[id^="report-"] h2 {
            font-size: 1.5rem !important; /* Responsive title size */
        }
        .modal-overlay[id^="report-"] .close-modal {
            top: 1.2rem !important;
            right: 1.2rem !important;
        }
    }
</style>
@endsection

@section('content')
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>INTERNATIONAL STUDENT -<br>EXCHANGE PROGRAM :</h1>
            <p>Academic, Cultural, and Industry Exposure 2026</p>
            <p>20 May - 16 June 2026</p>
            <div class="cta-buttons">
                <a href="{{ route('projects') }}" class="btn btn-primary">Our Projects</a>
                <a href="#reports-section" class="btn btn-outline">Reports</a>
            </div>
        </div>
    </section>

    <section class="greetings-section">
        <div class="section-header" style="margin-bottom: 2rem;">
            <div class="hero-tag" style="color: var(--primary); border-color: rgba(5, 150, 105, 0.2); background: rgba(5, 150, 105, 0.05); margin-bottom: 0.8rem; font-size: 0.75rem;">Voices of Support</div>
            <h2 style="font-size: 2.5rem; font-weight: 800; color: var(--text-main); margin-bottom: 0.5rem;">Foreword from <span>the Leadership</span></h2>
        </div>
        
        <div class="carousel-container">
            <button class="banner-nav-btn prev-banner-btn" aria-label="Previous"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg></button>
            <button class="banner-nav-btn next-banner-btn" aria-label="Next"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg></button>

            <div class="carousel-track">
                <!-- 1. ITB Asia -->
                <div class="carousel-card">
                    <div class="card-image-wrapper">
                        <img src="{{ asset('images/rektor_asia.jpeg') }}" alt="Risa Santoso">
                    </div>
                    <div class="card-content-wrapper">
                        <div class="leadership-header">
                            <h3>Risa Santoso, B.A., M.Ed.</h3>
                            <span class="leadership-title">Rector of ITB Asia Malang</span>
                        </div>
                        <p class="greeting-text">"It is my pleasure to welcome all participants to this program. As the Host Institution, we hope to create a meaningful impact."</p>
                        <button class="btn-premium-read btn-read-more" data-modal="modal-1">Full Message &rarr;</button>
                    </div>
                </div>

                <!-- 2. PTSS -->
                <div class="carousel-card">
                    <div class="card-image-wrapper">
                        <img src="{{ asset('images/rektor_ptss.jpeg') }}" alt="Director PTSS">
                    </div>
                    <div class="card-content-wrapper">
                        <div class="leadership-header">
                            <h3>Ts. Khairul Anuar bin Ishak</h3>
                            <span class="leadership-title">Director of Politeknik Tuanku Syed Sirajuddin</span>
                        </div>
                        <p class="greeting-text">"This program reflects POLYCC's commitment in advancing global engagement. It is a platform for TVET excellence."</p>
                        <button class="btn-premium-read btn-read-more" data-modal="modal-2">Full Message &rarr;</button>
                    </div>
                </div>

                <!-- 3. PSS -->
                <div class="carousel-card">
                    <div class="card-image-wrapper">
                        <img src="{{ asset('images/rektor_pss.jpeg') }}" alt="Director PSS">
                    </div>
                    <div class="card-content-wrapper">
                        <div class="leadership-header">
                            <h3>Mohd Sahran @ Awang bin Mohidin</h3>
                            <span class="leadership-title">Director of Politeknik Sandakan Sabah</span>
                        </div>
                        <p class="greeting-text">"This program represents a cornerstone in our mission. Participants will deliver practical solutions to community needs."</p>
                        <button class="btn-premium-read btn-read-more" data-modal="modal-3">Full Message &rarr;</button>
                    </div>
                </div>

                <!-- 4. POLIMAS -->
                <div class="carousel-card">
                    <div class="card-image-wrapper">
                        <img src="{{ asset('images/rektor_polimas.png') }}" alt="Dr. Mhd Azmin">
                    </div>
                    <div class="card-content-wrapper">
                        <div class="leadership-header">
                            <h3>Dr. Mhd Azmin bin Mat Seman</h3>
                            <span class="leadership-title">Deputy Director of Politeknik Sultan Abdul Halim Mu'adzam Shah</span>
                        </div>
                        <p class="greeting-text">"The spirit of teamwork demonstrated throughout this programme is exemplary. We are proud to nurture globally competent graduates."</p>
                        <button class="btn-premium-read btn-read-more" data-modal="modal-4">Full Message &rarr;</button>
                    </div>
                </div>

                <!-- 5. KKA -->
                <div class="carousel-card">
                    <div class="card-image-wrapper">
                        <img src="{{ asset('images/rektor_kka.jpeg') }}" alt="Hj. Rosnizam bin Kamis">
                    </div>
                    <div class="card-content-wrapper">
                        <div class="leadership-header">
                            <h3>Hj. Rosnizam bin Kamis</h3>
                            <span class="leadership-title">Director of Kolej Komuniti Arau</span>
                        </div>
                        <p class="greeting-text">"This initiative serves as a vital bridge, connecting academic foundations with industry practices. We hope students gain global exposure."</p>
                        <button class="btn-premium-read btn-read-more" data-modal="modal-5">Full Message &rarr;</button>
                    </div>
                </div>
            </div>

            <div class="banner-dots">
                <div class="b-dot active" data-index="0"></div>
                <div class="b-dot" data-index="1"></div>
                <div class="b-dot" data-index="2"></div>
                <div class="b-dot" data-index="3"></div>
                <div class="b-dot" data-index="4"></div>
            </div>
        </div>
    </section>

    <!-- Rest of sections remain same -->
    <section id="reports-section" class="results-section" style="padding: 10rem 5%; background: #ffffff;">
        <div class="section-header" style="max-width: 1300px; margin: 0 auto 3rem; text-align: left;">
            <div class="hero-tag" style="margin-bottom: 1rem; color: var(--secondary); border-color: rgba(245, 158, 11, 0.2); background: rgba(245, 158, 11, 0.05); width: fit-content;">Latest Updates</div>
            <h2 style="font-size: 3rem; font-weight: 800; color: var(--text-main); margin-bottom: 1rem;">Project <span>Results & News</span></h2>
            <p style="color: var(--text-light); max-width: 700px; margin-bottom: 3rem;">Discover the impact and documented progress made by our student teams in the field.</p>
            
            <div style="display: flex; justify-content: flex-start; gap: 1rem; margin-top: 1.5rem; flex-wrap: wrap;">
                <button class="filter-btn active" data-filter="all" style="padding: 0.6rem 2rem; border-radius: 50px; border: 2px solid var(--primary); background: var(--primary); color: white; font-weight: 800; cursor: pointer; transition: all 0.3s ease;">All Reports</button>
                <button class="filter-btn" data-filter="Daily Report" style="padding: 0.6rem 2rem; border-radius: 50px; border: 2px solid #e2e8f0; background: white; color: var(--text-main); font-weight: 800; cursor: pointer; transition: all 0.3s ease;">Daily</button>
                <button class="filter-btn" data-filter="Weekly Report" style="padding: 0.6rem 2rem; border-radius: 50px; border: 2px solid #e2e8f0; background: white; color: var(--text-main); font-weight: 800; cursor: pointer; transition: all 0.3s ease;">Weekly</button>
            </div>
        </div>

        <div class="results-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 3rem; max-width: 1300px; margin: 0 auto;">
            @forelse($reports as $report)
                <div class="result-card" data-type="{{ $report->report_type }}" style="background: #ffffff; border-radius: 32px; overflow: hidden; border: 1px solid #f1f5f9; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);">
                    <div style="height: 240px; overflow: hidden; position: relative;">
                        @if($report->photos && count($report->photos) > 0)
                            <img src="{{ asset('storage/' . $report->photos[0]) }}" alt="{{ $report->nama_project }}" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; bottom: 1.5rem; right: 1.5rem; background: rgba(255,255,255,0.9); padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.75rem; font-weight: 800; color: var(--primary); backdrop-filter: blur(10px);">
                                {{ count($report->photos) }} Photos
                            </div>
                        @endif
                    </div>
                    <div style="padding: 2.5rem;">
                        <div style="display: flex; gap: 0.5rem; align-items: center; margin-bottom: 1rem;">
                            <div style="font-size: 0.65rem; font-weight: 800; color: white; background: {{ $report->report_type == 'Weekly Report' ? '#3b82f6' : '#10b981' }}; padding: 0.3rem 0.8rem; border-radius: 50px; text-transform: uppercase; letter-spacing: 1px;">
                                {{ $report->report_type }}
                            </div>
                        </div>
                        <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--text-main); margin-bottom: 1rem; line-height: 1.4;">{{ $report->nama_project }}</h3>
                        <p style="color: var(--text-light); font-size: 0.9rem; line-height: 1.6; margin-bottom: 2rem;">
                            {{ Str::limit($report->penjelasan_project, 120) }}
                        </p>
                        <button class="btn-read-more btn btn-primary" data-modal="report-{{ $report->id }}" style="width: 100%; justify-content: center; border-radius: 16px;">Read Story & View Gallery</button>
                    </div>
                </div>
            @empty
                <p style="grid-column: 1/-1; color: var(--text-light); font-weight: 600; text-align: center;">No project results have been submitted yet.</p>
            @endforelse
        </div>
    </section>
@endsection

@section('modals')
    <!-- Modals (keep full texts) -->
    @for($i=1; $i<=5; $i++)
        <div class="modal-overlay" id="modal-{{ $i }}">
            <div class="modal-content">
                <span class="close-modal" data-modal="modal-{{ $i }}">&times;</span>
                <div class="modal-header">
                    @php
                        $images = ['rektor_asia.jpeg', 'rektor_ptss.jpeg', 'rektor_pss.jpeg', 'rektor_polimas.png', 'rektor_kka.jpeg'];
                        $names = ['Risa Santoso, B.A., M.Ed.', 'Ts. Khairul Anuar bin Ishak', 'Mohd Sahran @ Awang bin Mohidin', 'Dr. Mhd Azmin bin Mat Seman', 'Hj. Rosnizam bin Kamis'];
                        $titles = ["Rector of ITB Asia Malang", "Director of Politeknik Tuanku Syed Sirajuddin", "Director of Politeknik Sandakan Sabah", "Deputy Director of Politeknik Sultan Abdul Halim Mu'adzam Shah", "Director of Kolej Komuniti Arau"];
                    @endphp
                    <div>
                        <h3>{{ $names[$i-1] }}</h3>
                        <span>{{ $titles[$i-1] }}</span>
                    </div>
                </div>
                <div class="modal-body">
                    @if($i == 1)
                        <p>"It is my pleasure to welcome all participants, partners, and guests to this International Community Service Program. This program takes place in Plaosan Village, Malang, and as the Host Institution, we hope to create a meaningful impact through the collaboration of five institutions from two countries. On behalf of Institut Teknologi dan Bisnis Asia Malang, I extend my warmest greetings to everyone joining this meaningful initiative."</p>
                        <p>"As the Host Institution, Institut Asia is proud to support a program that promotes learning, collaboration, and service to the community. We hope this experience will inspire students to grow academically, socially, and personally while building friendship and mutual understanding across institutions."</p>
                        <p>"May this program bring positive impact, valuable memories, and lasting partnerships for all involved. Welcome, and let us learn and serve together successfully."</p>
                    @elseif($i == 2)
                        <p>"Assalamualaikum warahmatullahi wabarakatuh, Salam Sejahtera and warm greetings."</p>
                        <p>"It is with great pride and gratitude that I present this message in conjunction with the International Community-Based Internship & Service Program and Academic Visit to Malang, Indonesia. This meaningful initiative reflects the strong commitment of Polytechnics and Community Colleges (POLYCC), in advancing global engagement, academic excellence, and community impact through Technical and Vocational Education and Training (TVET)."</p>
                        <p>"This program brings together 21 students from multiple institutions under POLYCC, namely Politeknik Tuanku Syed Sirajuddin (PTSS), Politeknik Sultan Abdul Halim Mu’adzam Shah (POLIMAS), Politeknik Sandakan Sabah (PSS), and Kolej Komuniti Arau (KKA). It is designed to broaden their global perspectives, cultural understanding, and interpersonal skills through real-world exposure and meaningful community engagement in Malang, Indonesia."</p>
                        <p>"Our sincere appreciation goes to Institut Teknologi dan Bisnis Asia Malang (ITBA) and the Desa Plaosan community for their warm acceptance and unwavering commitment in hosting and caring for our students. This initiative is more than an academic requirement; it is a platform for transformation."</p>
                        <p>"As we continue to strengthen international collaborations, it is my hope that programs such as this will inspire continuous growth and innovation among all participating institutions. May the relationships built through this initiative endure and flourish in the years to come."</p>
                        <p><strong>“Empowering Skills, Transforming Futures through TVET Excellence.”</strong></p>
                    @elseif($i == 3)
                        <p>"It is with great pride and a shared vision for excellence that I welcome you to the official platform of the International Community-Based Internship & Service Program, Indonesia. This initiative represents a cornerstone in our mission to produce holistic, globally competitive graduates."</p>
                        <p>"On behalf of Politeknik Sandakan Sabah, I would like to express my deepest appreciation to our lead organizer, Politeknik Tuanku Syed Sirajuddin, and our esteemed international partner, Institut Asia Malang. This program is a testament to the power of strategic partnerships."</p>
                        <p>"This program is more than an internship; it is a transformative journey. By deploying to Plaosan Village, our participants will apply their TVET competencies in real-world settings—from digital marketing for SMEs to sustainable agriculture and electrical microprojects."</p>
                        <p>"To the students selected: you are the ambassadors of the 'Serve Locally, Connect Globally' spirit. This is your opportunity to sharpen technical skills, cultivate global competencies, and leave a lasting legacy in the community of Plaosan Village."</p>
                        <p><strong>“TVET FOR ALL.”</strong></p>
                    @elseif($i == 4)
                        <p>"It is with great pleasure that I extend my sincere appreciation and gratitude for the successful organisation of the International Community-Based Internship & Service Program. This initiative reflects a commendable level of commitment, collaboration, and shared vision among all partners."</p>
                        <p>"POLIMAS is proud to have contributed a delegation of six (6) students to this meaningful engagement. Their participation signifies our commitment to nurturing globally competent graduates who are academically equipped, socially responsible, and culturally adaptive."</p>
                        <p>"Spanning one month, this programme integrates industrial training with community service through research-driven intervention projects. Such experiential learning enables students to translate theoretical knowledge into practical solutions that contribute to socio-economic development."</p>
                        <p>"Looking ahead, POLIMAS aspires for programmes of this nature to be expanded in scope. Such initiatives should be continuously strengthened through sustained collaboration. My heartfelt thanks to all parties involved for ensuring the success of this foundation for future partnerships."</p>
                    @elseif($i == 5)
                        <p>"It is a great honor for Kolej Komuniti Arau to witness our Food Processing Technology students embark on this meaningful mobility program to Institut Teknologi dan Bisnis Asia (ITBA) Malang, Indonesia. This initiative serves as a vital bridge, connecting our academic foundations with international industry practices."</p>
                        <p>"Our primary hope is for students to gain extensive global exposure. By immersing yourselves in Indonesia’s innovative food industry, you will discover new perspectives on processing techniques and product development that go beyond the classroom. We hope you will return with enhanced technical skills and cultural intelligence."</p>
                        <p>"As ambassadors of our college, we expect you to uphold the highest standards of discipline and excellence. Your mission is to bring back fresh ideas that will inspire your peers and contribute to the advancement of our local food technology sector."</p>
                        <p>"To our students, travel safely and make the most of this journey. We are confident that you will represent Kolej Komuniti Arau with pride and return with a renewed passion for your craft. Best of luck!"</p>
                    @endif
                </div>
            </div>
        </div>
    @endfor

    @foreach($reports as $report)
    <div class="modal-overlay" id="report-{{ $report->id }}" style="padding: 8px;">
        <div class="modal-content report-modal-card" style="width: 98%; max-width: 900px; padding: 0; overflow-y: auto; max-height: 92vh; border-radius: 24px; background: #ffffff;">
            <div style="background: var(--primary); padding: 1.8rem 1.5rem; color: white; position: relative;">
                <span class="close-modal" data-modal="report-{{ $report->id }}" style="position: absolute; top: 1rem; right: 1.2rem; color: white; opacity: 0.8; font-size: 2rem; cursor: pointer;">&times;</span>
                <h2 style="font-size: 1.4rem; font-weight: 800; margin: 0; padding-right: 2rem;">{{ $report->nama_project }}</h2>
            </div>
            <div style="padding: 1.5rem;">
                <div style="line-height: 1.8; font-size: 1.1rem; white-space: pre-line; margin-bottom: 2rem;">{{ $report->penjelasan_project }}</div>
                
                @if($report->photos && count($report->photos) > 0)
                    <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem; color: var(--text-main);">Photo Gallery</h3>
                    @if(count($report->photos) > 3)
                        <!-- Horizontal Scrollable Gallery (for more than 3 photos) -->
                        <div class="auto-scroll-gallery" style="display: flex; overflow-x: auto; gap: 1.2rem; padding: 0.5rem 0.5rem 1.5rem; -webkit-overflow-scrolling: touch;">
                            @foreach($report->photos as $photo)
                                <div style="flex: 0 0 280px; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.06); aspect-ratio: 4/3; cursor: pointer; transition: transform 0.3s ease;" onclick="openLightbox('{{ asset('storage/' . $photo) }}')" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                                    <img src="{{ asset('storage/' . $photo) }}" alt="Project Photo" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Clean Grid Gallery (for 1 to 3 photos) -->
                        <div style="display: flex; flex-wrap: wrap; gap: 1.2rem; padding: 0.5rem 0;">
                            @foreach($report->photos as $photo)
                                <div style="flex: 0 0 280px; max-width: 100%; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.06); aspect-ratio: 4/3; cursor: pointer; transition: transform 0.3s ease;" onclick="openLightbox('{{ asset('storage/' . $photo) }}')" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                                    <img src="{{ asset('storage/' . $photo) }}" alt="Project Photo" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
    @endforeach

    <!-- Image Lightbox Modal -->
    <div id="lightbox-modal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.95); z-index: 200000; justify-content: center; align-items: center; cursor: zoom-out; backdrop-filter: blur(12px); transition: all 0.3s ease;">
        <span style="position: absolute; top: 2rem; right: 2.5rem; color: #ffffff; opacity: 0.8; font-size: 3.5rem; cursor: pointer; font-weight: 300; line-height: 1; transition: opacity 0.2s;" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.8">&times;</span>
        <img id="lightbox-img" src="" alt="Enlarged Photo" style="max-width: 90%; max-height: 85vh; border-radius: 20px; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.55); object-fit: contain; transform: scale(0.95); transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);">
    </div>
@endsection

@section('scripts')
    const track = document.querySelector('.carousel-track');
    const dots = document.querySelectorAll('.b-dot');
    const nextBtn = document.querySelector('.next-banner-btn');
    const prevBtn = document.querySelector('.prev-banner-btn');
    
    if(track) {
        const getCardWidth = () => track.querySelector('.carousel-card').offsetWidth;
        const getScrollStep = () => getCardWidth() + 32; // cardWidth + 2rem (32px) gap

        if(nextBtn) nextBtn.addEventListener('click', () => {
            const isLastCard = Math.round(track.scrollLeft + getCardWidth()) >= track.scrollWidth - 10;
            if (isLastCard) {
                track.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                track.scrollBy({ left: getScrollStep(), behavior: 'smooth' });
            }
        });

        if(prevBtn) prevBtn.addEventListener('click', () => {
            const isFirstCard = track.scrollLeft <= 10;
            if (isFirstCard) {
                track.scrollTo({ left: track.scrollWidth, behavior: 'smooth' });
            } else {
                track.scrollBy({ left: -getScrollStep(), behavior: 'smooth' });
            }
        });

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                const index = parseInt(dot.getAttribute('data-index'));
                track.scrollTo({ left: getScrollStep() * index, behavior: 'smooth' });
            });
        });

        track.addEventListener('scroll', () => {
            const index = Math.round(track.scrollLeft / getScrollStep());
            dots.forEach(d => d.classList.remove('active'));
            if(dots[index]) dots[index].classList.add('active');
        });
    }

    const filterBtns = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.result-card');
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Reset all buttons to inactive style
            filterBtns.forEach(b => {
                b.classList.remove('active');
                b.style.background = 'white';
                b.style.color = 'var(--text-main)';
                b.style.borderColor = '#e2e8f0';
            });
            // Set clicked button to active style
            btn.classList.add('active');
            btn.style.background = 'var(--primary)';
            btn.style.color = 'white';
            btn.style.borderColor = 'var(--primary)';
            
            const filter = btn.getAttribute('data-filter');
            cards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-type') === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });



    // Lightbox Modal Logic
    window.openLightbox = function(src) {
        const lightbox = document.getElementById('lightbox-modal');
        const img = document.getElementById('lightbox-img');
        if (lightbox && img) {
            img.src = src;
            lightbox.style.display = 'flex';
            setTimeout(() => {
                img.style.transform = 'scale(1)';
            }, 50);
        }
    };

    const lightboxModal = document.getElementById('lightbox-modal');
    if (lightboxModal) {
        lightboxModal.addEventListener('click', function() {
            const img = document.getElementById('lightbox-img');
            if (img) img.style.transform = 'scale(0.95)';
            setTimeout(() => {
                lightboxModal.style.display = 'none';
            }, 200);
        });
    }
@endsection
