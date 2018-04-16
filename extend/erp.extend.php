<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

//------------------------------------------------------------------------------
// ERP 상수모음 시작
//------------------------------------------------------------------------------

define('G5_ERP_DIR', 'erp');
define('G5_ERP_PATH', G5_PATH.'/'.G5_ERP_DIR);
define('G5_ERP_URL', G5_URL.'/'.G5_ERP_DIR);

define('G5_ADMINERP_DIR', 'erp');
define('G5_ADMINERP_PATH', G5_ADMIN_PATH.'/'.G5_ADMINERP_DIR);
define('G5_ADMINERP_URL', G5_ADMIN_URL.'/'.G5_ADMINERP_DIR);

//------------------------------------------------------------------------------
// ERP 함수모음 시작
//------------------------------------------------------------------------------

function alert_goto_url($msg='',$url)
{
	global $g5;

	echo '<meta charset="utf-8">';
	echo "<script type='text/javascript'> alert('$msg'); document.location.href='$url';</script>";
	exit;
}

function alert_goto_url_back($msg='')
{
	global $g5;

	echo '<meta charset="utf-8">';
	echo "<script type='text/javascript'> alert('$msg'); history.back(-1); </script>";
	exit;
}

function alert_replace_url($msg='',$url)
{
	global $g5;

	echo '<meta charset="utf-8">';
	echo "<script type='text/javascript'> alert('$url'); document.location.replace('$url');</script>";
	exit;
}

function replace_url($url)
{
	global $g5;

	echo '<meta charset="utf-8">';
	echo "<script type='text/javascript'>parent.document.location.replace('$url');</script>";
	exit;
}

// 메시지 출력후 부모창 리프레시 후 창을 닫음
function alert_goto_url_closelayer($msg,$url)
{
	global $g5;

	echo '<meta charset="utf-8">';
	echo "<script type='text/javascript'> alert('$msg'); parent.document.location.href='$url';</script>";
	exit;
}

// 부모창 리프레시 후 창을 닫음
function goto_url_closelayer($url)
{
	global $g5;

	echo '<meta charset="utf-8">';
	echo "<script type='text/javascript'> parent.document.location.href='$url';</script>";
	exit;
}

//메시지 출력후 모달창 닫음
function close_modal()
{
	global $g5;

	echo '<meta charset="utf-8">';
	echo "<script type='text/javascript'>parent.document.location.reload();</script>";
	exit;
}

//메시지 출력후 모달창 닫음
function alert_close_modal($msg='',$layernum)
{
	global $g5;

	$closelayer = "parent.closelayer".$layernum."();";

	echo '<meta charset="utf-8">';
	echo "<script type='text/javascript'> alert('$msg'); ".$closelayer."</script>";
	exit;
}

function returnError($errorstr,$errorurl)
{
    global $g5, $config, $member;
    global $is_admin;

	$returnVal = array (
			"errcode"=>$errorstr,
			"errurl"=>$errorurl
	);
	return $returnVal;
}

function returnErrorArr($errorstr,$errorurl)
{
    global $g5, $config, $member;
    global $is_admin;

	$returnVal = json_encode(
		array(
			"rslt"=>"error", 
			"errcode"=>$errorstr,
			"errurl"=>$errorurl
		)
	);
	return $returnVal;
}

function curl($url) {
    $ch = curl_init ();
    
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
    $g = curl_exec ( $ch );
    curl_close ( $ch );
    return $g;
}

function time_gap_ago($datetime) {

	$date1 = strtotime($datetime);
	$date2 = time();
	$subTime = $date2 - $date1;

	$y = floor($subTime/(60*60*24*365));
	$d = floor($subTime/(60*60*24))%365;
	$h = floor($subTime/(60*60))%24;
	$m = floor($subTime/60)%60;

	if($y>0)
	{
		if($y > 1) $postfix_y = "년"; else $postfix_y = "년";
		if($d > 0)
		{
			if($d > 1) $postfix_d = "일"; else $postfix_d = "일";
			$timegap =  $y.$postfix_y." ".$d.$postfix_d."전";
		}
		else
		{
			$timegap =  $y.$postfix_y."전";
		}
	}
	else if($d > 0)
	{
		if($d > 1) $postfix_d = "일"; else $postfix_d = "일";
		$timegap =  $d.$postfix_d."전";
	}
	else if($h > 0)
	{
		if($h > 1) $postfix_h = "시간"; else $postfix_h = "시간";
		$timegap =  $h.$postfix_h."전";
	}
	else if($m > 0)
	{
		if($m > 1) $postfix_m = "분"; else $postfix_m = "분";
		$timegap =  $m.$postfix_m."전";
	}
	else
	{
		$timegap =  "방금전";
	}

	return $timegap;
}

function set_image_rotate($file){
	//jpeg파일만 지원됨.
	$_file_src = $file;
	if( file_exists($_file_src)){
		$_exif = @exif_read_data($_file_src);
		//print_r2($_exif);
		if (!empty($_exif['Orientation'])) {
			$image = imagecreatefromjpeg($_file_src);
			switch ($_exif['Orientation']) {
				case 3 : $image = imagerotate($image, 180, 0); break;
				case 6 : $image = imagerotate($image, -90, 0); break;
				case 8 : $image = imagerotate($image, 90, 0); break;
				default : return;
			}
			imagejpeg($image, $_file_src);
		}
	}
	return;
}

