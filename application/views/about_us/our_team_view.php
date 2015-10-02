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

            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="side-segment"><h3><?php echo lang("idioma.menu-opcion2-sub3"); ?></h3></div>

                <div class="row team">
                    <!-- items -->
                    <?php if (count($team_fava) > 0) { ?>
                        <?php $i = 0; ?>
                        <?php foreach ($team_fava as $team_fava) { ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 item d<?php echo $i; ?>">
                                <div class="team-member">
                                    <div class="team-member-holder">
                                        <div class="team-member-image">
                                            <img alt="" src="<?php echo URL_UPLOADS; ?>uploads_usuario/thumbs_261x305/<?php echo $team_fava->foto; ?>">
                                            <div class="team-member-links">
                                                <div class="team-member-links-list">
                                                    <a title="<?php echo $team_fava->facebook; ?>" class="facebook team-member-links-item"><i class="icon-facebook"></i></a>
                                                    <a title="<?php echo $team_fava->skype; ?>" class="twitter team-member-links-item" href="#"><i class="icon-skype"></i></a>
                                                    <a data-gal="prettyPhoto" title="<?php echo $team_fava->NombrePersonaPortal; ?>" class="linkedin team-member-links-item" href="<?php echo URL_UPLOADS; ?>uploads_usuario/<?php echo $team_fava->foto; ?>"><i class="icon-search"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="team-member-meta">
                                            <h4 class="team-member-name color_resaltante negrita"><?php echo $team_fava->NombrePersonaPortal; ?></h4>
                                            <div class="team-member-role"><?php echo $team_fava->cargo; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                        <?php } ?>

                    <?php } else { ?>

                    <?php } ?>
                    <!-- End -->
                </div>
            </div>
            <!-- Left Section End -->
        </div>
    </div>
</div>