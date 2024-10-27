@extends('back.dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Create Category</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Category</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <button type="submit" class="btn btn-primary">Create Category</button>
            </form>
        </div>
    </div>
</div>
@endsection