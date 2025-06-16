{{-- @extends('layouts.app')

@section('content')
<style>
    h1 {
        margin-bottom: 25px;
        color: #006600;
    }
    form {
        max-width: 600px;
    }
    label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #004d00;
    }
    input[type="text"],
    input[type="number"],
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 8px 10px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 1rem;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    textarea {
        resize: vertical;
    }
    img {
        border-radius: 10px;
        margin-bottom: 15px;
        max-width: 300px;
        height: auto;
    }
    button, a.btn-secondary {
        background-color: #006600;
        color: white;
        border: none;
        padding: 10px 16px;
        border-radius: 6px;
        cursor: pointer;
        text-decoration: none;
        font-weight: 600;
        margin-right: 10px;
    }
    a.btn-secondary {
        background-color: #555;
    }
    small.text-danger {
        color: #d9534f;
        font-size: 0.9rem;
    }
</style>

    <h1>Edit About Section</h1>

    <form action="{{ route('admin.about_sections.update', $aboutSection) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="order">Order (optional)</label>
        <input type="number" name="order" id="order" value="{{ old('order', $aboutSection->order) }}">
        @error('order') <small class="text-danger">{{ $message }}</small> @enderror

        <label for="title">Title (optional)</label>
        <input type="text" name="title" id="title" value="{{ old('title', $aboutSection->title) }}">
        @error('title') <small class="text-danger">{{ $message }}</small> @enderror

        <label for="description">Description (optional)</label>
        <textarea name="description" id="description" rows="5">{{ old('description', $aboutSection->description) }}</textarea>
        @error('description') <small class="text-danger">{{ $message }}</small> @enderror

        <label for="image">Image (optional)</label><br>
        @if($aboutSection->image_path)
            <img src="{{ asset('storage/' . $aboutSection->image_path) }}" alt="Current Image">
            <br>
        @endif
        <input type="file" name="image" id="image">
        @error('image') <small class="text-danger">{{ $message }}</small> @enderror

        <button type="submit">Update Section</button>
        <a href="{{ route('admin.about_sections.index') }}" class="btn-secondary">Cancel</a>
    </form>
@endsection --}}

@extends('layouts.app')

@section('content')
<style>
    .about-container {
        max-width: 700px;
        margin: 30px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .about-container h1 {
        text-align: center;
        margin-bottom: 25px;
        color: #023e8a;
        font-weight: bold;
    }

    .about-form label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #004d00;
    }

    .about-form input[type="text"],
    .about-form input[type="number"],
    .about-form textarea,
    .about-form input[type="file"] {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 16px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        transition: border 0.3s;
    }

    .about-form input:focus,
    .about-form textarea:focus {
        border-color: #0096c7;
        outline: none;
    }

    .about-form textarea {
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

    .about-form button {
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

    .about-form button:hover {
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
    }
</style>

<div class="about-container">
    <h1>Edit About Section</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.about_sections.update', $aboutSection) }}" method="POST" enctype="multipart/form-data" class="about-form">
        @csrf
        @method('PUT')

        <label for="order">Order (optional)</label>
        <input type="number" name="order" id="order" value="{{ old('order', $aboutSection->order) }}">
        @error('order') <small class="text-danger">{{ $message }}</small> @enderror

        <label for="title">Title (optional)</label>
        <input type="text" name="title" id="title" value="{{ old('title', $aboutSection->title) }}">
        @error('title') <small class="text-danger">{{ $message }}</small> @enderror

        <label for="description">Description (optional)</label>
        <textarea name="description" id="description" rows="5">{{ old('description', $aboutSection->description) }}</textarea>
        @error('description') <small class="text-danger">{{ $message }}</small> @enderror

        <div class="current-image">
            <label>Current Image</label><br>
            @if($aboutSection->image_path)
                <img src="{{ asset('storage/' . $aboutSection->image_path) }}" alt="Current Image">
            @else
                <p>No image available.</p>
            @endif
        </div>

        <label for="image">Change Image (optional)</label>
        <input type="file" name="image" id="image">
        @error('image') <small class="text-danger">{{ $message }}</small> @enderror

        <button type="submit">Update Section</button>
    </form>

    <a href="{{ route('admin.about_sections.index') }}" class="btn-secondary">Cancel</a>
</div>
@endsection
