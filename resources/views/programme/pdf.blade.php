<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Programme PDF</title>
    <style>
        body {
            font-family: sans-serif;
        }

        h1 {
            text-align: center;
        }

        .event {
            margin-bottom: 15px;
        }
    </style>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:opsz,wght@16..144,100..700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/autoscroll.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .heroBG {
            background: rgb(255, 255, 255);
            background: -moz-linear-gradient(180deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 1) 100%);
            background: -webkit-linear-gradient(180deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 49%, rgba(255, 255, 255, 1) 100%);
            background: linear-gradient(180deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ffffff", endColorstr="#ffffff", GradientType=1);
        }

        .montagu-slab-h1 {
            font-family: "Montagu Slab", serif;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;
        }

        .tangerine-regular {
            font-family: "Tangerine", serif;
            font-weight: 400;
            font-style: normal;
        }

        .tangerine-bold {
            font-family: "Tangerine", serif;
            font-weight: 700;
            font-style: normal;
        }
    </style>
</head>

<body class="antialiased ">
    <?php
    $GHSBadge = 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('assets/GHS_Badge.png')));
    $badge150 = 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('assets/150Badge.png')));
    ?>
    <div class="flex flex-row items-center px-10 py-5 bg-gray-100">
        <img src="{{ $GHSBadge }}" alt="" class="w-24 mx-auto">
        <h1 class="montagu-slab-h1 text-2xl mb-2 text-center w-full">
            Full Programme</h1>
        <img src="{{ $badge150 }}" alt="" class=" w-32 mx-auto">
    </div>{{-- Grouped Events Listing --}}
    <div class="mx-auto px-4 w-full bg-white rounded-lg">
        @foreach ($grouped as $month => $days)
            <h2 class="text-xl font-bold mt-4">{{ $month }}</h2>
            @foreach ($days as $day => $eventsForDay)
                <h3 class=" pl-3 text-xl font-semibold">{{ $day }}</h3>
                @foreach ($eventsForDay as $event)
                    @include('components.eventCardsForPFD', ['event' => $event])
                    <hr class="border-red-500 my-4">
                @endforeach
            @endforeach
        @endforeach
    </div>
</body>

</html>
