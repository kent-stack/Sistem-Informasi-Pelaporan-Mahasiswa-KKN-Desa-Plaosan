@extends('layouts.app')

@section('title', 'Contact Us - Get in Touch')

@section('content')
    <section class="contact-page">
        <div class="container">
            <div class="section-header">
                <div class="hero-tag" style="margin-bottom: 1rem; color: var(--primary); border-color: rgba(5, 150, 105, 0.2); background: rgba(5, 150, 105, 0.05);">Contact Us</div>
                <h2>Get in <span>Touch</span></h2>
                <p>Have questions about the program or want to collaborate? We'd love to hear from you.</p>
            </div>

            <div class="contact-grid">
                <!-- Contact Info -->
                <div class="contact-info">
                    <div class="info-card">
                        <div class="info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div class="info-text">
                            <h3>Email Us</h3>
                            <p>kui@asia.ac.id</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div class="info-text">
                            <h3>Visit Us</h3>
                            <p>Jl. Soekarno Hatta, Rembuksari No. 1 A, Mojolangu</p>
                            <p>Lowokwaru, Malang, East Java 65113</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div class="info-text">
                            <h3>Call Us</h3>
                            <p>+62 812-3232-1185 (Lyla)</p>
                            <p>+62 857-3034-9141 (Nurul)</p>
                        </div>
                    </div>

                </div>

                <!-- Contact Form -->
                <div class="contact-form-container">
                    <form class="premium-form" action="mailto:kui@asia.ac.id" method="GET">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" name="name" placeholder="Enter your full name" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="email@example.com" required>
                        </div>

                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="body" rows="6" placeholder="How can we help you?" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-send-message">
                            <span>Send Message</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Map Section -->
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31613.593649526738!2d112.49841804999998!3d-8.0883884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62b083b0f555d%3A0x5027576e36d07d0!2sPlaosan%2C%20Wonosari%2C%20Malang%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1715937740000!5m2!1sen!2sid" 
                    width="100%" height="450" style="border:0; border-radius: 24px;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </section>
@endsection
