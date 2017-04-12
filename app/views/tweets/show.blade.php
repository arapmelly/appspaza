@extends('layouts.user')
@section('content')

<div class="bg-light">
      <div class="container">
        <div class="row">

  <br><br><br><br>

         


          <div class="bg-light lter b-b wrapper-md">

 <div class="pull-right">
    <a href="{{URL::to('tweets/create/'.$campaign->id)}}" class="btn btn-info btn-addon"><i class="fa fa-fw fa-twitter"></i> Create Tweet</a>
  </div>

<ul class="breadcrumb">
  <li><a href="{{URL::to('campaigns/show/'.$campaign->id)}}">{{$campaign->name}}</a></li>
  <li><a href="{{URL::to('tweets/show/'.$campaign->id)}}">Campaign Tweets</a></li>
</ul>

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

  <div class="col-md-10">

    <ul class="list-group">
      
        @foreach($tweets as $tweet)
        <li class="list-group-item">

          


          
          @if($tweet->media_url)
          <img src="{{asset('/uploads/'.$tweet->media_url)}}" style="width: 100px">
          @endif

          {{$tweet->tweet}}

         <div class="pull-right">

          <span class="label label-info">
            <a href="{{URL::to('tweets/edit/'.$tweet->id)}}"><i class="fa fa-fw fa-edit"></i></a>
          </span>

          <span class="label label-danger" style="margin: 5px">
            <a href="{{URL::to('tweets/destroy/'.$tweet->id)}}"><i class="fa fa-fw fa-trash"></i></a>
          </span>

          
           
         </div>

        </li>
        @endforeach
    </ul>
    
  </div>


  </div>
</div>




          





        </div>
      </div>
    </div>

@stop