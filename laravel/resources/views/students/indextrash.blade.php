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
        <form action="{{ url('students/trash/restore/' . $s->id) }}" method="post">
            @csrf
            <button class="btn btn-primary" type="submit">Restore</button>
        </form>
    </td>
    <td>
        <form action="{{ url('students/trash/delete/' . $s->id) }}" method="post">
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </td>
    </tr>
    @endforeach
</tbody>
</table>

<a class="btn btn-primary" style="float: right" href="{{ url('students') }}" role="button">Go to student</a>
{{ $siswa->links() }}

@endsection