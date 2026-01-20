@extends('layouts.app')

@section('title', 'Edit Question')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-6">

            <x-card title="Edit Question">
                <div class="text-success text-center mt-2">
                    Quiz: {{ $question->quiz->name  }} <br>
                    Category: {{ $question->quiz->category->name}}
                </div>

                <form action="{{ route('questions.update', $question->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <textarea name="question" class="form-control @error('question') is-invalid @enderror"
                            placeholder="Enter your question here">{{ old('question', $question->question_text) }}</textarea>
                        <x-input-error name="question" />
                    </div>

                    <div class="mb-2">
                        <x-input name="option1" value="{{ old('option1', $question->option1) }}" placeholder="Enter first option" />
                        <x-input-error name="option1" />
                    </div>

                    <div class="mb-2">
                        <x-input name="option2" value="{{ old('option2', $question->option2) }}" placeholder="Enter second option" />
                        <x-input-error name="option2" />
                    </div>

                    <div class="mb-2">
                        <x-input name="option3" value="{{ old('option3', $question->option3) }}" placeholder="Enter third option" />
                        <x-input-error name="option3" />
                    </div>

                    <div class="mb-3">
                        <x-input name="option4" value="{{ old('option4', $question->option4) }}" placeholder="Enter fourth option" />
                        <x-input-error name="option4" />
                    </div>

                    <div class="mb-3">
                        <select name="correct_option" class="form-select @error('correct_option') is-invalid @enderror">
                            <option value="">Select Correct Answer</option>
                            @for($i=1; $i<=4; $i++)
                                <option value="{{ $i }}" {{ old('correct_option', $question->correct_option) == $i ? 'selected' : '' }}>
                                    Option {{ $i }}
                                </option>
                            @endfor
                        </select>
                        <x-input-error name="correct_option" />
                    </div>

                    <div class="d-flex justify-content-between mx-4 ">
                        <x-submit-button text="Update Question" type="primary" name="action" value="update" />
                    </div>
                </form>
            </x-card>

        </div>
    </div>
</div>
@endsection
