

<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>
              Hizrian
              <span class="user-level">Administrator</span>
              <span class="caret"></span>
            </span>
          </a>
          <div class="clearfix"></div>

          <div class="collapse in" id="collapseExample">
            <ul class="nav">
              <li>
                <a href="#profile">
                  <span class="link-collapse">Profile</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
{{-- dashboard --}}


@php

  use App\Models\Mainmenu;
  use App\Models\Menusubitem;

  $Mainmenu=Mainmenu::all();
   // print_r($Mainmenu)
   foreach( $Mainmenu as $value ) {
      $_UNID      = $value["UNID"];
      $_MENU_NAME = $value["MENU_NAME"];
      $_ICON      = $value["MENU_ICON"];
     echo '
     <ul class="nav nav-primary">
         <li class="nav-item active">
           <a data-toggle="collapse" href="#'.$_UNID.'" class="collapsed" aria-expanded="false">
             <i class="'.$_ICON.'"></i>
             <p>'.$_MENU_NAME.'</p>
             <span class="caret"></span>
           </a>
           <div class="collapse" id="'.$_UNID.'">
             <ul class="nav nav-collapse">';

        $Menusubitem=Menusubitem::where('SUBUNID_REF',$_UNID)->get();
                foreach( $Menusubitem as $_sub ) {
                  $_subunid=$_sub["UNID"];
                  $_submenuName=$_sub["SUBMENU_NAME"];
                  $_submenuLink=$_sub["SUBMENU_LINK"];
                      echo '<li>
                             <a href="'.$_submenuLink.'">
                               <span class="sub-item">'.$_submenuName.'</span>
                             </a>
                           </li>';
                        }

          echo '

             </ul>
           </div>
         </li>


       </ul>';
  }


@endphp

{{-- Setting--}}
      <ul class="nav nav-primary">
        <li class="nav-item active">
          <a data-toggle="collapse" href="#Settings" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Settings</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="Settings">
            <ul class="nav nav-collapse">
              <li>
                <a href="../demo1/index.html">
                  <span class="sub-item">Users</span>
                </a>
              </li>
              <li>
                <a href="../demo1/index.html">
                  <span class="sub-item">User Groups</span>
                </a>
              </li>
              <li>
                <a href="../demo1/index.html">
                  <span class="sub-item">Business</span>
                </a>
              </li>
              <li>
                <a href="../demo1/index.html">
                  <span class="sub-item">Import</span>
                </a>
              </li>
              <li>
                <a href="../demo1/index.html">
                  <span class="sub-item">Cmms Settings</span>
                </a>
              </li>
              <li>
                <a href="../demo1/index.html">
                  <span class="sub-item">Account Settings</span>
                </a>
              </li>
              <li>
                <a href="../demo1/index.html">
                  <span class="sub-item">Notification Templates</span>
                </a>
              </li>

            </ul>
          </div>
        </li>


      </ul>
{{-- Setting--}}


      {{-- <ul class="nav nav-primary">
        <li class="nav-item active">
          <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="dashboard">
            <ul class="nav nav-collapse">
              <li>
                <a href="../demo1/index.html">
                  <span class="sub-item">Dashboard</span>
                </a>
              </li>

            </ul>
          </div>
        </li>


      </ul> --}}
    </div>
  </div>
</div>
<!-- End Sidebar -->
