<x-layout>
    @if(session('success')) <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error')) <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif


    {{-- Hero Section --}}
    <section class="home-hero">

        {{-- Background Decorations --}}
        <div class="hero-decoration hero-decoration-top"></div>
        <div class="hero-decoration hero-decoration-bottom"></div>

        <div class="hero-container">

            <div class="hero-grid">

                {{-- Hero Content --}}
                <div class="hero-content">

                    {{-- Badge --}}
                    <span class="hero-badge">
                        ❤️ Together, We Save Lives
                    </span>


                    {{-- Heading --}}
                    <h1 class="hero-title">
                        Every Drop of Blood
                        <span>
                            Saves a Life
                        </span>
                    </h1>


                    {{-- Description --}}
                    <p class="hero-description">
                        Our Blood Bank Management System connects blood donors,
                        hospitals, and patients to make blood donation easier,
                        faster, and more accessible for everyone.
                    </p>


                    {{-- Buttons --}}
                    <div class="hero-buttons">

                        <a
                            href="{{ route('campaigns') }}"
                            class="hero-btn hero-btn-primary">
                            Join a Campaign
                            <span>→</span>
                        </a>

                        <a
                            href="{{ route('search') }}"
                            class="hero-btn hero-btn-secondary">
                            Search Blood
                        </a>

                    </div>


                    {{-- Small Trust Text --}}
                    <div class="hero-trust">

                        <div class="trust-item">
                            <span>✓</span>
                            Verified Donors
                        </div>

                        <div class="trust-item">
                            <span>✓</span>
                            Trusted Hospitals
                        </div>

                        <div class="trust-item">
                            <span>✓</span>
                            Save Lives
                        </div>

                    </div>

                </div>


                {{-- Hero Blood Card --}}
                <div class="hero-card-wrapper">

                    <div class="blood-card">

                        {{-- Decorative Circle --}}
                        <div class="blood-card-decoration">
                            <span>❤️</span>
                        </div>


                        {{-- Blood Icon --}}
                        <div class="blood-icon-wrapper">
                            <div class="blood-icon">
                                🩸
                            </div>
                        </div>


                        {{-- Card Title --}}
                        <h2 class="blood-card-title">
                            Donate Blood
                        </h2>


                        {{-- Card Description --}}
                        <p class="blood-card-description">
                            Your one donation can help save up to
                            <span>
                                three lives.
                            </span>
                        </p>


                        {{-- Bottom Highlight --}}
                        <div class="blood-card-bottom">

                            <div class="donation-highlight">
                                <span>🩸</span>
                                Every Donation Matters
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
     BLOOD DONATION ELIGIBILITY SECTION
========================================================= --}}

    <section class="donation-eligibility-section">

        {{-- Background Decorations --}}
        <div class="eligibility-decoration eligibility-decoration-top"></div>
        <div class="eligibility-decoration eligibility-decoration-bottom"></div>


        <div class="donation-eligibility-container">

            {{-- Section Header --}}
            <div class="eligibility-header">

                <span class="eligibility-badge">
                    🩸 Blood Donation
                </span>

                <h2>
                    Check if you're eligible to donate blood
                </h2>

                <p>
                    Enter the date of your last blood donation to check
                    whether you have completed the required 6-month
                    waiting period.
                </p>

            </div>


            {{-- Eligibility Main Card --}}
            <div class="donation-eligibility-box">

                {{-- Card Icon --}}
                <div class="eligibility-main-icon">
                    🩸
                </div>


                <h3>
                    Donation Eligibility Check
                </h3>

                <p class="eligibility-card-description">
                    Please provide your last blood donation date.
                    If you have not donated blood before, you can
                    directly proceed to donation registration.
                </p>


                {{-- Date Input --}}
                <div class="eligibility-form-group">

                    <label for="lastDonation">

                        Last Donation Date

                        <span>*</span>

                    </label>

                    <input
                        type="date"
                        id="lastDonation"
                        class="eligibility-date-input"
                        max="{{ date('Y-m-d') }}">

                    <small>
                        The date must not be in the future.
                    </small>

                </div>


                {{-- Check Button --}}
                <button
                    type="button"
                    onclick="checkDonationEligibility()"
                    class="eligibility-check-btn">

                    <span>
                        Check Eligibility
                    </span>

                    <span class="eligibility-arrow">
                        →
                    </span>

                </button>


                {{-- Result --}}
                <div
                    id="donationResult"
                    class="donation-result">
                </div>

            </div>


            {{-- Information Cards --}}
            <div class="donation-eligibility-info">


                {{-- Card 1 --}}
                <div class="donation-info-item">

                    <div class="donation-info-item-icon">
                        🩸
                    </div>

                    <h3>
                        6 Month Waiting Period
                    </h3>

                    <p>
                        The system checks whether 6 months have
                        passed since your previous donation.
                    </p>

                </div>


                {{-- Card 2 --}}
                <div class="donation-info-item">

                    <div class="donation-info-item-icon">
                        ✓
                    </div>

                    <h3>
                        Quick Eligibility Check
                    </h3>

                    <p>
                        Get an instant result based on your
                        last donation date.
                    </p>

                </div>


                {{-- Card 3 --}}
                <div class="donation-info-item">

                    <div class="donation-info-item-icon">
                        ❤️
                    </div>

                    <h3>
                        Every Donation Matters
                    </h3>

                    <p>
                        Your eligible blood donation can help
                        save lives in your community.
                    </p>

                </div>

            </div>


            {{-- Important Notice --}}
            <div class="eligibility-notice">

                <div class="eligibility-notice-icon">
                    <i class="fa-solid fa-circle-info"></i>
                </div>

                <div>

                    <strong>
                        Important Notice
                    </strong>

                    <p>
                        This online check is only a preliminary
                        eligibility check. Final blood donation
                        eligibility will be determined by qualified
                        medical staff at the donation campaign.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
     ELIGIBILITY JAVASCRIPT
