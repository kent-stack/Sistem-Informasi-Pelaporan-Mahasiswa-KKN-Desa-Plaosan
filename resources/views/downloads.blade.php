@extends('layouts.app')

@section('title', 'Downloads - Resources & Documents')

@section('content')
    <section style="padding: 10rem 5%; text-align: center; min-height: 100vh; background: #f8fafc;">
        <div class="section-header" style="margin-bottom: 4rem;">
            <h2 style="font-size: 3rem; font-weight: 800; color: var(--text-main);">Downloads</h2>
            <p style="color: var(--text-light); max-width: 700px; margin: 0 auto;">Please download the necessary administrative documents and report templates below.</p>
            <div style="width: 80px; height: 4px; background: var(--primary); margin: 1.5rem auto; border-radius: 2px;"></div>
        </div>
        
        <div style="max-width: 950px; margin: 0 auto; display: grid; gap: 3rem;">
            
            <!-- Group 0: Final Report -->
            <div class="download-group">
                <div style="text-align: left; margin-bottom: 1.5rem;">
                    <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--secondary); margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.8rem;">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><path d="M16 13H8"></path><path d="M16 17H8"></path><path d="M10 9H9H8"></path></svg>
                        Final Report
                    </h3>
                    <p style="color: var(--text-light); font-size: 0.95rem;">Template and guidelines for your final community service report.</p>
                </div>

                <div style="background: white; padding: 1.5rem 2rem; border-radius: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.02); border: 2px solid rgba(217, 119, 6, 0.2); display: flex; align-items: center; justify-content: space-between; gap: 1.5rem; transition: all 0.3s ease;">
                    <div style="text-align: left;">
                        <h4 style="margin-bottom: 0; color: var(--text-main); font-weight: 700; font-size: 1rem;">International KKN Final Report Template</h4>
                    </div>
                    <div style="display: flex; gap: 0.8rem;">
                        <a href="{{ asset('documents/LAPORAN/Template Laporan Akhir.docx') }}" download class="btn" style="padding: 0.6rem 1.2rem; font-size: 0.85rem; border: 2px solid #e2e8f0; color: var(--text-main); background: #f8fafc; border-radius: 10px; font-weight: 700; display: flex; align-items: center; gap: 6px;">
                            <img src="https://flagcdn.com/w20/id.png" width="16" alt="ID"> ID
                        </a>
                        <a href="{{ asset('documents/LAPORAN/Final Report Template.docx') }}" download class="btn" style="padding: 0.6rem 1.2rem; font-size: 0.85rem; border: 2px solid #e2e8f0; color: var(--text-main); background: #f8fafc; border-radius: 10px; font-weight: 700; display: flex; align-items: center; gap: 6px;">
                            <img src="https://flagcdn.com/w20/gb.png" width="16" alt="EN"> EN
                        </a>
                    </div>
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid #e2e8f0;">

            <!-- Group 1: Administration -->
            <div class="download-group">
                <div style="text-align: left; margin-bottom: 1.5rem;">
                    <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--primary); margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.8rem;">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                        Administrative Documents
                    </h3>
                    <p style="color: var(--text-light); font-size: 0.95rem;">Mandatory documents with bilingual options (Bahasa Indonesia & English).</p>
                </div>

                @php
                    $docs = [
                        [
                            'id' => '01', 
                            'title' => 'Integrity Pact',
                            'folder' => '01 - PAKTA',
                            'file_id' => 'PAKTA INTEGRITAS.docx',
                            'file_en' => 'INTEGRITY PACT.docx'
                        ],
                        [
                            'id' => '02', 
                            'title' => 'Statement of Compliance (NKRI)',
                            'folder' => '02 - PERTNYATAAN NKRI',
                            'file_id' => 'SURAT PERNYATAAN NKRI.docx',
                            'file_en' => 'STATEMENT OF COMPLIANCE (NKRI).docx'
                        ],
                        [
                            'id' => '03', 
                            'title' => 'Personal Responsibility Statement',
                            'folder' => '03 - TANGGUNG JAWAB',
                            'file_id' => 'SURAT PERNYATAAN TANGGUNG JAWAB PRIBADI.docx',
                            'file_en' => 'PERSONAL RESPONSIBILITY STATEMENT.docx'
                        ],
                        [
                            'id' => '04', 
                            'title' => 'Parent Consent Letter',
                            'folder' => '04 - SURAT IZIN ORTU',
                            'file_id' => 'SURAT IZIN ORANG TUA.docx',
                            'file_en' => 'PARENT CONSENT LETTER.docx'
                        ],
                        [
                            'id' => '05', 
                            'title' => 'Health Declaration Statement',
                            'folder' => '05 - KESEHATAN',
                            'file_id' => 'SURAT PERNYATAAN KESEHATAN.docx',
                            'file_en' => 'HEALTH DECLARATION STATEMENT.docx'
                        ],
                        [
                            'id' => '06', 
                            'title' => 'Personal Data & Emergency Contact Form',
                            'folder' => '06 - DATA PRIBADI',
                            'file_id' => 'FORMULIR DATA PRIBADI DAN KONTAK DARURAT.docx',
                            'file_en' => 'PERSONAL DATA AND EMERGENCY CONTACT.docx'
                        ],
                    ];
                @endphp

                <div style="display: grid; gap: 1rem;">
                    @foreach($docs as $doc)
                    <div style="background: white; padding: 1.5rem 2rem; border-radius: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.02); border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between; gap: 1.5rem; transition: all 0.3s ease;">
                        <div style="text-align: left;">
                            <h4 style="margin-bottom: 0; color: var(--text-main); font-weight: 700; font-size: 1rem;">{{ $doc['id'] }} - {{ $doc['title'] }}</h4>
                        </div>
                        
                        <div style="display: flex; gap: 0.8rem;">
                            <!-- Bahasa Indonesia Option -->
                            <a href="{{ asset('documents/' . $doc['folder'] . '/' . $doc['file_id']) }}" download class="btn" style="padding: 0.6rem 1.2rem; font-size: 0.85rem; border: 2px solid #e2e8f0; color: var(--text-main); background: #f8fafc; border-radius: 10px; font-weight: 700; display: flex; align-items: center; gap: 6px;">
                                <img src="https://flagcdn.com/w20/id.png" width="16" alt="ID"> ID
                            </a>
                            <!-- English Option -->
                            <a href="{{ asset('documents/' . $doc['folder'] . '/' . $doc['file_en']) }}" download class="btn" style="padding: 0.6rem 1.2rem; font-size: 0.85rem; border: 2px solid #e2e8f0; color: var(--text-main); background: #f8fafc; border-radius: 10px; font-weight: 700; display: flex; align-items: center; gap: 6px;">
                                <img src="https://flagcdn.com/w20/gb.png" width="16" alt="EN"> EN
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    <style>
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-color: var(--primary) !important;
            color: var(--primary) !important;
        }
        .download-group {
            animation: fadeIn 0.8s ease forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
@endsection
