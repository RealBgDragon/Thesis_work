<?php

function displayOrders($orders)
{
    ?>
    <h1>Orders List</h1>
    <hr>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Order Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars("$order[order_id]"); ?></td>
                        <td><?php echo htmlspecialchars("$order[userId]"); ?></td>
                        <td><?php echo htmlspecialchars("$order[status]"); ?></td>
                        <td><?php echo htmlspecialchars("$order[totalPrice]"); ?></td>
                        <td><?php echo htmlspecialchars("$order[orderDate]"); ?></td>
                        <td>
                            <button class="info-button">More Info</button>
                            <form action="private/check-out-data/check_out_data_complete.inc.php" method="POST">
                                <input type="hidden" name="order_id"
                                    value="<?php echo htmlspecialchars($order['order_id']); ?>">
                                <button class="complete-button">Finish</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <?php
}
?>