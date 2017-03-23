@extends('layouts.main')
@section('content')



<!-- content -->
  <div id="content" class="app-conten" role="main">
    <div class="app-content-body" >
      
<br><br><br><br>
<div class="bg-light lter b-b wrapper-md">

  <div class="pull-right">
    <a href="{{URL::to('accounts/create')}}" class="btn btn-info btn-addon"><i class="fa fa-fw fa-user"></i> Add Account</a>
  </div>
  <h1 class="m-n font-thin h3">Accounts</h1>
</div>

<div class="wrapper-md">
  <div class="row">


@foreach($accounts as $account)
    <div class="col-sm-2 col-md-2">
    <div class="thumbnail">
      <img src="img/p0.jpg"  alt="...">
      <div class="caption" style="text-align:center">
        <h4>{{$account->username}}</h4>
       
       <!--  <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p> -->
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