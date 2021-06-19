@extends('app')

@section('content')

<form action="{{ url('students/update/' . $student->id) }}" method="post">
    @method('patch')
    @csrf
    <div class="mb-3">
        <label for="fullname" class="form-label">Full name</label>
        <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $student->name }}">
    </div>
    @error('fullname')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="dateofbirth" class="form-label">Date of birth</label>
        <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{ $student->birthdate }}">
    </div>
    @error('dateofbirth')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}">
    </div>
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ $student->short_description }}">
    </div>
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection