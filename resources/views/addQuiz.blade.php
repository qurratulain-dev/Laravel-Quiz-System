@extends('layouts.app')
@section('title', 'Add New Quiz - Admin Panel')
@section('md','Create a new quiz by selecting a category from the admin panel and efficiently manage quizzes.')

@push('head')
    <meta name="robots" content="noindex, nofollow">
    <link rel="canonical" href="{{ url()->current() }}">
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center "style="margin-top:70px;">
            <div class="col-md-4">
                {{-- Add Quiz Card --}}
                <x-card title="Add Quiz">
                    <form action="{{ route('quizzes.store') }}" method="POST">

                        @csrf
                        {{-- Quiz Name --}}
                        <div class="mb-3">
                            <x-input name="quiz_name" placeholder="Enter quiz name" />
                            <x-input-error name="quiz_name" />
                        </div>

                        {{-- Category Select --}}
                        <div class="mb-3">
                            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error name="category_id" />
                        </div>

                        {{-- Submit Button --}}
                        <x-submit-button text="Add Quiz" type="primary" />
                    </form>
                </x-card>
            </div>
        </div>
    </div>
@endsection
