@extends('layouts.user')
@section('content')



<!-- content -->
  <div id="content" class="app-conten" role="main">
    <div class="app-content-body" >
      
<br><br><br><br>
<div class="bg-light lter b-b wrapper-md">


  <h1 class="m-n font-thin h3">Update Campaign</h1>
</div>

<div class="wrapper-md">
  <div class="row">


    <div class="col-lg-4 col-offset-3">

      <form class="form" method="post" action="{{URL::to('campaigns/update/'.$campaign->id)}}">

        <div class="form-group">
          <label>Campaign Name</label>
          <input type="text" name="name" class="form-control" value="{{$campaign->name}}" required>

        </div>


        <div class="form-group">
          <label>Start Date</label>
          <input type="date" name="start_date" class="form-control" value="{{$campaign->start_date}}"  required>

        </div>


        <div class="form-group">
          <label>End Date</label>
          <input type="date" name="end_date" class="form-control" value="{{$campaign->end_date}}" min="{{date('Y-m-d')}}" required>

        </div>

      

        <div class="form-group">
          <label>Target Region</label>
          <select class="form-control" name="location" >
          <option value="{{$campaign->location}}">{{$campaign->location}}</option>
          @foreach($regions as $region)
          <option value="{{$region->woeid}}">{{$region->name}}, {{$region->country}}</option>
          @endforeach
        </select>


        </div>

         <div class="form-group">
          <label>Campaign Type</label>
          <select class="form-control" name="type" >
          <option value="{{$campaign->type}}">{{$campaign->type}}</option>
          <!-- <option value="retweet">Retweet</option> -->
          <option value="hashtag">Hashtag</option>
           <option value="trend">Trend</option>
    
        </select>


        </div>


        

        


         <div class="form-group">
            <button type="submit" class="btn btn-info">Update Campaign</button>

        </div>

      </form>

    </div>

  </div>
</div>



  </div>
  </div>
  <!-- /content -->







@stop