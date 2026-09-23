@extends('layouts.app')

@section('title', 'Home - KKN Desa Plaosan')

@php $bodyClass = 'has-hero'; @endphp

@section('styles')
<style>
    /* Final Refined Sketch-based layout */
    .greetings-section {
        padding: 8rem 5% 6rem;
        background: #f8fafc;
        overflow: hidden;
    }

    .greetings-section .carousel-container {
        position: relative;
        max-width: 750px !important;
        margin: 0 auto;
    }

    .greetings-section .carousel-track {
        display: flex !important;
        gap: 2rem !important;
        overflow-x: auto !important;
        scroll-snap-type: x mandatory !important;
        scroll-behavior: smooth !important;
        scrollbar-width: none !important;
        padding: 1rem 0 !important;
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
        border: 2px solid #3b82f6 !important;
        height: 320px !important;
        margin: 20px auto !important;
        position: relative !important;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05) !important;
        transition: none !important;
    }

    .greetings-section .carousel-card::before {
        content: none !important;
        display: none !important;
    }

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
        object-position: center top !important;
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
        align-items: center;
        z-index: 100000;
        overflow-y: auto;
        padding: 20px;
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

    .banner-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background: var(--primary);
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
        background: #047857;
        transform: translateY(-50%) scale(1.1);
    }

    .prev-banner-btn { left: -22px !important; }
    .next-banner-btn { right: -22px !important; }

    .banner-dots {
        position: absolute;
        bottom: 52px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 8px;
        z-index: 10;
    }

    /* Filter button styles (use class-based state to avoid inline specificity issues) */
    .filter-btn {
        padding: 0.6rem 2rem;
        border-radius: 50px;
        border: 2px solid #e2e8f0;
        background: white;
        color: var(--text-main);
        font-weight: 800;
        cursor: pointer;
        transition: all 0.3s ease;
        outline: none;
    }

    .filter-btn.active {
        border: 2px solid var(--primary) !important;
        background: var(--primary) !important;
        color: white !important;
    }

    #reports-grid {
        grid-auto-rows: 1fr;
    }

    .result-card {
        display: flex;
        flex-direction: column;
        height: 100%;
        overflow: hidden;
    }

    .result-card .card-image {
        height: 180px;
        overflow: hidden;
        position: relative;
        flex-shrink: 0;
    }

    .result-card .card-body {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        flex: 1;
        min-height: 0;
    }

    .result-card .card-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        align-items: center;
        margin-bottom: 1rem;
    }

    .result-card .report-title {
        font-size: 1.2rem;
        font-weight: 800;
        color: var(--text-main);
        margin-bottom: 0.5rem;
        line-height: 1.4;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .result-card .report-date {
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--text-light);
        margin-bottom: 1.5rem;
    }

    .result-card .card-description {
        color: var(--text-light);
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 2rem;
        flex: 1;
        min-height: 0;
    }

    .featured-report-card {
        max-width: 1300px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: minmax(300px, 1fr) minmax(380px, 1.2fr);
        gap: 2rem;
        background: #ffffff;
        border-radius: 32px;
        overflow: hidden;
        box-shadow: 0 24px 70px rgba(15, 23, 42, 0.12);
    }

    .featured-report-card__image {
        min-height: 360px;
        overflow: hidden;
        background: #f8fafc;
    }

    .featured-report-card__image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .featured-report-card__content {
        padding: 2rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .featured-report-card__badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.55rem 0.85rem;
        border-radius: 999px;
        margin-bottom: 1.5rem;
    }

    .featured-report-card__badge-item {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.35rem 0.8rem;
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.85);
        background: rgba(255, 255, 255, 0.16);
    }

    .featured-report-card__badge-item.active {
        background: transparent;
        color: #ffffff;
    }

    .featured-report-card__title {
        font-size: 2rem;
        font-weight: 900;
        line-height: 1.1;
        margin: -1.5rem 0 0.3rem;
        color: var(--text-main);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        max-height: 5.5rem;
        white-space: normal;
        word-break: break-word;
    }

    .featured-report-card__meta {
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.25rem;
    }

    .featured-report-card__badge,
    .featured-report-card__date {
        line-height: 1;
    }

    .featured-report-card__summary {
        color: var(--text-light);
        font-size: 1rem;
        line-height: 1.9;
        margin-bottom: 2rem;
        max-width: 100%;
    }

    @media (max-width: 767px) {
        .featured-report-card__summary {
            display: none;
        
        }
        .featured-report-card__title {
            font-size: 1.1rem !important; /* Anda bisa sesuaikan angkanya jika dirasa kurang kecil */
            line-height: 1.4;
        }
    }

    .featured-report-card__cta-row {
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .report-arrow-btn {
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .report-arrow-btn:hover {
        color: var(--primary) !important;
        transform: translateX(2px);
    }

    .report-more-btn {
        transition: color 0.3s ease;
    }

    .report-more-btn:hover {
        color: #b91c1c !important;
        text-decoration: underline;
    }

    .report-title-btn:hover {
        color: var(--primary) !important;
    }

    .featured-report-card__footer {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 1rem;
    }

    .featured-report-card__date {
        font-size: 0.95rem;
        color: var(--text-light);
        font-weight: 700;
        margin-bottom: 25px;
    }

    .featured-report-card__button {
        border: none;
        background: transparent;
        color: #dc2626;
        padding: 0;
        font-weight: 800;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        cursor: pointer;
    }

    .featured-report-card__button:hover {
        text-decoration: underline;
    }

    @media (max-width: 992px) {
        .featured-report-card {
            grid-template-columns: 1fr;
            margin-top: 15px;
        }
        .featured-report-card__image {
            min-height: 320px;
        }
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
        background: var(--primary);
        transform: scale(1.2);
    }

    @media (max-width: 768px) {
        .cta-buttons { flex-direction: row; gap: 10px; width: 100%; justify-content: center; margin-top: 1.5rem; }
        .hero .btn { min-width: auto; flex: 1; padding: 0.8rem 1rem; font-size: 0.9rem; }
        
        .greetings-section { padding: 4rem 5% 3rem; } 
        .carousel-container { padding-top: 0px; } 
        
        .greetings-section .carousel-card { 
            flex-direction: column !important; 
            height: auto !important; 
            max-width: 100% !important; 
            margin: 10px auto !important;
        } 
        .greetings-section .card-image-wrapper { 
            flex: 0 0 200px !important; 
            height: 200px !important; 
            width: 100% !important; 
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
        .banner-dots { bottom: 40px; } 
        
        .banner-nav-btn { width: 40px; height: 40px; top: 55%; }
        .prev-banner-btn { left: -10px; }
        .next-banner-btn { right: -10px; }
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

    <section id="reports-section" class="results-section" style="padding: 6rem 5%; background: #ffffff;">

        <div class="reports-section-header">
            <h2 class="reports-section-title">Latest Update</h2>
            <div class="reports-section-line" style="display:inline-block;width:220px;height:4px;background:#10b981;border-radius:999px;margin-top:0.75rem;"></div>
        </div>

        @php
            $latestReport = $allReports->first();
        @endphp

        @if($latestReport)
            @php
                $latestPhotos = $latestReport->photos;
                if (is_string($latestPhotos)) {
                    $latestPhotos = json_decode($latestPhotos, true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        $latestPhotos = [];
                    }
                }
                if (!is_array($latestPhotos)) {
                    $latestPhotos = [];
                }
                $latestPhotos = array_values(array_filter($latestPhotos));
                $latestPhoto = count($latestPhotos) > 0 ? $latestPhotos[0] : null;
                if ($latestPhoto) {
                    $latestPhoto = str_replace('\\', '/', $latestPhoto);
                    $latestPhoto = preg_replace('#/+#', '/', $latestPhoto);
                    $latestPhoto = ltrim($latestPhoto, '/');
                }
                $latestPhotoUrl = $latestPhoto && file_exists(storage_path('app/public/' . $latestPhoto))
                    ? asset('storage/' . $latestPhoto)
                    : asset('images/kebun1.jpg');
            @endphp

            <div class="featured-report-card">
                <div class="featured-report-card__image">
                    <img src="{{ $latestPhotoUrl }}" alt="{{ $latestReport->nama_project }}">
                </div>
                <div class="featured-report-card__content">
                    <div>
                        <div class="featured-report-card__meta" style="display: flex; align-items: center; gap: 1rem;">
                            <div class="featured-report-card__badge" style="background: {{ $latestReport->report_type == 'Weekly Report' ? '#3b82f6' : '#10b981' }};">
                                <span class="featured-report-card__badge-item active">{{ $latestReport->report_type == 'Weekly Report' ? 'Weekly' : 'Daily' }}</span>
                            </div>
                            <span class="featured-report-card__date">{{ $latestReport->created_at ? $latestReport->created_at->format('d M Y') : '' }}</span>
                        </div>
                        <h3 class="featured-report-card__title" style="text-align: left;">{{ $latestReport->nama_project }}</h3>
                        <p class="featured-report-card__summary">{{ Str::limit($latestReport->penjelasan_project, 220) }}</p>

                        <div class="featured-report-card__cta-row">
                            <button class="featured-report-card__button" data-modal="report-{{ $latestReport->id }}" type="button">More <span aria-hidden="true">→</span></button>
                        </div>
                    </div>
                    <div class="featured-report-card__footer" aria-hidden="true" style="height:0; margin:0; padding:0; border:0;"></div>
                </div>
            </div>
        @else
            <p style="max-width: 1300px; margin: 0 auto; color: var(--text-light);">No reports are available yet.</p>
        @endif

        <div style="display:flex; justify-content:center; margin-top:4rem; width: 100%;">
            @if($reports->count() > 0)
                <button id="toggle-more-reports" class="btn btn-primary" type="button" style="border-radius:16px; font-weight:800; padding:0.9rem 2.5rem; display:inline-flex; align-items:center; background: #ffffff; color: var(--text-main); border: 1px solid #d1d5db;">
                    More Reports
                </button>

                <div class="modal-overlay" id="more-reports-modal" role="dialog" aria-modal="true" aria-hidden="true">
                    <div class="modal-content" style="max-width: 1200px; padding: 0; overflow: visible; max-height: calc(100vh - 40px);">
                        <div style="background: #ffffff; padding: 2rem 2rem 1.5rem; color: var(--text-main); position: relative; border-bottom: 1px solid #e6e9ee;">
                            <button type="button" class="close-modal" data-close="more-reports-modal" aria-label="Close" style="position:absolute; top:1.2rem; right:1.6rem; color: var(--text-main); opacity:0.9; font-size:2.2rem; background:none; border:none; cursor:pointer;">
                                &times;
                            </button>
                            <h3 style="margin:0; margin-top:1rem; font-size:1.6rem; font-weight:800; max-width:90%; margin-left:auto; margin-right:auto; text-align:center; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">All Reports</h3>
                            <div style="margin-top:1rem; display:flex; gap:0.6rem;">
                                <button class="filter-btn active" data-filter="all" type="button">All</button>
                                <button class="filter-btn" data-filter="Daily Report" type="button">Daily</button>
                                <button class="filter-btn" data-filter="Weekly Report" type="button">Weekly</button>
                            </div>
                        </div>

                        <div style="padding: 1rem 1.25rem; max-height: calc(100vh - 160px); overflow-y: auto;">
                            <div style="height: calc(70vh - 3.5rem); overflow:auto; padding-right: 0.25rem;">
                                <div style="overflow:auto;">
                                    <div class="more-report-grid">
                                        @foreach($allReports as $report)
                                            <div class="modal-result-card" data-type="{{ $report->report_type }}" style="background:#ffffff; border-radius:12px; padding:1rem; border:1px solid #eef2f6; min-height:160px; display:flex; flex-direction:column; justify-content:flex-start; box-shadow: 0 8px 24px rgba(15,23,42,0.04); overflow:hidden;">
                                                <div style="display:flex; justify-content:space-between; align-items:flex-start; gap:0.75rem;">
                                                    <div style="display:flex; align-items:center; gap:0.6rem;">
                                                        <div style="font-size:0.65rem; font-weight:700; color:#ffffff; background: {{ $report->report_type == 'Weekly Report' ? '#4f83ff' : '#10b981' }}; padding:0.35rem 0.85rem; border-radius:999px; text-transform:uppercase; letter-spacing:0.7px;{{ $report->report_type == 'Daily Report' ? ' background:#10b981 !important;' : '' }}">{{ $report->report_type == 'Weekly Report' ? 'Weekly' : 'Daily' }}</div>
                                                    </div>
                                                    <div style="font-size:0.78rem; color:var(--text-light); font-weight:700;">{{ $report->created_at ? $report->created_at->format('d M Y') : '' }}</div>
                                                </div>

                                                <div style="margin-top:8px; display:flex; flex-direction:column; gap:0.75rem; align-items:center; width:100%;">
                                                    <button type="button" class="report-title-btn" data-modal="report-{{ $report->id }}" style="flex:1; font-weight:800; color:var(--text-main); font-size:1rem; line-height:1.25; overflow:hidden; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; text-overflow:ellipsis; word-break:break-word; background:none; border:none; padding:0; text-align:left; cursor:pointer; transition:color 0.3s ease; width:100%; max-width:90%; margin:0 auto;">
                                                        {{ $report->nama_project }}
                                                    </button>
                                                    <button type="button" class="report-more-btn" data-modal="report-{{ $report->id }}" style="margin-top:0.5rem; font-size:1rem; color:#dc2626; font-weight:700; background:none; border:none; padding:0.4rem 0.8rem; cursor:pointer; white-space:nowrap; transition:color 0.3s ease; align-self:center; display:block;">More</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('modals')
    @for($i=1; $i<=5; $i++)
        <div class="modal-overlay" id="modal-{{ $i }}">
            <div class="modal-content">
                <span class="close-modal" data-modal="modal-{{ $i }}">&times;</span>
                <div class="modal-header">
                    @php
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
                        <p>"It is my pleasure to welcome all participants, partners, and guests to this International Community Service Program..."</p>
                    @elseif($i == 2)
                        <p>"Assalamualaikum warahmatullahi wabarakatuh, Salam Sejahtera and warm greetings..."</p>
                    @elseif($i == 3)
                        <p>"It is with great pride and a shared vision for excellence that I welcome you..."</p>
                    @elseif($i == 4)
                        <p>"It is with great pleasure that I extend my sincere appreciation and gratitude..."</p>
                    @elseif($i == 5)
                        <p>"It is a great honor for Kolej Komuniti Arau to witness our Food Processing Technology students..."</p>
                    @endif
                </div>
            </div>
        </div>
    @endfor

    @foreach($allReports as $report)
    <div class="modal-overlay" id="report-{{ $report->id }}">
        <div class="modal-content" style="max-width: 900px; padding: 0; overflow-y: auto; max-height: 90vh; border-radius: 32px; background: #ffffff;">
            <div style="background: var(--primary); padding: 3rem; color: white; position: relative;">
                <span class="close-modal" data-modal="report-{{ $report->id }}" style="position: absolute; top: 1.5rem; right: 2rem; color: white; opacity: 0.8; font-size: 2rem; cursor: pointer;">&times;</span>
                <h2 style="font-size: 2rem; font-weight: 800; margin: 0; white-space: normal; word-break: break-word; overflow-wrap: anywhere;">{{ $report->nama_project }}</h2>
            </div>
            <div style="padding: 3rem;">
                <div style="line-height: 1.8; font-size: 1.1rem; white-space: pre-line; margin-bottom: 2rem;">{{ $report->penjelasan_project }}</div>
                
                @php
                    $reportPhotos = $report->photos;
                    if (is_string($reportPhotos)) {
                        $reportPhotos = json_decode($reportPhotos, true);
                        if (json_last_error() !== JSON_ERROR_NONE) {
                            $reportPhotos = [];
                        }
                    }
                    if (!is_array($reportPhotos)) {
                        $reportPhotos = [];
                    }
                    $reportPhotos = array_values(array_filter($reportPhotos));
                @endphp
                @if(count($reportPhotos) > 0)
                    <h3 style="font-size: 1.5rem; font-weight: 800; margin-bottom: 1rem; color: var(--text-main);">Photo Gallery</h3>
                    <div class="auto-scroll-gallery" style="display: flex; overflow-x: auto; gap: 1.2rem; padding: 0.5rem 0.5rem 1.5rem; -webkit-overflow-scrolling: touch;">
                        @foreach($reportPhotos as $photo)
                            @php
                                $photo = urldecode($photo);
                                $photo = str_replace('\\', '/', $photo);
                                $photo = preg_replace('#/+#', '/', $photo);
                                $photo = ltrim($photo, '/');
                                $pUrl = file_exists(storage_path('app/public/' . $photo))
                                    ? asset('storage/' . $photo)
                                    : asset('images/kebun1.jpg');
                            @endphp
                            <div style="flex: 0 0 260px; height: 180px; border-radius: 16px; overflow: hidden; cursor: pointer;" onclick="openLightbox('{{ $pUrl }}')">
                                <img src="{{ $pUrl }}" alt="Project Photo" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach

    <div id="lightbox-modal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.95); z-index: 200000; justify-content: center; align-items: center; cursor: zoom-out; backdrop-filter: blur(12px);">
        <span style="position: absolute; top: 2rem; right: 2.5rem; color: #ffffff; opacity: 0.8; font-size: 3.5rem; cursor: pointer;">&times;</span>
        <img id="lightbox-img" src="" alt="Enlarged Photo" style="max-width: 90%; max-height: 85vh; border-radius: 20px; object-fit: contain;">
    </div>
@endsection

@section('scripts')
    // Carousel Slider Logic
    const track = document.querySelector('.carousel-track');
    const dots = document.querySelectorAll('.b-dot');
    const nextBtn = document.querySelector('.next-banner-btn');
    const prevBtn = document.querySelector('.prev-banner-btn');
    
    if(track) {
        const getCardWidth = () => track.querySelector('.carousel-card').offsetWidth;
        const getScrollStep = () => getCardWidth() + 32;

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

    // ==========================================
    // FIXED: LOGIKA FILTER & MORE VISIBILITY
    // ==========================================
    const filterBtns = Array.from(document.querySelectorAll('.filter-btn'));
    const mainGrid = document.getElementById('reports-grid');
    const mainCards = mainGrid ? Array.from(mainGrid.querySelectorAll('.result-card')) : [];
    const modalCards = Array.from(document.querySelectorAll('#more-reports-modal .modal-result-card'));
    const moreBtn = document.getElementById('toggle-more-reports');

    function getVisibleCount() {
        const w = window.innerWidth;
        if (w >= 992) return 8;
        if (w >= 769) return 8;
        if (w >= 576) return 4;
        return 2;
    }

    function normalizeValue(value) {
        return (value || '').toString().trim().toLowerCase();
    }

    function updateReportsSystem() {
        const activeBtn = document.querySelector('.filter-btn.active');
        const currentFilterRaw = activeBtn ? activeBtn.getAttribute('data-filter') : 'all';
        const currentFilter = normalizeValue(currentFilterRaw);

        let mainVisibleCounter = 0;

        mainCards.forEach(card => {
            const type = normalizeValue(card.dataset.type);
            const matchesFilter = currentFilter === 'all' || type === currentFilter;

            if (matchesFilter) {
                if (mainVisibleCounter < getVisibleCount()) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
                mainVisibleCounter++;
            } else {
                card.style.display = 'none';
            }
        });

        modalCards.forEach(card => {
            const type = normalizeValue(card.dataset.type);
            const matchesFilter = currentFilter === 'all' || type === currentFilter;
            card.style.display = matchesFilter ? 'block' : 'none';
        });

        if (moreBtn) {
            moreBtn.style.display = 'inline-flex';
        }
    }

    function resetFilterButtonStyles() {
        filterBtns.forEach(b => {
            if (b.classList.contains('active')) {
                b.classList.add('active');
                b.style.border = '2px solid var(--primary)';
                b.style.background = 'var(--primary)';
                b.style.color = 'white';
            } else {
                b.style.border = '2px solid #e2e8f0';
                b.style.background = 'white';
                b.style.color = 'var(--text-main)';
            }
        });
    }

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            resetFilterButtonStyles();
            updateReportsSystem();
        });
    });

    // Set initial filter button state
    resetFilterButtonStyles();

    if (moreBtn) {
        moreBtn.addEventListener('click', () => {
            resetFilterButtonStyles();
            const popup = document.getElementById('more-reports-modal');
            if (popup) {
                popup.classList.add('active');
                popup.setAttribute('aria-hidden', 'false');
            }
        });
    }

    const morePopup = document.getElementById('more-reports-modal');
    if (morePopup) {
        morePopup.addEventListener('click', (e) => {
            if (e.target === morePopup) {
                morePopup.classList.remove('active');
                morePopup.setAttribute('aria-hidden', 'true');
            }
        });
        const closeBtn = morePopup.querySelector('[data-close="more-reports-modal"], .close-modal');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                morePopup.classList.remove('active');
                morePopup.setAttribute('aria-hidden', 'true');
            });
        }
    }

    document.addEventListener('click', function(e) {
        // Handle all buttons with data-modal attribute
        const btn = e.target.closest('[data-modal]');
        if (btn) {
            const targetId = btn.getAttribute('data-modal');
            const modal = document.getElementById(targetId);
            console.log('Modal button clicked:', targetId, 'Modal found:', !!modal);
            if (modal) {
                modal.classList.add('active');
                console.log('Modal class added, active:', modal.classList.contains('active'));
            }
        }
        if (e.target && e.target.classList.contains('btn-read-more')) {
            const targetId = e.target.getAttribute('data-modal');
            const modal = document.getElementById(targetId);
            if (modal) modal.classList.add('active');
        }
        if (e.target && e.target.classList.contains('close-modal')) {
            const modal = e.target.closest('.modal-overlay');
            if (modal && modal.id !== 'more-reports-modal') modal.classList.remove('active');
        }
    });

    window.addEventListener('click', (e) => {
        if (e.target.classList.contains('modal-overlay') && e.target.id !== 'more-reports-modal') {
            e.target.classList.remove('active');
        }
    });

    updateReportsSystem();
    window.addEventListener('resize', updateReportsSystem);

    // Run when modal opens and on resize
    if (moreBtn) {
        moreBtn.addEventListener('click', () => {
            // no extra ellipsis logic required; CSS handles overflow
        });
    }

    window.openLightbox = function(src) {
        const lightbox = document.getElementById('lightbox-modal');
        const img = document.getElementById('lightbox-img');
        if (lightbox && img) {
            img.src = src;
            lightbox.style.display = 'flex';
        }
    };

    const lightboxModal = document.getElementById('lightbox-modal');
    if (lightboxModal) {
        lightboxModal.addEventListener('click', function() {
            lightboxModal.style.display = 'none';
        });
    }
@endsection
