<x-layout>

    {{-- Hero Section --}}
    <section class="about-hero">

        <div class="about-container about-hero-content">

            <span class="about-badge">
                {{ $about->sub_title }}
            </span>

            <h1 class="about-hero-title">
                <span>
                    {{ $about->hero_heading }}
                </span>
            </h1>

            <p class="about-hero-description">
                {{ $about->short_description }}
            </p>

        </div>

    </section>


    {{-- About, Mission & Vision --}}
    <section class="about-features-section">

        <div class="about-container">

            <div class="about-features-grid">

                @foreach ($aboutFeatures as $aboutFeature)

                    <div class="about-feature-card">

                        <div class="about-feature-icon">
                            <i class="{{ $aboutFeature->icon }}"></i>
                        </div>

                        <h2 class="about-feature-title">
                            {{ $aboutFeature->title }}
                        </h2>

                        <p class="about-feature-description">
                            {!! $aboutFeature->description !!}
                        </p>

                    </div>

                @endforeach

            </div>

        </div>

    </section>


    {{-- What We Provide --}}
    <section class="provide-section">

        <div class="about-container">

            <div class="provide-header">

                <h2 class="provide-title">
                    What Our System Provides
                </h2>

                <p class="provide-description">
                    Simple technology that makes blood donation easier,
                    faster, and more organized.
                </p>

            </div>


            <div class="provide-grid">

                @foreach ($SmallFeatursOfBloodBank as $SmallFeatursOfBloodBank)

                    <div class="provide-card">

                        <div class="provide-icon">
                            <i class="{{ $SmallFeatursOfBloodBank->small_icon }}"></i>
                        </div>

                        <h3 class="provide-card-title">
                            {{ $SmallFeatursOfBloodBank->small_title }}
                        </h3>

                        <p class="provide-card-description">
                            {{ $SmallFeatursOfBloodBank->small_description }}
                        </p>

                    </div>

                @endforeach

            </div>

        </div>

    </section>


    {{-- CTA --}}
    <section class="about-cta">

        <div class="about-cta-container">

            <h2 class="about-cta-title">
                Be a Hero. Donate Blood. Save Lives.
            </h2>

            <p class="about-cta-description">
                Your one donation can help save multiple lives.
            </p>


            @auth

                {{-- Login भएको user --}}
                <a
                    href="{{ route('doner_register') }}"
                    class="about-cta-button"
                >
                    Become a Donor
                </a>

            @else

                {{-- Login नभएको user --}}
                <a
                    href="{{ route('login') }}"
                    class="about-cta-button"
                >
                    Login to Become a Donor
                </a>

            @endauth

        </div>

    </section>

</x-layout>
