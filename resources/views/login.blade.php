<x-layout>

    <div class="login-page">

        <div class="login-wrapper">

            <div class="login-card">

                {{-- Header --}}
                <div class="login-header">

                    <div class="login-icon">

                        <svg
                            class="login-user-icon"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            />
                        </svg>

                    </div>

                    <h2 class="login-title">
                        Welcome Back
                    </h2>

                    <p class="login-subtitle">
                        Sign in to continue to your account
                    </p>

                </div>


                <div class="login-content">

                    {{-- Success --}}
                    @if(session('success'))

                        <div class="login-success">
                            {{ session('success') }}
                        </div>

                    @endif


                    {{-- Errors --}}
                    @if($errors->any())

                        <div class="login-error">

                            @foreach($errors->all() as $error)

                                <div>
                                    {{ $error }}
                                </div>

                            @endforeach

                        </div>

                    @endif


                    {{-- Login Form --}}
                    <form
                        action="{{ route('login.authenticate') }}"
                        method="POST"
                        class="login-form"
                    >

                        @csrf


                        <div class="form-group">

                            <label for="email">
                                Email Address
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Enter your registered email"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label for="password">
                                Password
                            </label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Enter your password"
                                required
                            >

                        </div>


                        <button
                            type="submit"
                            class="login-submit-btn"
                        >
                            Login
                        </button>

                    </form>


                    {{-- Register --}}
                    <div class="register-link-wrapper">

                        <p>

                            Don't have an account?

                            <a href="{{ route('register') }}">
                                Register Now
                            </a>

                        </p>

                    </div>


                    {{-- Admin Login --}}
                    <div class="admin-login-wrapper">

                        <a
                            href="{{ route('filament.admin.auth.login') }}"
                            class="admin-login-btn"
                        >

                            <svg
                                class="admin-icon"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v2h8z"
                                />
                            </svg>

                            <span>
                                Admin Login
                            </span>

                        </a>

                    </div>


                    <div class="login-divider">

                        <div class="divider-line"></div>

                        <div class="divider-text-wrapper">

                            <span class="divider-text">
                                Secure Login
                            </span>

                        </div>

                    </div>


                    <div class="login-terms">

                        <p>
                            By signing in, you agree to our
                            <span>Terms of Service</span>
                            and
                            <span>Privacy Policy</span>
                        </p>

                    </div>

                </div>

            </div>


            <div class="login-footer-text">

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
