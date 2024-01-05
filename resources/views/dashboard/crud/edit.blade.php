@extends('dashboard.layouts.main')

@section('container')
<h1>Edit Post</h1>

<div class="form-container">
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="target_name">Heir Name:</label>
            <input type="text" id="target_name" name="target_name" value="{{ $post->target_name }}"><br><br>
        </div>

        <div class="form-group">
            <label for="will">Will:</label>
            <textarea id="will" name="will">{{ $post->will }}</textarea><br><br>
        </div>
        <div class="form-group">
            <div class="btn-container">
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection