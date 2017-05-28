<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if (isset($this->session->customer)): $customer = unserialize($this->session->userdata('customer')) ?>
    <p>Hello, <?php echo $customer->name ?> <a href="<?php echo site_url('customer/out') ?>">Exit</a></p>
<?php else: ?>
    <a href="<?php echo site_url('customer/login') ?>">Enter</a> |
    <a href="<?php echo site_url('customer/register') ?>">Register</a>
<?php endif; ?>
