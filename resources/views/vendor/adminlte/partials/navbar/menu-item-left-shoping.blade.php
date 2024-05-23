<!--CARRITO -->
<li class="nav-item">
    <a class="nav-link" href=" {{ route('checkout') }} "><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;<span
            class="badge bg-danger">
            {{ \Cart::count() }} </span>

        <span class="sr-only">{{ __('adminlte::adminlte.toggle_navigation') }}</span>
    </a>
</li>
