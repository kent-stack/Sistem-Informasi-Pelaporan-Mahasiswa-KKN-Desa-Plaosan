@extends('layouts.app')

@section('title', 'Login - Student Access Portal')

@section('content')
    <section class="login-section" style="padding: 10rem 5%; background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
        <!-- Decorative Elements -->
        <div style="position: absolute; top: -10%; left: -10%; width: 40%; height: 40%; background: rgba(5, 150, 105, 0.05); border-radius: 50%; filter: blur(100px);"></div>
        <div style="position: absolute; bottom: -10%; right: -10%; width: 40%; height: 40%; background: rgba(217, 119, 6, 0.05); border-radius: 50%; filter: blur(100px);"></div>

        <div class="login-card" style="width: 100%; max-width: 480px; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(20px); padding: 4rem; border-radius: 32px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1); border: 1px solid rgba(255, 255, 255, 0.8); position: relative; z-index: 1;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <div style="width: 80px; height: 80px; background: white; color: var(--primary); border-radius: 24px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; box-shadow: 0 10px 20px rgba(5, 150, 105, 0.1); border: 1px solid #f1f5f9;">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                </div>
                <h2 style="font-size: 2.2rem; font-weight: 800; color: var(--text-main); margin-bottom: 0.5rem; letter-spacing: -0.5px;">Student Portal</h2>
                <p style="color: var(--text-light); font-size: 1rem;">Sign in to access your KKN resources.</p>
            </div>

            @if($errors->any())
                <div style="background: #fff1f2; color: #e11d48; padding: 1.2rem; border-radius: 16px; margin-bottom: 2rem; font-size: 0.9rem; border: 1px solid #fda4af; display: flex; align-items: center; gap: 0.8rem;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" id="loginForm">
                @csrf
                <div class="form-group" style="margin-bottom: 1.8rem;">
                    <label for="nim" style="display: block; font-weight: 700; color: var(--text-main); margin-bottom: 0.8rem; font-size: 0.95rem;">Student ID (NIM)</label>
                    <input type="text" id="nim" name="nim" autocomplete="username" style="width: 100%; padding: 1.2rem; border-radius: 16px; border: 1px solid #e2e8f0; background: #f8fafc; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); font-size: 1rem;" placeholder="Username" required value="{{ old('nim') }}">
                </div>

                <div class="form-group" style="margin-bottom: 2rem; position: relative;">
                    <label for="password" style="display: block; font-weight: 700; color: var(--text-main); margin-bottom: 0.8rem; font-size: 0.95rem;">Password</label>
                    <div style="position: relative;">
                        <input type="password" id="password" name="password" autocomplete="current-password" style="width: 100%; padding: 1.2rem 3.5rem 1.2rem 1.2rem; border-radius: 16px; border: 1px solid #e2e8f0; background: #f8fafc; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); font-size: 1rem;" placeholder="Password" required>
                        <button type="button" id="togglePassword" style="position: absolute; right: 1.2rem; top: 50%; transform: translateY(-50%); background: none; border: none; color: #94a3b8; cursor: pointer; padding: 0; display: flex; align-items: center; transition: color 0.3s;">
                            <svg id="eyeIcon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </button>
                    </div>
                </div>

                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2.5rem;">
                    <label style="display: flex; align-items: center; gap: 0.8rem; font-size: 0.95rem; color: var(--text-light); cursor: pointer; user-select: none;">
                        <input type="checkbox" id="rememberMe" name="remember" style="width: 18px; height: 18px; accent-color: var(--primary); cursor: pointer;"> Remember me
                    </label>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 1.2rem; border-radius: 18px; font-size: 1.1rem; font-weight: 700; box-shadow: 0 10px 25px rgba(5, 150, 105, 0.2);">
                    Sign In to Portal
                </button>
            </form>
            
            <div style="text-align: center; margin-top: 3rem; border-top: 1px solid #f1f5f9; padding-top: 2rem;">
                <p style="font-size: 0.9rem; color: var(--text-light); line-height: 1.5;">Authorized access only for Plaosan Village KKN Students.</p>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            const eyeIcon = document.querySelector('#eyeIcon');
            const nimInput = document.querySelector('#nim');
            const rememberMeCheckbox = document.querySelector('#rememberMe');
            const loginForm = document.querySelector('#loginForm');

            // Load saved NIM and Password
            const savedNim = localStorage.getItem('remembered_nim');
            const savedPass = localStorage.getItem('remembered_pass');
            
            if (savedNim && savedPass) {
                nimInput.value = savedNim;
                password.value = savedPass;
                rememberMeCheckbox.checked = true;
            } else if (savedNim) {
                nimInput.value = savedNim;
                rememberMeCheckbox.checked = true;
            }

            // Save credentials on form submit
            loginForm.addEventListener('submit', function() {
                if (rememberMeCheckbox.checked) {
                    localStorage.setItem('remembered_nim', nimInput.value);
                    localStorage.setItem('remembered_pass', password.value);
                } else {
                    localStorage.removeItem('remembered_nim');
                    localStorage.removeItem('remembered_pass');
                }
            });

            togglePassword.addEventListener('click', function() {
                // Toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                
                // Toggle the eye icon
                if (type === 'text') {
                    eyeIcon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>';
                    togglePassword.style.color = 'var(--primary)';
                } else {
                    eyeIcon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
                    togglePassword.style.color = '#94a3b8';
                }
            });
        });
    </script>
@endsection
