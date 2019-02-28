@extends('layouts.app')

@section('content')
<div class="col-md-12">
<div class="card">
    <div class="form-group"><a href="{{ route('companies.create') }}" class="btn btn-success">Create New</a></div>
    <div class="card-body">
        <h4 class="card-title">Companies</h4>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $c)
                <tr>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->website }}</td>
                    <td>{{ asset('images/'.$c->logo) }}</td>
                    <td><a href="{{ route('companies.edit', $c->id) }}" class="btn btn-info">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection