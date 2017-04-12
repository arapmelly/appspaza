@extends('layouts.user')
@section('content')

<div class="bg-light">
      <div class="container">
        <div class="row">

  <br><br><br><br>

         


          <div class="bg-light lter b-b wrapper-md">

<ul class="breadcrumb">
  <li><a href="{{URL::to('campaigns/show/'.$campaign->id)}}">{{$campaign->name}}</a></li>
  <li><a href="{{URL::to('campaignaccounts/'.$campaign->id)}}">Campaign Accounts</a></li>
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


@foreach($accounts as $account)
    <div class="col-sm-2 col-md-2">
    <div class="thumbnail">
      <img src="{{ asset('img/twitlogo.jpg') }}"  alt="...">
      <div class="caption" style="text-align:center">
        <h5>@ {{$account->screen_name}}</h5>
       
       @if(count($campaignaccounts) > 0)
       @foreach($campaignaccounts as $acc)
       
        <p>
         @if($acc->account_id == $account->id)
          <form class="form" action="{{URL::to('campaignsremoveaccount')}}" method="post">
            <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
            <input type="hidden" name="account_id" value="{{$account->id}}">
            <button type="submit" class="btn btn-addon btn-danger"><i class="fa fa-fw fa-trash"></i> Remove </button>
          </form>
        @else


        <form class="form" action="{{URL::to('campaignsaddaccount')}}" method="post">
            <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
            <input type="hidden" name="account_id" value="{{$account->id}}">
            <button type="submit" class="btn btn-addon btn-info"><i class="fa fa-fw fa-plus"></i> Add </button>
          </form>

        @endif
        </p> 

        @endforeach
        @else
         <form class="form" action="{{URL::to('campaignsaddaccount')}}" method="post">
            <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
            <input type="hidden" name="account_id" value="{{$account->id}}">
            <button type="submit" class="btn btn-addon btn-info"><i class="fa fa-fw fa-plus"></i> Add </button>
          </form>
          @endif

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