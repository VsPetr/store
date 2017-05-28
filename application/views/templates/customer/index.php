<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if (!isset($this->session->customer)): $customer = unserialize($this->session->userdata('customer')) ?>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur et hic, maxime nam, nesciunt perferendis
        quia quidem rem reprehenderit repudiandae velit vero voluptate voluptatibus! Eos hic iure odit quisquam
        tempora.
    </p>
<?php else: ?>
    <p>
        Это наш замечательный сайт! Для покупки наших товаров.
        <a href="<?php echo site_url('product') ?>">Product</a>
    </p>
<?php endif;