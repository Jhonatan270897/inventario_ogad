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
      <!--Manejo de almacen-->
      @can('entrada_index')
      <li class="nav-item{{ $activePage == 'entrada' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('almacen.entrada') }}">
          <i class="material-icons">library_books</i>
          <p>{{ __('Entrada Almacen') }}</p>
        </a>
      </li>
      @endcan
      @can('almacen_index')
      <li class="nav-item{{ $activePage == 'almacen' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('almacen.stock') }}">
          <i class="material-icons">library_books</i>
          <p>{{ __('Almacen') }}</p>
        </a>
      </li>
      @endcan
      @can('salida_index')
      <li class="nav-item{{ $activePage == 'salida' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('almacen.salida') }}">
          <i class="material-icons">library_books</i>
          <p>{{ __('Salida Almacen') }}</p>
        </a>
      </li>
      @endcan
      @can('producto_index')
      <li class="nav-item{{ $activePage == 'producto' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('almacen.producto') }}">
          <i class="material-icons">library_books</i>
          <p>{{ __('Ingresar Productos') }}</p>
        </a>
      </li>
      @endcan
      @can('marca_index')
      <li class="nav-item{{ $activePage == 'marca' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('almacen.marca') }}">
          <i class="material-icons">library_books</i>
          <p>{{ __('Ingresar Marcas') }}</p>
        </a>
      </li>
      @endcan
      @can('categoria_index')
      <li class="nav-item{{ $activePage == 'categoria' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('almacen.categoria') }}">
          <i class="material-icons">library_books</i>
          <p>{{ __('Ingresar Categorias') }}</p>
        </a>
      </li>
      @endcan
      @can('persona_index')
      <li class="nav-item{{ $activePage == 'persona' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('posts.index') }}">
          <i class="material-icons">library_books</i>
          <p>{{ __('Ingresar Personas') }}</p>
        </a>
      </li>
      @endcan
      <!--Manejo de usuarios-->
      @can('user_index')
      <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
          <i class="material-icons">manage_accounts</i>
          <p>Usuarios</p>
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