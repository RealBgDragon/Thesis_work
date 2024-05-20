<?php

function displayUserOrders($orders, $order)
{
    ?>
    <h1>Orders List</h1>
    <hr>
    <h1>User info</h1>
    <p><?php echo $order['name'];
    echo $order['email'];
    echo $order['address'];
    echo $order['city'];
    echo $order['country'];

    ?></p>
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
                <?php foreach ($orders as $order) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars("$orders[product_id]"); ?></td>
                        <td><?php echo htmlspecialchars("$orders[quantity]"); ?></td>
                        <td><?php echo htmlspecialchars("$orders[price]"); ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <?php
}
?>