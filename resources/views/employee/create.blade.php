@extends('layouts.app')

@section('content')
<div class="col-md-6 offset-3">
    @if(session('success'))
    <div class="success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="success">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('employees.store') }}" method="POST" enctype="form-data">
        @csrf
        <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name">
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name">
        </div>
        <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <label>Company</label>
            <select class="form-control" name="company_id" id="company_id">
                <option value="">Select a company</option>
                @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" id="phone">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection