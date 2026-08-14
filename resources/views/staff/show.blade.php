@extends('layouts.layouts')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $post->title }}</h3>
                </div>
                <div class="card-body">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid mb-3">
                    @endif
                    <p class="card-text">{{ $post->content }}</p>
                    <a href="{{ route('staff.admin') }}" class="btn btn-secondary">Back to Admin</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection