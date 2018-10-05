<aside id="menubar" class="menubar dark  new-header-color">
  <div class="app-user">
    <div class="media">
      <div class="media-left">
        <div class="avatar avatar-md avatar-circle">
          <a href="javascript:void(0)"><img class="img-responsive" src="{{asset('theme/assets/images/user.jpg')}}" alt="avatar"/></a>
        </div><!-- .avatar -->
      </div>
      <div class="media-body ">
        <div class="foldable">
          <h5><a href="javascript:void(0)" class="username">{{Auth::user()->name}}</a></h5>
          <ul> 
                <li role="separator" class="divider"></li>
              <!--   <li>
                            <a class="text-color" href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        Log Out
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>                 
                </li> -->
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- .media-body -->
    </div><!-- .media -->
  </div><!-- .app-user -->

  <div class="menubar-scroll">
    <div class="menubar-scroll-inner">
      <ul class="app-menu">
       <li class="{{Session::get("link") == 'home'?'active':''}}">
          <a href="{{url('home')}}">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Dashboard</span>
          </a>
        </li> 
        <li >
          <a href="{{url('users')}}">
             <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Users</span>
          </a>
        </li>
         <li >
          <a href="{{url('games')}}">
             <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Games</span>
          </a>
        </li>
         <li >
          <a href="{{url('transactions')}}">
             <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Transactions</span>
          </a>
        </li>
          <li>
                            <a class="" href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                                        Log Out
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>                 
            </li>
             
      </ul><!-- .app-menu -->
    </div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->
</aside>