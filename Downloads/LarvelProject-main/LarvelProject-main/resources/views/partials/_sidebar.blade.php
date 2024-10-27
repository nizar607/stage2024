<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <!-- Restaurants Section -->
        <li class="nav-item nav-category">Restaurants</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#restaurants-menu" aria-controls="restaurants-menu">
                <i class="menu-icon mdi mdi-silverware-fork-knife"></i>
                <span class="menu-title">My Restaurants</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="restaurants-menu">
                <ul class="nav flex-column sub-menu" >
                    <!-- Show Restaurants -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('restaurants.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            My Restaurants
                        </a>
                    </li>
                    <!-- Add New Restaurant -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('restaurants.create') }}">
                            <i class="menu-icon mdi mdi-plus-circle"></i>
                            Add Restaurant
                        </a>
                    </li>
                    
                </ul>
            </div>
        </li>

        <li class="nav-item nav-category">Donations</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#donations-menu" aria-controls="restaurants-menu">
                <i class="menu-icon mdi mdi-hand-heart"></i>
                <span class="menu-title">My Donations</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="donations-menu">
                <ul class="nav flex-column sub-menu" >
                    <!-- Show Restaurants -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('donations.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            My Donations
                        </a>
                    </li>
                    <!-- Add New Restaurant -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('donations.create') }}">
                            <i class="menu-icon mdi mdi-plus-circle"></i>
                            Add Donation
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
                        <a class="nav-link" href="{{ route('reviews.index') }}"> <!-- Updated route for reviews -->
                            <i class="menu-icon mdi mdi-eye"></i>
                            View My Reviews
                        </a>
                    </li>

                </ul>
            </div>
        </li>
        

       <li class="nav-item nav-category">Products</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#restaurants-menu" aria-controls="restaurants-menu">
                <i class="menu-icon mdi mdi-food-apple"></i>
                <span class="menu-title">My Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="restaurants-menu">
                <ul class="nav flex-column sub-menu" >
                 
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}"">
                            <i class="menu-icon mdi mdi-eye"></i>
                            List Products
                        </a>
</div>
                    
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('products.create') }}">
                            <i class="menu-icon mdi mdi-plus-circle"></i>
                            Add Product
                        </a>
                    </li>
           
      
                </ul>
            </div>
        </li>

        <!-- Add this inside the <ul class="nav"> -->
        <li class="nav-item nav-category">Inventory</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#product-stocks-menu" aria-controls="product-stocks-menu">
                <i class="menu-icon mdi mdi-package-variant"></i>
                <span class="menu-title">Product Stocks</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product-stocks-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product_stocks.index') }}">
                            <i class="menu-icon mdi mdi-eye"></i>
                            View Stocks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product_stocks.create') }}">
                            <i class="menu-icon mdi mdi-plus-circle"></i>
                            Add Stock
                        </a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
