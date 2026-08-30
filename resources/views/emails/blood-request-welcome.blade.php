<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Blood Request Update</title>
</head>

<body style="
    margin: 0;
    padding: 0;
    background: #f5f5f5;
    font-family: Arial, Helvetica, sans-serif;
    color: #333333;
">

<div style="
    max-width: 650px;
    margin: 30px auto;
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
">

    {{-- Header --}}
    <div style="
        background: #dc2626;
        color: #ffffff;
        padding: 25px;
        text-align: center;
    ">

        <h1 style="
            margin: 0;
            font-size: 26px;
        ">
            Blood Bank Management System
        </h1>

        <p style="
            margin: 8px 0 0;
        ">
            Blood Request Update
        </p>

    </div>


    {{-- Content --}}
    <div style="padding: 30px;">

        {{-- Custom / Default Heading --}}
        <h2 style="
            color: #dc2626;
            margin-top: 0;
        ">

            {{ $customHeading ?: 'Blood Request Update' }}

        </h2>


        {{-- Greeting --}}
        <p>
            Hello
            <strong>
                {{ $bloodRequest->first_name }}
                {{ $bloodRequest->last_name }}
            </strong>,
        </p>


        {{-- Custom / Default Message --}}
        @if($customMessage)

            <div style="
                line-height: 1.7;
                margin-bottom: 25px;
            ">
                {!! $customMessage !!}
            </div>

        @else

            <p style="
                line-height: 1.7;
            ">
                Your blood request has been successfully received by
                our Blood Bank Management System. Our team will review
                your request and process it as soon as possible.
            </p>

        @endif


        {{-- Blood Request Information --}}
        <h3 style="
            color: #dc2626;
            border-bottom: 1px solid #eeeeee;
            padding-bottom: 10px;
            margin-top: 25px;
        ">
            Blood Request Details
        </h3>


        <table style="
            width: 100%;
            border-collapse: collapse;
        ">

            {{-- Request ID --}}
            <tr>
                <td style="padding: 8px 0;">
                    <strong>Request ID:</strong>
                </td>

                <td style="padding: 8px 0;">
                    #{{ $bloodRequest->id }}
                </td>
            </tr>


            {{-- Name --}}
            <tr>
                <td style="padding: 8px 0;">
                    <strong>Name:</strong>
                </td>

                <td style="padding: 8px 0;">
                    {{ $bloodRequest->first_name }}
                    {{ $bloodRequest->last_name }}
                </td>
            </tr>


            {{-- Email --}}
            <tr>
                <td style="padding: 8px 0;">
                    <strong>Email:</strong>
                </td>

                <td style="padding: 8px 0;">
                    {{ $bloodRequest->email }}
                </td>
            </tr>


            {{-- Phone --}}
            <tr>
                <td style="padding: 8px 0;">
                    <strong>Phone:</strong>
                </td>

                <td style="padding: 8px 0;">
                    {{ $bloodRequest->phone }}
                </td>
            </tr>


            {{-- DOB --}}
            <tr>
                <td style="padding: 8px 0;">
                    <strong>Date of Birth:</strong>
                </td>

                <td style="padding: 8px 0;">
                    {{ $bloodRequest->dob }}
                </td>
            </tr>


            {{-- Gender --}}
            <tr>
                <td style="padding: 8px 0;">
                    <strong>Gender:</strong>
                </td>

                <td style="padding: 8px 0;">
                    {{ $bloodRequest->gender }}
                </td>
            </tr>


            {{-- Blood Group --}}
            <tr>
                <td style="padding: 8px 0;">
                    <strong>Blood Group:</strong>
                </td>

                <td style="
                    padding: 8px 0;
                    color: #dc2626;
                    font-weight: bold;
                ">
                    {{ $bloodRequest->blood_group }}
                </td>
            </tr>


            {{-- Province --}}
            <tr>
                <td style="padding: 8px 0;">
                    <strong>Province:</strong>
                </td>

                <td style="padding: 8px 0;">
                    {{ $bloodRequest->province }}
                </td>
            </tr>


            {{-- District --}}
            <tr>
                <td style="padding: 8px 0;">
                    <strong>District:</strong>
                </td>

                <td style="padding: 8px 0;">
                    {{ $bloodRequest->district }}
                </td>
            </tr>


            {{-- Address --}}
            <tr>
                <td style="padding: 8px 0;">
                    <strong>Address:</strong>
                </td>

                <td style="padding: 8px 0;">
                    {{ $bloodRequest->address }}
                </td>
            </tr>


            {{-- Cause --}}
            <tr>
                <td style="padding: 8px 0;">
                    <strong>Reason / Cause:</strong>
                </td>

                <td style="padding: 8px 0;">
                    {{ $bloodRequest->cause }}
                </td>
            </tr>

        </table>


        {{-- Campaign Information --}}
        @if($campaign)

            <h3 style="
                color: #dc2626;
                border-bottom: 1px solid #eeeeee;
                padding-bottom: 10px;
                margin-top: 30px;
            ">
                Blood Donation Campaign
            </h3>


            <table style="
                width: 100%;
                border-collapse: collapse;
            ">

                {{-- Campaign ID --}}
                <tr>
                    <td style="padding: 8px 0;">
                        <strong>Campaign ID:</strong>
                    </td>

                    <td style="padding: 8px 0;">
                        #{{ $campaign->id }}
                    </td>
                </tr>


                {{-- Campaign Title --}}
                <tr>
                    <td style="padding: 8px 0;">
                        <strong>Campaign:</strong>
                    </td>

                    <td style="padding: 8px 0;">
                        {{ $campaign->title }}
                    </td>
                </tr>


                {{-- Duration --}}
                <tr>
                    <td style="padding: 8px 0;">
                        <strong>Duration:</strong>
                    </td>

                    <td style="padding: 8px 0;">
                        {{ $campaign->duration }}
                    </td>
                </tr>


                {{-- Time --}}
                <tr>
                    <td style="padding: 8px 0;">
                        <strong>Time:</strong>
                    </td>

                    <td style="padding: 8px 0;">
                        {{ $campaign->day_time }}
                    </td>
                </tr>


                {{-- Venue --}}
                <tr>
                    <td style="padding: 8px 0;">
                        <strong>Venue:</strong>
                    </td>

                    <td style="padding: 8px 0;">
                        {{ $campaign->venue }}
                    </td>
                </tr>


                {{-- Location --}}
                <tr>
                    <td style="padding: 8px 0;">
                        <strong>Location:</strong>
                    </td>

                    <td style="padding: 8px 0;">
                        {{ $campaign->location }}
                    </td>
                </tr>


                {{-- Campaign Contact --}}
                @if(!empty($campaign->phone_no))

                    <tr>
                        <td style="padding: 8px 0;">
                            <strong>Campaign Contact:</strong>
                        </td>

                        <td style="padding: 8px 0;">
                            {{ $campaign->phone_no }}
                        </td>
                    </tr>

                @endif

            </table>


            {{-- Campaign Button --}}
            <div style="
                margin-top: 20px;
                text-align: center;
            ">

                <a
                    href="{{ url('/campaigns#campaign-' . $campaign->id) }}"
                    style="
                        display: inline-block;
                        background: #dc2626;
                        color: #ffffff;
                        text-decoration: none;
                        padding: 12px 22px;
                        border-radius: 8px;
                        font-weight: bold;
                    "
                >
                    View Campaign
                </a>

            </div>

        @endif


        {{-- Emergency Ambulance --}}
        @if($BBMScompanies && $BBMScompanies->phone)

            <div style="
                margin-top: 30px;
                padding: 20px;
                background: #fff5f5;
                border: 1px solid #fecaca;
                border-radius: 10px;
            ">

                <h3 style="
                    margin: 0 0 10px;
                    color: #dc2626;
                ">
                    Emergency Ambulance
                </h3>


                <p style="
                    margin: 0;
                    line-height: 1.6;
                ">
                    If you need emergency ambulance assistance,
                    please contact our ambulance service.
                </p>


                <p style="
                    margin: 12px 0 0;
                    font-size: 20px;
                    font-weight: bold;
                    color: #dc2626;
                ">
                    Ambulance No:
                    {{ $BBMScompanies->phone }}
                </p>

            </div>

        @endif


        {{-- Final Message --}}
        <p style="
            margin-top: 30px;
            line-height: 1.7;
        ">
            Please keep your
            <strong>Request ID #{{ $bloodRequest->id }}</strong>
            for future reference.
        </p>


        <p style="
            line-height: 1.7;
        ">
            Thank you for using our
            <strong>Blood Bank Management System</strong>.
        </p>

    </div>


    {{-- Footer --}}
    <div style="
        background: #f8fafc;
        padding: 18px;
        text-align: center;
        color: #6b7280;
        font-size: 13px;
    ">

        Blood Bank Management System
        <br>

        This is an automated email. Please do not reply.

    </div>

</div>

</body>
</html>
