@extends('layouts.app')

@section('content')
    <h1>Stocks</h1>
    <a href="{{ route('stocks.create') }}" class="btn btn-primary">Add New Stock</a>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td>{{ $stock->product->name }}</td>
                    <td>{{ $stock->quantity }}</td>
                    <td>{{ $stock->unit }}</td>
                    <td>
                        <a href="{{ route('stocks.edit', $stock) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('stocks.destroy', $stock) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection