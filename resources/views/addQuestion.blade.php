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
                <x-card title="Add MCQs">
                    <div class="text-success text-center mt-2">
                        Quiz: {{ $quiz->name }}
                    </div>
                    <form action="{{ route('questions.store', $quiz->id) }}" method="POST">
                        @csrf

                        {{-- Question --}}
                        <div class="mb-3">
                            <textarea name="question" class="form-control @error('question') is-invalid @enderror"
                                placeholder="Enter your question here">{{ old('question') }}</textarea>
                            <x-input-error name="question" />
                        </div>
                        {{-- Options --}}
                        <div class="mb-2">
                            <x-input name="option1" placeholder="Enter first option" />
                            <x-input-error name="option1" />
                        </div>

                        <div class="mb-2">
                            <x-input name="option2" placeholder="Enter second option" />
                            <x-input-error name="option2" />
                        </div>

                        <div class="mb-2">
                            <x-input name="option3" placeholder="Enter third option" />
                            <x-input-error name="option3" />
                        </div>

                        <div class="mb-3">
                            <x-input name="option4" placeholder="Enter fourth option" />
                            <x-input-error name="option4" />
                        </div>

                        {{-- Correct Answer Select --}}
                        <div class="mb-3">
                            <select name="correct_option" class="form-select @error('correct_option') is-invalid @enderror">
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
                            <x-input-error name="correct_option" />
                        </div>
                        {{-- Submit --}}
                        <div class="d-flex justify-content-between mx-4 ">
                            <x-submit-button text="Add Question" type="primary" name="action" value="add-More" />
                            <x-submit-button text="Add & Submit" name="action" value="done" />
                        </div>

                    </form>
                </x-card>
            </div>
        </div>
    </div>
@endsection
