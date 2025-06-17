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
        max-width: 900px;
        margin: 30px auto;
        background: #fff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        color: #333;
    }

    .page-header {
        display: flex;
        justify-content: between;
        align-items: flex-start;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f0f0f0;
    }

    .page-title {
        flex: 1;
    }

    h1 {
        font-size: 32px;
        color: #006d77;
        font-weight: 700;
        margin-bottom: 8px;
        text-transform: capitalize;
    }

    .breadcrumb {
        font-size: 14px;
        color: #666;
        margin-bottom: 20px;
    }

    .breadcrumb a {
        color: #0077b6;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .breadcrumb a:hover {
        color: #023e8a;
    }

    .breadcrumb-separator {
        margin: 0 8px;
        color: #999;
    }

    .action-buttons {
        display: flex;
        gap: 12px;
    }

    .content-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 25px;
    }

    .content-block {
        margin-bottom: 25px;
        line-height: 1.6;
    }

    .label {
        font-weight: 700;
        color: #004d00;
        margin-bottom: 8px;
        display: block;
        font-size: 16px;
    }

    .value {
        color: #333;
        font-size: 15px;
        background: #f8f9fa;
        padding: 12px 15px;
        border-radius: 8px;
        border-left: 4px solid #006d77;
    }

    .hero-image {
        width: 100%;
        max-height: 500px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-top: 10px;
    }

    .no-image {
        background: #f8f9fa;
        border: 2px dashed #ddd;
        border-radius: 12px;
        padding: 40px;
        text-align: center;
        color: #666;
        font-style: italic;
        margin-top: 10px;
    }

    .btn {
        display: inline-block;
        text-decoration: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        font-size: 14px;
        border: none;
        cursor: pointer;
        text-align: center;
    }

    .btn-primary {
        background-color: #16a34a;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0f6831;
        transform: translateY(-2px);
    }

    .btn-danger {
        background-color: #dc2626;
        color: white;
    }

    .btn-danger:hover {
        background-color: #991b1b;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background-color: #0077b6;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #023e8a;
        transform: translateY(-2px);
    }

    .delete-form {
        display: inline;
    }

    .image-section {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 12px;
        margin: 15px 0;
    }

    .timestamp {
        font-size: 13px;
        color: #666;
        font-style: italic;
    }

    .back-button-container {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 2px solid #f0f0f0;
    }

    @media (max-width: 768px) {
        .container {
            margin: 15px;
            padding: 20px;
        }
        
        .page-header {
            flex-direction: column;
            gap: 15px;
        }
        
        .action-buttons {
            width: 100%;
            justify-content: flex-start;
        }
        
        h1 {
            font-size: 24px;
        }
    }
</style>

<div class="container">
    <div class="page-header">
        <div class="page-title">
            <div class="breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <span class="breadcrumb-separator">→</span>
                <a href="{{ route('admin.tips_images.index') }}">Tip Images</a>
                <span class="breadcrumb-separator">→</span>
                <span>View</span>
            </div>
            <h1>{{ $tipsImage->title ?? 'Tip Image Details' }}</h1>
        </div>
        <div class="action-buttons">
            <a href="{{ route('admin.tips_images.edit', $tipsImage) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('admin.tips_images.destroy', $tipsImage) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this hero image?')">Delete</button>
            </form>
        </div>
    </div>

    <div class="content-grid">
        <div class="content-block">
            <span class="label">Title:</span>
            <div class="value">{{ $heroImage->title ?? 'No title provided' }}</div>
        </div>

        <div class="content-block">
            <span class="label">Tips Image:</span>
            <div class="image-section">
                @if ($tipsImage->image_path)
                    <img src="{{ Storage::url($tipsImage->image_path) }}" alt="{{ $tipsImage->title }}" class="tips-image">
                @else
                    <div class="no-image">
                        <p>No image available</p>
                    </div>
                @endif
            </div>
        </div>

       
       

    <div class="back-button-container">
        <a href="{{ route('admin.tips_images.index') }}" class="btn btn-secondary">← Back to Tips Images List</a>
    </div>
</div>
@endsection
