<div class="row justify-content-center">
        <div class="col-md-4">

            {{-- Success message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Add Category Card --}}
            <div class="card shadow">
                <div class="card-header text-center">
                    <h3>Add Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf

                        {{-- Category Name --}}
                        <div class="my-3">
                            <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" 
                                placeholder="Enter category name" value="{{ old('category') }}">
                            @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success w-100">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>

    </div>