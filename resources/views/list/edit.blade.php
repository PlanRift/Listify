@extends('layouts.app')
@section('title' , 'Edit Table')
@section('content')
<h2 class="my-3">Edit Data</h2>

<form method="post" action="{{ url("list/$edit->slug") }}">
    @method('PATCH')
    @csrf
   
    <div>
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $edit->title }}" required>
    </div>
    <div>
        <label for="title" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" value="{{ $edit->description }}" name="description" required>
    </div>
    <div class="my-3">
        <a href="{{ url('list')}}" class="btn btn-dark">Back</a>
        <button type="submit" class="btn btn-warning">Save</button>
    </div>
</form>

@endsection