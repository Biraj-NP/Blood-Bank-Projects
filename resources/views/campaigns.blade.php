<x-layout>

    {{-- Hero Section --}}
    <section class="campaigns-hero">

        <div class="campaigns-hero-content">

            <h1>Blood Donation Campaigns</h1>

            <p>
                Join hands with us to save lives. Participate in upcoming blood donation campaigns near you.
            </p>

            <a href="#campaigns" class="campaigns-hero-btn">
                View Campaigns
            </a>

        </div>

    </section>


    {{-- Stats --}}
    <section class="campaign-stats">

        <div class="campaign-stats-grid">

            {{-- Active Campaigns --}}
            <div class="campaign-stat-card">

                <div class="campaign-stat-icon">
                    <i class="fa-solid fa-house-chimney-medical"></i>
                </div>

                <div class="campaign-stat-number">
                    {{ $activeCampaigns }}
                </div>

                <div class="campaign-stat-label">
                    Active Campaigns
                </div>

            </div>


            {{-- Donors --}}
            <div class="campaign-stat-card">

                <div class="campaign-stat-icon">
                    <i class="fa-solid fa-heart text-xl"></i>
                </div>

                <div class="campaign-stat-number">
                    {{ $donors }}
                </div>

                <div class="campaign-stat-label">
                    Donors
                </div>

            </div>


            {{-- Blood Requests --}}
            <div class="campaign-stat-card">

                <div class="campaign-stat-icon">
                    <i class="fa-solid fa-file-medical text-xl"></i>
                </div>

                <div class="campaign-stat-number">
                    {{ $bloodRequests }}
                </div>

                <div class="campaign-stat-label">
                    Blood Requests
                </div>

            </div>


            {{-- Contacts --}}
            <div class="campaign-stat-card">

                <div class="campaign-stat-icon">
                    <i class="fa-solid fa-envelope text-xl"></i>
                </div>

                <div class="campaign-stat-number">
                    {{ $contacts }}
                </div>

                <div class="campaign-stat-label">
                    Contacts
                </div>

            </div>

        </div>

    </section>


    {{-- Campaigns Section --}}
    <section id="campaigns" class="campaigns-section">

        <div class="campaigns-container">

            {{-- Section Header --}}
            <div class="campaigns-heading">

                <h2>
                    Upcoming & Ongoing Campaigns
                </h2>

                <p>
                    Find a campaign near you and register to donate
                </p>

            </div>


            {{-- Campaign Cards Grid --}}
            <div class="campaigns-grid">

                @forelse ($Bloodcampaigns as $Bloodcampaign)

                <div class="campaign-card">

                    {{-- Campaign Image --}}
                    <div class="campaign-image-wrapper">

                        <img
                            src="{{ Storage::url($Bloodcampaign->image) }}"
                            alt="Blood Donation Event"
                            class="campaign-image">

                        <div class="campaign-duration">
                            {{ $Bloodcampaign->duration }}
                        </div>

                    </div>


                    {{-- Content --}}
                    <div class="campaign-content">

                        {{-- Date --}}
                        <div class="campaign-date">

                            <i class="fa-solid fa-calendar-days"></i>

                            <span>
                                 {{ $Bloodcampaign->duration_time }}
                            </span>

                        </div>

                        <div class="campaign-id">
                            Campaign ID: {{ $Bloodcampaign->id }}
                        </div>


                        {{-- Title --}}
                        <h3 class="campaign-title">
                            {{ $Bloodcampaign->title }}
                        </h3>


                        {{-- Description --}}
                        <p class="campaign-description">
                            {!! $Bloodcampaign->description !!}
                        </p>


                        {{-- Time --}}
                        <div class="campaign-time">

                            <i class="fa-solid fa-clock"></i>

                            <span>
                                {{ $Bloodcampaign->day_time }}
                            </span>

                        </div>


                        {{-- Phone Number --}}
                        <div class="campaign-phone">

                            <i class="fa-solid fa-phone"></i>

                            <span>
                                +977 9801234567
                            </span>

                        </div>


                        {{-- Location --}}
                        <div class="campaign-location">

                            <i class="fa-solid fa-location-dot"></i>

                            <div class="campaign-location-info">

                                <p>
                                    City Hall
                                </p>

                                <p>
                                    Kathmandu, Nepal
                                </p>

                            </div>

                        </div>


                        {{-- Register Button --}}
                        @auth

                        {{-- User already logged in --}}
                        <a
                            href="{{ route('blood_request') }}"
                            class="campaign-register-btn">
                            Register Now
                        </a>

                        @else

                        {{-- User not logged in --}}
                        <a
                            href="{{ route('login') }}"
                            class="campaign-register-btn">
                            Register Now
                        </a>

                        @endauth

                    </div>

                </div>

                @empty

                <div class="campaign-no-data">

                    <i class="fa-solid fa-calendar-xmark"></i>

                    <h3>
                        No Campaigns Available
                    </h3>

                    <p>
                        There are currently no upcoming blood donation campaigns.
                    </p>

                </div>

                @endforelse

            </div>

        </div>

    </section>


    {{-- Call To Action --}}
    <section class="campaign-cta">

        <div class="campaign-cta-content">

            <h2>
                Want to Organize a Campaign?
            </h2>

            <p>
                Partner with HamroBlood to organize a blood donation camp
                in your community, college, or workplace.
            </p>


            {{-- Contact Button --}}
            @auth

            {{-- Logged-in user --}}
            <a
                href="{{ route('contact') }}"
                class="campaign-cta-btn">
                Contact Us to Organize
            </a>

            @else

            {{-- Guest user --}}
            <a
                href="{{ route('login') }}"
                class="campaign-cta-btn">
                Login to Contact Us
            </a>

            @endauth

        </div>

    </section>

</x-layout>
