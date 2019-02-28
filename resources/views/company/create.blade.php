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
    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <label>Website</label>
            <input type="text" class="form-control" name="website" id="website">
        </div>
        <div class="form-group">
            <label>Logo</label>
            <input type="file" class="form-control-file border" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection