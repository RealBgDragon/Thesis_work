<header>
    <a href="main.php">
        <img src="global-images/logo.png" alt="Logo">
    </a>
    <form class="search-bar">
        <input type="search" placeholder="Search for products..." name="search">
        <button type="submit">Search</button>
    </form>
    <div class="auth-links">
        <?php if (isset($_SESSION['userId'])):
            echo "<a href='user.php' class='user-link'>Profile</a>";
            echo "<a href='private/logout.php' class='user-link'>Logout</a>";
        else:
            echo "<a href='login.php' class='user-link'>Login</a>";
            echo "<a href='register.php' class='user-link'>Register</a>";
        endif; ?>
    </div>
    <div class="cart-icon">
        <span class="cart-count">0</span>
        <a href=cart.php><i class="fas fa-shopping-cart"></i></a>
    </div>

    <div class="cart-modal">
        <!-- <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Cart</h2>
            <div class="cart-items">
                Cart items will be dynamically added here
            </div>
            <div class="cart-total">
                <p>Total: $<span class="total-amount">0</span></p>
            </div>
        </div> -->
    </div>
</header>
<nav>
    <ul>
        <li><a href="main.php">Main</a></li>
        <li><a href="all-products.php">Products</a></li>
        <li><a href="about-us.php">About Us</a></li>
    </ul>
</nav>