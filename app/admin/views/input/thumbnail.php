<?php $file_base = dirname($_SERVER['PHP_SELF']);
$uri_thumbnail =  explode("/app/", $file_base);
?>
<?php $file_base_dir = dirname(__FILE__);
$uri_thumbnail_base =  explode("\app", $file_base_dir);

?>
<a href="<?= file_exists($uri_thumbnail_base[0] . '/' . $value[$r_status['name']]) && !empty($value[$r_status['name']]) ?  $uri_thumbnail[0] . '/' . $value[$r_status['name']] :  $uri_thumbnail[0] . '/app/assets/image/no-image.png' ?>" data-fancybox data-caption="<?= $value['title'] ?>">
	<img height="100" src="<?= file_exists($uri_thumbnail_base[0] . '/' . $value[$r_status['name']]) && !empty($value[$r_status['name']]) ?  $uri_thumbnail[0] . '/' . $value[$r_status['name']] :  $uri_thumbnail[0] . '/app/assets/image/no-image.png' ?>" alt="" />
</a>
<script>
	$('[data-fancybox]').fancybox({
		protect: true
	});
</script>