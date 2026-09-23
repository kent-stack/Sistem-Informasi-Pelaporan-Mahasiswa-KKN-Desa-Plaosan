@extends('layouts.app')

@section('title', 'Submit Project Result - International Internship')

@section('content')
    <section class="upload-section" id="report" style="padding: 10rem 5%; background: #f8fafc; min-height: 100vh;">
        <div class="form-container" style="max-width: 800px; margin: 0 auto; background: #ffffff; padding: 4rem; border-radius: 32px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05); border: 1px solid #e2e8f0;">
            <div class="section-header" style="text-align: center; margin-bottom: 3rem;">
                <div class="hero-tag" style="margin-bottom: 1rem; color: var(--primary); border-color: rgba(5, 150, 105, 0.2); background: rgba(5, 150, 105, 0.05);">Submit Project Result</div>
                <h2 style="font-size: 2.5rem; font-weight: 800; color: var(--text-main);">Project <span>Submission Form</span></h2>
                <p style="color: var(--text-light); margin-top: 1rem;">Share the results and documentation of your community service projects.</p>
            </div>
            
            @if(session('success'))
                <div class="alert-success" style="background: #ecfdf5; color: #065f46; padding: 1.2rem; border-radius: 16px; margin-bottom: 2rem; display: flex; align-items: center; gap: 0.8rem; border: 1px solid #10b981;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <span style="font-weight: 700;">{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="alert-danger" style="background: #fef2f2; color: #991b1b; padding: 1.2rem; border-radius: 16px; margin-bottom: 2rem; border: 1px solid #ef4444;">
                    <ul style="padding-left: 1.5rem; margin: 0;">
                        @foreach($errors->all() as $error)
                            <li style="font-weight: 600;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" class="premium-form">
                @csrf
                
                <div class="form-group" style="margin-bottom: 3rem;">
                    <label style="display: block; font-weight: 800; color: var(--text-main); margin-bottom: 1.2rem; font-size: 1.1rem; text-align: center;">Choose Report Type</label>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                        <!-- Daily Report Option -->
                        <label style="cursor: pointer; position: relative;">
                            <input type="radio" name="report_type" value="Daily Report" style="position: absolute; opacity: 0; width: 0; height: 0;" {{ old('report_type', 'Daily Report') == 'Daily Report' ? 'checked' : '' }}>
                            <div class="type-card" style="padding: 2rem; border-radius: 24px; border: 2px solid #e2e8f0; background: #ffffff; text-align: center; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); height: 100%;">
                                <div class="icon-wrapper" style="width: 48px; height: 48px; background: #ecfdf5; color: #10b981; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap round stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                </div>
                                <h4 style="font-weight: 800; color: var(--text-main); margin-bottom: 0.5rem;">Daily Report</h4>
                                <p style="font-size: 0.85rem; color: var(--text-light); line-height: 1.4;">Document your daily tasks and quick progress.</p>
                            </div>
                        </label>
                        
                        <!-- Weekly Report Option -->
                        <label style="cursor: pointer; position: relative;">
                            <input type="radio" name="report_type" value="Weekly Report" style="position: absolute; opacity: 0; width: 0; height: 0;" {{ old('report_type') == 'Weekly Report' ? 'checked' : '' }}>
                            <div class="type-card" style="padding: 2rem; border-radius: 24px; border: 2px solid #e2e8f0; background: #ffffff; text-align: center; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); height: 100%;">
                                <div class="icon-wrapper" style="width: 48px; height: 48px; background: #eff6ff; color: #3b82f6; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap round stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                </div>
                                <h4 style="font-weight: 800; color: var(--text-main); margin-bottom: 0.5rem;">Weekly Report</h4>
                                <p style="font-size: 0.85rem; color: var(--text-light); line-height: 1.4;">Summarize your weekly achievements and impact.</p>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 2rem;">
                    <label for="nama_project" style="display: block; font-weight: 800; color: var(--text-main); margin-bottom: 0.8rem; font-size: 1rem;">Project Title</label>
                    <input type="text" id="nama_project" name="nama_project" style="width: 100%; padding: 1.2rem; border-radius: 16px; border: 1px solid #e2e8f0; background: #f8fafc; font-size: 1rem; transition: all 0.3s ease;" placeholder="e.g., Implementing Digital Branding for Local UMKM" required value="{{ old('nama_project') }}">
                </div>

                <div class="form-group" style="margin-bottom: 2rem;">
                    <label for="penjelasan_project" style="display: block; font-weight: 800; color: var(--text-main); margin-bottom: 0.8rem; font-size: 1rem;">Project Description & Results</label>
                    <textarea id="penjelasan_project" name="penjelasan_project" rows="6" style="width: 100%; padding: 1.2rem; border-radius: 16px; border: 1px solid #e2e8f0; background: #f8fafc; font-size: 1rem; line-height: 1.6; resize: vertical;" placeholder="Tell us about the implementation, challenges, and the final results of your project..." required>{{ old('penjelasan_project') }}</textarea>
                </div>
                
                <div class="form-group" style="margin-bottom: 3rem;">
                    <label style="display: block; font-weight: 800; color: var(--text-main); margin-bottom: 0.8rem; font-size: 1rem;">Photo Documentation (Maximum 10 Photos)</label>
                    <div class="photo-box" style="position: relative; border: 2px dashed var(--primary); border-radius: 20px; padding: 3rem 2rem; background: rgba(5, 150, 105, 0.02); text-align: center; transition: all 0.3s ease;">
                        <input type="file" id="photos" name="photos[]" multiple style="position: absolute; inset: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;" accept="image/*" required onchange="updateFileList(this)">
                        <div id="upload-placeholder">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 1rem;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                            <p style="font-weight: 700; color: var(--text-main); margin-bottom: 0.5rem;">Click or drag photos here</p>
                            <p style="font-size: 0.85rem; color: var(--text-light);">Formats: JPG, PNG, WEBP (Max 5MB per photo)</p>
                        </div>
                        <div id="file-list" style="margin-top: 1rem; font-weight: 700; color: var(--primary); display: none;"></div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary submit-btn" style="width: auto !important; padding: 1rem 3rem !important; font-size: 1rem !important; margin-left: auto; display: block; border-radius: 16px; box-shadow: 0 10px 20px -5px rgba(5, 150, 105, 0.3);">
                    Submit
                </button>
            </form>
        </div>
    </section>

    <style>
        input[type="radio"]:checked + .type-card {
            border-color: var(--primary) !important;
            background: rgba(5, 150, 105, 0.02) !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }
        input[type="radio"]:checked + .type-card h4 {
            color: var(--primary) !important;
        }
        .type-card:hover {
            border-color: #cbd5e1 !important;
            transform: translateY(-2px);
        }
        @media (max-width: 768px) {
            .upload-section { padding: 6rem 5% 3rem !important; }
            .form-container { padding: 2rem 1.5rem !important; border-radius: 20px !important; }
            
            .type-card { padding: 1.2rem !important; display: flex; flex-direction: column; align-items: center; justify-content: center; }
            .type-card p { display: none; }
            .type-card h4 { font-size: 0.95rem; margin-bottom: 0 !important; }
            .type-card .icon-wrapper { margin-bottom: 0.6rem !important; width: 40px !important; height: 40px !important; }
            
            .photo-box { padding: 1.5rem !important; }
            
            .submit-btn { width: auto !important; margin-left: auto; display: block; padding: 1rem 2rem !important; font-size: 1rem !important; }
        }
    </style>

    <script>
        function updateFileList(input) {
            const fileList = document.getElementById('file-list');
            const placeholder = document.getElementById('upload-placeholder');
            if (input.files.length > 0) {
                fileList.style.display = 'block';
                fileList.innerText = input.files.length + ' photos selected';
                placeholder.style.opacity = '0.5';
            } else {
                fileList.style.display = 'none';
                placeholder.style.opacity = '1';
            }
        }
    </script>
@endsection
