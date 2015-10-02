<aside class="subnav_cont sidebar_menu_left">
    <div class="subnav">
        <ul class="ul_menu_bonito">
            <li class="<?php if (isset($left_navigation1)) echo "current_subpage"; ?>">
                <a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-quienes-somos'); ?>/<?php echo lang('idioma.controlador-quienes-somos-acerca'); ?>"><span><?php echo lang("idioma.menu-opcion2-sub1"); ?></span></a>
            </li>
            <li class="<?php if (isset($left_navigation3)) echo "current_subpage"; ?>">
                <a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-quienes-somos'); ?>/<?php echo lang('idioma.controlador-quienes-somos-equipo'); ?>"><span><?php echo lang("idioma.menu-opcion2-sub3"); ?></span></a>
            </li>
        </ul>
    </div>
</aside>
