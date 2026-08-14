@extends('layouts.layouts') 
@section('content')
@if(auth()->guard('admin')->check())
    <div class="container-fluid d-flex justify-content-end align-items-center ">
        <div class="d-flex align-items-end justify-content-end p-3">
            <span class="text-white me-3">Welcome, {{ auth()->guard('admin')->user()?->name ?? 'Admin' }}</span>
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-primary btn-sm">Logout</button>
            </form>
         </div>
        <a href="{{ route('staff.create') }}" class="text-white text-decoration-none">
            <button class="btn btn-md btn-primary d-flex align-items-center justify-content-center">+ Create Post</button>
        </a>
    </div>
@endif

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if ($posts->count())
    <!-- Display posts here -->
    @foreach ($posts as $post )
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid" width="70%" height="80%">
                @endif
                <a href="{{ $post->location }}" class="d-flex justify-content-start mt-3 align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-map-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.5.5 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.5.5 0 0 0-.196 0zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1z"/>
                    </svg> 
                   <div class="ps-2"> location</div>
                </a>
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('staff.show', $post) }}" class="btn btn-secondary me-2">View</a>
                    <a href="{{ route('staff.edit', $post) }}" class="btn btn-warning me-2">Edit</a>
                    <form action="{{ route('staff.destroy', $post) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                    </form>
                </div>
                
            </div>

        </div>
    @endforeach
@else
    <div class="alert alert-info">don't post in system</div>
@endif
    
@endsection