@extends('layouts.layouts')

@section('content')
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" class="container">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="lcation" class="form-label">Location</label>
            <input type="text" name="lacation" id="location">
        </div>
        <button type="submit" class="btn btn-success">Create Post</button>
        <a class="btn btn-secondary text-white" href="{{ route('staff.admin') }}">back</a>
    </form>
@endsection