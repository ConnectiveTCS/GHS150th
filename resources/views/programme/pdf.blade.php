<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Programme PDF</title>
    <!-- Tailwind and font imports -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montagu+Slab:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap" rel="stylesheet">

    <!-- External Tailwind stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Enhanced inline styles */
        body {
            @apply font-sans bg-gray-50 text-gray-800;
        }

        header {
            @apply flex items-center justify-between px-10 py-6 bg-gradient-to-r from-blue-500 to-indigo-500 text-white shadow-lg;
        }

        header h1 {
            @apply text-3xl font-bold;
        }

        main {
            @apply max-w-4xl mx-auto p-6 bg-white rounded-lg my-8 shadow;
        }

        section {
            @apply my-6;
        }

        h2 {
            @apply text-2xl border-b-2 border-indigo-300 pb-2 mb-4;
        }

        h3 {
            @apply text-xl font-medium pl-3 my-2;
        }

        .event {
            @apply my-4 p-4 border-l-4 border-blue-300 bg-blue-50 rounded;
        }

        hr {
            @apply border-t-2 border-dashed border-gray-200;
        }
    </style>
</head>

<body>
    <header>
        <h1>Full Programme</h1>
    </header>
    <main>
        @foreach ($grouped as $month => $days)
            <section>
                <h2>{{ $month }}</h2>
                @foreach ($days as $day => $eventsForDay)
                    <article>
                        <h3>{{ $day }}</h3>
                        @foreach ($eventsForDay as $event)
                            @include('components.eventCardsForPFD', ['event' => $event])
                            <hr>
                        @endforeach
                    </article>
                @endforeach
            </section>
        @endforeach
    </main>
</body>

</html>
