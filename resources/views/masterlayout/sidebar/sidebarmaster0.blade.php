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
      @php

        use App\Models\SettingMenu\Mainmenu;
        use App\Models\SettingMenu\Menusubitem;


        $Mainmenu=Mainmenu::all();

         foreach( $Mainmenu as $value ) {
           $_Main = $value['MENU_NAME'];
           $_ICON = $value['MENU_ICON'];
           $_UNID = $value['UNID'];

           echo '<ul class="nav nav-primary">
             <li class="nav-item active">
               <a data-toggle="collapse" href="#'.$_UNID.'" class="collapsed" aria-expanded="false">
                 <i class="'.$_ICON.'"></i>
                 <p>'.$_Main.'</p>
                 <span class="caret"></span>
               </a>
               <div class="collapse" id="'.$_UNID.'">
                 <ul class="nav nav-collapse">
             ';

            $MenuSubitem=Menusubitem::where('SUBUNID_REF',$_UNID)->get();
            foreach ($MenuSubitem as $subvalue) {

              $_SUBNAME = $subvalue['SUBMENU_NAME'];
              $_SUBLINK = $subvalue['SUBMENU_LINK'];
              $url = url($subvalue['SUBMENU_LINK']);

              echo '
              <li>
                <a href='.$url.'>
                  <span class="sub-item">'.$_SUBNAME.'</span>
                </a>
              </li>';

            }
            echo '

            </ul>
            </div>
            </li>
            </ul>
            ';
        }
      @endphp
    </div>
  </div>
</div>
<!-- End Sidebar -->
