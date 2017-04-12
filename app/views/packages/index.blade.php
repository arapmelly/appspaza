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

                

                 
                     <a href="{{URL::to('packs/create')}}" class="btn btn-addon btn-info "><i class="fa fa-fw fa-plus"></i> New Package</a>

    


                  
                   
                </div>
                
                <div class="panel-body">
                 

                    <table class="table table-condensed table-bordered table-responsive table-hover table-stripped">

                    <thead>
                      
                      <th>#</th>
                      <th>Name</th>
                      <th>Cost</th>
                      <th>Categories</th>
                     
                      <th></th>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                      @foreach($packages as $package)
                      <tr>
                          <td>{{$i}}</td>
                          <td>{{$package->name}}</td>
                          <td>{{$package->cost}}</td>
                          <td>
                            <ul>
                              @foreach($package->categories as $categ)
                              <li >{{$categ->name}} <a href="{{URL::to('packsremovecategory/'.$categ->id)}}" class="pull-right"><i class="fa fa-fw fa-close"></i></a></li>
                              @endforeach
                            </ul>
                          </td>
                        
                          <td>
                          <a href="{{URL::to('packs/edit/'.$package->id)}}"><i class="fa fa-fw fa-pencil"></i></a>
                          &nbsp;&nbsp;&nbsp;

                 

                          <a href="{{URL::to('packs/destroy/'.$package->id)}}"><i class="fa fa-fw fa-trash"></i></a>
                          &nbsp;&nbsp;&nbsp;

                 

                          <a href="{{URL::to('packscategory/'.$package->id)}}"><i class="fa fa-fw fa-sitemap"></i></a>
                            
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