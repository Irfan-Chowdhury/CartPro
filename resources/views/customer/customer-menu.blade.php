<ul class="">
    <li>
        <a class="nav-link {{ (request()->is('home')) ? 'active' : '' }}" href="{{ url('home') }}">Dashboard</a>
    </li>
    <li>
        <a class="nav-link {{ (request()->is('orders')) ? 'active' : '' }}" href="{{ url('orders') }}">Orders</a>
    </li>
    <!-- <li>
        <a class="nav-link {{ (request()->is('wishlist')) ? 'active' : '' }}" href="{{ url('wishlist') }}">Wishlist</a>
    </li> -->
    <li>
        <a class="nav-link {{ (request()->is('address')) ? 'active' : '' }}" href="{{ url('address') }}">Address</a>
    </li>
    <li>
        <a class="nav-link {{ (request()->is('account-details')) ? 'active' : '' }}" href="{{ url('account-details') }}">Account Details</a>
    </li>
    <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-link" type="submit"><i class="dripicons-exit"></i> {{trans('file.logout')}}</button>
        </form>
    </li>
</ul>