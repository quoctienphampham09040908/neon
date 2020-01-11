<?php

function getBaseURL($root=false, $lang=true){
$server= $_SERVER['PHP_SELF'];
if($root)
$server = str_replace("app/admin/", "", $server);
if($_REQUEST['lang']!="" && $lang===true)
$server .= $_REQUEST['lang']."/";
return str_replace("index.php", "", $server);
}
function changeTitle($str, $r = true){
	$str = stripUnicode($str);
	$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
	$str = preg_replace('/([^a-zA-Z0-9]+)/', ' ', $str);
	if ($r === true)
		$str = preg_replace('/\s/', '-', trim($str));
	return $str;
}
function stripUnicode($str){
  if(!$str) return false;
   $unicode = array(
     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
     'd'=>'đ',
     'D'=>'Đ',
     'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
   	  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
   	  'i'=>'í|ì|ỉ|ĩ|ị',
   	  'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
   	  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
   	  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
     'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
   );
   foreach($unicode as $khongdau=>$codau) {
     	$arr=explode("|",$codau);
     	foreach ($arr as $value) {
     		$str = str_replace($value,$khongdau,$str);
     	}

   }
   return $str;
}
// function alert($msg) {
// echo "<script type='text/javascript'>alert('$msg');</script>";
// }
// function redirect($msg="",$url){
//    echo "<script>alert('$msg');window.location.href=$url;</script>";
// }
?>
