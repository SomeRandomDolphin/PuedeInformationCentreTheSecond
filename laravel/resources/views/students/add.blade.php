@extends('app')

@section('content')

<form action="{{ url('students/add') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="fullname" class="form-label">Full name</label>
        <input type="text" class="form-control" id="fullname" name="fullname" value="{{ old('fullname') }}">
    </div>
    @error('fullname')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="dateofbirth" class="form-label">Date of birth</label>
        <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{ old('dateofbirth') }}">
    </div>
    @error('dateofbirth')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
    </div>
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
    </div>
    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
    </div>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection