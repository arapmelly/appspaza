@extends('layouts.user')
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


    <div class="col-lg-10 ">

    <table class="table table-condensed table-bordered table-responsive table-hover table-stripped">

    <thead>
      <th>Purchase Date</th>
      <th>Tweet</th>
      <th>Purchased Retweets</th>
      <th>Cost</th>
      <th>Payment Code</th>
      <th>approved</th>
      <th>Closed</th>
    </thead>

    <tbody>
      @foreach($purchases as $purchase)
      <tr>
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