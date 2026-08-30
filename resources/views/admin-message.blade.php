<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subjectText }}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f4f7fb;
            font-family: Arial, Helvetica, sans-serif;
            color: #374151;
        }

        .email-wrapper {
            width: 100%;
            padding: 40px 15px;
        }

        .email-container {
            max-width: 650px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            padding: 35px 30px;
            text-align: center;
            color: #ffffff;
        }

        .logo {
            width: 65px;
            height: 65px;
            margin: 0 auto 15px;
            background: #ffffff;
            color: #dc2626;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: bold;
        }

        .header h1 {
            margin: 0;
            font-size: 25px;
            font-weight: 700;
        }

        .header p {
            margin: 10px 0 0;
            font-size: 14px;
            color: #fee2e2;
        }

        /* Content */
        .content {
            padding: 40px 35px;
        }

        .content h2 {
            margin: 0 0 20px;
            color: #111827;
            font-size: 23px;
            line-height: 1.4;
        }

        .message-box {
            background: #fef2f2;
            border-left: 5px solid #dc2626;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .message-box p {
            margin: 0;
            font-size: 16px;
            line-height: 1.8;
            color: #4b5563;
            white-space: pre-line;
        }

        .cta-box {
            text-align: center;
            margin: 30px 0 10px;
        }

        .cta-button {
            display: inline-block;
            padding: 13px 25px;
            background: #dc2626;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
        }

        .cta-button:hover {
            background: #b91c1c;
        }

        /* Blood donation section */
        .donation-box {
            margin-top: 30px;
            padding: 20px;
            background: #fff7ed;
            border-radius: 10px;
            text-align: center;
        }

        .donation-box h3 {
            margin: 0 0 8px;
            color: #c2410c;
            font-size: 18px;
        }

        .donation-box p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            background: #111827;
            padding: 25px 20px;
            text-align: center;
            color: #9ca3af;
        }

        .footer strong {
            color: #ffffff;
        }

        .footer p {
            margin: 5px 0;
            font-size: 13px;
            line-height: 1.6;
        }

        .footer .copyright {
            margin-top: 15px;
            color: #6b7280;
            font-size: 12px;
        }

        /* Mobile */
        @media only screen and (max-width: 600px) {
            .email-wrapper {
                padding: 20px 10px;
            }

            .header {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 21px;
            }

            .content {
                padding: 30px 20px;
            }

            .content h2 {
                font-size: 20px;
            }

            .message-box p {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>

<div class="email-wrapper">

    <div class="email-container">

        <!-- Header -->
        <div class="header">

            <div class="logo">
                🩸
            </div>

            <h1>Blood Bank Management System</h1>

            <p>रक्तदान गरौँ, जीवन बचाऔँ ❤️</p>

        </div>


        <!-- Main Content -->
        <div class="content">

            <h2>{{ $subjectText }}</h2>

            <div class="message-box">
                <p>{{ $messageText }}</p>
            </div>


            <!-- CTA -->
            <div class="cta-box">
                <a href="{{ url('/') }}" class="cta-button">
                    🌐 हाम्रो वेबसाइट हेर्नुहोस्
                </a>
            </div>


            <!-- Donation Message -->
            <div class="donation-box">

                <h3>❤️ तपाईंको एक कदम, कसैको जीवन</h3>

                <p>
                    रक्तदान एक महान मानवीय सेवा हो।
                    तपाईंले दान गर्नुभएको रगतले आवश्यक परेको व्यक्तिको
                    जीवन बचाउन महत्वपूर्ण भूमिका खेल्न सक्छ।
                </p>

            </div>

        </div>


        <!-- Footer -->
        <div class="footer">

            <p>
                <strong>Blood Bank Management System</strong>
            </p>

            <p>
                रक्तदान गरौँ, जीवन बचाऔँ।
            </p>

            <p class="copyright">
                © {{ date('Y') }} Blood Bank Management System.
                All rights reserved.
            </p>

        </div>

    </div>

</div>

</body>
</html>
