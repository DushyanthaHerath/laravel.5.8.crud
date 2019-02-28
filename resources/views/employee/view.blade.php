@extends('layouts.app')

@section('content')
<div class="col-md-12">
<div class="card">
    <div class="form-group"><a href="{{ route('employees.create') }}" class="btn btn-success">Create New</a></div>
    <div class="card-body">
        <h4 class="card-title">Employees</h4>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $e)
                <tr>
                    <td>{{ $e->first_name }}</td>
                    <td>{{ $e->last_name }}</td>
                    <td>{{ $e->phone }}</td>
                    <td>{{ $e->email }}</td>
                    <td>{{ $e->company->name }}</td>
                    <td><a href="{{ route('employees.edit', $e->id) }}" class="btn btn-info">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection