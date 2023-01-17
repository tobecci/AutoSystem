<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
    <ul class="navbar-nav mr-auto align-items-center">
      <li class="nav-item active">
        <a class="nav-link" href="#">
          {{ Auth::user()->name }}
        </a>
      </li>
      @if(Route::current()->getName() == 'landing')
        <li class="nav-item active">
          <a class="nav-link pt-0 pb-0" href="{{ route('commission') }}">
		  <button class="header-btn btn btn-primary pt-0 pb-0"
		  	style="height:30px;width:120px;border-color:white;">Commission
		  </button>
          </a>
        </li>
	  @elseif(Route::current()->getName() == 'commission')
        <li class="nav-item active">
          <a class="nav-link pt-0 pb-0" href="{{ route('landing') }}">
		  <button class="header-btn btn btn-primary pt-0 pb-0"
		  	style="height:30px;width:120px;border-color:white;">Bill
		  </button>
          </a>
        </li>
      @endif
    </ul>
  </div>

  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">
		  <button class="logout-btn btn btn-primary pt-0 pb-0"
		  	style="height:30px;width:120px;border-color:white;">Log Out
		  </button>
        </a>
      </li>
    </ul>
  </div> 
</nav>
