<?php
class Paging
{
  private $items, $limit, $p, $url;
  public function __construct($data = array())
  {
    $this->items = $data['items'];
    $this->limit = $data['limit'];
    $this->p = $data['p'];
    $this->url = $data['url'];
  }
  function paging($list = false)
  {
    if (!$list) {
      $paging = "";
      if (is_array($this->items) && !empty($this->items)) {
        $paging .= "<ul class='pagination pagination-custom'>";
        if ($this->p == '') {
          $total = count($this->items);
          if ($total > $this->limit) {
            $page_number = ($total % intval($this->limit) != 0) ? intval($total / intval($this->limit)) + 1 : ($total / intval($this->limit));
            $i = 1;
            $paging .= '<li  class="page-item disabled">';
            $paging .=  '<a class="page-link rounded-0" href=' . getCurrentUrl() . '&p=' . $i . '><i class="fas fa-angle-left"></i></a>';
            $paging .= '</li>';
            while ($i <= $page_number) {
              $paging .= '<li  class="page-item ' . ($i == 1 ? "active" : "") . '">';
              $paging .=  '<a class="page-link rounded-0" href=' . getCurrentUrl() . '&p=' . $i . '>' . $i . '</a>';
              $paging .= '</li>';
              $i++;
            }
            $paging .= '<li  class="page-item">';
            $paging .=  '<a class="page-link rounded-0" href=' . getCurrentUrl() . '&p=' . 2 . '><i class="fas fa-angle-right"></i></a>';
            $paging .= '</li>';
          }
        }
        if ($this->p != '') {
          $total = count($this->items);
          if ($total > $this->limit) {
            $page_number = ($total % intval($this->limit) != 0) ? intval($total / intval($this->limit)) + 1 : ($total / intval($this->limit));
            $current_page = explode('&', getCurrentUrl());
            foreach ($current_page as $key => $r_page_num) {
              if (strstr($r_page_num, 'p=') == true)
                unset($current_page[$key]);
            }
            $current_page = implode('&', $current_page);

            $i = 1;
            if($this->p == $i){
              $paging .= '<li  class="page-item disabled">';
              $paging .=  '<a class="page-link rounded-0" href=' . $current_page . '&p=' . $i . '><i class="fas fa-angle-left"></i></a>';
              $paging .= '</li>';
            }else{
              $paging .= '<li  class="page-item ">';
              $paging .=  '<a class="page-link rounded-0" href=' . $current_page . '&p=' . ($this->p - 1) . '><i class="fas fa-angle-left"></i></a>';
              $paging .= '</li>';
            }

            while ($i <= $page_number) {
              $paging .= '<li  class="page-item ' . ($i == $this->p ? "active" : "") . '">';
              $paging .=  '<a class="page-link" href=' . $current_page . '&p=' . $i . '>' . $i . '</a>';
              $paging .= '</li>';
              $i++;
            }
            if($this->p == $page_number){
              $paging .= '<li  class="page-item disabled">';
              $paging .=  '<a class="page-link rounded-0" href=' . $current_page . '&p=' . $i . '><i class="fas fa-angle-right"></i></a>';
              $paging .= '</li>';
            }else{
              $paging .= '<li  class="page-item ">';
              $paging .=  '<a class="page-link rounded-0" href=' . $current_page . '&p=' . ($this->p + 1) . '><i class="fas fa-angle-right"></i></a>';
              $paging .= '</li>';
            }
          }
        }
        $paging .= "</ul>";
      }
      return $paging;
    } else {
      if ($this->p == 1 || $this->p == '')
        return array_slice($this->items, 0, $this->limit);
      else
        return array_slice($this->items, ( ($this->p - 1) * $this->limit), $this->limit);
    }
  }
}
