

@extends('frontend.layout')

@section('content')
<div style="max-width: 1200px; margin: auto; padding: 20px;">
    <h1 style="text-align: center; margin-bottom: 40px;">Our Juices</h1>

    <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
        @forelse($juices as $juice)
            <div style="border: 1px solid #ccc; border-radius: 10px; padding: 15px; width: 280px; text-align: center; box-shadow: 2px 2px 5px rgba(0,0,0,0.1);">
                @if($juice->image)
                    <img src="{{ asset('storage/' . $juice->image) }}" alt="{{ $juice->name }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px;">
                @else
                    <p>No image available</p>
                @endif

                <h3 style="margin: 15px 0 5px;">{{ $juice->name }}</h3>
                <p style="font-size: 14px; color: #555;">{{ $juice->description }}</p>
                <p style="margin-top: 10px; font-weight: bold;">UGX {{ number_format($juice->price) }}</p>
            </div>
        @empty
            <p>No juices found.</p>
        @endforelse
    </div>
</div>

@include('frontend.footer')

@endsection
