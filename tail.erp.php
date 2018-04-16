<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
if (G5_IS_MOBILE) { include_once(G5_MOBILE_PATH.'/tail.php'); return;}
?>
        </div><!--wrapper-->
        <footer id="ft">
            <p>
                Copyright © http://www.domain.com All rights reserved.<br>
                <a href="#">Go to Top</a>
            </p>
        </footer>
    </div><!--wrapper-->
</div><!--wrapper-->

<!--
<div class='lsh-toast'></div>
<div class="loadimgWrap"><img src="<?php echo G5_IMG_URL;?>/loading_now.gif" class="loadimg"></div>
-->
<?php if ($config['cf_analytics']) { echo $config['cf_analytics'];}?>

<!-- } 하단 끝 -->
<script type="text/javascript" src="<?php echo G5_PLUGIN_URL ?>/scrollbar/js/jquery.mCustomScrollbar.concat.min.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script src="<?php echo G5_ERP_URL ?>/js/erp.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>


<?php
include_once(G5_PATH."/tail.erp.sub.php");
?>