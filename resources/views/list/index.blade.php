@extends('layouts.app')
@section('title' , 'Listify')
@section('content')

<h1 class="fw-light  my-4">Your Table</h1>
<div class="mx-auto text-end" style="width: 80vw;">
  <table class="table table-dark my-3 mx-auto text-start">
    <thead>
      <tr class="table-active">
        <th scope="col" class="text-center">#</th>
        <th scope="col">First</th>
        <th scope="col">Description</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($list as $key => $l)
      <tr>
        <th scope="row" class="text-center">{{ $key + 1 }}</th>
        <td>{{ $l->title }}</td>
        <td>{{ $l->description }}</td>
        <td class="text-end pe-4 fs-4">
          <a href="{{ url("list/{$l->slug}/edit")}}"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
          <button type="button" class="btn delete-btn" data-title="{{ $l->title }}" data-slug="{{ $l->slug }}">
            <i class="fa-solid fs-3 fa-square-xmark text-danger"></i>
          </button>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{ url('list/create')}}" class="btn btn-dark">Add +</a>
</div>
<div class="modal fade" id="deleteData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete:</h1>
        <h1 class="text-danger fs-5 ms-1 modal-title" id="modal-title"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        You won't be able to redo this delete
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Back</button>
        <form method="post" id="delete-form" action="">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection