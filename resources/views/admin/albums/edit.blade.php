@extends('layouts.master')


@section('title')
   Edit 
@endsection


@section('content')
<div class="row">
  <div class = "col-md-12">
      <div class ="card">
          <div class = "card-header">
              <h4 class = "card-title">Albums - Edit</h4>

              <form action="{{ url('albums-saving/'.$albums->id) }}"method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
       
               <div class="modal-body">
                   <div class="form-group">
                     <label for="recipient-name" class="col-form-label">Name:</label>
                   <input type="text" name="name" class="form-control" value="{{ $albums->Name}}">
                   </div>
                   <div class="form-group">
                     <label for="recipient-name" class="col-form-label">Year:</label>
                     <input type="text" name="year" class="form-control" value="{{ $albums->Year}}">
                   </div>
                   <div class="form-group">
                     <label for="recipient-name" class="col-form-label">Singer:</label>
                     <input type="text" name="singer" class="form-control" value="{{ $albums->Singer}}">
                   </div>
                   <div class="form-group">
                     <label for="recipient-name" class="col-form-label">Genre:</label>
                     <input type="text" name="genre" class="form-control" value="{{ $albums->Genre}}">
                   </div>
                   <!--<div class="form-group">
                     <label for="message-text" class="col-form-label">Year:</label>
                     <textarea class="form-control" id="message-text"></textarea>
                   </div> -->
                 
               </div>
               <div class="modal-footer">
                 <a href="{{ url('albums') }}" class="btn btn-secondary">Cancel</a>
                 <button type="submit" class="btn btn-primary">Saving</button>
               </div>
             </form>

          </div>
      </div>
  </div>
</div>

@endsection