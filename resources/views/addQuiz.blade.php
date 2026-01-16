@extends('layouts.app')
@section('title', 'Add Quiz')

@section('content')
    <div class="container">
        <div class="row justify-content-center "style="margin-top:70px;">
            <div class="col-md-4">
                {{-- Add Quiz Card --}}
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h3>Add Quiz</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('quizzes.store') }}" method="POST">
                            @csrf

                            {{-- Quiz Name --}}
                            <div class="mb-3">
                                <input type="text" name="quiz_name"
                                    class="form-control @error('quiz_name') is-invalid @enderror"
                                    placeholder="Enter quiz name" value="{{ old('quiz_name') }}">

                                @error('quiz_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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

                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Submit Button --}}
                             <x-submit-button text="Add Quiz" type="primary"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
