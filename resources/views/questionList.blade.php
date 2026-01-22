@extends('layouts.app')

@section('title', 'Question List')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">{{ $quiz->name }}</h5>
                            <small class="text-muted">
                                Category: {{ $quiz->category->name }}
                            </small>
                        </div>

                        <a href="{{ route('questions.create', $quiz->id) }}" class="btn btn-sm btn-primary">
                            + Add More Questions </a>
                    </div>

                    <div class="card-body">
                        @if ($questions->count())
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>Correct Option</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $key => $question)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $question->question_text }}</td>
                                            <td>{{ $question->{'option' . $question->correct_option} }}</td>
                                            <td class="text-center">
                                                 <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('questions.edit', $question->id) }}"
                                                    class="btn btn-warning"> Edit </a>

                                                <form action="{{ route('questions.destroy', $question->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-submit-button text="Delete" type="danger" onclick="return confirm('Are you sure?')"/>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center text-muted">
                                No questions added yet.
                            </p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
