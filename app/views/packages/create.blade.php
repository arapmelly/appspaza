@extends('layouts.admin')
@section('content')

<div class="bg-white-only">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-1 ">
            <div class="m-t-xxl m-b-xxl padder-v">
              <br><br>
              

               <form class="form" method="post" action="{{URL::to('packs')}}">

        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" required>

        </div>

        <div class="form-group">
          <label>Cost</label>
          <input type="text" name="cost" class="form-control" required>

        </div>




         <div class="form-group">
            <button type="submit" class="btn btn-info">Create </button>

        </div>

      </form>






            </div>
            
          </div>
        </div>
      </div>
    </div>

@stop