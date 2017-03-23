@extends('layouts.main')
@section('content')



<!-- content -->
  <div id="content" class="app-conten" role="main">
    <div class="app-content-body" >
      
<br><br><br><br>
<div class="bg-light lter b-b wrapper-md">

  
  <h1 class="m-n font-thin h3">Trends</h1>
</div>

<div class="bg-white  b-b wrapper-md">

<form class="form" method="post" action="{{URL::to('trends')}}">

    <div class="form-group">
      <label>Region</label>
        <select class="form-control" name="region" >
         @foreach($availables as $region)
          <option value="{{$region->woeid}}">{{$region->name}}, {{$region->country}}</option>
          @endforeach
        </select>

    </div>

    <div class="form-group"> 
      <button type="submit" class="btn btn-info">Show Trends</button>
    </div>
  </form>
  
  
</div>

<div class="wrapper-md">
  <div class="row bg-white" >

    
    <div class="col-lg-4 col-offset-4 ">



      <table class="table table-bordered table-condensed" style="margin:20px">

        @foreach($trendings as $trend)
        <tr>
          <td>{{$trend['name']}}</td>
        </tr>
        @endforeach

      </table>

    </div>




  </div>
</div>



  </div>
  </div>
  <!-- /content -->







@stop