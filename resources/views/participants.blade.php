@extends('layouts.app')

@section('title', 'Participants - KKN Tim 2026')

@section('styles')
<style>
    .participants-hero {
        padding: 10rem 5% 5rem;
        background: linear-gradient(rgba(248, 250, 252, 0.8), rgba(248, 250, 252, 0.8)), url('/images/kebun1.jpg') center/cover no-repeat fixed;
        text-align: center;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 1.5rem;
        max-width: 1400px;
        margin: 4rem auto 0;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        padding: 2.5rem 1.5rem;
        border-radius: 30px;
        border: 1px solid rgba(255,255,255,0.5);
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .stat-card:hover { transform: translateY(-10px); }

    .stat-number {
        font-size: 3.5rem;
        font-weight: 900;
        color: var(--text-main);
        line-height: 1;
        margin-bottom: 1.5rem;
    }

    .stat-logo {
        height: 50px;
        object-fit: contain;
        margin-bottom: 1rem;
        filter: drop-shadow(0 4px 6px rgba(0,0,0,0.05));
    }

    .stat-label {
        font-size: 0.7rem;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        line-height: 1.3;
    }

    .indonesia-stat {
        grid-column: auto;
        max-width: none;
        margin: 0;
    }

    /* Compact List Section */
    .directory-section {
        padding: 5rem 5%;
        background: #ffffff;
    }

    .directory-container {
        max-width: 1300px;
        margin: 0 auto;
    }

    .uni-group {
        margin-bottom: 5rem;
    }

    .uni-group-title {
        font-size: 1.2rem;
        font-weight: 800;
        color: var(--text-main);
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 2rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .uni-group-title::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #f1f5f9;
    }

    .compact-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 1rem;
    }

    .compact-name {
        font-size: 0.8rem;
        color: #475569;
        font-weight: 600;
        padding: 0.8rem 1.2rem;
        background: #f8fafc;
        border-radius: 12px;
        border: 1px solid #f1f5f9;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 10px;
        height: 100%;
        min-height: 45px;
    }

    .compact-name:hover {
        background: #ffffff;
        border-color: var(--primary);
        color: var(--primary);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.1);
        transform: translateY(-2px);
    }

    .compact-name::before {
        content: '';
        width: 6px;
        height: 6px;
        background: var(--primary);
        border-radius: 50%;
        flex-shrink: 0;
    }

    @media (max-width: 1024px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .indonesia-stat { grid-column: span 2; }
    }

    @media (max-width: 640px) {
        .stat-number { font-size: 3rem; }
        .stats-grid { gap: 1rem; }
    }
</style>
@endsection

@section('content')
<section class="participants-hero">
    <div class="section-header">
        <h2 style="font-size: 3.5rem; font-weight: 900; color: var(--text-main); letter-spacing: -1px;">PARTICIPANTS</h2>
        <div style="width: 60px; height: 4px; background: var(--primary); margin: 1.5rem auto;"></div>
    </div>

    <div class="stats-grid">
        <!-- PTSS -->
        <div class="stat-card">
            <img src="{{ asset('images/logo_ptss.png') }}" alt="PTSS" class="stat-logo">
            <div class="stat-number">8</div>
            <div class="stat-label">POLITEKNIK TUANKU SYED<br>SIRAJUDDIN (PTSS)</div>
        </div>

        <!-- POLIMAS -->
        <div class="stat-card">
            <img src="{{ asset('images/logo_polimas.jpg') }}" alt="POLIMAS" class="stat-logo">
            <div class="stat-number">6</div>
            <div class="stat-label">POLITEKNIK PREMIER SULTAN<br>ABDUL HALIM MU'ADZAM (POLIMAS)</div>
        </div>

        <!-- PSS -->
        <div class="stat-card">
            <img src="{{ asset('images/logo_pss.png') }}" alt="PSS" class="stat-logo">
            <div class="stat-number">5</div>
            <div class="stat-label">POLITEKNIK SANDAKAN<br>SABAH (PSS)</div>
        </div>

        <!-- KKA -->
        <div class="stat-card">
            <img src="{{ asset('images/logo_kka.png') }}" alt="KKA" class="stat-logo">
            <div class="stat-number">2</div>
            <div class="stat-label">KOLEJ KOMUNITI ARAU (KKA)</div>
        </div>

        <!-- ASIA -->
        <div class="stat-card indonesia-stat">
            <img src="{{ asset('images/logo_asia.png') }}" alt="ASIA" class="stat-logo">
            <div class="stat-number">23</div>
            <div class="stat-label">INSTITUT TEKNOLOGI DAN<br>BISNIS ASIA MALANG</div>
        </div>
    </div>
