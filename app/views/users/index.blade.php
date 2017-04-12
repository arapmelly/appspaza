@extends('layouts.admin')
@section('content')

<div class="bg-white-only">
      <div class="container">
        <div class="row">



          <div class="col-md-11">
            <div class="m-t-xxl m-b-xxl ">
            	<br><br>
              
            

            <div class="panel panel-default">

                <div class="panel-heading">

                

              <h4>Clients</h4>

    


                  
                   
                </div>
                
                <div class="panel-body">
                 

                    <table class="table table-condensed table-bordered table-responsive table-hover table-stripped">

                    <thead>
                      
                      <th>#</th>
                      <th>Email</th>
                      <th>Subscription</th>
                      <th>Next Subscription</th>
                      <th>Subscription Status</th>
                     
                      <th></th>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                      @foreach($users as $user)
                      <tr>
                          <td>{{$i}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->subscribed_package}}</td>
                            <td>{{$user->next_subscription_date}}</td>
                          <td>{{$user->is_expired}}</td>
                        
                          <td>
                          <a href="{{URL::to('users/edit/'.$user->id)}}"><i class="fa fa-fw fa-pencil"></i></a>
                          &nbsp;&nbsp;&nbsp;

                 

                          <a href="{{URL::to('users/destroy/'.$user->id)}}"><i class="fa fa-fw fa-close"></i></a>
                            
                          </td>
                      </tr>
                      <?php $i++; ?>
                      @endforeach
                    </tbody>
                      

                    </table>



                </div>


            </div>


            </div>
            
          </div>



          





        </div>
      </div>
    </div>

@stop