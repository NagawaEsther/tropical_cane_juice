@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Juices</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('juices.create') }}" class="btn btn-primary mb-3">Add New Juice</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price (UGX)</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($juices as $juice)
            <tr>
                <td>{{ $juice->name }}</td>
                <td>{{ $juice->description }}</td>
                <td>{{ number_format($juice->price) }}</td>
                <td>
                    @if($juice->image)
                        <img src="{{ asset('storage/' . $juice->image) }}" width="60" height="60" alt="Juice Image">
                    @else
                        No image
                    @endif
                </td>
                <td>
                    <a href="{{ route('juices.edit', $juice) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('juices.destroy', $juice) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
