

@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: 30px auto; font-family: Arial, sans-serif;">
    <h1 style="margin-bottom: 24px; color: #1d4ed8; font-weight: 700; font-size: 2rem;">🍹 All Juices</h1>

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; padding: 12px 20px; border-radius: 6px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif
    

    <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
        <a href="{{ route('juices.create') }}" 
           style="background-color: #16a34a; color: white; padding: 10px 16px; border-radius: 6px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" style="height:16px; width:16px; margin-right:6px;" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5V7.5H11.5a.5.5 0 0 1 0 1H8.5V11.5a.5.5 0 0 1-1 0V8.5H4.5a.5.5 0 0 1 0-1H7.5V4.5A.5.5 0 0 1 8 4z"/>
            </svg>
            Add New Juice
        </a>
    </div>

    <div style="overflow-x: auto; box-shadow: 0 0 8px rgba(0,0,0,0.05); border-radius: 8px;">
        <table style="width: 100%; border-collapse: collapse; min-width: 700px;">
            <thead style="background-color: #1e40af; color: white; text-align: left;">
                <tr>
                    <th style="padding: 12px 16px;">Name</th>
                    <th style="padding: 12px 16px;">Description</th>
                    <th style="padding: 12px 16px;">Price (UGX)</th>
                    <th style="padding: 12px 16px;">Image</th>
                    <th style="padding: 12px 16px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($juices as $juice)
                <tr style="border-bottom: 1px solid #e5e7eb;">
                    <td style="padding: 12px 16px;">{{ $juice->name }}</td>
                    <td style="padding: 12px 16px;">{{ $juice->description }}</td>
                    <td style="padding: 12px 16px;">{{ number_format($juice->price) }}</td>
                    <td style="padding: 12px 16px;">
                        @if($juice->image)
                            <img src="{{ asset('storage/' . $juice->image) }}" alt="Juice Image" style="width: 60px; height: 60px; border-radius: 6px; object-fit: cover;">
                        @else
                            <span style="color: #6b7280; font-style: italic;">No image</span>
                        @endif
                    </td>
                    <td style="padding: 12px 16px; white-space: nowrap;">
                        <a href="{{ route('juices.show', $juice) }}" title="View" 
                           style="background-color: #3b82f6; color: white; padding: 6px 10px; border-radius: 4px; margin-right: 6px; text-decoration: none; font-size: 14px;">
                            View
                        </a>
                        <a href="{{ route('juices.edit', $juice) }}" title="Edit" 
                           style="background-color: #facc15; color: black; padding: 6px 10px; border-radius: 4px; margin-right: 6px; text-decoration: none; font-size: 14px;">
                            Edit
                        </a>
                        <form action="{{ route('juices.destroy', $juice) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" 
                                    style="background-color: #ef4444; color: white; padding: 6px 10px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
