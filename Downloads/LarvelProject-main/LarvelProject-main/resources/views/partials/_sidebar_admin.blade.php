<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">UI Elements</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Dropdowns</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Typography</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item nav-category">Donations</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#donations-menu"
                aria-controls="restaurants-menu">
                <i class="menu-icon mdi mdi-hand-heart"></i>
                <span class="menu-title">Manage Donations</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="donations-menu">
                <ul class="nav flex-column sub-menu">
                    <!-- Show Restaurants -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.donations.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            Donations list
                        </a>
                    </li>

                </ul>
            </div>
        </li>


        <li class="nav-item nav-category">Reviews</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#reviews-menu" aria-controls="reviews-menu">
                <i class="menu-icon mdi mdi-comment-text-multiple-outline"></i> <!-- Updated review icon -->
                <span class="menu-title">My Reviews</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="reviews-menu">
                <ul class="nav flex-column sub-menu">
                    <!-- View My Reviews -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.reviews.index') }}">
                            <!-- Updated route for reviews -->
                            <i class="menu-icon mdi mdi-eye"></i>
                            View My Reviews
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Form elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="#">Basic Elements</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
        <li class="nav-item nav-category">Product Categories</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#categories" aria-expanded="false"
                aria-controls="categories">
                <i class="menu-icon mdi mdi-format-list-bulleted"></i>
                <span class="menu-title">Product Categories</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="categories">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">
                            <i class="menu-icon mdi mdi-view-list"></i>
                            List Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.create') }}">
                            <i class="menu-icon mdi mdi-plus-circle-outline"></i>
                            Add Category
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
