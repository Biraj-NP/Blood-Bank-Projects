<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Blood Donor Registration</title>
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
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #eeeeee;
    ">

        {{-- Header --}}
        <div style="
            background: #dc2626;
            color: #ffffff;
            padding: 25px;
            text-align: center;
        ">

            <h2 style="
                margin: 0;
                font-size: 24px;
            ">
                Blood Bank Management System
            </h2>

            <p style="
                margin: 8px 0 0;
                font-size: 14px;
            ">
                Donor Registration Confirmation
            </p>

        </div>


        {{-- Body --}}
        <div style="padding: 30px;">

            <h3 style="
                margin-top: 0;
                color: #222222;
            ">
                Hello {{ $donor->first_name }} {{ $donor->last_name }},
            </h3>


            <p style="line-height: 1.7;">
                Thank you for registering as a blood donor with
                <strong>Blood Bank Management System</strong>.
            </p>

            <p style="line-height: 1.7;">
                Your donor registration has been successfully received.
                Your contribution can help save lives.
            </p>


            {{-- Donor Details --}}
            <h3 style="
                color: #dc2626;
                border-bottom: 1px solid #eeeeee;
                padding-bottom: 10px;
                margin-top: 30px;
            ">
                Your Donor Details
            </h3>


            <table style="
                width: 100%;
                border-collapse: collapse;
                margin-top: 15px;
            ">

                <tr>
                    <td style="padding: 9px; font-weight: bold;">
                        Donor ID
                    </td>

                    <td style="padding: 9px;">
                        {{ $donor->id }}
                    </td>
                </tr>


                <tr>
                    <td style="padding: 9px; font-weight: bold;">
                        Full Name
                    </td>

                    <td style="padding: 9px;">
                        {{ $donor->first_name }}
                        {{ $donor->last_name }}
                    </td>
                </tr>


                <tr>
                    <td style="padding: 9px; font-weight: bold;">
                        Email
                    </td>

                    <td style="padding: 9px;">
                        {{ $donor->email }}
                    </td>
                </tr>


                <tr>
                    <td style="padding: 9px; font-weight: bold;">
                        Phone
                    </td>

                    <td style="padding: 9px;">
                        {{ $donor->phone }}
                    </td>
                </tr>


                <tr>
                    <td style="padding: 9px; font-weight: bold;">
                        Date of Birth
                    </td>

                    <td style="padding: 9px;">
                        {{ $donor->dob }}
                    </td>
                </tr>


                <tr>
                    <td style="padding: 9px; font-weight: bold;">
                        Gender
                    </td>

                    <td style="padding: 9px;">
                        {{ $donor->gender }}
                    </td>
                </tr>


                <tr>
                    <td style="padding: 9px; font-weight: bold;">
                        Blood Group
                    </td>

                    <td style="
                        padding: 9px;
                        color: #dc2626;
                        font-weight: bold;
                    ">
                        {{ $donor->blood_group }}
                    </td>
                </tr>


                <tr>
                    <td style="padding: 9px; font-weight: bold;">
                        Province
                    </td>

                    <td style="padding: 9px;">
                        {{ $donor->province }}
                    </td>
                </tr>


                <tr>
                    <td style="padding: 9px; font-weight: bold;">
                        District
                    </td>

                    <td style="padding: 9px;">
                        {{ $donor->district }}
                    </td>
                </tr>


                <tr>
                    <td style="padding: 9px; font-weight: bold;">
                        Address
                    </td>

                    <td style="padding: 9px;">
                        {{ $donor->address }}
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
                    margin-top: 15px;
                ">

                    <tr>
                        <td style="padding: 9px; font-weight: bold;">
                            Campaign ID
                        </td>

                        <td style="
                            padding: 9px;
                            color: #dc2626;
                            font-weight: bold;
                        ">
                            {{ $campaign->id }}
                        </td>
                    </tr>


                    <tr>
                        <td style="padding: 9px; font-weight: bold;">
                            Campaign
                        </td>

                        <td style="padding: 9px;">
                            {{ $campaign->title }}
                        </td>
                    </tr>


                    <tr>
                        <td style="padding: 9px; font-weight: bold;">
                            Duration
                        </td>

                        <td style="padding: 9px;">
                            {{ $campaign->duration }}
                        </td>
                    </tr>


                    <tr>
                        <td style="padding: 9px; font-weight: bold;">
                            Time
                        </td>

                        <td style="padding: 9px;">
                            {{ $campaign->day_time }}
                        </td>
                    </tr>


                    <tr>
                        <td style="padding: 9px; font-weight: bold;">
                            Phone
                        </td>

                        <td style="padding: 9px;">
                            {{ $campaign->phone_no }}
                        </td>
                    </tr>


                    <tr>
                        <td style="padding: 9px; font-weight: bold;">
                            Venue
                        </td>

                        <td style="padding: 9px;">
                            {{ $campaign->venue }}
                        </td>
                    </tr>


                    <tr>
                        <td style="padding: 9px; font-weight: bold;">
                            Location
                        </td>

                        <td style="padding: 9px;">
                            {{ $campaign->location }}
                        </td>
                    </tr>

                </table>


                {{-- Campaign URL --}}
                <div style="
                    margin-top: 25px;
                    padding: 18px;
                    background: #fef2f2;
                    border-radius: 8px;
                    text-align: center;
                ">

                    <p style="
                        margin: 0 0 12px;
                        font-weight: bold;
                        color: #991b1b;
                    ">
                        View Campaign Details
                    </p>

                    <a
                        href="{{ url('/campaigns') }}#campaign-{{ $campaign->id }}"
                        style="
                            display: inline-block;
                            background: #dc2626;
                            color: #ffffff;
                            text-decoration: none;
                            padding: 11px 22px;
                            border-radius: 6px;
                            font-weight: bold;
                        "
                    >
                        View Campaign
                    </a>

                </div>

            @endif


            <p style="
                margin-top: 30px;
                line-height: 1.7;
            ">
                Please wait for further confirmation from our blood bank
                administration regarding your donor status.
            </p>


            <p style="line-height: 1.7;">
                Thank you for becoming a blood donor and helping save lives.
            </p>


            <p style="margin-top: 25px;">
                Regards,<br>

                <strong>
                    Blood Bank Management System
                </strong>
            </p>

        </div>


        {{-- Footer --}}
        <div style="
            background: #f9fafb;
            padding: 18px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
        ">

            Blood Bank Management System<br>
            This is an automated email. Please do not reply directly to this email.

        </div>

    </div>

</body>
</html>
