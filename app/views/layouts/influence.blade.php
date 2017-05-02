<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body class="container">
  
  <!-- header -->
  @include('includes.inheade')
  <!-- / header -->
  <div id="content">
    
    
    @yield('content')
    
    
  

  </div>
  <!-- footer -->
  @include('includes.footer')
  <!-- / footer -->


</body>
</html>