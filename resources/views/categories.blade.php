@extends('layouts.app')

@section('title', 'Add Quiz Category Management | Admin Control Panel')
@section('md', 'Add and manage quiz categories from the admin control panel. Categories help organize quizzes properly and maintain a clean quiz system.')

@push('head')
    <meta name="robots" content="noindex, nofollow">
     <link rel="canonical" href="{{ url()->current() }}">
@endpush

@section('content')
<div class="container mt-5">
    {{-- ADD CATEGORY FORM --}}
    @include('category_form')

    {{-- CATEGORY LIST --}}
    @include('categories_list')

</div>
@endsection
