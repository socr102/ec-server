<div class="order-navigator">
    <div class="nav-row row">
        <div class="nav-col">
            <a class="nav-item" id="list-navigator" href="{{ route('home.customer.order.list') }}">
                <i class="fa fa-check"></i>
            </a>
        </div>
        <div class="nav-col">
            <a class="nav-item" id="history-navigator" href="{{ route('home.customer.order.history') }}">
                <i class="fa fa-clock"></i>
            </a>
        </div>
        <div class="nav-col">
            <a class="nav-item" id="cart-navigator" href="{{ route('home.customer.order.cart') }}">
                <i class="fa fa-shopping-basket"></i>
            </a>
        </div>
        <div class="nav-col">
            <a class="nav-item" id="new-order-navigator" href="{{ route('home.customer.order.cart') }}">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
</div>