<!-- Logo Header -->
<div class="logo-header" data-background-color="blue">

  <div class="logo">
    <img src="/assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
  </div>
  <div class="ml-auto align-right ">
    <a data-toggle="dropdown" href="#" aria-expanded="false">
        <img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-sm avatar-img rounded-circle">
    </a>
    <ul class="dropdown-menu dropdown-user animated fadeIn">
      <div class="dropdown-user-scroll scrollbar-outer">
        <li>
          <div class="user-box">
            <div class="avatar-lg"><img src="{{ asset('assets/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded"></div>
            <div class="u-text">
              <h4>Hizrian</h4>
              <p class="text-muted">hello@example.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
            </div>
          </div>
        </li>
        <li>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">My Profile</a>
          <a class="dropdown-item" href="#">My Balance</a>
          <a class="dropdown-item" href="#">Inbox</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Account Setting</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{  route('user.logout') }}">Logout</a>
        </li>
      </div>
    </ul>
  </div>

</div>
<!-- End Logo Header -->
