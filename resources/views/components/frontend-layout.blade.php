<!DOCTYPE html>
<html lang="en">
@props(['meta_keywords', 'meta_description', 'title'])

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Jawaaf News' }}</title>

    {{-- For Seo --}}
    <meta name="keywords" content="{{ $meta_keywords ?? 'jawaaf news portal, nepali news' }}">
    <meta name="description" content="{{ $meta_description ?? 'Visit Jawaaf News Portal For all News' }}">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="Jawaaf News">
    <link rel="canonical" href="{{ Request::url() }}" />
    <meta property="og:title" content="Full Stack Web Development in Laravel" />
    <meta property="og:site_name" content="Jawaaf" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:image" content="https://codeit.com.np/storage/01JJRB1M327JZ61EWXDSGQS9W9.avif" />
    <meta property="og:description"
        content="Join the best Laravel Training in Nepal at Code IT! Learn Laravel Framework from industry experts and build dynamic web applications. Enroll now for hands-on web development training" />
    <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "WebSite",
              "name": "Code IT",
              "url": "https://codeit.com.np/",
              "logo": "https://codeit.com.np/storage/01JJ6HWH8RP35HYNCEBFXVYZKF.png",
            }
        </script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=64a5157b9c5ef40019022723&product=image-share-buttons'
        async='async'></script>
</head>

<body>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v22.0">
    </script>

    <header class="sticky top-0 bg-white z-50">
        <x-frontend-navbar />
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer></footer>
</body>

</html>
