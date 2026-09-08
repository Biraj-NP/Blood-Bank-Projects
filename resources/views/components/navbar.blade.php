@php
use Illuminate\Support\Facades\Auth;
@endphp

<nav class="main-navbar">

    {{-- =========================================
         LOGO + COMPANY NAME
    ========================================== --}}

    <div class="navbar-logo">

        <a href="{{ route('home') }}">

            @if($BBMScompanies && $BBMScompanies->image)

            <img
                src="{{ asset('storage/' . $BBMScompanies->image) }}"
                alt="{{ $BBMScompanies->name }}"
                class="company-logo">

            @endif

            <span class="logo-text">
                {{ $BBMScompanies->name ?? 'Blood Bank' }}
            </span>

        </a>

    </div>


    {{-- =========================================
         MAIN NAVIGATION
    ========================================== --}}

    <div class="navbar-links">

        <a
            href="{{ route('home') }}"
            class="{{ request()->routeIs('home') ? 'active' : '' }}">
            Home
        </a>

        <a
            href="{{ route('about') }}"
            class="{{ request()->routeIs('about') ? 'active' : '' }}">
            About Us
        </a>

        <a
            href="{{ route('campaigns') }}"
            class="{{ request()->routeIs('campaigns') ? 'active' : '' }}">
            Campaigns
        </a>

        <a
            href="{{ route('hospitals') }}"
            class="{{ request()->routeIs('hospitals') ? 'active' : '' }}">
            Hospital
        </a>

        <a
            href="{{ route('search') }}"
            class="{{ request()->routeIs('search') ? 'active' : '' }}">
            Search
        </a>

    </div>


    {{-- =========================================
         RIGHT SIDE
    ========================================== --}}

    <div class="navbar-right">

        @guest

        {{-- LOGIN --}}

        <a
            href="{{ route('login') }}"
            class="navbar-login-btn">
            Login
        </a>

        @else

        {{-- =================================
                 LOGGED IN USER
            ================================== --}}

        <div class="navbar-user-dropdown">

            <button
                type="button"
                class="navbar-user-button"
                onclick="toggleUserDropdown(event)">

                {{-- User Initial --}}

                <div class="navbar-user-icon">

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </div>


                {{-- User Name --}}

                <span class="navbar-user-name">

                    {{ Auth::user()->name }}

                </span>


                {{-- Arrow --}}

                <span
                    class="dropdown-arrow"
                    id="dropdownArrow">
                    ▼
                </span>

            </button>


            {{-- =================================
                     DROPDOWN MENU
                ================================== --}}

            <div
                id="userDropdown"
                class="navbar-dropdown-menu">

                {{-- USER INFORMATION --}}

                <div class="dropdown-user-info">

                    <div class="dropdown-user-icon">

                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                    </div>

                    <div class="dropdown-user-details">

                        <strong>
                            {{ Auth::user()->name }}
                        </strong>

                        <small>
                            {{ Auth::user()->email }}
                        </small>

                        <span class="logged-status">
                            ● Logged In
                        </span>

                    </div>

                </div>


                {{-- DIVIDER --}}

                <div class="dropdown-divider"></div>


                {{-- CONTACT --}}

                <a
                    href="{{ route('contact') }}"
                    class="dropdown-item">

                    <span class="dropdown-icon">
                        <i class="fa-solid fa-phone"></i>
                    </span>

                    <span>
                        Contact
                    </span>

                </a>


                {{-- BLOOD REQUEST --}}

                <a
                    href="{{ route('blood_request') }}"
                    class="dropdown-item">

                    <span class="dropdown-icon">
                        <i class="fa-solid fa-droplet"></i>
                    </span>

                    <span>
                        Blood Request
                    </span>

                </a>


                {{-- DONOR REGISTER --}}

                <a
                    href="{{ route('doner_register') }}"
                    class="dropdown-item">

                    <span class="dropdown-icon">
                        <i class="fa-solid fa-hand-holding-heart"></i>
                    </span>

                    <span>
                        Donor Register
                    </span>

                </a>


                {{-- DIVIDER --}}

                <div class="dropdown-divider"></div>


                {{-- LOGOUT --}}

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                    class="logout-form">

                    @csrf

                    <a
                        href="{{ route('logout') }}"
                        class="dropdown-logout">
                        <span class="dropdown-icon">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </span>

                        <span>
                            Logout
                        </span>
                    </a>
                    
                </form>

            </div>

        </div>

        @endguest

    </div>

</nav>


{{-- =========================================
     DROPDOWN JAVASCRIPT
========================================= --}}

<script>
    function toggleUserDropdown(event) {
        event.stopPropagation();

        const dropdown = document.getElementById('userDropdown');
        const button = document.querySelector('.navbar-user-button');

        if (!dropdown || !button) {
            return;
        }

        dropdown.classList.toggle('show');
        button.classList.toggle('active');
    }


    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('userDropdown');
        const button = document.querySelector('.navbar-user-button');

        if (!dropdown || !button) {
            return;
        }

        if (
            !dropdown.contains(event.target) &&
            !button.contains(event.target)
        ) {

            dropdown.classList.remove('show');

            button.classList.remove('active');

        }

    });
</script>
