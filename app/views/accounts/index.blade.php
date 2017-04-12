@extends('layouts.user')
@section('content')

<div class="bg-light">
      <div class="container">
        <div class="row">

  <br><br><br><br>

         


          <div class="bg-light lter b-b wrapper-md">

  <div class="pull-right">
    <a href="{{URL::to('accounts/create')}}" class="btn btn-info btn-addon"><i class="fa fa-fw fa-user"></i> Add Account</a>
  </div>
  <h1 class="m-n font-thin h3">Accounts</h1>
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
      <img src="img/twitlogo.jpg"  alt="...">
      <div class="caption" style="text-align:center">
        <h4> @ {{$account->screen_name}}</h4>
       
        <p><a href="#" class="btn btn-sm btn-addon btn-danger" role="button"><i class="fa fa-fw fa-trash"></i> Remove Account</a> </p> 
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