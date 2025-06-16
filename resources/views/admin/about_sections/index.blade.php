{{-- @extends('layouts.app')

@section('content')
<style>
    h1 {
        margin-bottom: 30px;
        color: #006600;
    }
    a.btn {
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 40px;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 12px 15px;
        text-align: left;
        vertical-align: middle;
    }
    th {
        background-color: #f9f9f9;
        color: #006600;
    }
    img {
        border-radius: 8px;
    }
    .btn-info {
        background-color: #17a2b8;
        color: white;
        text-decoration: none;
        padding: 6px 12px;
        border-radius: 4px;
    }
    .btn-warning {
        background-color: #ffc107;
        color: black;
        text-decoration: none;
        padding: 6px 12px;
        border-radius: 4px;
    }
    .btn-danger {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 4px;
        cursor: pointer;
    }
    form {
        display: inline;
    }
</style>

    <h1>About Sections</h1>

    <a href="{{ route('admin.about_sections.create') }}" class="btn btn-primary">Add New Section</a>

    @if(session('success'))
        <div style="margin-top:15px; padding:10px; background:#d4edda; color:#155724; border-radius:5px;">
            {{ session('success') }}
        </div>
    @endif

    @if($sections->count())
        <table>
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th style="min-width:150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sections as $section)
                    <tr>
                        <td>{{ $section->order ?? '-' }}</td>
                        <td>{{ $section->title ?? '-' }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($section->description, 50) ?? '-' }}</td>
                        <td>
                            @if($section->image_path)
                                <img src="{{ asset('storage/' . $section->image_path) }}" alt="Image" style="width: 100px; height: auto;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.about_sections.show', $section) }}" class="btn-info">View</a>
                            <a href="{{ route('admin.about_sections.edit', $section) }}" class="btn-warning">Edit</a>
                            <form action="{{ route('admin.about_sections.destroy', $section) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this section?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No about sections found.</p>
    @endif
@endsection --}}

@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: 30px auto; font-family: Arial, sans-serif;">

    <h1 style="margin-bottom: 24px; color: #1d4ed8; font-weight: 700; font-size: 2rem;">About Sections</h1>

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; padding: 12px 20px; border-radius: 6px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
        <a href="{{ route('admin.about_sections.create') }}" 
           style="background-color: #16a34a; color: white; padding: 10px 16px; border-radius: 6px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" style="height:16px; width:16px; margin-right:6px;" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5V7.5H11.5a.5.5 0 0 1 0 1H8.5V11.5a.5.5 0 0 1-1 0V8.5H4.5a.5.5 0 0 1 0-1H7.5V4.5A.5.5 0 0 1 8 4z"/>
            </svg>
            Add New Section
        </a>
    </div>

    <div style="overflow-x: auto; box-shadow: 0 0 8px rgba(0,0,0,0.05); border-radius: 8px;">
        @if($sections->count())
        <table style="width: 100%; border-collapse: collapse; min-width: 700px;">
            <thead style="background-color: #1e40af; color: white; text-align: left;">
                <tr>
                    <th style="padding: 12px 16px;">Order</th>
                    <th style="padding: 12px 16px;">Title</th>
                    <th style="padding: 12px 16px;">Description</th>
                    <th style="padding: 12px 16px;">Image</th>
                    <th style="padding: 12px 16px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sections as $section)
                <tr style="border-bottom: 1px solid #e5e7eb;">
                    <td style="padding: 12px 16px;">{{ $section->order ?? '-' }}</td>
                    <td style="padding: 12px 16px;">{{ $section->title ?? '-' }}</td>
                    <td style="padding: 12px 16px;">{{ \Illuminate\Support\Str::limit($section->description, 50) ?? '-' }}</td>
                    <td style="padding: 12px 16px;">
                        @if($section->image_path)
                            <img src="{{ asset('storage/' . $section->image_path) }}" alt="Image" style="width: 60px; height: 60px; border-radius: 6px; object-fit: cover;">
                        @else
                            <span style="color: #6b7280; font-style: italic;">No image</span>
                        @endif
                    </td>
                    <td style="padding: 12px 16px; white-space: nowrap;">
                        <a href="{{ route('admin.about_sections.show', $section) }}" title="View" 
                           style="background-color: #3b82f6; color: white; padding: 6px 10px; border-radius: 4px; margin-right: 6px; text-decoration: none; font-size: 14px;">
                            View
                        </a>
                        <a href="{{ route('admin.about_sections.edit', $section) }}" title="Edit" 
                           style="background-color: #facc15; color: black; padding: 6px 10px; border-radius: 4px; margin-right: 6px; text-decoration: none; font-size: 14px;">
                            Edit
                        </a>
                        <form action="{{ route('admin.about_sections.destroy', $section) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this section?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    style="background-color: #ef4444; color: white; padding: 6px 10px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p style="color:#6b7280; font-style: italic;">No about sections found.</p>
        @endif
    </div>
</div>
@endsection
