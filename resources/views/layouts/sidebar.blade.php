<ul class="sidebar-menu">
  <li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
    <a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
  </li>
</ul>
<ul class="sidebar-menu">
  <li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Users</span></a>
  </li>
</ul>
<ul class="sidebar-menu">
  <li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{{ route('categories.index') }}"><i class="fa fa-tags"></i> <span>Categories</span></a>
  </li>
</ul>
<ul class="sidebar-menu">
  <li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{{ route('products.index') }}"><i class="fa fa-shopping-cart"></i> <span>Products</span></a>
  </li>
</ul>
<ul class="sidebar-menu">
  <li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{{ route('orders.index') }}"><i class="fa fa-cart-plus"></i> <span>Orders</span></a>
  </li>
</ul>
<ul class="sidebar-menu">
  <li class="{{ Request::is('e-mails*') ? 'active' : '' }}">
    <a href="{{ route('e-mails.index') }}"><i class="fa fa-envelope"></i> <span>Email</span></a>
  </li>
</ul>