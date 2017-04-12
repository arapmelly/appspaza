@extends('layouts.admin')
@section('content')

<div class="bg-white-only">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-1 ">
            <div class="m-t-xxl m-b-xxl padder-v">
              <br><br>
              

               <form class="form" method="post" action="{{URL::to('predictions')}}">

               <input type="hidden" name="match_id" value="{{$match->id}}" class="form-control" required>

        <div class="form-group">
          <label>Date</label>
          <input type="text" name="date" value="{{$match->date}}" class="form-control" readonly>

        </div>


         <div class="form-group">
          <label>Home Team</label>
          <input type="text" name="homeTeam" value="{{$match->homeTeam}}" class="form-control" readonly>

        </div>

        <div class="form-group">
          <label>Away Team</label>
          <input type="text" name="awayTeam" value="{{$match->awayTeam}}" class="form-control" readonly>

        </div>
<hr>

         <div class="form-group">
          <label>Category</label>
          <select name="category_id" class="form-control">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            
          </select>

        </div>


        <div class="form-group">
          <label>Prediction</label>
          <input type="text" name="prediction" class="form-control" required>

        </div>


      




         <div class="form-group">
            <button type="submit" class="btn btn-info">Create Prediction</button>

        </div>

      </form>






            </div>
            
          </div>
        </div>
      </div>
    </div>

@stop