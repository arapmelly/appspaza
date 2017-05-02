@extends('layouts.user')
@section('content')



<!-- content -->
  <div id="content" class="app-conten" role="main">
    <div class="app-content-body" >
      
<br><br><br><br>
<div class="bg-light lter b-b wrapper-md">


  <h1 class="m-n font-thin h3">Buy Retweets</h1>
</div>

<div class="wrapper-md bg-white">
  <div class="row ">


    <div class="col-lg-5 col-lg-offset-3">

      <form class="form" method="post" action="{{URL::to('purchases/update/'.$purchase->id)}}">

      <h3>LIPA NA MPESA</h3>
       <h5> BUY GOODS AND SERVICES (884685)</h5>
      <hr>

          <ul>
                                   
                                      <li >Go to <strong>M-Pesa</strong> menu on your phone</li>
                                      <li>Go to <strong>Lipa na M-Pesa</strong></li>
                                      <li>Go to <strong>Buy goods and services</strong></li>
                                      <li>Enter <strong>884685</strong> as the till number</li>
                                      <li>Enter <strong>{{$purchase->cost}}</strong> as the <strong>Amount</strong> </li>
                                      <li>Enter your <strong>M-Pesa PIN</strong></li>
                                      <li>Submit Payment</li>
                                 
                                  </ul>

                                  <p>* Payments will be made to <strong>Softcore</strong></p>
                                  <p>* Enter the MPESA transaction code below and validate your payment</p>

        <div class="form-group">
          <label>Payment code</label>
          <input type="text" name="payment_code" class="form-control" required>

        </div>



         <div class="form-group">
            <button type="submit" class="btn btn-info">Submit Payment</button>

        </div>

      </form>

    </div>

  </div>
</div>



  </div>
  </div>
  <!-- /content -->







@stop