@extends('layouts.main')
@section('content')



<!-- content -->
  <div id="content" class="app-conten" role="main">
    <div class="app-content-body" >
      
<br><br><br><br>
<div class="bg-light lter b-b wrapper-md">


  <h1 class="m-n font-thin h3">Create Campaign</h1>
</div>

<div class="wrapper-md">
  <div class="row">


    <div class="col-lg-4 col-offset-3">

      <form class="form" method="post" action="{{URL::to('campaigns')}}">

        <div class="form-group">
          <label>Campaign Name</label>
          <input type="text" name="name" class="form-control" required>

        </div>

      

        <div class="form-group">
          <label>Target Region</label>
          <select class="form-control" name="target_region" >
          @foreach($availables as $region)
          <option value="{{$region->woeid}}">{{$region->name}}, {{$region->country}}</option>
          @endforeach
        </select>


        </div>

         <div class="form-group">
          <label>Campaign Type</label>
          <select class="form-control" name="type" >
     
          <option value="hashtag">Hashtag</option>
           <option value="trend">Trend</option>
    
        </select>


        </div>


        <div class="form-group">
          <label>Time Intervals (seconds)</label>
          <input type="text" name="time_interval" class="form-control" required>

        </div>


        <div class="form-group">
            
            @foreach($accounts as $account)
            <label class="checkbox-inline i-checks">
              <input type="checkbox" name="accounts[]" value="{{$account->id}}"><i></i> {{$account->username}}
            </label>
            @endforeach
            

        </div>



         <div class="form-group">
            <button type="submit" class="btn btn-info">Create Campaign</button>

        </div>

      </form>

    </div>

  </div>
</div>



  </div>
  </div>
  <!-- /content -->







@stop