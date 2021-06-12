@extends('app')

@section('content')

<table class="table table-striped table-hover">
<thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Birthdate</th>
    </tr>
</thead>
<tbody>
    @foreach($siswa as $s)
    <tr>
    <th scope="row">{{$s->id}}</th>
    <td>{{$s->name}}</td>
    <td>{{$s->email}}</td>
    <td>{{$s->birthdate}}</td>
    </tr>
    @endforeach
</tbody>
</table>

{{ $siswa->links() }}

@endsection