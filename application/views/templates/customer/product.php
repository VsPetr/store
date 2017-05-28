<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<a href="<?php echo site_url('product') ?>">Products</a>
<a href="<?php echo site_url('basket/view') ?>">Basket</a>
<?php echo $total_qty ?>
<form action="<?php echo base_url('basket/create') ?>" method="get">
    <p><input type="hidden" name="id" value="<?php echo $id ?>">
    <p>Id - <?php echo $product->id ?></p>
    <p>Наименование - <?php echo $product->name ?></p>
    <p>Описание - <?php echo $product->specification ?></p>
    <p>Цена - <?php echo $product->price ?></p>
    <p>Количество - <?php echo $product->quantity ?></p>
    <p><input type="number" pattern = "[0-9]{,3}" name="qty" style="width:5%">
    <input type="submit" name="save" value="Basket"></p>
</form>
