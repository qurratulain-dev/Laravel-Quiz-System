@extends('layouts.app')

@section('title', 'Online Quiz System')
@section('md', 'Explore and test your skills by choosing a category in our Online Quiz System.')

@section('content')

{{-- HERO --}}
<div class="py-5 text-center text-white"
     style="background: linear-gradient(135deg, #667eea, #764ba2);">
    <div class="container">
        <h1 class="fw-bold display-6 mb-2">🎯 Test Your Skills</h1>
        <p class="mb-0 opacity-75">Choose a category and start your quiz journey</p>
    </div>
</div>

<div class="container my-5">

    {{-- CATEGORY --}}
    <div class="card shadow-lg border-0 mx-auto" style="max-width:750px;">
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 fw-semibold">📚 Available Categories</h4>
        </div>

        <div class="card-body p-0">
            <table class="table table-hover text-center align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Quizzes</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $cat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ route('categories.questions', $cat->id) }}"
                                   class="fw-semibold text-decoration-none">
                                    {{ $cat->name }}
                                </a>
                            </td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $cat->quizzes_count }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-danger py-4">
                                No categories found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection