@extends('layouts.user')
@section('content')

<div class="">
      <div class="container">
        <div class="row">
          <div class="col-md-7 col-md-offset-2 ">
            <div class="m-t-xxl m-b-xxl padder-v">
            	<br><br>
              
              <!-- content comes here -->

              <table class="table table-condensed table-responsive  table-hover">
                  
            


                <tr>
                   @foreach($packages as $package)
                    <td>

                        <table class="table table-condensed ">
                            <tr>
                              <td style="text-align: center;">

                              <h3>{{$package->name}}</h3>
                                <p style="font-size: 15px" class="label label-sm label-success label-rounded m-l">Ksh. {{$package->cost}}/Month</p>
                              </td>
                            </tr>
                            <tr>
                              <td>

                                  <ul>
                                    @foreach($package->categories as $categ)
                                      <li >{{$categ->name}}</li>
                                    @endforeach
                                  </ul>
                                
                              </td>
                            </tr>
                            <tr>
                              <td style="text-align:center">
                  <a href="{{URL::to('subscribe/'.$package->id)}}" class="btn btn-info">Subscribe</a>
                  </td>
                            </tr>

                        </table>
                    
                    </td>
                  @endforeach


                </tr>







               

              </table>


            </div>
            
          </div>
        </div>
      </div>
    </div>

@stop