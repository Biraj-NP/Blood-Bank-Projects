<x-layout>


<!-- ========================================================= -->
<!-- BLOOD STOCK -->
<!-- ========================================================= -->

<section class="search-blood-stock">

    <div class="search-container">

        <!-- Header -->

        <div class="search-section-header">

            <span class="search-badge">
                Blood Stock
            </span>

            <h2>
                Current Blood Stock
            </h2>

            <p>
                Check the currently available blood stock in our blood bank.
            </p>

        </div>


        <!-- Blood Stock Cards -->

        <div class="blood-stock-grid">

            @forelse($bloodStocks as $stock)

                <div class="blood-stock-card">

                    <div class="blood-stock-group">
                        {{ $stock->blood_group }}
                    </div>

                    <h3>
                        {{ $stock->blood_group }}
                    </h3>

                    <p>
                        {{ $stock->units }} Units
                    </p>

                </div>

            @empty

                <div class="blood-stock-empty">

                    <p>
                        No blood stock available.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>


<!-- ========================================================= -->
<!-- SEARCH SECTION -->
<!-- ========================================================= -->

<section class="search-section">

    <div class="search-container">

        <!-- Header -->

        <div class="search-section-header">

            <span class="search-badge">
                Find Blood
            </span>

            <h1>
                Search for Blood
            </h1>

            <p>
                Search available donors and blood requests by name,
                blood group, or location.
            </p>

        </div>


        <!-- SEARCH FORM -->

        <div class="search-form-wrapper">

            <form
                action="{{ route('search') }}"
                method="GET"
                autocomplete="off"
                class="search-form"
            >

                <!-- NAME -->

                <div class="search-form-group search-name-group">

                    <label for="name">
                        Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ request('name') }}"
                        placeholder="Enter name"
                    >

                    <div
                        id="searchSuggestions"
                        class="search-suggestions"
                    ></div>

                </div>


                <!-- BLOOD GROUP -->

                <div class="search-form-group">

                    <label for="blood_group">
                        Blood Group
                    </label>

                    <select
                        id="blood_group"
                        name="blood_group"
                    >

                        <option value="">
                            Select Blood Group
                        </option>

                        <option value="A+" {{ request('blood_group') == 'A+' ? 'selected' : '' }}>
                            A+
                        </option>

                        <option value="A-" {{ request('blood_group') == 'A-' ? 'selected' : '' }}>
                            A-
                        </option>

                        <option value="B+" {{ request('blood_group') == 'B+' ? 'selected' : '' }}>
                            B+
                        </option>

                        <option value="B-" {{ request('blood_group') == 'B-' ? 'selected' : '' }}>
                            B-
                        </option>

                        <option value="AB+" {{ request('blood_group') == 'AB+' ? 'selected' : '' }}>
                            AB+
                        </option>

                        <option value="AB-" {{ request('blood_group') == 'AB-' ? 'selected' : '' }}>
                            AB-
                        </option>

                        <option value="O+" {{ request('blood_group') == 'O+' ? 'selected' : '' }}>
                            O+
                        </option>

                        <option value="O-" {{ request('blood_group') == 'O-' ? 'selected' : '' }}>
                            O-
                        </option>

                    </select>

                </div>


                <!-- LOCATION -->

                <div class="search-form-group">

                    <label for="location">
                        Location
                    </label>

                    <input
                        type="text"
                        id="location"
                        name="location"
                        value="{{ request('location') }}"
                        placeholder="City, district, address"
                    >

                </div>


                <!-- BUTTON -->

                <div class="search-button-group">

                    <button type="submit">
                        Search Blood
                    </button>

                </div>

            </form>

        </div>


        <!-- DONORS SECTION -->

        <div class="donors-section">

            <div class="results-header">

                <div>

                    <h2>
                        Available Blood Donors
                    </h2>

                    <p>
                        {{ $donors->count() }} verified and active blood donors found.
                    </p>

                </div>

                @if(request()->hasAny(['name', 'blood_group', 'location']))

                    <a href="{{ route('search') }}" class="clear-filters">
                        Clear filters
                    </a>

                @endif

            </div>


            @if($donors->count() > 0)

                <div class="results-list">

                    @foreach($donors as $donor)

                        <!-- Donor Card -->

                        <div class="donor-card">

                            <div class="donor-card-inner">

                                <div class="donor-main-info">

                                    <div class="donor-blood-group">
                                        {{ $donor->blood_group }}
                                    </div>

                                    <div class="donor-details">

                                        <div class="donor-name-row">

                                            <h3>
                                                {{ $donor->first_name }} {{ $donor->last_name }}
                                            </h3>

                                            @if($donor->is_verified)

                                                <span class="verified-badge">
                                                    Verified
                                                </span>

                                            @endif

                                        </div>

                                        <p>
                                            {{ $donor->blood_group }} •
                                            {{ $donor->district }}, {{ $donor->province }} •
                                            {{ $donor->address }}
                                        </p>

                                        <p>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            Registered: {{ $donor->created_at->format('M d, Y') }}
                                        </p>

                                    </div>

                                </div>


                                <div class="donor-contact">

                                    <p>
                                        <i class="fa-solid fa-phone"></i>
                                        {{ $donor->phone }}
                                    </p>

                                    <p>
                                        <i class="fa-regular fa-envelope"></i>
                                        {{ $donor->email }}
                                    </p>


                                    @auth

                                        {{-- Logged-in user --}}

                                        <a
                                            href="{{ route('contact') }}"
                                            class="action-btn"
                                        >
                                            Contact Donor
                                        </a>

                                    @else

                                        {{-- Guest user --}}

                                        <a
                                            href="{{ route('login') }}"
                                            class="action-btn"
                                        >
                                            Login to Contact Donor
                                        </a>

                                    @endauth

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <!-- No Donors Found -->

                <div class="no-results">

                    <div class="no-results-icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>

                    <h3>
                        No donors found
                    </h3>

                    <p>
                        Try adjusting your search criteria or check back later.
                    </p>

                </div>

            @endif

        </div>


        <!-- BLOOD REQUESTS SECTION -->

        <div class="blood-requests-section">

            <div class="results-header">

                <div>

                    <h2>
                        Blood Requests
                    </h2>

                    <p>
                        {{ $bloodRequests->count() }} people currently requesting blood.
                    </p>

                </div>

            </div>


            @if($bloodRequests->count() > 0)

                <div class="results-list">

                    @foreach($bloodRequests as $request)

                        <!-- Request Card -->

                        <div class="request-card">

                            <div class="request-card-inner">

                                <div class="request-main-info">

                                    <div class="request-blood-group">
                                        {{ $request->blood_group }}
                                    </div>

                                    <div class="request-details">

                                        <h3>
                                            {{ $request->first_name }} {{ $request->last_name }}
                                        </h3>

                                        <p>
                                            Blood Group:
                                            <span>
                                                {{ $request->blood_group }}
                                            </span>
                                        </p>

                                        <p>
                                            <i class="fa-solid fa-location-dot"></i>
                                            {{ $request->district }}, {{ $request->province }} •
                                            {{ $request->address }}
                                        </p>

                                        @if($request->cause)

                                            <p>
                                                <i class="fa-regular fa-message"></i>
                                                {{ $request->cause }}
                                            </p>

                                        @endif

                                    </div>

                                </div>


                                <div class="request-contact">

                                    <p>
                                        <i class="fa-solid fa-phone"></i>
                                        {{ $request->phone }}
                                    </p>

                                    <p>
                                        <i class="fa-regular fa-envelope"></i>
                                        {{ $request->email }}
                                    </p>

                                    <p class="request-time">
                                        Requested:
                                        {{ $request->created_at->diffForHumans() }}
                                    </p>


                                    @auth

                                        {{-- Logged-in user --}}

                                        <a
                                            href="{{ route('contact') }}"
                                            class="action-btn"
                                        >
                                            Help Request
                                        </a>

                                    @else

                                        {{-- Guest user --}}

                                        <a
                                            href="{{ route('login') }}"
                                            class="action-btn"
                                        >
                                            Login to Help Request
                                        </a>

                                    @endauth

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <!-- No Requests Found -->

                <div class="no-results">

                    <div class="no-results-icon">
                        <i class="fa-solid fa-droplet"></i>
                    </div>

                    <h3>
                        No blood requests at the moment
                    </h3>

                    <p>
                        All requests are being fulfilled. Check back later.
                    </p>

                </div>

            @endif

        </div>

    </div>

</section>


</x-layout>
