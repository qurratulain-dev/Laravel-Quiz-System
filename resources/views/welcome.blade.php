@extends('layouts.app')
@section('title', 'Online Quiz Categories')
@section('meta_description', 'Test your skills by choosing a category - Online Quiz System')

@section('content')
<div class="container mt-5 text-center">
    {{-- HEADING --}}
    <h1>Test Your Skills</h1>

    {{-- SEARCH INPUT --}}
    <div class="my-4">
        <form action="" method="GET">
            <input type="text" name="search" class="form-control mx-auto" style="max-width:400px;" placeholder="Search categories">
        </form>
    </div>

    {{-- CATEGORY TABLE --}}
    <div class="card mt-4 shadow mx-auto" style="max-width:600px;">
        <div class="card-header">
            <h2>Category List</h2>
        </div>

        <div class="card-body p-2">
            <table class="table table-bordered text-center align-middle mb-0" style="font-size:14px;">
                <thead>
                    <tr>
                        <th style="width:10%;">#</th>
                        <th style="width:60%;">Category</th>
                    </tr>
                </thead>

                <tbody>
                    @if (isset($categories) && $categories->count())
                        @foreach ($categories as $cat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cat->name }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center text-danger">No categories available.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
