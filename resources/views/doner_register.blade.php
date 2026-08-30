<x-layout>

    @auth

        <div class="donor-register-page">

            <div class="donor-register-container">

                <div class="donor-register-grid">

                    {{-- LEFT SIDE --}}
                    <div class="donor-register-left">

                        <div>

                            <div class="donor-register-drop">
                                🩸
                            </div>

                            <h1 class="donor-register-title">
                                Donor Registration
                            </h1>

                            <p class="donor-register-subtitle">
                                Join us in saving lives
                            </p>

                        </div>

                        <div class="donor-register-features">

                            <div class="donor-feature-list">

                                <span class="donor-feature-dot"></span>
                                <span>Save lives</span>

                                <span class="donor-feature-dot"></span>
                                <span>Be a hero</span>

                                <span class="donor-feature-dot"></span>
                                <span>Give hope</span>

                            </div>

                        </div>

                    </div>


                    {{-- RIGHT SIDE --}}
                    <div class="donor-register-right">

                        {{-- SUCCESS MESSAGE --}}
                        @if(session('success'))

                            <div class="donor-success-message">
                                {{ session('success') }}
                            </div>

                        @endif


                        {{-- ERROR MESSAGE --}}
                        @if($errors->any())

                            <div class="donor-error-message">

                                <ul>

                                    @foreach($errors->all() as $error)

                                        <li>
                                            • {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        {{-- FORM --}}
                        <form
                            action="{{ route('donor.register.save') }}"
                            method="POST"
                        >

                            @csrf


                            <div class="donor-form-grid">


                                {{-- FIRST NAME --}}
                                <div class="donor-field">

                                    <label class="donor-label">
                                        First Name
                                    </label>

                                    <input
                                        type="text"
                                        value="{{ $user->name }}"
                                        class="donor-input donor-readonly"
                                        readonly
                                    >

                                </div>


                                {{-- LAST NAME --}}
                                <div class="donor-field">

                                    <label class="donor-label">
                                        Last Name
                                    </label>

                                    <input
                                        type="text"
                                        value="Automatically from account"
                                        class="donor-input donor-readonly"
                                        readonly
                                    >

                                </div>


                                {{-- EMAIL --}}
                                <div class="donor-field">

                                    <label class="donor-label">
                                        Email Address
                                    </label>

                                    <input
                                        type="email"
                                        value="{{ $user->email }}"
                                        class="donor-input donor-readonly"
                                        readonly
                                    >

                                </div>


                                {{-- PHONE --}}
                                <div class="donor-field">

                                    <label
                                        for="phone"
                                        class="donor-label"
                                    >
                                        Phone Number
                                        <span class="donor-required">*</span>
                                    </label>

                                    <input
                                        type="tel"
                                        id="phone"
                                        name="phone"
                                        value="{{ old('phone') }}"
                                        placeholder="9745427882"
                                        required
                                        class="donor-input"
                                    >

                                </div>


                                {{-- DATE OF BIRTH --}}
                                <div class="donor-field">

                                    <label
                                        for="dob"
                                        class="donor-label"
                                    >
                                        Date of Birth
                                        <span class="donor-required">*</span>
                                    </label>

                                    <input
                                        type="date"
                                        id="dob"
                                        name="dob"
                                        value="{{ old('dob') }}"
                                        required
                                        class="donor-input"
                                    >

                                </div>


                                {{-- GENDER --}}
                                <div class="donor-field">

                                    <label class="donor-label">
                                        Gender
                                        <span class="donor-required">*</span>
                                    </label>

                                    <div class="gender-options">

                                        <label class="gender-option">

                                            <input
                                                type="radio"
                                                name="gender"
                                                value="Male"
                                                {{ old('gender') == 'Male' ? 'checked' : '' }}
                                                required
                                            >

                                            <span>Male</span>

                                        </label>


                                        <label class="gender-option">

                                            <input
                                                type="radio"
                                                name="gender"
                                                value="Female"
                                                {{ old('gender') == 'Female' ? 'checked' : '' }}
                                            >

                                            <span>Female</span>

                                        </label>


                                        <label class="gender-option">

                                            <input
                                                type="radio"
                                                name="gender"
                                                value="Other"
                                                {{ old('gender') == 'Other' ? 'checked' : '' }}
                                            >

                                            <span>Other</span>

                                        </label>

                                    </div>

                                </div>


                                {{-- BLOOD GROUP --}}
                                <div class="donor-field">

                                    <label
                                        for="bloodGroup"
                                        class="donor-label"
                                    >
                                        Blood Group
                                        <span class="donor-required">*</span>
                                    </label>

                                    <select
                                        id="bloodGroup"
                                        name="bloodGroup"
                                        required
                                        class="donor-input"
                                    >

                                        <option
                                            value=""
                                            disabled
                                            {{ old('bloodGroup') ? '' : 'selected' }}
                                        >
                                            Select Blood Group
                                        </option>

                                        @foreach([
                                            'A+',
                                            'A-',
                                            'B+',
                                            'B-',
                                            'AB+',
                                            'AB-',
                                            'O+',
                                            'O-'
                                        ] as $group)

                                            <option
                                                value="{{ $group }}"
                                                {{ old('bloodGroup') == $group ? 'selected' : '' }}
                                            >
                                                {{ $group }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                {{-- PROVINCE --}}
                                <div class="donor-field">

                                    <label
                                        for="province"
                                        class="donor-label"
                                    >
                                        Province
                                        <span class="donor-required">*</span>
                                    </label>

                                    <select
                                        id="province"
                                        name="province"
                                        required
                                        class="donor-input"
                                    >

                                        <option
                                            value=""
                                            disabled
                                            {{ old('province') ? '' : 'selected' }}
                                        >
                                            Select Province
                                        </option>

                                        @foreach([
                                            'Koshi',
                                            'Madhesh',
                                            'Bagmati',
                                            'Gandaki',
                                            'Lumbini',
                                            'Karnali',
                                            'Sudurpashchim'
                                        ] as $province)

                                            <option
                                                value="{{ $province }}"
                                                {{ old('province') == $province ? 'selected' : '' }}
                                            >
                                                {{ $province }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                {{-- DISTRICT --}}
                                <div class="donor-field">

                                    <label
                                        for="district"
                                        class="donor-label"
                                    >
                                        District
                                        <span class="donor-required">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        id="district"
                                        name="district"
                                        value="{{ old('district') }}"
                                        placeholder="Enter your district"
                                        required
                                        class="donor-input"
                                    >

                                </div>


                                {{-- ADDRESS --}}
                                <div class="donor-full-field">

                                    <label
                                        for="address"
                                        class="donor-label"
                                    >
                                        Full Address
                                        <span class="donor-required">*</span>
                                    </label>

                                    <textarea
                                        id="address"
                                        name="address"
                                        placeholder="Butwal 12 Tamnager Rupandehi"
                                        required
                                        class="donor-textarea"
                                    >{{ old('address') }}</textarea>

                                </div>


                                {{-- SUBMIT --}}
                                <div class="donor-submit-wrapper">

                                    <button
                                        type="submit"
                                        class="donor-submit-btn"
                                    >
                                        🩸 Register as Donor
                                    </button>

                                </div>

                            </div>


                            {{-- FOOTER --}}
                            <div class="donor-form-footer">

                                <div class="donor-footer-content">

                                    <p class="donor-footer-question">
                                        Need blood for someone?
                                    </p>

                                    <a
                                        href="{{ route('blood_request') }}"
                                        class="blood-request-link"
                                    >
                                        🩸 Blood Request
                                    </a>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>


    @else


        {{-- NOT LOGGED IN --}}

        <div class="donor-login-page">

            <div class="donor-login-card">

                <div class="donor-login-icon-wrapper">

                    <div class="donor-login-icon">
                        🩸
                    </div>

                </div>


                <h1 class="donor-login-title">
                    Donor Registration
                </h1>


                <p class="donor-login-description">

                    Want to become a blood donor and help save lives?
                    Please login to your account first to continue
                    with donor registration.

                </p>


                <div class="donor-login-section">

                    <p class="donor-login-message">

                        You need to login before registering as a donor.

                    </p>


                    <a
                        href="{{ route('login') }}"
                        class="donor-login-btn"
                    >
                        Login to Continue
                    </a>

                </div>


                <div class="donor-back-home-wrapper">

                    <a
                        href="{{ route('home') }}"
                        class="donor-back-home"
                    >
                        ← Back to Home
                    </a>

                </div>

            </div>

        </div>

    @endauth

</x-layout>
