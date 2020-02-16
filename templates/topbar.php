<?php
/**
 * @package     Ovez Theme
 * @version     1.0
 * @author      NanoAgency
 * @link        http://nanoagency.co
 * @copyright   Copyright (c) 2018 NanoAgency
 * @license     GPL v2
 */
?>

<div class="row">
    <div class="topbar-left col-xs-12">
        <?php if(is_active_sidebar( 'topbar-left' )){
            dynamic_sidebar('topbar-left');
        }?>

    </div>
</div>

