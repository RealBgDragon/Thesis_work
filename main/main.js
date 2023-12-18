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
