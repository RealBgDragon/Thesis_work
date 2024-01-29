document.addEventListener("DOMContentLoaded", function () {
    const productContainer = document.querySelector(".list-products");
    let isScrollingRight = true;

    const scrollProducts = () => {
        if (isScrollingRight) {
            // Scroll to the right
            productContainer.scrollLeft += productContainer.clientWidth;
        } else {
            // Scroll back to the start
            productContainer.scrollLeft = 0;
        }

        // Toggle the direction
        isScrollingRight = !isScrollingRight;
    };

    // Start the interval
    setInterval(scrollProducts, 10000); // Adjust the interval as needed
});

//? JS for the login success dissapearing
document.addEventListener("DOMContentLoaded", (event) => {
    if (document.querySelector(".login-success")) {
        setTimeout(function () {
            document.querySelector(".login-success").style.display = "none";
            document.body.classList.remove("body-with-success");
        }, 5000);
        document.body.classList.add("body-with-success");
    }
});
