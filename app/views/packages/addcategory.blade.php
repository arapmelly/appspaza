@extends('layouts.admin')
@section('content')

<div class="bg-white-only">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-1 ">
            <div class="m-t-xxl m-b-xxl padder-v">
              <br><br>
              

               <form class="form" method="post" action="{{URL::to('packscategory')}}">

               <input type="hidden" name="package_id" value="{{$package->id}}" class="form-control" required>


               <div class="form-group">
          <label>Category</label>
          <select name="category_id" class="form-control">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            
          </select>

        </div>




         <div class="form-group">
            <button type="submit" class="btn btn-info">Add Category </button>

        </div>

      </form>






            </div>
            
          </div>
        </div>
      </div>
    </div>

@stop