@extends('layouts.admin')
@section('content')



<!-- content -->
  <div id="content" class="app-conten" role="main">
    <div class="app-content-body" >
      
<br><br><br><br>
<div class="bg-light lter b-b wrapper-md">


  <h1 class="m-n font-thin h3">Purchased Retweets</h1>
</div>

<div class="wrapper-md bg-white">
  <div class="row ">

  @if (Session::get('notice'))
            <div class="alert alert-success">{{{ Session::get('notice') }}}</div>
        @endif

        @if (Session::get('error'))
            <div class="alert alert-warning">{{{ Session::get('error') }}}</div>
        @endif


    <div class="col-lg-12 ">

    <table class="table table-condensed table-bordered table-responsive table-hover table-stripped">

    <thead>
      <th>Client</th>
      <th>Purchase Date</th>
      <th>Tweet</th>
      <th>Purchased Retweets</th>
      <th>Cost</th>
      <th>Payment Code</th>
      <th>approved</th>
      <th>Closed</th>
      <th></th>
    </thead>

    <tbody>
      @foreach($purchases as $purchase)
      <tr>
        <td>{{User::getName($purchase->user_id)}}</td>
        <td>{{$purchase->created_at}}</td>
        <td>{{$purchase->tweet_id}}</td>
        <td>{{$purchase->retweet_count}}</td>
        <td>{{$purchase->cost}}</td>
        <td>{{$purchase->payment_code}}</td>
        <td>
        @if($purchase->is_approved)
          True
        @else
          False
        @endif
        
        </td>
        <td>
             @if($purchase->is_closed)
          Closed
        @else
          Open
        @endif
        </td>
        <td>
          <a href="{{URL::to('purchasesapprove/'.$purchase->id)}}" class="btn btn-info btn-sm"> Approve</a>
        </td>
      </tr>
      @endforeach
    </tbody>
      
    </table>

    

    </div>

  </div>
</div>



  </div>
  </div>
  <!-- /content -->







@stop