{{-- =========================================================
     FOOTER
========================================================= --}}

<footer class="main-footer">

    <div class="footer-container">

        {{-- =====================================================
             MAIN FOOTER
        ====================================================== --}}

        <div class="footer-grid">


            {{-- =================================================
                 LOGO & DESCRIPTION
            ================================================== --}}

            <div class="footer-column">

                <a
                    href="{{ route('home') }}"
                    class="footer-logo"
                >

                    <div class="footer-logo-icon">
                        <i class="fa-solid fa-heart"></i>
                    </div>

                    <span class="footer-company-name">
                        <span>
                            {{ $BBMScompanies->name ?? 'HamroBlood' }}
                        </span>
                    </span>

                </a>


                <p class="footer-description">
                    HamroBlood connects voluntary blood donors with people
                    and hospitals in need. Together, we can save lives and
                    build a stronger, healthier Nepal.
                </p>


                {{-- =================================================
                     SOCIAL MEDIA
                ================================================== --}}

                <div class="footer-social">

                    @if(!empty($BBMScompanies?->facebook))
                        <a
                            href="{{ $BBMScompanies->facebook }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="social-link facebook"
                        >
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    @endif


                    @if(!empty($BBMScompanies?->instagram))
                        <a
                            href="{{ $BBMScompanies->instagram }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="social-link instagram"
                        >
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    @endif


                    @if(!empty($BBMScompanies?->twitter))
                        <a
                            href="{{ $BBMScompanies->twitter }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="social-link twitter"
                        >
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    @endif


                    @if(!empty($BBMScompanies?->youtube))
                        <a
                            href="{{ $BBMScompanies->youtube }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="social-link youtube"
                        >
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    @endif


                    @if(!empty($BBMScompanies?->linkedin))
                        <a
                            href="{{ $BBMScompanies->linkedin }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="social-link linkedin"
                        >
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    @endif

                </div>

            </div>


            {{-- =================================================
                 QUICK LINKS
            ================================================== --}}

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


                    @auth
                        <li>
                            <a href="{{ route('contact') }}">
                                Contact Us
                            </a>
                        </li>
                    @endauth

                </ul>

            </div>


            {{-- =================================================
                 CONTACT INFORMATION
            ================================================== --}}

            <div class="footer-column">

                <h3 class="footer-heading">
                    Contact Info
                </h3>


                <ul class="contact-list">


                    {{-- ADDRESS --}}

                    <li class="contact-item">

                        <span class="contact-icon">
                            <i class="fa-solid fa-map-pin"></i>
                        </span>

                        <span>
                            {{ $BBMScompanies->address ?? 'Address not available' }}
                        </span>

                    </li>


                    {{-- PHONE --}}

                    <li class="contact-item">

                        <span class="contact-icon">
                            <i class="fa-solid fa-phone"></i>
                        </span>

                        <span>
                            {{ $BBMScompanies->phone ?? 'Phone not available' }}
                        </span>

                    </li>


                    {{-- EMAIL --}}

                    <li class="contact-item">

                        <span class="contact-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </span>

                        <span>
                            {{ $BBMScompanies->email ?? 'Email not available' }}
                        </span>

                    </li>


                    {{-- OPERATING HOURS --}}

                    <li class="contact-item">

                        <span class="contact-icon">
                            <i class="fa-solid fa-clock"></i>
                        </span>

                        <span>
                            {{ $BBMScompanies->operating_hours ?? '24/7 Service' }}
                        </span>

                    </li>

                </ul>

            </div>


            {{-- =================================================
                 EMERGENCY HOTLINE
            ================================================== --}}

            <div class="footer-column">

                <h3 class="footer-heading">
                    Emergency Calls
                </h3>


                <div class="emergency-box">

                    {{-- PHONE ICON --}}

                    <div class="emergency-icon">

                        <i class="fa-solid fa-phone"></i>

                    </div>


                    <p class="emergency-number">

                        {{ $BBMScompanies->phone ?? 'Phone not available' }}

                    </p>

                </div>

            </div>

        </div>


        {{-- =====================================================
             BOTTOM FOOTER
        ====================================================== --}}

        <div class="footer-bottom">

            <p>

                © {{ date('Y') }}

                <span class="footer-brand">
                    {{ $BBMScompanies->name ?? 'HamroBlood' }}
                </span>

                . All rights reserved.

            </p>

        </div>

    </div>

</footer>