function center_crop($src,$target,$thumb_w,$thumb_h,$quality=80) {
    $imgsize = getimagesize($src);
    $mime = $imgsize['mime'];
 
    switch ($mime) {
        case 'image/gif':
            $gd_image_create = "imagecreatefromgif";
            $gd_image = "imagegif";
            break;
 
        case 'image/png':
            $gd_image_create = "imagecreatefrompng";
            $gd_image = "imagepng";
            $quality = 7;
            break;
 
        case 'image/jpeg':
            $gd_image_create = "imagecreatefromjpeg";
            $gd_image = "imagejpeg";
            $quality = 80;
            break;
 
        default:
            return false;
            break;
    }
 
    /////////////
    $src_image = $gd_image_create($src);
	$target_image = $target;

	$thumb_width = $thumb_w;
	$thumb_height = $thumb_h;

	$width = imagesx($src_image);
	$height = imagesy($src_image);

	$original_aspect = $width / $height;
	$thumb_aspect = $thumb_width / $thumb_height;

	if ( $original_aspect >= $thumb_aspect )
	{
	   // If image is wider than thumbnail (in aspect ratio sense)
	   $new_height = $thumb_height;
	   $new_width = $width / ($height / $thumb_height);
	}
	else
	{
	   // If the thumbnail is wider than the image
	   $new_width = $thumb_width;
	   $new_height = $height / ($width / $thumb_width);
	}

	$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );
 
    imagealphablending($thumb, false);
    imagesavealpha($thumb, true);
    $transparent = imagecolorallocatealpha($thumb, 255, 255, 255, 127);
    imagefilledrectangle($thumb, 0, 0, $thumb_width, $thumb_height, $transparent);


	// Resize and crop
	imagecopyresampled($thumb, $src_image, 0 - ($new_width - $thumb_width) / 2, 0 - ($new_height - $thumb_height) / 2, 0, 0, $new_width, $new_height, $width, $height);
    $gd_image($thumb, $target_image, $quality);

    if ($thumb)  imagedestroy($thumb);
    if ($src_image) imagedestroy($src_image);
    if ($target_image) imagedestroy($target_image);
}
 
 // 제품명에서 특수문자 제거

function clean_spchars($name)
{
    $pattern = '/[\^|||`\\\]/';
    $name = preg_replace($pattern, '', $name);

    return $name;
}

function chk_access_level()
{
    global $g5, $config, $member, $_menu_arr;
    global $is_admin;

	$pgname = basename($_SERVER['SCRIPT_NAME']);

	if($member[mb_level] < 8)
	{
		$i=0; 
		while($i < count($_menu_arr)) 
		{
			$m_level = $_menu_arr[$i][0];
			$m_link = $_menu_arr[$i][2];
			$m_alias = $_menu_arr[$i][3];

			if($m_link == $pgname)
			{
				//if($member[mb_level] >= $m_level) {return true; break;}
				//else {return false; break;}
				if(in_array($m_alias, array_map("trim", explode('|', $member[ag_menu]))))  {return true; break;}
				else {return false; break;}
			}
			$i++;
		}
	}

    return true;
}

function get_microstamp($saltvalue="")
{
	$tm = explode(" ", microtime());
	$tm1 = substr($tm[0], 2);
	$tm2 = substr($tm1, 0,6);
	$tm3=$tm[1].$saltvalue.$tm2;

	return $tm3;
}

// 검색 구문을 얻는다.
function get_sql_search_lsh($search_field, $search_text, $search_operator='and', $join_field="")
{
    global $g5;

    $return_str = "";

    $search_text = strip_tags(($search_text));
    $search_text = trim(stripslashes($search_text));

    $return_str .= " and ";

    // 쿼리의 속도를 높이기 위하여 ( ) 는 최소화 한다.
    $op1 = "";

    // 검색어를 구분자로 나눈다. 여기서는 공백
    $s = array();
    $s = explode(" ", $search_text);

    // 검색필드를 구분자로 나눈다.
    $field = explode("||", $search_field);

    $return_str .= "(";
    for ($i=0; $i<count($s); $i++) 
	{
        // 검색어
        $search_str = trim($s[$i]);
        if ($search_str == "") continue;

        $return_str .= $op1;
        $return_str .= "(";

		$join_field = preg_match("/^[\w\,\|]+$/", $join_field) ? $join_field : "";

        $op2 = "";
        for ($k=0; $k<count($field); $k++) // 필드의 수만큼 다중 필드 검색 가능 (필드1+필드2...)
		{ 
            // SQL Injection 방지
            // 필드값에 a-z A-Z 0-9 _ , | 이외의 값이 있다면 검색필드를 wr_subject 로 설정한다.
            $field[$k] = preg_match("/^[\w\,\|]+$/", $field[$k]) ? $field[$k] : "wr_subject";
			$_searchField_field = "";

			if($join_field != "")  $_searchField_field =  $join_field.".".$field[$k];
			else $_searchField_field = $field[$k];

            $return_str .= $op2;
            switch ($_searchField_field) 
			{
                case "mb_id" :
                case "mb_nick" :
                    $return_str .= " $_searchField_field = '$s[$i]' "; break;
                case "hitcnt" :
                case "recomcnt" :
                case "sharecnt" :
                    $return_str .= " $_searchField_field >= '$s[$i]' "; break;
                default :
                    if (preg_match("/[a-zA-Z]/", $search_str)) $return_str .= "INSTR(LOWER($_searchField_field), LOWER('$search_str'))";
                    else $return_str .= "INSTR($_searchField_field, '$search_str')";
                    break;
            }
            $op2 = " or ";
        }
        $return_str .= ")";

        $op1 = " $search_operator ";
    }
    $return_str .= " ) ";

    return $return_str;
}

