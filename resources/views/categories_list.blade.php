
@if(isset($categories) && $categories->count())
<div class="card mt-5 shadow">
    <div class="card-header">
        <h5>Category List</h5>
    </div>

    <div class="card-body">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Creator</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $cat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->creator }}</td>
                    <td>
                        <button class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $cat->id }}">
                            Delete
                        </button>
                    </td>
                </tr>

                {{-- DELETE MODAL --}}
                <div class="modal fade" id="deleteModal{{ $cat->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title">Confirm Delete</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body text-center">
                                <p><b>Category:</b> {{ $cat->name }}</p>
                                <p><b>Creator:</b> {{ $cat->creator }}</p>
                                <p class="text-danger mt-2">
                                    would you like to delete this category?
                                </p>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary"
                                    data-bs-dismiss="modal">Exit</button>

                                <form action="{{ route('categories.destroy', $cat->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-submit-button text="OK, Delete" type="danger" />
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- END MODAL --}}
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
