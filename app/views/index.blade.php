@extends('layouts.site')
@section('content')

<div class="bg-white-only">
      <div class="containe">

        <div class="row " style="background-image: url('img/tweet.jpg'); background-size: 100%;
    background-repeat: no-repeat; margin-top: 80px; min-height: 300px; " >
          <div class="col-md-5 col-md-offset-1">
            <div class="m-t-xxl m-b-xxl padder-v">
            	
              <br><br>
             <h2 style="color: #fff; font-weight: bold; ">
               MAKE YOUR BUSINESS TREND
             </h2>
             <p style="color: #fff; font-size: 18px">
             Hundreds of millions of people turn to Twitter to discover what’s happening in the world. Spaza can help you connect with this audience and get meaningful results.
             
             </p>

            

             <a href="{{URL::to('campaigns/create')}}" class="btn btn-success btn-addon"><i class="fa fa-fw fa-th"></i>Get Started Now</a>
              
            </div>
            
          </div>
        </div>







        <div class="row bg-white" id="features" >


        <div class="col-md-5 col-md-offset-2">
            <div class="m-t-xxl m-b-xxl padder-v">
              
            
             <h2 >
               HOW IT WORKS
             </h2>
             <p  style="font-size: 16px">
              Spaza will help you spread awareness of your brand, generate leads, drive traffic to your site, build a loyal customer base and much more. The process of launching a campaign is as follows:
              <ul style="font-size: 14px">
                <li>Submit a campaign through the this website</li>

                <li>We will contact you to get more details about your campaign</li>

                <li>We will prepare upto 10 unique banner campaigns</li>

                <li>Once you sign off on these and payments made, your campaign will start running.</li>
             
             </p>

             <p style="font-size: 12px">
               
               * We only allow upto 10 different campaigns per day <br/>
               * Your campaigns will be adequately spaced out to avoid being spammy<br/>
               * Your campaign will run for 24 hrs per day. 
             </p>

            

            
              
            </div>
            
          </div>

          <div class="col-md-4">

          <img src="img/twitter1.png" width="100%" style="margin-top: 150px">
            
          </div>



        </div>






<div class="row bg-white b-t" id="pricing" >

 <div class="col-md-4 col-md-offset-1">

          <img src="img/twitter-share-button.jpg" width="100%">
            
          </div>

        <div class="col-md-7 ">
            <div class="m-t-xxl m-b-xxl padder-v">
              
            
            
             <table class=" table-condensed table-responsive  ">
                  
            


                <tr>
                 
                    <td>

                        <table class="table table-condensed table-striped table-bordered table-responsive table-hover">
                           <thead>
                             <th></th>
                             <th>1 Day</th>
                             <th>1 Week</th>
                             <th>2 Weeks</th>

                           </thead>

                           <tbody>

                           <tr>
                             <td>10 unique banner camapigns</td>
                             <td><i class="fa fa-fw fa-check"></i></td>
                             <td><i class="fa fa-fw fa-check"></i></td>
                             <td><i class="fa fa-fw fa-check"></i></td>

                           </tr>

                           <tr>
                             <td>upto 5 twitter influencers</td>
                             <td><i class="fa fa-fw fa-check"></i></td>
                             <td><i class="fa fa-fw fa-check"></i></td>
                             <td><i class="fa fa-fw fa-check"></i></td>

                           </tr>

                           <tr>
                             <td>upto 96 tweets per day</td>
                             <td><i class="fa fa-fw fa-check"></i></td>
                             <td><i class="fa fa-fw fa-check"></i></td>
                             <td><i class="fa fa-fw fa-check"></i></td>

                           </tr>

                           <tr>
                             <td>Most popular #hashtags</td>
                             <td><i class="fa fa-fw fa-check"></i></td>
                             <td><i class="fa fa-fw fa-check"></i></td>
                             <td><i class="fa fa-fw fa-check"></i></td>

                           </tr>

                          

                           </tbody>

                            <tfoot>

                              <td></td>
                             <td ><a href="{{URL::to('campaigns/create')}}" class="btn btn-info btn-addon"><i class="fa fa-fw fa-th"></i> Get Started</a></td>
                            <td ><a href="{{URL::to('campaigns/create')}}" class="btn btn-info btn-addon"><i class="fa fa-fw fa-th"></i> Get Started</a></td>
                            <td ><a href="{{URL::to('campaigns/create')}}" class="btn btn-info btn-addon"><i class="fa fa-fw fa-th"></i> Get Started</a></td>
                             
                           </tfoot>


                           <tfoot>

                              <td></td>
                             <td >Ksh. 2,500.00</td>
                             <td>Ksh. 15,000.00</td>
                             <td>Ksh. 25,000.00</td>
                             
                           </tfoot>


                        </table>
                    
                    </td>
             


                </tr>







               

              </table>

            

            
              
            </div>
            
          </div>

         



        </div>






      </div>
    </div>

@stop