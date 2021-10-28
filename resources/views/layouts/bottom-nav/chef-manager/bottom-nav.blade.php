<div class="bottom-nav">
    <div class="nav-row row">
        <div class="col-4 nav-col">
            <a class="nav-item" id="notification-navigator" href="{{ route('home.chef-manager.notification.list') }}">
                <i class="fa fa-bell"></i>
                <p>Notification</p>
            </a>
        </div>
        <div class="col-4 nav-col">
            <a class="nav-item" id="list-navigator" href="{{ route('home.chef-manager.list.users') }}">
                <i class="fa fa-tasks"></i>
                <p>Users List</p>
            </a>
        </div>
        <div class="col-4 nav-col">
            <a class="nav-item" id="support-navigator" href="{{ route('home.chef-manager.customer-support') }}">
                <i class="fa fa-question-circle"></i>
                <p>Support</p>
            </a>
        </div>
    </div>
</div>