// 회원의 현재까지 포인트 합계
function get_mbpointsum($mb_id)
{
	global $g5,$member,$config,$is_admin;

	$minfo = sql_fetch(" select * from g5_member where mb_id = '{$mb_id}' ");
	//if(!$minfo[mb_id]) { alert("존재하지 않는 회원입니다."); exit; }

	// 회원의 현재까지 포인트 합계
	$mbpoint_sql = sql_fetch(" select ifnull(sum(po_point), 0) as mbpoint_sum from er_point where mb_id = '{$mb_id}' ");
	$mbpoint_sum = $mbpoint_sql[mbpoint_sum];

	return $mbpoint_sum;
}

// 회원의 현재까지 포인트 합계 업데이트
function update_mbpointsum($mb_id,$po_idx)
{
	global $g5,$member,$config,$is_admin;

	$minfo = sql_fetch(" select * from g5_member where mb_id = '{$mb_id}' ");
	//if(!$minfo[mb_id]) { alert("존재하지 않는 회원입니다."); exit; }

	// 회원의 현재까지 포인트 합계 업데이트
	$po_point_sum = get_mbpointsum($mb_id);
	$sqlposum = " update er_point  set po_point_sum = '{$po_point_sum}' where po_idx = '{$po_idx}'   ";
	sql_query($sqlposum);
}

// 포인트충전
function plusPoint($mb_id, $pp_point, $po_rel_act, $po_content, $key_idx)
{
	global $g5,$member,$config,$is_admin;

	if($po_rel_act == "") $po_rel_act = "plus";
	$po_point = (int)preg_replace('/[^0-9]/', '', $pp_point);
	if(!$po_point || $po_point < 1) { alert("포인트는 0 이상 숫자로 입력하세요"); exit; }

	if($po_content == "") $po_content = "Saved from sales";
	$po_gubun = "p";

	$minfo = sql_fetch(" select * from g5_member where mb_id = '{$mb_id}' ");
	//if(!$minfo[mb_id]) { alert("존재하지 않는 회원입니다."); exit; }

	$sqlpo = " insert into er_point
					set mb_id            = '{$minfo['mb_id']}',
						mb_name        = '{$minfo['mb_name']}',
						po_rel_id         = '{$minfo['mb_id']}',
						po_rel_act        = '{$po_rel_act}',
						po_point         = '{$po_point}',
						key_idx           = '{$key_idx}',
						po_gubun       = '{$po_gubun}',
						po_content      = '{$po_content}',
						po_ip              = '{$_SERVER['REMOTE_ADDR']}',
						po_datetime    = '".G5_TIME_YMDHIS."'   ";
	sql_query($sqlpo);
	$po_idx = sql_insert_id();

	// 누적포인트 업데이트
	update_mbpointsum($mb_id, $po_idx);
}

// 포인트차감
function minusPoint($mb_id, $pp_point, $po_rel_act, $po_content, $key_idx)
{
	global $g5,$member,$config,$is_admin;

	if($po_rel_act == "") $po_rel_act = "minus";
	$po_point = (int)preg_replace('/[^0-9]/', '', $pp_point);
	$po_point = $po_point*(-1);

	if($po_content == "") $po_content = "Used on sales";
	$po_gubun = "n";

	$minfo = sql_fetch(" select * from g5_member where mb_id = '{$mb_id}' ");
	//if(!$minfo[mb_id]) { alert("존재하지 않는 회원입니다."); exit; }

	$sqlpo = " insert into er_point
					set mb_id            = '{$minfo[mb_id]}',
						mb_name        = '{$minfo['mb_name']}',
						po_rel_id         = '{$minfo[mb_id]}',
						po_rel_act        = '{$po_rel_act}',
						po_point         = '{$po_point}',
						key_idx            = '{$key_idx}',
						po_gubun       = '{$po_gubun}',
						po_content      = '{$po_content}',
						po_ip              = '{$_SERVER['REMOTE_ADDR']}',
						po_datetime    = '".G5_TIME_YMDHIS."'   ";
	sql_query($sqlpo);
	$po_idx = sql_insert_id();

	// 누적포인트 업데이트
	update_mbpointsum($mb_id, $po_idx);
}

?>