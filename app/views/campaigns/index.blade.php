@extends('layouts.main')
@section('content')



<!-- content -->
  <div id="content" class="app-conten" role="main">
    <div class="app-content-body" >
      
<br><br><br><br>
<div class="bg-light lter b-b wrapper-md">

  <div class="pull-right">
    <a href="{{URL::to('campaigns/create')}}" class="btn btn-info btn-addon"><i class="fa fa-fw fa-user"></i> Add Campaign</a>
  </div>
  <h1 class="m-n font-thin h3">Campaigns</h1>
</div>

<div class="wrapper-md">
  <div class="row">


@foreach($campaigns as $campaign)
    <div class="col-sm-2 col-md-2">
    <div class="thumbnail">
      <img src="img/p0.jpg"  alt="...">
      <div class="caption" style="text-align:center">
        <h4>{{$campaign->name}}</h4>
       
        <p><a href="{{URL::to('campaigns/show/'.$campaign->id)}}" class="btn btn-info" role="button">Manage Campaign</a> </p> 
      </div>
    </div>
  </div>

    @endforeach


  </div>
</div>



  </div>
  </div>
  <!-- /content -->







@stop