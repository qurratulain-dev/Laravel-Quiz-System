@extends('layouts.app')

@section('title', 'User Dashboard')
@section('md', 'Access your personal dashboard in the Online Quiz System to manage your profile and track quiz activity.')

@push('head')
    {{-- Robots --}}
    <meta name="robots" content="noindex, nofollow">
    <link rel="canonical" href="{{ url()->current() }}">
@endpush

@section('content')
<div class="container mt-5">

    {{-- MAIN HEADING --}}
    <h1>Welcome, {{ auth()->user()->name }}!</h1>

    <p>This is your dashboard where you can manage your quizzes and profile.</p>

    
</div>
@endsection
