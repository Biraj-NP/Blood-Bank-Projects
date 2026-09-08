<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $title ?? 'NepalBBMS' }}
    </title>


    {{-- Vite --}}

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])


    {{-- Font Awesome --}}

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >

</head>

  {{-- Auto Hide Alert --}}
    <script>
        setTimeout(function () {
            document.querySelectorAll('.alert').forEach(function (alert) {
                alert.style.opacity = '0';

                setTimeout(function () {
                    alert.remove();
                }, 500);
            });
        }, 5000);
    </script>
<body>

    {{-- =========================================
         FIXED NAVBAR
    ========================================== --}}

    <x-navbar />


    {{-- =========================================
         PAGE CONTENT
    ========================================== --}}

    <main class="main-content">

        {{ $slot }}

    </main>


    {{-- =========================================
         FOOTER
    ========================================== --}}

    <footer>

        <x-footer />

    </footer>


</body>

</html>
