<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if (isset($this->session->admin)): $admin = unserialize($this->session->userdata('admin')) ?>
    <p>Hello admin, <?php echo $admin->name ?> <a href="<?php echo site_url('admin/admin/out') ?>">Exit</a></p>
<?php else: ?>
    <a href="<?php echo site_url('admin/admin/login') ?>">Enter</a> |
    <a href="<?php echo site_url('admin/admin/register') ?>">Register</a>
<?php endif; ?>
