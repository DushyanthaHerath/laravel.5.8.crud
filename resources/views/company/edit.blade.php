@extends('layouts.app')

@section('content')
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
    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf    
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" value="{{ $company->name }}" name="name" id="name">
    </div>
    <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" value="{{ $company->email }}" name="email" id="email">
    </div>
    <div class="form-group">
        <label>Website</label>
        <input type="text" class="form-control" value="{{ $company->website }}" name="website" id="website">
    </div>
    <div class="form-group">
        <label>Logo</label>
        <input type="file" class="form-control-file border" value="{{ $company->logo }}" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection