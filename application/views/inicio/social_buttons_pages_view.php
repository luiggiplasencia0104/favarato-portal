<?php
$language = $this->uri->segment(1);
$lang_abr = $language === 'es' ? 'ES' : 'US';
?>

<div class="container_buttons_socials_pages">

    <!-- BUTTONS SOCIAL FACEBOOK -->
    <div class="buttons_facebook">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.async = true;
            js.src = "//connect.facebook.net/<?php echo $language; ?>_<?php echo $lang_abr; ?>/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <div class="fb-like" data-href="<?php echo $url_social; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
    </div>
    <!-- /BUTTONS SOCIAL FACEBOOK -->

    <!-- BUTTONS SOCIAL TWITTER -->
    <div class="buttons_twitter">
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url_social; ?>" data-via="FavaratoExpress" data-lang="<?php echo $language; ?>">Twittear</a>
        <script>
            !function(d,s,id){
            var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
            if(!d.getElementById(id)){
                js=d.createElement(s);
                js.id=id;
                js.async = true;
                js.src=p+'://platform.twitter.com/widgets.js';
                fjs.parentNode.insertBefore(js,fjs);
            }
        }(document, 'script', 'twitter-wjs');    
        </script>
    </div>
    <!-- /BUTTONS SOCIAL TWITTER -->

    <!-- BUTTONS SOCIAL GOOGLE PLUS -->
    <div class="buttons_googleplus">
        <g:plusone></g:plusone>

        <script type="text/javascript">
        window.___gcfg = {
            lang: '<?php echo $language; ?>-<?php echo $lang_abr; ?>'
        };
        
        (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
        </script>
    </div>
    <!-- /BUTTONS SOCIAL GOOGLE PLUS -->

    <!-- BUTTONS SOCIAL LINKEDIN -->
    <div class="buttons_linkedin">
        <script src="//platform.linkedin.com/in.js" async type="text/javascript">
        lang: <?php echo $language; ?>_<?php echo $lang_abr; ?>
        </script>
        <script type="IN/Share" data-url="<?php echo $url_social; ?>" data-counter="right"></script>
    </div>
    <!-- /BUTTONS SOCIAL LINKEDIN -->

    <!-- BUTTONS SOCIAL PINTEREST -->
    <div class="buttons_pinterest">
        <a href="//es.pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.favaratotrade.com%2Fportal%2Fes%2Finicio&media=http%3A%2F%2Fwww.favaratotrade.com%2Fintranet%2Fuploads%2Fuploads_publicidad%2F57c9cc457a13688507cc612be3b56de3_Principal_Target.jpg&description=Next%20stop%3A%20Pinterest" data-pin-do="buttonPin" data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a>
        <!-- Please call pinit.js only once per page -->
        <script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>
    </div>
    <!-- /BUTTONS SOCIAL PINTEREST -->
</div>