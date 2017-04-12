@extends('layouts.user')
@section('content')

<div class="bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-md-offset-3 ">
            <div class="m-t-xxl m-b-xxl padder-v">
            	<br><br>

               @if (Session::get('error'))
            <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
        @endif

        @if (Session::get('notice'))
            <div class="alert alert-success">{{{ Session::get('notice') }}}</div>
        @endif
              
              <!-- content comes here -->

              <table class="table table-condensed table-responsive  table-hover">

                            <tr>
                              <td style="text-align: center;">

                              <h3>{{$package->name}}</h3>
                                <p style="font-size: 15px" class="label label-sm label-success label-rounded m-l">Ksh. {{$package->cost}}/Month</p>
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <div style="text-align: center; padding: 10px; font-size: 18px;" class="bg-light">
                                  <span><strong>Till Number: 8 8 4 6 8 5</strong></span>
                                </div>

                                  <ul>
                                   
                                      <li >Go to <strong>M-Pesa</strong> menu on your phone</li>
                                      <li>Go to <strong>Lipa na M-Pesa</strong></li>
                                      <li>Go to <strong>Buy goods and services</strong></li>
                                      <li>Enter <strong>884685</strong> as the till number</li>
                                      <li>Enter <strong>{{$package->cost}}</strong> as the <strong>Amount</strong> </li>
                                      <li>Enter your <strong>M-Pesa PIN</strong></li>
                                      <li>Submit Payment</li>
                                 
                                  </ul>

                                  <p>* Payments will be made to <strong>Softcore</strong></p>
                                  <p>* Enter the MPESA transaction code below and validate your payment</p>
                                
                              </td>
                            </tr>

                            <tr>
                              <td style="text-align:center">
                  
                    <form class="form-inline" action="{{URL::to('paymentsvalidate')}}" method="post">
                      <input type="hidden" name="package_id" value="{{$package->id}}">
                      <div class="form-group">
                      <label>Transaction Code</label>
                      <input type="text" name="transaction_code" class="form-control" required>
                        
                      </div>

                      <div class="form-group">
                        <button class="btn btn-info btn-sm">Validate Payment</button>
                      </div>

                    </form>
                  </td>
                            </tr>

                       





               

              </table>


            </div>
            
          </div>
        </div>
      </div>
    </div>

@stop