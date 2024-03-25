// Update price range display
function updatePriceRange(value) {
    document.getElementById("price-range").textContent = "0 - " + value;
}

// Update power consumption range display
function updatePowerRange(value) {
    document.getElementById("power-range").textContent = "0 - " + value;
}

// Filter products based on selected filters
function filterProducts() {
    const priceFilter = document.getElementById("price-filter").value;
    const brandFilter = document.getElementById("brand-filter").value;
    const stockFilter = document.getElementById("stock-filter").value;
    const powerFilter = document.getElementById("power-filter").value;
    const wifiFilter = document.getElementById("wifi-filter").value;

    const products = document.querySelectorAll(".item");

    products.forEach((product) => {
        const price = parseFloat(product.querySelector(".price").value);
        const brand = product.querySelector(".brand").value;
        const inStock = product.querySelector(".stock").value;
        const power = parseFloat(product.querySelector(".power").value);
        const hasWifi = product.querySelector(".wifi").value === "1";

        const priceMatch = price <= priceFilter;
        const brandMatch = brandFilter === "" || brand === brandFilter;
        const stockMatch =
            stockFilter === "" ||
            (stockFilter === "1" && inStock > 0) ||
            (stockFilter === "0" && inStock <= 0);
        const powerMatch = power <= powerFilter;
        const wifiMatch =
            wifiFilter === "" ||
            (wifiFilter === "1" && hasWifi) ||
            (wifiFilter === "0" && !hasWifi);

        if (priceMatch && brandMatch && stockMatch && powerMatch && wifiMatch) {
            product.style.display = "block";
        } else {
            product.style.display = "none";
        }
    });
}
