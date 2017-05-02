@extends('layouts.user')
@section('content')

<div class="bg-light">
      <div class="container">
        <div class="row">

  <br><br><br><br>

         


          <div class="bg-light lter b-b wrapper-md">

  <div class="pull-right">
    <a href="{{URL::to('campaigns/edit/'.$campaign->id)}}" class="btn btn-info btn-addon"><i class="fa fa-fw fa-edit"></i> Update Campaign</a>

    @if($campaign->is_active)
    <a href="{{URL::to('campaignsrun/'.$campaign->id)}}" class="btn btn-success btn-addon"><i class="fa fa-fw fa-play"></i> Run Campaign</a>
    @else
    <a href="{{URL::to('campaignsrun/'.$campaign->id)}}" class="btn btn-danger btn-addon"><i class="fa fa-fw fa-stop"></i> Stop Campaign</a>
    @endif
  </div>
  <h1 class="m-n font-thin h3">{{$campaign->name}}</h1>
  <span class="text-muted">#{{$campaign->type}}</span><br>
  <span class="text-muted">Start: {{date('d-M-Y', strtotime($campaign->start_date))}} - End: {{date('d-M-Y', strtotime($campaign->end_date))}}</span><br>
   <span class="text-muted">{{Region::getName($campaign->location)}}</span>
</div>


 <div class="col-md-12">
            <div class="m-t-xxl m-b-xxl ">
            
              
             @if (Session::get('error'))
            <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
        @endif

        @if (Session::get('notice'))
            <div class="alert alert-success">{{{ Session::get('notice') }}}</div>
        @endif

            

            </div>
            
          </div>



<div class="wrapper-md">
  <div class="row">



    <!-- <div class="col-sm-2 col-md-2">
    <div class="thumbnail" style="text-align:center; ">
      <i class="fa fa-fw fa-5x fa-list" style="margin-top: 10px;" ></i>
      <div class="caption" style="text-align:center">
        
       
        <p><a href="{{URL::to('campaigns/show/'.$campaign->id)}}" class="btn btn-info" role="button">Manage Timeline</a> </p> 
      </div>
    </div>
  </div>
 -->


  <div class="col-xs-12 col-md-3">
    <div class="thumbnail" style="text-align:center; ">
      <i class="fa fa-fw fa-5x fa-twitter" style="margin-top: 10px;" ></i>
      <div class="caption" style="text-align:center">
        
       
        <p><a href="{{URL::to('tweets/show/'.$campaign->id)}}" class="btn btn-info" role="button">Manage Tweets</a> </p> 
      </div>
    </div>
  </div>


  <div class="col-xs-12 col-md-3">
    <div class="thumbnail" style="text-align:center; ">
      <i class="fa fa-fw fa-5x fa-group" style="margin-top: 10px;" ></i>
      <div class="caption" style="text-align:center">
        
       
        <p><a href="{{URL::to('campaignaccounts/'.$campaign->id)}}" class="btn btn-info" role="button">Manage Accounts</a> </p> 
      </div>
    </div>
  </div>


  <div class="col-xs-12 col-md-3">
    <div class="thumbnail" style="text-align:center; ">
      <i class="fa fa-fw fa-5x fa-clock-o" style="margin-top: 10px;" ></i>
      <div class="caption" style="text-align:center">
        
       
        <p><a href="{{URL::to('campaigns/show/'.$campaign->id)}}" class="btn btn-info" role="button">Manage Schedule</a> </p> 
      </div>
    </div>
  </div>


  <!-- <div class="col-sm-2 col-md-2">
    <div class="thumbnail" style="text-align:center; ">
      <i class="fa fa-fw fa-5x fa-group" style="margin-top: 10px;" ></i>
      <div class="caption" style="text-align:center">
        
       
        <p><a href="{{URL::to('campaigns/show/'.$campaign->id)}}" class="btn btn-info" role="button">Manage Influencers</a> </p> 
      </div>
    </div>
  </div> -->


  <div class="col-xs-12 col-md-3">
    <div class="thumbnail" style="text-align:center; ">
      <i class="fa fa-fw fa-5x fa-copy" style="margin-top: 10px;" ></i>
      <div class="caption" style="text-align:center">
        
       
        <p><a href="#" class="btn btn-info" role="button">Manage Analytics</a> </p> 
      </div>
    </div>
  </div>

 


  </div>
</div>




          





        </div>
      </div>
    </div>

@stop