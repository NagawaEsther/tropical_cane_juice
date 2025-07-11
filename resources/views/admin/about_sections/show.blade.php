
@extends('layouts.app')

@section('content')
<style>
    * {
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 30px auto;
        background: #fff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        color: #333;
    }

    h1 {
        font-size: 32px;
        color: #006d77;
        font-weight: 700;
        margin-bottom: 20px;
        text-transform: capitalize;
    }

    .content-block {
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .label {
        font-weight: 700;
        color: #004d00;
        margin-bottom: 8px;
        display: block;
    }

    img {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 25px;
    }

    .back-link, .edit-link {
        display: inline-block;
        text-decoration: none;
        padding: 10px 18px;
        border-radius: 8px;
        font-weight: 600;
        transition: background-color 0.3s ease;
        margin-right: 12px;
        color: white;
    }

    .back-link {
        background-color: #0077b6;
    }

    .back-link:hover {
        background-color: #023e8a;
    }

    .edit-link {
        background-color: #16a34a;
    }

    .edit-link:hover {
        background-color: #0f6831;
    }
</style>

<div class="container">
    <h1>{{ $aboutSection->title ?? 'Untitled Section' }}</h1>

    <div class="content-block">
        <span class="label">Order:</span>
        <span>{{ $aboutSection->order ?? '-' }}</span>
    </div>

    <div class="content-block">
        <span class="label">Description:</span>
        <p>{{ $aboutSection->description ?? '-' }}</p>
    </div>

    <div class="content-block">
        <span class="label">Image:</span>
        @if($aboutSection->image_path)
            <img src="{{ asset('storage/' . $aboutSection->image_path) }}" alt="About Section Image">
        @else
            <p>No image uploaded.</p>
        @endif
    </div>

    <a href="{{ route('admin.about_sections.edit', $aboutSection) }}" class="edit-link">Edit</a>
    <a href="{{ route('admin.about_sections.index') }}" class="back-link">← Back to About Sections List</a>
</div>
@endsection
