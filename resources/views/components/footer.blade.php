{{-- Footer --}}
<footer class="main-footer">

    <div class="footer-container">

        {{-- Main Footer --}}
        <div class="footer-grid">

            {{-- Logo & Description --}}
            <div class="footer-column">

                <a href="{{ route('home') }}" class="footer-logo">

                    <div class="footer-logo-icon">
                        <i class="fa-solid fa-heart"></i>
                    </div>

                    <span class="footer-company-name">
                        <span>{{ $BBMScompanies->name }}</span>
                    </span>

                </a>


                <p class="footer-description">
                    HamroBlood connects voluntary blood donors with people
                    and hospitals in need. Together, we can save lives and
                    build a stronger, healthier Nepal.
                </p>


                {{-- Social Media --}}
                <div class="footer-social">

                    <a href="{{ $BBMScompanies->facebook }}"
                       target="_blank"
                       class="social-link facebook">
                        <i class="fa-brands fa-facebook"></i>
                    </a>

                    <a href="{{ $BBMScompanies->instagram }}"
                       target="_blank"
                       class="social-link instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="{{ $BBMScompanies->twitter }}"
                       target="_blank"
                       class="social-link twitter">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>

                    <a href="{{ $BBMScompanies->youtube }}"
                       target="_blank"
                       class="social-link youtube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>

                    <a href="{{ $BBMScompanies->linkedin }}"
                       target="_blank"
                       class="social-link linkedin">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>

                </div>

            </div>


            {{-- Quick Links --}}
            <div class="footer-column">

                <h3 class="footer-heading">
                    Quick Links
                </h3>

                <ul class="footer-links">

                    <li>
                        <a href="{{ route('home') }}">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('about') }}">
                            About Us
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('campaigns') }}">
                            Blood Campaigns
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('hospitals') }}">
                            Hospitals
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('search') }}">
                            Search Blood
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contact') }}">
                            Contact Us
                        </a>
                    </li>

                </ul>

            </div>


            {{-- Contact Information --}}
            <div class="footer-column">

                <h3 class="footer-heading">
                    Contact Info
                </h3>

                <ul class="contact-list">

                    <li class="contact-item">

                        <span class="contact-icon">
                            <i class="fa-solid fa-map-pin"></i>
                        </span>

                        <span>
                            {{ $BBMScompanies->address }}
                        </span>

                    </li>


                    <li class="contact-item">

                        <span class="contact-icon">
                            <i class="fa-solid fa-phone"></i>
                        </span>

                        <span>
                            {{ $BBMScompanies->phone }}
                        </span>

                    </li>


                    <li class="contact-item">

                        <span class="contact-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </span>

                        <span>
                            {{ $BBMScompanies->email }}
                        </span>

                    </li>


                    <li class="contact-item">

                        <span class="contact-icon">
                            <i class="fa-solid fa-clock"></i>
                        </span>

                        <span>
                            {{ $BBMScompanies->operating_hours }}
                        </span>

                    </li>

                </ul>

            </div>


            {{-- Emergency Hotline --}}
            <div class="footer-column">

                <h3 class="footer-heading">
                    Emergency Calls
                </h3>

                <div class="emergency-box">

                    {{-- Phone Icon --}}
                    <div class="emergency-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>

                    <p class="emergency-number">
                        {{ $BBMScompanies->phone }}
                    </p>

                </div>

            </div>

        </div>


        {{-- Bottom Footer --}}
        <div class="footer-bottom">

            <p>
                © {{ date('Y') }}

                <span class="footer-brand">
                    HamroBlood
                </span>

                . All rights reserved.
            </p>

        </div>

    </div>

</footer>
