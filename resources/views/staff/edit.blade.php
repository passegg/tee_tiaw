@extends('layouts.layouts')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Post</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('staff.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $post->content }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image (leave empty to keep current)</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if ($post->image)
                                <small class="form-text text-muted">Current image: {{ $post->image }}</small>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="lcation" class="form-label">Location</label>
                            <input type="text" name="lacation" id="location">
                        </div>
                        <button type="submit" class="btn btn-success">Update Post</button>
                        <a href="{{ route('staff.admin') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection