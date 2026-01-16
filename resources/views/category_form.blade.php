<div class="row justify-content-center">
    <div class="col-md-4">
        {{-- Success message --}}
        @if (session('success'))
            <x-alert type="success" :message="session('success')" id="testing" />
        @endif

        {{-- Add Category Card --}}
        <x-card title="Add Category">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                {{-- Category Name --}}
                <div class="my-3">
                    <x-input name="category" placeholder="Enter category name" />
                    <x-input-error name="category" />
                </div>

                {{-- Submit Button --}}
                <x-submit-button text="Add Category" />
            </form>
        </x-card>
    </div>
