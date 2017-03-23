@extends('layouts.main')
@section('content')



<!-- content -->
  <div id="content" class="app-conten" role="main">
    <div class="app-content-body" >
      
<br><br><br><br>
<div class="bg-light lter b-b wrapper-md">

  <div class="pull-right">
     <a href="{{URL::to('tweets/create/'.$campaign->id)}}" class="btn btn-info btn-addon"><i class="fa fa-fw fa-twitter"></i> Add Tweet</a>
    <a href="{{URL::to('tweetsslot/'.$campaign->id)}}" class="btn btn-info btn-addon"><i class="fa fa-fw fa-random"></i> Slot Tweets</a>

    @if($campaign->is_published)
    <a href="{{URL::to('campaignsstop/'.$campaign->id)}}" class="btn btn-danger btn-addon"><i class="fa fa-fw fa-stop"></i> Stop Campaign</a>
    @else
    <a href="{{URL::to('campaignsstart/'.$campaign->id)}}" class="btn btn-success btn-addon"><i class="fa fa-fw fa-play"></i> Start Campaign</a>

    @endif
  </div>
  <h1 class="m-n font-thin h3">{{$campaign->name}}</h1>
  <p class="text-muted">{{Region::getRegion($campaign->target_region)}}</p>
</div>


<div class="bg-light lter b-b ">


      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10" style="overflow-x:hidden; overflow-y: scroll; height:80px; white-space:nowrap;  ">
         

            <ul class="nav navbar-nav  "  >

              @foreach($timelines as $timeline)
              <li class="b-r">
                <a ng-click="#"><i class="glyphicon glyphicon-user"></i> {{Account::getName($timeline->account_id)}}<br/>
            <i class="glyphicon glyphicon-time"></i> {{$timeline->time}}<br>
          <i class="fa fa-twitter"></i> {{$timeline->tweet_id}}
        </a>
            
              </li>
              @endforeach

             

             



         
         




          
</ul>


        </div>

      </div>

  </div>


<div class="wrapper-md bg-white">








  <div class="row ">

   

    <div class="col-lg-7 col-lg-offset-2">


      <!-- list -->
        <ul class="list-group list-group-lg no-radius m-b-none m-t-n-xxs">

          @foreach($tweets as $tweet)
          <li class="list-group-item clearfix b-l-3x b-l-info" style="margin:5px;">
            @if($tweet->media_url)
            <span class="avatr thumb pull-left m-r" >
              <img src="{{ asset('uploads/'.$tweet->media_url)}}" >
            </span>
            @endif
            <div class="pull-right text-sm text-muted">
              
              <a href="{{URL::to('tweet/'.$tweet->id)}}"><i class="fa fa-twitter m-l-sm"></i></a>
              <a href="{{URL::to('tweets/edit/'.$tweet->id)}}"><i class="fa fa-edit m-l-sm"></i></a>
              <a href="{{URL::to('tweets/destroy/'.$tweet->id)}}"><i class="fa fa-trash m-l-sm"></i></a>



            </div>
            <div class="clear">
              
              <div class=" m-t-xs">
                {{$tweet->tweet}}
              </div>
            </div>      
          </li>
          @endforeach
         
        </ul>
        <!-- / list -->

    </div>



    


  </div>
</div>



  </div>
  </div>
  <!-- /content -->







@stop