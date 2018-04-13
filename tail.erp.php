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

<script src="<?php echo G5_ERP_URL ?>/js/erp.js?ver=<?php echo G5_JS_VER; ?>"></script>

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});

// 검색어 체크
function fpdsearch_submit(f)
{
	/*
	if (f.stx.value.length < 2)
	{
		alert("검색어는 두글자 이상 입력하십시오.");
		f.stx.select();
		f.stx.focus();
		return false;
	}
	*/

	// 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
	var cnt = 0;
	for (var i=0; i<f.stx.value.length; i++) {
		if (f.stx.value.charAt(i) == ' ')
			cnt++;
	}
	if (cnt > 2) {
		alert("빠른 검색을 위하여 검색어에 3개 단어만 입력할 수 있습니다.");
		f.stx.select();
		f.stx.focus();
		return false;
	}
}
</script>

<?php
include_once(G5_PATH."/tail.erp.sub.php");
?>