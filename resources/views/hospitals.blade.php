<x-layout>


<!-- Hospital Header -->
<section class="hospital-header">
    <div class="hospital-container">

        <div class="hospital-header-grid">

            <!-- Hospital Image -->
            <div>
                <img
                    src="{{ Storage::url($hospitalInfos->image) }}"
                    alt="Hospital"
                    class="hospital-main-image"
                >
            </div>

            <!-- Hospital Details -->
            <div class="hospital-details">

                <span class="hospital-label">
                    Hospital Information
                </span>

                <h1 class="hospital-name">
                    {{ $hospitalInfos->hospital_name }}
                </h1>

                <p class="hospital-description">
                    {!! $hospitalInfos->description !!}
                </p>

                <div class="hospital-contact-info">

                    <p class="hospital-contact-item">
                        <i class="fa-solid fa-map-pin"></i>
                        <span>
                            {{ $hospitalInfos->address }}
                        </span>
                    </p>

                    <p class="hospital-contact-item">
                        <i class="fa-solid fa-phone"></i>
                        <span>
                            {{ $hospitalInfos->hospital_phone }}
                        </span>
                    </p>

                    <p class="hospital-contact-item">
                        <i class="fa-solid fa-envelope"></i>
                        <span>
                            {{ $hospitalInfos->email }}
                        </span>
                    </p>

                </div>

                <a
                    href="{{ $hospitalInfos->messenger }}"
                    target="_blank"
                    class="messenger-btn"
                >
                    Message on Messenger
                </a>

            </div>

        </div>

    </div>
</section>


<!-- Doctors Section -->
<section class="doctors-section">

    <div class="hospital-container">

        <!-- Section Heading -->
        <div class="doctors-heading">

            <span class="doctors-label">
                Our Medical Team
            </span>

            <h2>
                Meet Our Blood Bank Doctors
            </h2>

            <p>
                Our experienced medical team ensures safe blood donation,
                proper testing, and quality blood services for every patient.
            </p>

        </div>


        <!-- Doctor Cards -->
        <div class="doctors-grid">

            @foreach($doctors as $doctor)

                <!-- Doctor -->
                <div class="doctor-card">

                    <img
                        src="{{ Storage::url($doctor->image) }}"
                        class="doctor-image"
                        alt="{{ $doctor->name }}"
                    >

                    <h3 class="doctor-name">
                        {{ $doctor->name }}
                    </h3>

                    <p class="doctor-designation">
                        {{ $doctor->designation }}
                    </p>

                    <p class="doctor-description">
                        {!! $doctor->description !!}
                    </p>

                    <div class="doctor-info">

                        <p>
                            🩺 {{ $doctor->experience }} Years Experience
                        </p>

                        <p>
                            🕒 {{ $doctor->available_time }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


<!-- Map Location -->
<section class="hospital-map-section">

    <div class="hospital-container">

        <h2 class="map-title">
            Hospital Location
        </h2>

        <div class="hospital-map">

            <iframe
                src="https://www.google.com/maps?q=Butwal,Nepal&output=embed"
                width="100%"
                height="100%"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>

        </div>

    </div>

</section>


</x-layout>