========================================================= --}}

    <script>
        function checkDonationEligibility() {

            const lastDonationInput =
                document.getElementById('lastDonation');

            const result =
                document.getElementById('donationResult');


            /*
            ---------------------------------------------------------
            Reset previous result
            ---------------------------------------------------------
            */

            result.className = 'donation-result';
            result.innerHTML = '';


            /*
            ---------------------------------------------------------
            Check if date is selected
            ---------------------------------------------------------
            */

            if (!lastDonationInput.value) {

                result.className =
                    'donation-result not-eligible';

                result.innerHTML = `

            <div class="result-content">

                <div class="result-status-icon">
                    !
                </div>

                <div>

                    <strong>
                        Please select your last donation date.
                    </strong>

                    <p>
                        Enter the date of your previous blood
                        donation to continue the eligibility check.
                    </p>

                </div>

            </div>

        `;

                return;
            }


            /*
            ---------------------------------------------------------
            Convert selected date
            ---------------------------------------------------------
            */

            const lastDonation =
                new Date(lastDonationInput.value + 'T00:00:00');


            /*
            ---------------------------------------------------------
            Today's date
            ---------------------------------------------------------
            */

            const today = new Date();

            today.setHours(0, 0, 0, 0);


            /*
            ---------------------------------------------------------
            Check future date
            ---------------------------------------------------------
            */

            if (lastDonation > today) {

                result.className =
                    'donation-result not-eligible';

                result.innerHTML = `

            <div class="result-content">

                <div class="result-status-icon">
                    !
                </div>

                <div>

                    <strong>
                        Invalid Donation Date
                    </strong>

                    <p>
                        Your last donation date cannot be
                        a future date.
                    </p>

                </div>

            </div>

        `;

                return;
            }


            /*
            ---------------------------------------------------------
            Calculate 6 months from last donation
            ---------------------------------------------------------
            */

            const sixMonthsLater =
                new Date(lastDonation);

            sixMonthsLater.setMonth(
                sixMonthsLater.getMonth() + 6
            );


            /*
            ---------------------------------------------------------
            Check eligibility
            ---------------------------------------------------------
            */

            if (today >= sixMonthsLater) {

                /*
                -----------------------------------------------------
                ELIGIBLE
                -----------------------------------------------------
                */

                result.className =
                    'donation-result eligible';

                result.innerHTML = `

            <div class="result-content">

                <div class="result-status-icon">
                    ✓
                </div>

                <div>

                    <strong>
                        Eligible to Donate
                    </strong>

                    <p>
                        You have completed the required
                        6-month waiting period since your
                        last blood donation.
                    </p>

                    <span class="result-note">
                        You may proceed with blood donation
                        registration. Final eligibility will
                        be confirmed by medical staff.
                    </span>

                </div>

            </div>

        `;

            } else {

                /*
                -----------------------------------------------------
                NOT ELIGIBLE
                -----------------------------------------------------
                */

                result.className =
                    'donation-result not-eligible';

                const remainingTime =
                    sixMonthsLater - today;

                const remainingDays =
                    Math.ceil(
                        remainingTime /
                        (1000 * 60 * 60 * 24)
                    );


                result.innerHTML = `

            <div class="result-content">

                <div class="result-status-icon">
                    !
                </div>

                <div>

                    <strong>
                        Not Eligible to Donate Yet
                    </strong>

                    <p>
                        You have not completed the required
                        6-month waiting period since your
                        last donation.
                    </p>

                    <span class="result-note">
                        Approximately
                        <strong>${remainingDays} days</strong>
                        remaining before the 6-month period
                        is completed.
                    </span>

                </div>

            </div>

        `;

            }

        }
    </script>



</x-layout>
