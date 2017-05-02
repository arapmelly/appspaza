<header id="header" class="navbar navbar-fixed-top bg-info padder-v "  data-spy="affix" data-offset-top="1">
    <div class="container">
      <div class="navbar-header">
        <button class="btn btn-link visible-xs pull-right m-r" type="button" data-toggle="collapse" data-target=".navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
        <a href="{{URL::to('/')}}" class="navbar-brand m-r-lg"><img src="img/logo.png" class="m-r-sm hide"><span class="h3 font-bold">TrendMaster&trade;</span></a>
      </div>
      <div class="collapse navbar-collapse">

      <ul class="nav navbar-nav font-bold">
        <!--   <li>
            <a href="{{URL::to('/')}}" data-ride="scroll">Dashboard</a>
          </li> -->
         <!--  <li>
            <a href="{{URL::to('/')}}" data-ride="scroll">Home</a>
          </li>
           -->
       

           

          

          
        </ul>
        <ul class="nav navbar-nav navbar-right">

          <li style="margin-left: 10px">
            <div class="m-t-sm">
             
              <a href="{{URL::to('/')}}" class="btn  btn-success btn-addon  "><i class="fa fa-fw fa-lock"></i>Login</a>
            </div>
          </li>

          <li style="margin-left: 10px">
            <div class="m-t-sm">
             
              <a href="{{URL::to('users/create')}}" class="btn  btn-success btn-addon  "><i class="fa fa-fw fa-user"></i>Create Account</a>
            </div>
          </li>
         

          
        </ul> 
          
      </div>
    </div>
  </header>