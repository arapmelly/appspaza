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

                

                 


                  <form class="form-inline" method="post" action="{{URL::to('datepredictions')}}">
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control">

                  </div>


                  <div class="form-group">
                    <button type="submit" class="btn btn-info ">Show Predictions</button>

                  </div>



                </form>
                   
                </div>
                
                <div class="panel-body">
                 

                    <table class="table table-condensed table-bordered table-responsive table-hover table-stripped">

                    <thead>
                      
                      <th>#</th>
                      <th>Date</th>
                      <th>Home Team</th>
                      <th>Away Team</th>
                      <th>Category</th>
                      <th>Prediction</th>
                      <th>Status</th>
                      <th></th>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                      @foreach($predictions as $prediction)
                      <tr>
                          <td>{{$i}}</td>
                          <td>{{$prediction->match->date}}</td>
                          <td>{{$prediction->match->homeTeam}}</td>
                          <td>{{$prediction->match->awayTeam}}</td>
                          <td>{{$prediction->category->name}}</td>
                          <td>{{$prediction->prediction}}</td>
                          <td>{{$prediction->status}}</td>
                          <td>
                          <a href="{{URL::to('predictions/edit/'.$prediction->id)}}"><i class="fa fa-fw fa-pencil"></i></a>
                          &nbsp;&nbsp;&nbsp;

                        

                          <a href="{{URL::to('predictions/destroy/'.$prediction->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                         
                            
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