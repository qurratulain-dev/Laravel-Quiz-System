@extends('layouts.app')

@section('title', 'User Dashboard')
@section('meta_description', 'User Dashboard - Online Quiz System')

@section('content')
<div class="container mt-5">
    <h1>Welcome, {{ auth()->user()->name }}!</h1>
    <p>This is your dashboard.</p>
</div>
@endsection
