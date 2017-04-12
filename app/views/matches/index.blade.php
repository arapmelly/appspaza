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

                

                  <div class="pull-right">
                     <a href="{{URL::to('matches/create')}}" class="btn btn-addon btn-info "><i class="fa fa-fw fa-plus"></i> New Match</a>

                  </div>


                  <form class="form-inline" method="post" action="{{URL::to('datematches')}}">
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control">

                  </div>


                  <div class="form-group">
                    <button type="submit" class="btn btn-info ">Show Matches</button>

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
                      <th>Outcome</th>
                      <th></th>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                      @foreach($matches as $match)
                      <tr>
                          <td>{{$i}}</td>
                          <td>{{$match->date}}</td>
                          <td>{{$match->homeTeam}}</td>
                          <td>{{$match->awayTeam}}</td>
                          <td>{{$match->homeGoals}} - {{$match->awayGoals}}</td>
                          <td>
                          <a href="{{URL::to('matches/edit/'.$match->id)}}"><i class="fa fa-fw fa-pencil"></i></a>
                          &nbsp;&nbsp;&nbsp;

                        <!--   <a href="{{URL::to('editresults/'.$match->id)}}"><i class="fa fa-fw fa-copy"></i></a>
                          &nbsp;&nbsp;&nbsp; -->

                          <a href="{{URL::to('matches/destroy/'.$match->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                          &nbsp;&nbsp;&nbsp;

                          <a href="{{URL::to('predictions/create/'.$match->id)}}"><i class="fa fa-fw fa-sitemap"></i></a>
                            
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