@extends('layouts.master')


@section('title')
   Albums | Music
@endsection



@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Album</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/save-album"method="POST">
         {{ csrf_field() }}

        <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Name:</label>
              <input type="text" name="name" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Year:</label>
              <input type="text" name="year" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Singer:</label>
              <input type="text" name="singer" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Genre:</label>
              <input type="text" name="genre" class="form-control" id="recipient-name">
            </div>
            <!--<div class="form-group">
              <label for="message-text" class="col-form-label">Year:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div> -->
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Album</button>
        </div>
      </form>
      </div>
    </div>
  </div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Albums
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">New Album</button>
                </h4>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Year</th>
                            <th>Singer</th>
                            <th>Genre</th>
                            <th>EDIT</th>
                            <th>DELETE</th>

                        </thead>
                        <tbody>
                          @foreach ($albums as $data)
                            <tr>
                                <td>{{ $data->id}}</td>
                                <td>{{ $data->Name}}</td>
                                <td>{{ $data->Year}}</td>
                                <td>{{ $data->Singer}}</td>
                                <td>{{ $data->Genre}}</td>
                                <td>
                                <a href="{{ 'albums/'. $data->id }}" class="btn btn-success">EDIT</a>
                                </td>
                                <td>
                                <form action="{{ url('albums-delete/'.$data->id) }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    
@endsection