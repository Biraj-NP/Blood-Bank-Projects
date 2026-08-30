<x-layout>

    @auth

        <div class="blood-request-page">

            <div class="blood-request-container">

                <div class="blood-request-grid">


                    {{-- LEFT SIDE --}}
                    <div class="blood-request-left">

                        <div>

                            <div class="blood-drop-large">
                                🩸
                            </div>

                            <h1 class="blood-request-title">
                                Blood Request
                            </h1>

                            <p class="blood-request-subtitle">
                                Request life-saving blood for your needs
                            </p>

                        </div>


                        <div class="blood-request-features">

                            <div class="blood-request-feature-list">

                                <span class="feature-dot"></span>
                                <span>Urgent requests</span>

                                <span class="feature-dot"></span>
                                <span>24/7 service</span>

                                <span class="feature-dot"></span>
                                <span>Life-saving</span>

                            </div>

                        </div>

                    </div>


                    {{-- RIGHT SIDE --}}
                    <div class="blood-request-right">


                        {{-- SUCCESS MESSAGE --}}
                        @if(session('success'))

                            <div class="request-success-message">

                                {{ session('success') }}

                            </div>

                        @endif


                        {{-- ERROR MESSAGE --}}
                        @if($errors->any())

                            <div class="request-error-message">

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
                            action="{{ route('blood_request_save') }}"
                            method="POST"
                        >

                            @csrf


                            <div class="request-form-grid">


                                {{-- FIRST NAME --}}
                                <div class="request-field">

                                    <label class="request-label">
                                        First Name
                                    </label>

                                    <input
                                        type="text"
                                        value="{{ $user->name }}"
                                        class="request-input request-readonly"
                                        readonly
                                    >

                                </div>


                                {{-- LAST NAME --}}
                                <div class="request-field">

                                    <label class="request-label">
                                        Last Name
                                    </label>

                                    <input
                                        type="text"
                                        value="Automatically from account"
                                        class="request-input request-readonly"
                                        readonly
                                    >

                                </div>


                                {{-- EMAIL --}}
                                <div class="request-field">

                                    <label class="request-label">
                                        Email Address
                                    </label>

                                    <input
                                        type="email"
                                        value="{{ $user->email }}"
                                        class="request-input request-readonly"
                                        readonly
                                    >

                                </div>


                                {{-- PHONE --}}
                                <div class="request-field">

                                    <label
                                        for="phone"
                                        class="request-label"
                                    >
                                        Phone Number
                                        <span class="required-star">*</span>
                                    </label>

                                    <input
                                        type="tel"
                                        id="phone"
                                        name="phone"
                                        value="{{ old('phone') }}"
                                        placeholder="9745427882"
                                        required
                                        class="request-input"
                                    >

                                </div>


                                {{-- DOB --}}
                                <div class="request-field">

                                    <label
                                        for="dob"
                                        class="request-label"
                                    >
                                        Date of Birth
                                        <span class="required-star">*</span>
                                    </label>

                                    <input
                                        type="date"
                                        id="dob"
                                        name="dob"
                                        value="{{ old('dob') }}"
                                        required
                                        class="request-input"
                                    >

                                </div>


                                {{-- GENDER --}}
                                <div class="request-field">

                                    <label class="request-label">
                                        Gender
                                        <span class="required-star">*</span>
                                    </label>

                                    <div class="request-gender-options">

                                        <label class="request-gender-option">

                                            <input
                                                type="radio"
                                                name="gender"
                                                value="Male"
                                                {{ old('gender') == 'Male' ? 'checked' : '' }}
                                                required
                                            >

                                            <span>Male</span>

                                        </label>


                                        <label class="request-gender-option">

                                            <input
                                                type="radio"
                                                name="gender"
                                                value="Female"
                                                {{ old('gender') == 'Female' ? 'checked' : '' }}
                                            >

                                            <span>Female</span>

                                        </label>


                                        <label class="request-gender-option">

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
                                <div class="request-field">

                                    <label
                                        for="bloodGroup"
                                        class="request-label"
                                    >
                                        Blood Group
                                        <span class="required-star">*</span>
                                    </label>

                                    <select
                                        id="bloodGroup"
                                        name="bloodGroup"
                                        required
                                        class="request-input"
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
                                <div class="request-field">

                                    <label
                                        for="province"
                                        class="request-label"
                                    >
                                        Province
                                        <span class="required-star">*</span>
                                    </label>

                                    <select
                                        id="province"
                                        name="province"
                                        required
                                        class="request-input"
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
                                <div class="request-field">

                                    <label
                                        for="district"
                                        class="request-label"
                                    >
                                        District
                                        <span class="required-star">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        id="district"
                                        name="district"
                                        value="{{ old('district') }}"
                                        placeholder="Enter your district"
                                        required
                                        class="request-input"
                                    >

                                </div>


                                {{-- ADDRESS --}}
                                <div class="request-full-field">

                                    <label
                                        for="address"
                                        class="request-label"
                                    >
                                        Full Address
                                        <span class="required-star">*</span>
                                    </label>

                                    <textarea
                                        id="address"
                                        name="address"
                                        placeholder="Butwal 12 Tamnager Rupandehi"
                                        required
                                        class="request-textarea request-address-textarea"
                                    >{{ old('address') }}</textarea>

                                </div>


                                {{-- CAUSE --}}
                                <div class="request-full-field">

                                    <label
                                        for="cause"
                                        class="request-label"
                                    >
                                        Cause / Reason for Request
                                        <span class="required-star">*</span>
                                    </label>

                                    <textarea
                                        id="cause"
                                        name="cause"
                                        placeholder="Please describe the reason for blood request..."
                                        required
                                        class="request-textarea request-cause-textarea"
                                    >{{ old('cause') }}</textarea>

                                </div>


                                {{-- SUBMIT --}}
                                <div class="request-submit-wrapper">

                                    <button
                                        type="submit"
                                        class="request-submit-btn"
                                    >
                                        🩸 Submit Blood Request
                                    </button>

                                </div>

                            </div>


                            {{-- DONOR REGISTRATION --}}
                            <div class="donor-registration">

                                <div class="donor-registration-content">

                                    <p class="donor-question">
                                        Want to help save a life?
                                    </p>

                                    <a
                                        href="{{ route('doner_register') }}"
                                        class="donor-registration-btn"
                                    >
                                        🩸 Donor Registration
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

        <div class="blood-request-login-page">

            <div class="blood-request-login-card">

                <div class="login-blood-icon-wrapper">

                    <div class="login-blood-icon">
                        🩸
                    </div>

                </div>


                <h1 class="login-request-title">
                    Blood Request
                </h1>


                <p class="login-request-description">

                    Need blood for yourself or someone else?
                    Please login to your account first
                    to continue with blood request.

                </p>


                <div class="login-request-divider"></div>


                <p class="login-request-message">

                    You need to login before submitting
                    a blood request.

                </p>


                <a
                    href="{{ route('login') }}"
                    class="login-request-btn"
                >
                    Login to Continue
                </a>


                <a
                    href="{{ route('home') }}"
                    class="back-home-btn"
                >
                    ← Back to Home
                </a>

            </div>

        </div>

    @endauth

</x-layout>
