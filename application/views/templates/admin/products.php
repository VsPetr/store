<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if (isset($this->session->admin)): ?>
    <table border="1">
        <?php if (!empty($product)): ?>
            <tr>
                <td>Id</td>
                <td>Наименование</td>
                <td>Описание</td>
                <td>Цена</td>
                <td>Количество</td>
            </tr>
            <?php foreach ($product as $item): ?>
                <tr>
                    <?php echo '<td>' . $item['id'] . '</td><td>' . $item['name'] . '</td><td>' . $item['specification'] . '</td><td>' . $item['price'] . '</td><td>' . $item['quantity'] . '</td>'; ?>
                    <td>
                        <a class="btn" href="<?php echo base_url('admin/product/edit/' . $item['id']) ?>">Edit</a>
                    </td>
                    <td>
                        <a class="btn" href="<?php echo base_url('admin/product/delete/' . $item['id']) ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
<?php endif; ?>
