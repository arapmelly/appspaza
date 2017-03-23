@extends('layouts.site')
@section('content')

<div class="bg-white-only">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 ">
            <div class="m-t-xxl m-b-xxl padder-v">
            	<br><br>
              {{Confide::MakeLoginForm()}}
            </div>
            
          </div>
        </div>
      </div>
    </div>

@stop