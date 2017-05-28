<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if (isset($this->session->customer)): ?>
    <?php if (!empty($product)): ?>
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Наименование</td>
                <td>Цена</td>
                <td>Количество</td>
                <td>Сумма</td>
                <td colspan="3" align="center">Action</td>
            </tr>
            <?php foreach ($product as $item): ?>
                <tr>
                    <?php echo '<td>' . $item['product_id'] .'</td><td>'. $item['name'] .'</td><td>' . $item['price'] . '</td><td>' . $item['qty']. '</td><td>' . $item['qty'] * $item['price'] . '</td>'; ?>
                    <td><a href="<?php echo site_url('product/view?id='.$item['product_id']) ?>">View</a></td>
                    <td><a href="<?php echo site_url('basket/abate?id='.$item['product_id']) ?>">Abate</a></td>
                    <td><a href="<?php echo site_url('basket/delete_item?id='.$item['product_id']) ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            <tr><?php echo '<td colspan="4" align="center">' . "Итого к оплате" .'</td><td>' . $basket->total_price .'</td><td colspan="3"></td>' ?></tr>
        </table>
    <?php endif; ?>
<?php endif; ?>
