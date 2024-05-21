<?php

function displayUserOrders($orders, $order)
{
    ?>
    <h1>Orders List</h1>
    <hr>
    <h1>User info</h1>
    <p>Name: <?php echo htmlspecialchars($orders['name']); ?><br>
        Email: <?php echo htmlspecialchars($orders['email']); ?><br>
        Address: <?php echo htmlspecialchars($orders['address']); ?><br>
        City: <?php echo htmlspecialchars($orders['city']); ?><br>
        Country: <?php echo htmlspecialchars($orders['country']); ?></p>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order as $orde) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars("$orde[product_id]"); ?></td>
                        <td><?php echo htmlspecialchars("$orde[quantity]"); ?></td>
                        <td><?php echo htmlspecialchars("$orde[price]"); ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <?php
}
?>