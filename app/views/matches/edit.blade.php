@extends('layouts.admin')
@section('content')

<div class="bg-white-only">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-1 ">
            <div class="m-t-xxl m-b-xxl padder-v">
              <br><br>
              

      <form class="form" method="post" action="{{URL::to('matches/update/'.$match->id)}}">

        <div class="form-group">
          <label>Date</label>
          <input type="date" name="date" value="{{$match->date}}" class="form-control" required>

        </div>

        <div class="form-group">
          <label>Home Team</label>
          <input type="text" name="homeTeam" value="{{$match->homeTeam}}"  class="form-control" required>

        </div>


        <div class="form-group">
          <label>Away Team</label>
          <input type="text" name="awayTeam" value="{{$match->awayTeam}}"  class="form-control" required>

        </div>


         <div class="form-group">
          <label>Home Goals</label>
          <input type="text" name="homeGoals" value="{{$match->homeGoals}}"  class="form-control" required>

        </div>


         <div class="form-group">
          <label>Away Goals</label>
          <input type="text" name="awayGoals" value="{{$match->awayGoals}}"  class="form-control" required>

        </div>

      




         <div class="form-group">
            <button type="submit" class="btn btn-info">Update Match</button>

        </div>

      </form>






            </div>
            
          </div>
        </div>
      </div>
    </div>

@stop