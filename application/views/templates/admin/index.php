<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if (!isset($this->session->admin)): $admin = unserialize($this->session->userdata('admin')) ?>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur et hic, maxime nam, nesciunt perferendis
        quia quidem rem reprehenderit repudiandae velit vero voluptate voluptatibus! Eos hic iure odit quisquam
        tempora.</p>
<?php else: ?>
    <a class="btn" href="<?php echo base_url('admin/product/create/')?>">Create</a>
<?php endif; ?>
<?php //redirect('customer/home');
