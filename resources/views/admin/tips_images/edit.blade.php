@extends('layouts.app')

@section('content')
<style>
    .hero-container {
        max-width: 700px;
        margin: 30px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .hero-container h1 {
        text-align: center;
        margin-bottom: 25px;
        color: #023e8a;
        font-weight: bold;
    }

    .hero-container .breadcrumb {
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 20px;
        text-align: left;
    }

    .hero-container .breadcrumb a {
        text-decoration: none;
        color: #3b82f6;
    }

    .hero-container .breadcrumb span {
        color: #111827;
    }

    .hero-form label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #004d00;
    }

    .hero-form input[type="text"],
    .hero-form textarea,
    .hero-form input[type="file"] {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 16px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        transition: border 0.3s;
    }

    .hero-form input:focus,
    .hero-form textarea:focus {
        border-color: #0096c7;
        outline: none;
    }

    .hero-form textarea {
        resize: vertical;
    }

    .current-image {
        margin-bottom: 20px;
    }

    .current-image img {
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        margin-top: 10px;
        max-width: 300px;
        height: auto;
        display: block;
    }

    .hero-form button {
        width: 100%;
        padding: 12px;
        background-color: #0077b6;
        color: white;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .hero-form button:hover {
        background-color: #023e8a;
    }

    a.btn-secondary {
        display: inline-block;
        background-color: #555;
        color: white;
        padding: 10px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        margin-top: 10px;
        transition: background-color 0.3s;
    }

    a.btn-secondary:hover {
        background-color: #333;
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

    small.text-danger {
        color: #d9534f;
        font-size: 0.9rem;
        display: block;
        margin-bottom: 10px;
    }
</style>

<div class="hero-container">
    <h1>Edit Tips Image</h1>

    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Dashboard</a> / 
        <a href="{{ route('admin.tips_images.index') }}">Tips Images</a> / 
        <span>Edit</span>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.tips_images.update', $tipsImage) }}" method="POST" enctype="multipart/form-data" class="hero-form">
        @csrf
        @method('PUT')

        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $tipsImage->title) }}">
        @error('title') <small class="text-danger">{{ $message }}</small> @enderror

        <div class="current-image">
            <label>Current Image</label><br>
            @if($tipsImage->image_path)
                <img src="{{ Storage::url($tipsImage->image_path) }}" alt="{{ $tipsImage->title }}">
            @else
                <p>No image available.</p>
            @endif
        </div>

        <label for="image">Change Image (optional)</label>
        <input type="file" name="image" id="image">
        @error('image') <small class="text-danger">{{ $message }}</small> @enderror

        <button type="submit">Update Tips Image</button>
    </form>

    <a href="{{ route('admin.tips_images.index') }}" class="btn-secondary">Cancel</a>
</div>
@endsection
