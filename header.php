<header>
    <a href="main.php">
        <img src="global-images/logo.png" alt="Logo">
    </a>
    <form action="search.php?action=search" method="get" class="search-bar">
        <input type="search" placeholder="Search for products..." name="search" id="search">
        <button type="submit">Search</button>
    </form>
    <div class="auth-links">
        <?php if (isset ($_SESSION['userId'])):
            echo "<a href='user.php' class='user-link'>Profile</a>";
            echo "<a href='private/logout.php' class='user-link'>Logout</a>";
        else:
            echo "<a href='login.php' class='user-link'>Login</a>";
            echo "<a href='register.php' class='user-link'>Register</a>";
        endif; ?>
    </div>
    <div class="cart-icon">
        <?php
        $totalQty = 0;
        if (isset ($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $productId => $item) {
                $totalQty += $item['qty'];
            }
        }
        echo "<span class='cart-count'>$totalQty</span>";
        ?>
        <a href=cart.php><i class="fas fa-shopping-cart"></i></a>
    </div>
</header>
<nav>
    <ul>
        <li><a href="main.php">Main</a></li>
        <li><a href="all-products.php">Products</a></li>
        <li><a href="about-us.php">About Us</a></li>
    </ul>
</nav>