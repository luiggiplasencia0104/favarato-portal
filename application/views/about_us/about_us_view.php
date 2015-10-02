<!-- Title, Breadcrumb Start-->
<?php $this->load->view("inicio/breadcrumbs_view"); ?>
<!-- Title, Breadcrumb End-->

<!-- Main Content start-->
<div class="content">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php $this->load->view("inicio/social_buttons_pages_view"); ?>
            </div>                
        </div>

        <br /><br />
        
        <div class="row">
            <div class="sidebar col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <!-- Left nav Widget Start -->
                <?php $this->load->view("about_us/navigation_about_us"); ?>
                <!-- Left nav Widget End -->
            </div>
            <!-- Sidebar End -->
            <div class="posts-block col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="side-segment"><h3><?php echo lang("idioma.menu-opcion2-sub1"); ?></h3></div>
                <article class="post hentry">
                    <div class="post-image">
                        <a href="<?php echo URL_UPLOADS."uploads_publicidad/".$publicidad[0]["cMLinkMiniatura"]; ?>" data-gal="prettyPhoto" title="<?php echo $publicidad[0]["cTbIdDescripcion"]; ?>">
                            <span class="img-hover"></span>
                            <span class="fullscreen"><i class="icon-search"></i></span>
                            <img src="<?php echo URL_UPLOADS."uploads_publicidad/".$publicidad[0]["cMLinkMiniatura"]; ?>" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <p class="parrafo_justificado">
                            <?php echo lang('idioma.aboutus-parrafo1'); ?>
                        </p>
                        <p class="parrafo_justificado">
                            <?php echo lang('idioma.aboutus-parrafo2'); ?>
                        </p>
                        <p class="parrafo_justificado">
                            <?php echo lang('idioma.aboutus-parrafo3'); ?>
                        </p>
                        <p class="parrafo_justificado">
                            <?php echo lang('idioma.aboutus-parrafo4'); ?>
                        </p>
                    </div>
                </article>
            </div>
            <!-- Left Section End -->
        </div>
    </div>
</div>