</section>

<section class="directory-section">
    <div class="directory-container">
        <!-- ASIA MALANG -->
        <div class="uni-group">
            <div class="uni-group-title">Institut Teknologi dan Bisnis Asia Malang</div>
            <div class="compact-grid">
                @php
                    $asia_students = [
                        'HAVIVA NADHIROTUL LUVITA', 'ANGGUN MARITA', 'AFDHHILLA ALEA SALFITRY', 'VALENT HENA OCTA REVANDA',
                        'MOH. FATHUR ROHMAN', 'EUGENIA WANADRI KUSUMA PUTRI', 'ARLYA PUTRI AZZAHRA', 'MOH YAHYA HIDAYAT',
                        'IRENE HASTIANTI ZEFANYA', 'SUKMA LINUWIH', 'MUHAMMAD KHOSYI AMAL TEGUH IMAN FIRMANSYAH',
                        'ANASTHASYA EL EMERSON KLAU', 'GRACEA RANIA RUNTUTHOMAS', 'NADYA ENJELITA JACOB',
                        'EMMANUEL KENT AMADEO', 'KAROLUS KEWANAN', 'FARREL RASENDRIYA', 'CHOIRUL MUNIR',
                        'ATHALLAH AKMAL RAFANSYAH', 'M. RAVAEL AULIA HARIS', 'MOCH NOVAL TAUFIK KURROHMAN',
                        'MARTINA DHORO', 'MUHAMMAD AZIDEN HERLAMBANG'
                    ];
                @endphp
                @foreach($asia_students as $name)
                    <div class="compact-name">
                        {{ $name }}
                    </div>
                @endforeach
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 4rem;">
            <!-- PTSS -->
            <div class="uni-group">
                <div class="uni-group-title">PTSS Malaysia</div>
                <div class="compact-grid" style="grid-template-columns: 1fr;">
                    @php
                        $ptss = [
                            'MUHAMMAD RAFIQ SYARAFUDDIN BIN ROSLI SUHAIMI', 'NUR ATHIRAH BT MOHD NOR',
                            'MUHAMMAD AIMAN ZIKRI BIN ZAMRI', 'MIOR DANIEL IDLAN BIN MIOR IDRES',
                            'ARUNAAVAATHI A/P CHANDRASEGARAN', 'ADAM MIKAEL BIN ABD JALIL',
                            'WAN AMIR ABDELAZIZ BIN ASSERI', 'MUHAMMAD IQBAL QAYYUM BIN MOHD KHUSHAIRI'
                        ];
                    @endphp
                    @foreach($ptss as $name)
                        <div class="compact-name">{{ $name }}</div>
                    @endforeach
                </div>
            </div>

            <!-- POLIMAS -->
            <div class="uni-group">
                <div class="uni-group-title">POLIMAS Malaysia</div>
                <div class="compact-grid" style="grid-template-columns: 1fr;">
                    @php
                        $polimas = [
                            'MUHAMMAD AZFAR AIMAN BIN REAZIZUL', 'NUR AIN BINTI MOHD FIRDAUS',
                            'MUHAMMAD ALIF LUQMAN BIN MAHADI', 'AMMAAR HAZIQ BIN ABDUL',
                            'NU\'MAN A\'DZIMI BIN MOHD SYARIFF', 'MUHAMMAD REZZUAN BIN JOHARI'
                        ];
                    @endphp
                    @foreach($polimas as $name)
                        <div class="compact-name">{{ $name }}</div>
                    @endforeach
                </div>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 4rem;">
            <!-- PSS -->
            <div class="uni-group">
                <div class="uni-group-title">PSS Malaysia</div>
                <div class="compact-grid" style="grid-template-columns: 1fr;">
                    @php
                        $pss = [
                            'ERIKHA ERLION', 'ANDIKAH NURHAYAT BIN RAZANALI', 'CHALWIN BIN SINOH',
                            'MOHAMAD TAUFIQ HIDAYAT BIN MOHD YUSOFF', 'NUR AISYAH BINTI SAIFUL BAHARI'
                        ];
                    @endphp
                    @foreach($pss as $name)
                        <div class="compact-name">{{ $name }}</div>
                    @endforeach
                </div>
            </div>

            <!-- KKA -->
            <div class="uni-group">
                <div class="uni-group-title">KKA Malaysia</div>
                <div class="compact-grid" style="grid-template-columns: 1fr;">
                    @php
                        $kka = [
                            'CHANAWUT A/L CHATEI', 'NAUFAL HARRAZ BIN AHMAD YUSRI'
                        ];
                    @endphp
                    @foreach($kka as $name)
                        <div class="compact-name">{{ $name }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


