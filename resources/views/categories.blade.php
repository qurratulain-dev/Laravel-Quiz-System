@extends('layouts.app')

@section('title', 'Add Category')

@section('content')
<div class="container mt-5">

    {{-- ADD CATEGORY FORM --}}
    @include('category_form')

    {{-- CATEGORY LIST --}}
    @include('categories_list')

</div>
@endsection
