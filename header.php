<header>
    <img src="global-images/logo.png">
    <form class="search-bar">
        <input type="text" placeholder="Search for products..." name="search">
        <button type="submit">Search</button>
    </form>
    <div class="auth-links">
        <?php if (isset($_SESSION['username'])):
            echo "<a href='user.php' class='user-link'>Profile</a>";
            echo "<a href='private/logout.php' class='user-link'>Logout</a>";
        else:
            echo "<a href='login.php' class='user-link'>Login</a>";
            echo "<a href='register.php' class='user-link'>Register</a>";
        endif; ?>
    </div>
</header>
<nav>
    <ul>
        <li><a href="main.php">Main</a></li>
        <li><a href="admin-product.php">Products</a></li>
        <li><a href="about-us.php">About Us</a></li>
    </ul>
</nav>