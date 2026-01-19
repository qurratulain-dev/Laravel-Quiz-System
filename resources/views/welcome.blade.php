@extends('layouts.app')

@section('title', 'Online Quiz System | Test Your Knowledge')
@section('meta_description', 'Attempt free online quizzes, improve your skills, and test your knowlegde with our smart
    quiz system.')
@section('meta_keywords', 'online quiz system, test knowlegde, quiz')
@section('content')

    <h1>Welcome to the Quiz System</h1>
    <p>
        This online quiz system helps users test their knowledge through interactive quizzes.
    </p>
    <a href="{{ route('register') }}" class="btn btn-primary">
        Register
    </a>

    <a href="{{ route('login') }}" class="btn btn-secondary">
        Login
    </a>

@endsection
