@extends('layouts.app')

@section('title', 'Quiz List')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header">
            <h5>Category: {{ $category->name }}</h5>
        </div>

        <div class="card-body">
            @if($category->quizzes->count())
            <table class="table table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Quiz ID</th>
                        <th>Quiz Name</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($category->quizzes as $quiz)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $quiz->id }}</td>
                        <td>{{ $quiz->name }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('questions.index', $quiz->id) }}"
                               class="btn btn-sm btn-info">
                               View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p class="text-center text-danger">
                    No quizzes found in this category
                </p>
            @endif
        </div>
    </div>
</div>
@endsection
