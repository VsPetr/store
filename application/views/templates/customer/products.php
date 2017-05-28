<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
<?php if (isset($this->session->customer)): ?>
    <?php if (!empty($product)): ?>
        <head>
            <title>Products</title>
        </head>
        <table border="1">
            <tr>
                <td>Наименование</td>
                <td>Описание</td>
                <td>Цена</td>
                <td>Количество</td>
            </tr>
            <?php foreach ($product as $item): ?>
                <tr>
                    <?php echo '<td>' . $item['name'] . '</td><td>' . $item['specification'] . '</td><td>' . $item['price'] . '</td><td>' . $item['quantity'] . '</td>'; ?>
                    <td><a href="<?php echo site_url('product/view?id='.$item['id']) ?>">View</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
<?php endif; ?>
</html>
