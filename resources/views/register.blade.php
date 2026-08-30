<x-layout>

    <div class="register-page">

        <div class="register-wrapper">

            <div class="register-card">

                {{-- Header --}}
                <div class="register-header">

                    <div class="register-icon">

                        <svg
                            class="register-user-icon"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4a4 4 0 100 8 4 4 0 000-8zM4 20a8 8 0 0116 0"
                            />
                        </svg>

                    </div>

                    <h2 class="register-title">
                        Create Account
                    </h2>

                    <p class="register-subtitle">
                        Register to become a donor
                    </p>

                </div>


                {{-- Content --}}
                <div class="register-content">

                    {{-- Errors --}}
                    @if($errors->any())

                        <div class="register-error">

                            @foreach($errors->all() as $error)

                                <div>
                                    {{ $error }}
                                </div>

                            @endforeach

                        </div>

                    @endif


                    {{-- Register Form --}}
                    <form
                        action="{{ route('register.store') }}"
                        method="POST"
                        class="register-form"
                    >

                        @csrf


                        {{-- Name --}}
                        <div class="form-group">

                            <label for="name">
                                Full Name
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Enter your full name"
                                required
                            >

                        </div>


                        {{-- Email --}}
                        <div class="form-group">

                            <label for="email">
                                Email Address
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Enter your email"
                                required
                            >

                        </div>


                        {{-- Password --}}
                        <div class="form-group">

                            <label for="password">
                                Password
                            </label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Minimum 8 characters"
                                required
                            >

                        </div>


                        {{-- Confirm Password --}}
                        <div class="form-group">

                            <label for="password_confirmation">
                                Confirm Password
                            </label>

                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Confirm your password"
                                required
                            >

                        </div>


                        {{-- Register Button --}}
                        <button
                            type="submit"
                            class="register-submit-btn"
                        >
                            Create Account
                        </button>

                    </form>


                    {{-- Login Link --}}
                    <div class="register-login-wrapper">

                        <p>

                            Already have an account?

                            <a href="{{ route('login') }}">
                                Login Now
                            </a>

                        </p>

                    </div>

                </div>

            </div>


            {{-- Footer --}}
            <div class="register-footer-text">

                <p>
                    Blood Bank Management System
                </p>

                <p>
                    Connecting donors with those in need ❤️
                </p>

            </div>

        </div>

    </div>

</x-layout>
