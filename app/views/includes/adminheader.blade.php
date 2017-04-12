<header id="header" class="navbar navbar-fixed-top bg-info padder-v "  data-spy="affix" data-offset-top="1">
    <div class="container">
      <div class="navbar-header">
        <button class="btn btn-link visible-xs pull-right m-r" type="button" data-toggle="collapse" data-target=".navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
        <a href="{{URL::to('/')}}" class="navbar-brand m-r-lg"><img src="img/logo.png" class="m-r-sm hide"><span class="h3 font-bold">SlickTips&trade;</span></a>
      </div>
      <div class="collapse navbar-collapse">

      <ul class="nav navbar-nav font-bold">
        <!--   <li>
            <a href="{{URL::to('/')}}" data-ride="scroll">Dashboard</a>
          </li> -->

          <li>
            <a href="{{URL::to('predictions')}}" data-ride="scroll">Predictions</a>
          </li>

          <li>
            <a href="{{URL::to('matches')}}" data-ride="scroll">Matches</a>
          </li>


           <li>
            <a href="{{URL::to('categories')}}" data-ride="scroll">Categories</a>
          </li>


           <li>
            <a href="{{URL::to('packs')}}" data-ride="scroll">Packages</a>
          </li>
          

          <li>
            <a href="{{URL::to('users')}}" data-ride="scroll">Clients</a>
          </li>

           <li>
            <a href="{{URL::to('payments')}}" data-ride="scroll">Payments</a>
          </li>

          
        </ul>
        <ul class="nav navbar-nav navbar-right">
         <li>
            <div class="m-t-sm">
              <a href="#" class="btn btn-link btn-sm">{{Confide::user()->email}}</a> 
              <a href="{{URL::to('users/logout')}}" class="btn btn-sm btn-success btn-rounded m-l"><strong>Sign Out</strong></a>
            </div>
          </li>

         
        </ul> 
          
      </div>
    </div>
  </header>