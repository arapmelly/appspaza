@extends('layouts.user')
@section('content')



<!-- content -->
  <div id="content" class="app-conten" role="main">
    <div class="app-content-body" >
      
<br><br><br><br>
<div class="bg-light lter b-b wrapper-md">

  <div class="pull-right">
    <!--  <a href="{{URL::to('createtweet/.$account->id')}}" class="btn btn-info btn-addon"><i class="fa fa-fw fa-twitter"></i>Tweet</a> -->
    

    
  </div>
  <h1 class="m-n font-thin h3"> {{'@'.$account->screen_name}}</h1>
 
</div>



<div class="wrapper-md bg-white">








  <div class="row ">

   

    <div class="col-lg-7 col-lg-offset-2">


      <!-- list -->
       
      <!-- list -->
        <ul class="list-group list-group-lg no-radius m-b-none m-t-n-xxs">

          @foreach($tweets as $tweet)
          <li class="list-group-item clearfix b-l-3x b-l-info" style="margin:5px;">
            
            <span class="avat thub pull-left m-r" >
              
              @if(isset($tweet['entities']['media'])) 

              @foreach($tweet['entities']['media'] as $media) 

                <img src="{{$media['media_url']}}" style="width: 150px;" >
              @endforeach

              @endif
             
             
             
             
            
            </span>
          
            <div class="pull-right text-sm text-muted">
              
              <form method="post" action="{{URL::to('purchases')}}">

                <input type="hidden" name="tweet_id" value="{{$tweet['id']}}">

                <div class="form-group">
                <label>Retweets</label>
                <input type="number" name="retweet_count" placeholder="100" min="100" max="5000" class="form-control" required>
                  
                </div>


                <div>
                  <button type="submit" class="btn btn-info">Buy Retweets</button>
                </div>
                
              </form>

           
              
              


            </div>
            <div class="clear">
              
              <div class=" m-t-xs">
                {{$tweet['text']}}
              </div>
            </div>      
          </li>
          @endforeach
         
        </ul>
        <!-- / list -->
        <!-- / list -->

    </div>



    


  </div>
</div>



  </div>
  </div>
  <!-- /content -->







@stop