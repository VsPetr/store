<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<a href="<?php echo site_url('admin/home') ?>">Home</a>
<form action="<?php echo base_url('admin/product/create') ?>" method="post">
    <p><input type="hidden" name="id"></p>
    <p>Наименование</p>
    <p><input type="text" name="name" placeholder="name" value="<?php echo set_value('name') ?>"></p>
    <p>Описание</p>
    <p><textarea name="specification" placeholder="specification" cols="33%" rows="3"
                 value="<?php echo set_value('specification') ?>"></textarea></p>
    <p>Цена</p>
    <p><input type="text" name="price" placeholder="price" value="<?php echo set_value('price') ?>"></p>
    <p>Количество</p>
    <p><input type="text" name="quantity" placeholder="quantity" value="<?php echo set_value('quantity') ?>"></p>
    <p><input type="submit" name="save" value="Save"></p>
</form>
