@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Juice</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('juices.update', $juice) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $juice->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $juice->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Price (UGX)</label>
            <input type="number" name="price" value="{{ $juice->price }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>
            @if($juice->image)
                <img src="{{ asset('storage/' . $juice->image) }}" width="100" alt="Juice Image">
            @else
                No image
            @endif
        </div>

        <div class="mb-3">
            <label>Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">Update Juice</button>
    </form>
</div>
@endsection
