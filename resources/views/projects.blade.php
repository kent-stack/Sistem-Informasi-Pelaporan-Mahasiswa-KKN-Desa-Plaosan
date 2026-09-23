@extends('layouts.app')

@section('title', 'Projects - Planned Activity List')

@section('content')
    <section class="projects-page" style="padding: 10rem 5%; background: #f8fafc; min-height: 100vh;">
        <div class="section-header" style="text-align: center; margin-bottom: 5rem;">
            <div class="hero-tag" style="margin-bottom: 1rem; color: var(--primary); border-color: rgba(5, 150, 105, 0.2); background: rgba(5, 150, 105, 0.05);">KKN Activity Plan</div>
            <h2 style="font-size: 3rem; font-weight: 800; color: var(--text-main);">International <span>Projects</span></h2>
            <p style="color: var(--text-light); max-width: 700px; margin: 0 auto;">Select a project below to view the detailed activity plan.</p>
        </div>

        @php
            $planned_projects = [
                [
                    'id' => 'p1',
                    'nama' => 'Branding and Packaging for Sundan Plaosan Village MSMEs',
                    'mentor_industri' => 'Hironimus Hari Kurniawan, S.E.M.M (Recosta)',
                    'mentor' => '<strong>Indonesia:</strong> Abdulloh Eizzi Irsyada, S.Kom., M.Ds<br><strong>Malaysia:</strong> Rosnida binti Baharuddin',
                    'detail' => 'AI training for branding and packaging for 15 MSMEs in Sundan Hamlet. This training is focused on direct mentoring, practice, and finished results for each MSME.',
                    'output' => '• MSME digital account<br>• New packaging design',
                    'team' => 'DKV (Institut Asia), Multimedia (Malaysia)',
                    'total' => '7 Students',
                    'mahasiswa' => '<strong>Leader: Haviva Nadhirotul L</strong><br>1. Gracea Rania Runtuthomas<br>2. Nadya Enjelita Jacob<br>3. Aggun Marita<br>4. Afdhilla Alea S<br>5. Muhammad Azfar Aiman Bin Reazizul<br>6. Nur Ain Binti Mohd Firdaus'
                ],
                [
                    'id' => 'p2',
                    'nama' => 'Social Media Marketing Kit for Sundan Plaosan Village Tourism Mapping',
                    'mentor_industri' => 'Ilham Egy Syahrizal',
                    'mentor' => '<strong>Indonesia:</strong> Nur Elif, S.E., M.M.<br><strong>Malaysia:</strong> Noorazura Binti Natha @ Mokhtar, Siti Zauyah Binti Abu Bakar',
                    'detail' => 'Development of a social media marketing kit for promoting Sundan Hamlet tourism via Facebook, Instagram, and TikTok.',
                    'output' => '• Tourism promotion content<br>• Social media account management',
                    'team' => 'Information Systems (Asia), IT (Malaysia)',
                    'total' => '8 Students',
                    'mahasiswa' => '<strong>Leader: Eugenia Wanadri Kusuma Putri</strong><br>1. Emmanuel Kent Amadeo<br>2. Karolus Kewanan<br>3. Muhammad Alif Luqman Bin Mahadi<br>4. Valent Hena Octa Revanda<br>5. Moh. Fathur Rohman<br>6. Nur Athirah Binti Mohd Nor<br>7. Mior Daniel Idlan Bin Mior Idres'
                ],
                [
                    'id' => 'p3',
                    'nama' => 'Digitalization of Ledger Book for BumDes (Village-Owned Enterprise)',
                    'mentor_industri' => 'Indra Lukmana Putra S.ST., M.M (ENHA)',
                    'mentor' => '<strong>Indonesia:</strong> Ditya Wardana, S.ST., M.S.A.<br><strong>Malaysia:</strong> Noraini binti Mohd Banua',
                    'detail' => 'Development of a simple system or application for the digitalization of BumDes recording and bookkeeping, which was previously manual.',
                    'output' => '• Digital bookkeeping app<br>• Automated financial reports',
                    'team' => 'Accounting (Institut Asia), IT (Malaysia)',
                    'total' => '6 Students',
                    'mahasiswa' => '<strong>Leader: Sukma Linuwih</strong><br>1. Muhammad Khosyi Amal Teguh Iman Firmansyah<br>2. Anasthasya El Emerson Klau<br>3. Ammaar Haziq Bin Abdul<br>4. Nu\'man A\'dzimi BIN Mohd Syariff<br>5. Muhammad Rezzuan Bin Johari'
                ],
                [
                    'id' => 'p4',
                    'nama' => 'Alternative Technology for Coffee Husk Processing and Food Processing Management',
                    'mentor_industri' => 'Okie Hemalukita ICA (Indonesian Chef Association)',
                    'mentor' => '<strong>Indonesia:</strong> Heru Kustanto, S.E, M.M.<br><strong>Malaysia:</strong> Mohd Azha bin Ismail, Muhamad Amirul Aiman bin Mohd Azam, Ts. Khairul Anuar bin Ishak',
                    'detail' => 'Development of product innovations based on coffee waste (cascara tea) and designing a blueprint for a simple coffee skin separator tool.',
                    'output' => '• Cascara tea innovation<br>• Separator tool blueprint',
                    'team' => 'Engineering (Institut Asia), Business (Malaysia)',
                    'total' => '9 Students',
                    'mahasiswa' => '<strong>Leader: Arlya Putri Azzahra</strong><br>1. Muhammad Aiman Zikri Bin Zamri<br>2. Chanawut A/L Chatei<br>3. Naufal Harraz Bin Ahmad Yusri<br>4. Moh Yahya Hidayat<br>5. Irene Hastianti Zefanya<br>6. Muhammad Rafiq Syarafuddin Bin Rosli Suhaimi<br>7. Erikha Erlion<br>8. Andikah Murhayat Bin Razanali'
                ],
                [
                    'id' => 'p5',
                    'nama' => 'Melon Greenhouse Automation System',
                    'mentor_industri' => 'Anggakara Yudha Pradana (Farm Studio)',
                    'mentor' => '<strong>Indonesia:</strong> Dr. Sunu Jatmika, S.Kom., M.Kom<br><strong>Malaysia:</strong> Noor Azmiza binti Ideris, Mohd Saiful Fadli bin Maidin, Azman bin Mat Hussin',
                    'detail' => 'Automation system for a melon greenhouse to increase efficiency and harvest yields for local farmers.',
                    'output' => '• Automation control system<br>• Monitoring dashboard',
                    'team' => 'Informatics (Asia), IT (Malaysia)',
                    'total' => '13 Students',
                    'mahasiswa' => '<strong>Leader: Athallah Akmal Rafansyah</strong><br>1. Choirul Munir<br>2. Farrel Rasendriya<br>3. M. Ravael Aulia Haris<br>4. Moch Noval Taufik Kurrohman<br>5. Martina Dhoro<br>6. Muhammad Aziden Herlambang<br>7. Chalwin Bin Sinoh<br>8. Mohamad Taufiq Hidayat Bin Mohd Yusoff<br>9. Nur Aisyah Binti Saiful Bahari<br>10. Arunaavaathi A/P Chandrasegaran<br>11. Adam Mikael Bin Abd Jalil<br>12. Wan Amir Abdelaziz Bin Asseri'
                ],
            ];
        @endphp

        <div class="projects-list" style="max-width: 900px; margin: 0 auto; display: grid; gap: 1.5rem;">
            @foreach($planned_projects as $p)
            <div class="btn-read-more" data-modal="modal-{{ $p['id'] }}" style="background: #ffffff; padding: 2rem 2.5rem; border-radius: 24px; border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between; gap: 1rem; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); height: 130px;">
                <div style="display: flex; align-items: center; gap: 1.5rem; flex: 1; overflow: hidden;">
                    <div style="width: 48px; height: 48px; min-width: 48px; flex-shrink: 0; background: rgba(5, 150, 105, 0.1); color: var(--primary); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.2rem;">
                        {{ $loop->iteration }}
                    </div>
                    <h3 style="font-size: 1.15rem; font-weight: 700; color: var(--text-main); display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; line-height: 1.4; margin: 0;">{{ $p['nama'] }}</h3>
                </div>
                <div style="color: var(--primary); flex-shrink: 0;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg></div>
            </div>
            @endforeach
        </div>
    </section>
