@extends('layouts.admin')
@section('content')

<div class="bg-white-only">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-1 ">
            <div class="m-t-xxl m-b-xxl padder-v">
              <br><br>
              

               <form class="form" method="post" action="{{URL::to('matches')}}">

        <div class="form-group">
          <label>Date</label>
          <input type="date" name="date" class="form-control" required>

        </div>

        <div class="form-group">
          <label>Home Team</label>
          <input type="text" name="homeTeam" class="form-control" required>

        </div>


        <div class="form-group">
          <label>Away Team</label>
          <input type="text" name="awayTeam" class="form-control" required>

        </div>

      




         <div class="form-group">
            <button type="submit" class="btn btn-info">Create Match</button>

        </div>

      </form>






            </div>
            
          </div>
        </div>
      </div>
    </div>

@stop