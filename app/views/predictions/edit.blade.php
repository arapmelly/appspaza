@extends('layouts.admin')
@section('content')

<div class="bg-white-only">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-1 ">
            <div class="m-t-xxl m-b-xxl padder-v">
              <br><br>
              

               <form class="form" method="post" action="{{URL::to('predictions/update/'.$prediction->id)}}">

               <input type="hidden" name="match_id" value="{{$prediction->match->id}}" class="form-control" required>

        <div class="form-group">
          <label>Date</label>
          <input type="text" name="date" value="{{$prediction->match->date}}" class="form-control" readonly>

        </div>


         <div class="form-group">
          <label>Home Team</label>
          <input type="text" name="homeTeam" value="{{$prediction->match->homeTeam}}" class="form-control" readonly>

        </div>

        <div class="form-group">
          <label>Away Team</label>
          <input type="text" name="awayTeam" value="{{$prediction->match->awayTeam}}" class="form-control" readonly>

        </div>
<hr>

         <div class="form-group">
          <label>Category</label>
          <select name="category_id" class="form-control" required>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            
          </select>

        </div>


        <div class="form-group">
          <label>Prediction</label>
          <input type="text" name="prediction" value="{{$prediction->prediction}}" class="form-control" required>

        </div>


        <div class="form-group">
          <label>Status</label>
          <select name="status" class="form-control" required>
          
            <option value="N/A">N/A</option>
            <option value="WON">WON</option>
            <option value="LOST">LOST</option>
          
            
          </select>

        </div>


      




         <div class="form-group">
            <button type="submit" class="btn btn-info">Update Prediction</button>

        </div>

      </form>






            </div>
            
          </div>
        </div>
      </div>
    </div>

@stop