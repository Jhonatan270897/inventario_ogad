<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="" class="simple-text logo-normal">
      {{ __('OGAD') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      @can('user_index')
      <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
          <i class="material-icons">manage_accounts</i>
          <p>Usuarios</p>
        </a>
      </li>
      @endcan
      @can('post_index')
      <li class="nav-item{{ $activePage == 'posts' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('posts.index') }}">
          <i class="material-icons">library_books</i>
          <p>{{ __('Post') }}</p>
        </a>
      </li>
      @endcan
      @can('permission_index')
      <li class="nav-item{{ $activePage == 'permissions' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('permissions.index') }}">
          <i class="material-icons">lock_open</i>
          <p>{{ __('Permissions') }}</p>
        </a>
      </li>
      @endcan
      @can('role_index')
      <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('roles.index') }}">
          <i class="material-icons">build</i>
          <p>{{ __('Roles') }}</p>
        </a>
      </li>
      @endcan

    </ul>
  </div>
</div>