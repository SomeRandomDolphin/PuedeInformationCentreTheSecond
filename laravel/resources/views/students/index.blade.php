@extends('app')

@section('content')

<table class="table table-striped table-hover">
<thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col" colspan="3">Birthdate</th>
    </tr>
</thead>
<tbody>
    @foreach($siswa as $s)
    <tr>
    <th scope="row">{{$s->id}}</th>
    <td>{{$s->name}}</td>
    <td>{{$s->email}}</td>
    <td>{{$s->birthdate}}</td>
    <td>
        <form action="{{ url('students/edit/' . $s->id) }}" method="post">
            @csrf
            <button class="btn btn-primary" type="submit">Edit</button>
        </form>
    </td>
    <td>
        <form action="{{ url('students/delete/' . $s->id) }}" method="post">
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </td>
    </tr>
    @endforeach
</tbody>
</table>

<a class="btn btn-primary" style="float: right; margin-left: 10px" href="{{ url('students/trash') }}" role="button">Go to trash</a>
<a class="btn btn-primary" style="float: right" href="{{ url('students/add') }}" role="button">Add new student</a>
{{ $siswa->links() }}

@endsection