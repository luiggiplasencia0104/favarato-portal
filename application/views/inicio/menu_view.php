<nav class="collapse navbar-collapse menu">
    <ul class="nav navbar-nav sf-menu">
        <li>
            <a id="<?php if (isset($menu_home)) echo "current"; ?>" href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-inicio'); ?>">
                <?php echo lang("idioma.menu-opcion1"); ?>            
            </a>
        </li>
        <li>
            <a id="<?php if (isset($menu_about)) echo "current"; ?>" href="javascript:void(0);" >
                <?php echo lang("idioma.menu-opcion2"); ?>
                <span class="sf-sub-indicator">
                    <i class="icon-angle-down "></i>
                </span>
            </a>
            <ul>
                <li><a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-quienes-somos'); ?>/<?php echo lang('idioma.controlador-quienes-somos-acerca'); ?>" class="sf-with-ul"><?php echo lang("idioma.menu-opcion2-sub1"); ?></a></li>
                <li><a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-quienes-somos'); ?>/<?php echo lang('idioma.controlador-quienes-somos-equipo'); ?>" class="sf-with-ul"><?php echo lang("idioma.menu-opcion2-sub3"); ?></a></li>
            </ul>
        </li>
        <li>
            <a id="<?php if (isset($menu_products)) echo "current"; ?>" href="javascript:void(0);">
                <?php echo lang("idioma.menu-opcion3"); ?>
                <span class="sf-sub-indicator">
                    <i class="icon-angle-down "></i>
                </span>
            </a>
            <ul id="list_menu_categories">
                <!-- Carga el menu de categorías de productos -->
            </ul>
        </li>
        <li>
            <a id="<?php if (isset($menu_formas)) echo "current"; ?>" href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-formas_compra'); ?>">
                <?php echo lang("idioma.menu-opcion4"); ?>
            </a>
        </li>
        <li>
            <a id="<?php if (isset($menu_especiales)) echo "current"; ?>" href="<?php echo URL_MAIN; ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-especiales'); ?>">
                <?php echo lang("idioma.menu-opcion5"); ?>
            </a>
        </li>
        <li><a id="<?php if (isset($menu_contact)) echo "current"; ?>" href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-contactos'); ?>"><?php echo lang("idioma.menu-opcion6"); ?></a></li>
    </ul>
</nav>