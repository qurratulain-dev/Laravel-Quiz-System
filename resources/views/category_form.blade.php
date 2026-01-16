<div class="row justify-content-center">
        <div class="col-md-4">
            {{-- Success message --}}
            @if(session('success'))
                <x-alert type="success" :message="session('success')" id="testing"/>
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

                        {{-- Submit Button --}} <x-submit-button text="Add Category"/>
                      
                    </form>
                </div>
            </div>

    </div>