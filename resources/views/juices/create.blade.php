@extends('layouts.app')

@section('content')
<style>
    .juice-container {
        max-width: 700px;
        margin: 30px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .juice-container h1 {
        text-align: center;
        margin-bottom: 25px;
        color: #006d77;
        font-weight: bold;
    }

    .juice-form label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
    }

    .juice-form input,
    .juice-form textarea {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 16px;
        transition: border 0.3s;
    }

    .juice-form input:focus,
    .juice-form textarea:focus {
        border-color: #00b4d8;
        outline: none;
    }

    .juice-form button {
        width: 100%;
        padding: 12px;
        background-color: #38b000;
        color: white;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .juice-form button:hover {
        background-color: #2d6a4f;
    }

    .alert-danger {
        background-color: #f8d7da;
        border-left: 4px solid #dc3545;
        padding: 12px 16px;
        margin-bottom: 20px;
        border-radius: 8px;
        color: #842029;
    }

    .alert-danger ul {
        margin-bottom: 0;
        padding-left: 20px;
    }
</style>

<div class="juice-container">
    <h1>Add New Juice</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('juices.store') }}" method="POST" enctype="multipart/form-data" class="juice-form">
        @csrf

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Description</label>
        <textarea name="description" rows="4"></textarea>

        <label>Price (UGX)</label>
        <input type="number" name="price" required>

        <label>Image</label>
        <input type="file" name="image">

        <button type="submit">Create Juice</button>
    </form>
    <a href="{{ route('juices.index') }}" class="back-link">← Back to Juice List</a>
</div>
@endsection
