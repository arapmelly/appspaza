@extends('layouts.influence')
@section('content')



<!-- content -->
  <div id="content" class="app-conten" role="main">
    <div class="app-content-body" >
      
<br><br><br><br>
<div class="bg-light lter b-b wrapper-md">


  <h1 class="m-n font-thin h3">Request Settlement</h1>
</div>

<div class="wrapper-md">
  <div class="row">

    @if (Session::get('notice'))
            <div class="alert alert-warning">{{{ Session::get('notice') }}}</div>
        @endif


    <div class="col-lg-4 col-offset-3">

      <form class="form" method="post" action="{{URL::to('settlements')}}">

        <div class="form-group">
          <label>Settlment Amount</label>
          <input type="text" name="amount" class="form-control" required>

        </div>


        


         <div class="form-group">
            <button type="submit" class="btn btn-info">Submit Request</button>

        </div>

      </form>

    </div>

  </div>
</div>



  </div>
  </div>
  <!-- /content -->







@stop