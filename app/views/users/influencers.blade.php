@extends('layouts.admin')
@section('content')



<!-- content -->
  <div id="content" class="app-conten" role="main">
    <div class="app-content-body" >
      
<br><br><br><br>
<div class="bg-light lter b-b wrapper-md">
  
  <h1 class="m-n font-thin h3">Influencers</h1>
</div>

<div class="wrapper-md bg-white">
  <div class="row ">


    <div class="col-lg-12 ">

    <table class="table table-condensed table-bordered table-responsive table-hover table-stripped">

    <thead>
      <th>Email</th>
      
      <th></th>
    </thead>

    <tbody>
      @foreach($users as $user)
      <tr>
      <td>{{ $user->email}}</td>
       
       
        <td></td>
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