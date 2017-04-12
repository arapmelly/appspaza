@extends('layouts.user')
@section('content')

<div class="bg-light">
      <div class="container">
        <div class="row">

  <br><br><br><br>

         


          <div class="bg-light lter b-b wrapper-md">

  <div class="pull-right">
    <a href="{{URL::to('campaigns/create')}}" class="btn btn-info btn-addon"><i class="fa fa-fw fa-file"></i> Add Campaign</a>
  </div>
  <h1 class="m-n font-thin h3">Campaigns</h1>
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


@foreach($campaigns as $campaign)
    <div class="col-sm-2 col-md-2">
    <div class="thumbnail">
      <img src="img/p0.jpg"  alt="...">
      <div class="caption" style="text-align:center">
        <h4>{{$campaign->name}}</h4>
        <p>Start: {{date('d-M-Y', strtotime($campaign->start_date))}} <br/> End: {{date('d-M-Y', strtotime($campaign->end_date))}}</p>
       
        <p><a href="{{URL::to('campaigns/show/'.$campaign->id)}}" class="btn btn-info" role="button">Manage Campaign</a> </p> 
      </div>
    </div>
  </div>

    @endforeach


  </div>
</div>




          





        </div>
      </div>
    </div>

@stop