<?php

// if(count(explode($http."www.", $config_url)) > 1) {
//     header("HTTP/1.1 301 Moved Permanently"); 
//     header("Location: ".$http.str_replace($http."www.", "", $config_url));
//     exit(1);
// }
// ini_set('display_errors', 1); 
// error_reporting(E_ALL);

@define('_template', $_SERVER['DOCUMENT_ROOT'].'/templates/');
@define('_source', $_SERVER['DOCUMENT_ROOT'].'/sources/');
@define('_lib', $_SERVER['DOCUMENT_ROOT'].'/lib/');
include_once _lib."config.php";

include_once _lib."functions.php";
include_once _lib."class.database.php";
include_once _lib."pagination.php";
include_once _lib."file_requick.php";
$active = empty($_POST) == true? $layout['index']['index-1'][0]['id'] : $_POST['id_cat'];
//echo $active;
?>

    
        <div class="row">
            <div id="homeProduct">
                <div class="title">
                    <div>
                        <? foreach ($layout['index']['index-1'] as $key => $value) { ?>
                            <a href="javascript:void(0);" class="btnFilter <?= $value['id'] == $active? 'active': '' ?> " data-params="<?= $value['id'] ?>">
                                <?= $value['title'] ?>
                            </a>
                        <? } ?>

                    </div>
                </div>
                <div id="productBanner">
                    <div class="swiper-container swiper-container-item-new">
                        <div class="swiper-wrapper">
                       <?php $row_pd = getItems(array("table" => "product", "condition" => "where find_in_set('{$active}', category_id) and enable>0 and popular>0  order by level desc")) ?> 
                            <? foreach ($row_pd as $key => $value) { ?>
                                    <div class="swiper-slide">
                                        <div class="pItem" data-id="16325014">
                                            <a href="<?= $config_url.'/'.$value['uri'] ?>"><img src="<?= $value['thumbnail'] ?>" alt="<?= $value['title'] ?>"></a>
                                            <p class="price-sale"><?= $value['price'] > 0? number_format($value['price'])."đ" : "Liên hệ";  ?></p>
                                            <h3><a href="<?= $config_url.'/'.$value['uri'] ?>"><?= $value['title'] ?></a></h3>
                                        </div>
                                    </div>
                            <? } ?>

                        </div>
                        <!-- Add Pagination -->
<!--                         <div class="swiper-pagination"></div>
 -->                    </div>
                </div>

            </div>
        </div>
       





    <script>
            $(function() {
         
            var swiper = new Swiper('.swiper-container-item-new', {
      slidesPerView: 5,
      spaceBetween: 0,
       navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        clickable: true
      },
      breakpoints: {
        1024: {
          slidesPerView: 4,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 10,
        },
        640: {
          slidesPerView: 1,
          spaceBetween: 0,
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 0,
        }
      }
      // pagination: {
      //   el: '.swiper-pagination',
      //   clickable: true,
      // },
    });
         


    });
    </script>

