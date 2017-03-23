@extends('layouts.main')
@section('content')



<!-- content -->
  <div id="content" class="app-conten" role="main">
    <div class="app-content-body" >
      
<br><br><br><br>
<div class="bg-light lter b-b wrapper-md">


  <h1 class="m-n font-thin h3">Create Tweet</h1>
</div>

<div class="wrapper-md">
  <div class="row">


    <div class="col-lg-4 col-offset-3">

      <form class="form" method="post" action="{{URL::to('tweets')}}" enctype="multipart/form-data">

        <div class="form-group">
          <label>Tweet</label>
         <textarea class="form-control" name="tweet" maxlength="100"></textarea>

        </div>


        <div class="form-group">
          <label>Media</label>
         <input type="file"  name="file" >

        </div>

      

        

       


        
          <input type="hidden" name="campaign_id" value="{{$campaign->id}}" class="form-control" required>

       


       



         <div class="form-group">
            <button type="submit" class="btn btn-info">Create Tweet</button>

        </div>

      </form>

    </div>

  </div>
</div>



  </div>
  </div>
  <!-- /content -->







@stop