@extends('back.dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Categories</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="font-weight-bold text-primary mb-0">All Categories</h6>
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">Add New Category</a>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search categories..." value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary text-white" type="submit">Search</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $categories->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection



