@extends('dashboard.layouts.main')

@section('container')
<!-- Konten lain yang mungkin ada di halaman -->

<div class="form-container">
    <h4>Add your will to the database</h4>
    <form action="{{ route('dashboard.crud.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="heir_name">Heir Name</label>
            <input type="text" id="heir_name" name="heir_name" required>
            @error('heir_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="last_will">Wills</label>
            <textarea id="last_will" name="last_will" rows="6" required></textarea>
            @error('last_will')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <div class="btn-container">
                <button type="submit" class="btn btn-primary btn-sm">Add Will</button>
            </div>
        </div>
    </form>
</div>

<!-- Konten lain yang mungkin ada di halaman -->
@endsection