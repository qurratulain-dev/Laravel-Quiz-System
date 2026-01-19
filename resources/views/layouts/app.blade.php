<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- SEO Title -->
    <title>@yield('title','Online Quiz System')</title>
    <!-- SEO Meta Description -->
    <meta name="description" content="@yield('meta_description', 'Attempt online quizzes and test your knowledge with our smart quiz system')">
    <!-- SEO Keywords -->
    <meta name="keywords" content="@yield('meta_keywords','online quiz, quiz system, test knowledge')">
    <!-- SEO Robots -->
    <meta name="robots" content="index,follow">
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!--Mobile SEO  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title','Online Quiz System')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:type" content="website">
</head>
<body>
    @include('components.header')

    @yield('content')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
