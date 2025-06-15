@extends('frontend.layout')

@section('content')
<h2>Our Juices</h2>

<div class="row">
@foreach($juices as $juice)
  <div class="col-md-4 mb-4">
    <div class="card h-100">
      <img src="{{ asset('storage/' . $juice->image) }}" class="card-img-top" alt="{{ $juice->name }}">
      <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $juice->name }}</h5>
        <p class="card-text">{{ $juice->description }}</p>
        <p class="fw-bold">${{ number_format($juice->price, 2) }}</p>
        <a href="https://wa.me/yourwhatsappnumber?text=I%20want%20to%20order%20the%20{{ urlencode($juice->name) }}" target="_blank" class="btn btn-success mt-auto">Order via WhatsApp</a>
      </div>
    </div>
  </div>
@endforeach
</div>
@endsection
