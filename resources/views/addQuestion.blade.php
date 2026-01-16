@extends('layouts.app')
@section('title', 'Add MCQs')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-6">

                {{-- Success message --}}
                @if (session('success'))
                    <x-alert type="success" :message="session('success')" />
                @endif

                {{-- Add Question Card --}}
                <div class="card shadow">

                    <div class="text-success text-center mt-2">
                        Quiz: {{ $quiz->name }}
                    </div>

                    <div class="card-header text-center">
                        <h3>Add MCQs</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('questions.store', $quiz->id) }}" method="POST">
                            @csrf

                            {{-- Question --}}
                            <div class="mb-3">
                                <textarea name="question" class="form-control @error('question') is-invalid @enderror"
                                    placeholder="Enter your question here">{{ old('question') }}</textarea>

                                @error('question')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- Options --}}
                            <div class="mb-2">
                                <input type="text" name="option1"
                                    class="form-control @error('option1') is-invalid @enderror"
                                    placeholder="Enter first option" value="{{ old('option1') }}">

                                @error('option1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <input type="text" name="option2"
                                    class="form-control @error('option2') is-invalid @enderror"
                                    placeholder="Enter second option" value="{{ old('option2') }}">

                                @error('option2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <input type="text" name="option3"
                                    class="form-control @error('option3') is-invalid @enderror"
                                    placeholder="Enter third option" value="{{ old('option3') }}">

                                @error('option3')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="text" name="option4"
                                    class="form-control @error('option4') is-invalid @enderror"
                                    placeholder="Enter fourth option" value="{{ old('option4') }}">
                                @error('option4')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Correct Answer Select --}}
                            <div class="mb-3">
                                <select name="correct_option"
                                    class="form-select @error('correct_option') is-invalid @enderror">
                                    <option value="">Select Correct Answer</option>
                                    <option value="1" {{ old('correct_option') == 1 ? 'selected' : '' }}>Option 1
                                    </option>
                                    <option value="2" {{ old('correct_option') == 2 ? 'selected' : '' }}>Option 2
                                    </option>
                                    <option value="3" {{ old('correct_option') == 3 ? 'selected' : '' }}>Option 3
                                    </option>
                                    <option value="4" {{ old('correct_option') == 4 ? 'selected' : '' }}>Option 4
                                    </option>
                                </select>
                                @error('correct_option')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="d-flex justify-content-between mx-4 ">
                                <x-submit-button text="Add Question" type="primary" name="action" value="add-More" />
                                <x-submit-button text="Add & Submit" name="action"  value="done" />
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
