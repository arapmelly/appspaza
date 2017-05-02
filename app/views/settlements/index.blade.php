@extends('layouts.influence')
@section('content')



<!-- content -->
  <div id="content" class="app-conten" role="main">
    <div class="app-content-body" >
      
<br><br><br><br>
<div class="bg-light lter b-b wrapper-md">
  <a href="{{URL::to('settlements/create')}}" class="btn btn-addon btn-info pull-right"><i class="fa fa-fw fa-plus"></i> Request Settlement</a>

  <h1 class="m-n font-thin h3">Settlements</h1>
</div>

<div class="wrapper-md bg-white">
  <div class="row ">


    <div class="col-lg-10 ">

    <table class="table table-condensed table-bordered table-responsive table-hover table-stripped">

    <thead>
      <th>Request Date</th>
      <th>Amount</th>
      <th>approved</th>
      <th>Status</th>
      <th>Date Settled</th>
    </thead>

    <tbody>
      @foreach($settlements as $settlement)
      <tr>
        <td>{{$settlement->date}}</td>
        <td>{{$settlement->amount}}</td>
       
        <td>
        @if($settlement->is_approved)
          True
        @else
          False
        @endif
        
        </td>
        <td>
             @if($settlement->is_paid)
          settled
        @else
          Not settled
        @endif
        </td>
        <td>{{$settlement->payment_date}}</td>
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