@endsection

@section('modals')
    @foreach($planned_projects as $p)
    <div class="modal-overlay" id="modal-{{ $p['id'] }}">
        <div class="modal-content" style="max-width: 800px; padding: 0; overflow-y: auto; max-height: 85vh; border-radius: 32px; background: #ffffff;">
            <div style="background: var(--primary); padding: 3rem; color: white; position: relative;">
                <span class="close-modal" data-modal="modal-{{ $p['id'] }}" style="position: absolute; top: 1.5rem; right: 2rem; color: white; opacity: 0.8; font-size: 2rem; cursor: pointer;">&times;</span>
                <div style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 2px; opacity: 0.8; margin-bottom: 0.5rem;">Project Plan Details</div>
                <h2 style="font-size: 2rem; font-weight: 800; margin: 0; line-height: 1.2;">{{ $p['nama'] }}</h2>
            </div>
            
            <div style="padding: 3rem; background: #ffffff;">
                <div style="margin-bottom: 2.5rem;">
                    <h4 style="color: var(--primary); font-weight: 800; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; margin-bottom: 1rem;">Project Explanation</h4>
                    <p style="color: var(--text-main); line-height: 1.7; font-size: 1.05rem;">{{ $p['detail'] }}</p>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2.5rem;">
                    <div>
                        <h4 style="color: var(--primary); font-weight: 800; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; margin-bottom: 1rem;">Industry Mentor</h4>
                        <p style="color: var(--text-light); font-weight: 600;">{{ $p['mentor_industri'] }}</p>
                    </div>
                    <div>
                        <h4 style="color: var(--primary); font-weight: 800; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; margin-bottom: 1rem;">Academic Mentor</h4>
                        <div style="color: var(--text-light); font-weight: 600; line-height: 1.6;">{!! $p['mentor'] !!}</div>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2.5rem;">
                    <div>
                        <h4 style="color: var(--primary); font-weight: 800; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; margin-bottom: 1rem;">Project Output</h4>
                        <div style="color: var(--text-light); line-height: 1.6;">{!! $p['output'] !!}</div>
                    </div>
                    <div>
                        <h4 style="color: var(--primary); font-weight: 800; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; margin-bottom: 1rem;">Team / Group</h4>
                        <p style="color: var(--text-light); font-size: 0.9rem;">{{ $p['team'] }}</p>
                        <span style="display: inline-block; background: var(--secondary); color: white; padding: 0.2rem 0.8rem; border-radius: 50px; font-size: 0.75rem; margin-top: 0.5rem; font-weight: 700;">{{ $p['total'] }}</span>
                    </div>
                </div>

                <div style="background: #f8fafc; padding: 2rem; border-radius: 20px; border: 1px solid #e2e8f0;">
                    <h4 style="color: var(--text-main); font-weight: 800; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        Student List
                    </h4>
                    <div style="color: var(--text-light); font-size: 0.9rem; line-height: 1.8;">{!! $p['mahasiswa'] !!}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
