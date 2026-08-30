<x-layout>

    <section class="contact-page">

        <div class="contact-container">

            {{-- Header --}}
            <div class="contact-header">

                <h1>Let’s Talk</h1>

                <p>
                    Reach out to our blood donation team for
                    support, partnership requests, or any question
                    about becoming a donor.
                </p>

            </div>


            {{-- Contact Card --}}
            <div class="contact-card">

                <div class="contact-grid">


                    {{-- Left Info Panel --}}
                    <div class="contact-info">

                        <h2>Get in Touch</h2>

                        <div class="contact-details">

                            <div class="contact-detail">

                                <i class="fa-solid fa-map-pin"></i>

                                <span>
                                    {{ $BBMScompanies->address }}
                                </span>

                            </div>


                            <div class="contact-detail">

                                <i class="fa-solid fa-envelope"></i>

                                <span>
                                    {{ $BBMScompanies->email }}
                                </span>

                            </div>


                            <div class="contact-detail">

                                <i class="fa-solid fa-phone"></i>

                                <span>
                                    +977 {{ $BBMScompanies->phone }}
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- Right Form --}}
                    <div class="contact-form-wrapper">

                        @if(session('success'))

                            <div class="success-message">
                                {{ session('success') }}
                            </div>

                        @endif


                        <form
                            action="{{ route('contactSave') }}"
                            method="post"
                            class="contact-form">

                            @csrf


                            {{-- Full Name --}}
                            <div class="form-group">

                                <label for="full_name">
                                    Full Name:
                                </label>

                                <input
                                    type="text"
                                    id="full_name"
                                    name="full_name"
                                    required
                                    placeholder="Enter your full name">

                            </div>


                            {{-- Phone --}}
                            <div class="form-group">

                                <label for="phone">
                                    Phone Number:
                                </label>

                                <input
                                    type="text"
                                    id="phone"
                                    name="phone"
                                    required
                                    placeholder="98XXXXXXXX">

                            </div>


                            {{-- Email --}}
                            <div class="form-group">

                                <label for="email">
                                    Email Address:
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    required
                                    placeholder="youname@gmail.com">

                            </div>


                            {{-- Subject --}}
                            <div class="form-group">

                                <label for="subject">
                                    Subject:
                                </label>

                                <input
                                    type="text"
                                    id="subject"
                                    name="subject"
                                    required
                                    placeholder="How can we help?">

                            </div>


                            {{-- Message --}}
                            <div class="form-group">

                                <label for="message">
                                    Message:
                                </label>

                                <textarea
                                    id="message"
                                    name="message"
                                    rows="4"
                                    required
                                    placeholder="Write your message here..."></textarea>

                            </div>


                            {{-- Submit --}}
                            <button
                                type="submit"
                                class="contact-submit">

                                Send Message

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</x-layout>