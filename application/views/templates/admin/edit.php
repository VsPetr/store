<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<a href="<?php echo site_url('admin/home') ?>">Home</a>
<form action="<?php echo base_url('admin/product/update') ?>" method="post">
    <p>Id</p>
    <p><?php echo $id ?></p>
    <p><input type="text" hidden name="id" value = "<?php echo $id ?>" ></p>
    <p>Наименование</p>
    <p><input type="text" name="name" placeholder="name" value = "<?php echo $name ?>"></p>
    <p>Описание</p>
    <p><textarea name="specification" placeholder="specification" cols="33%" rows="3"><?php echo $specification ?></textarea></p>
    <p>Цена</p>
    <p><input type="text" name="price" placeholder="price" value = "<?php echo $price ?>"></p>
    <p>Количество</p>
    <p><input type="text" name="quantity" placeholder="quantity" value = "<?php echo $quantity ?>"></p>
    <p><input type="submit" name="save" value="Save"></p>
</form>
