<?php 
function wbc_block_widget_shortcode($atts,$content = null){

  $wid = $atts['id'];

if( ! empty( $wid ) ){ 
    //$wid = $instance['blockwidget_name'];
    $blockwidget_name = get_the_title($wid);
    $all_meta = get_post_meta($wid);
    $setting_icon = get_post_meta($wid,'setting_icon',true);
    $icon_position = get_post_meta($wid,'_icon_position',true);
    $no_of_rows = get_post_meta($wid,'no_of_rows',true);
    $no_of_coloumns = get_post_meta($wid,'no_of_coloumns',true);
    $row_coloumn = unserialize(get_post_meta($wid,'row_coloumn',true));
    $title_size = get_post_meta($wid, 'title_size', true);
    //echo "<pre>";
    //print_r($row_coloumn);
    $output = '<style type="text/css">
      .wbc_widget_title_'.$wid.' h3{
          font-size: '.$title_size.'px;
        }
    </style>
    <div class="wbc_My_Widget">
    <div class="wbc_sidebar_section right-box">
    <div class="wbc_widget_title wbc_widget_title_'.$wid.'">';
    if($icon_position=="begining"){
    	$output .= '<h3><img style="float:left;" width="35" height="35" src="'.$setting_icon.'">'.$blockwidget_name.'</h3>';
    }
    else{
    $output .= '<h3>'.$blockwidget_name.'</h3><div class="wbc_logo_image wbc_'.$icon_position.'"><img width="35" height="35" src="'.$setting_icon.'"></div>';
		}
    $output .= '</div>';
    
    $i=1;
    while($i<=$no_of_rows)
    {
    $j=1;
      $output.='<div id="row_'.$no_of_coloumns.'" class="wbc_row">';
    
    while($j<=$no_of_coloumns){
       $height = $row_coloumn['image_height'][$i][$j][0];
       $width = $row_coloumn['image_width'][$i][$j][0];
       
       $output.='<style type="text/css">
        .wbc_My_Widget .wbc_row_col_img_wid_'.$wid.'_'.$i.'_'.$j.' img {
          height:'.$height.'px; 
          width:'.$width.'px;
        }
        .wbc_text_on_hover_'.$wid.'_'.$i.'_'.$j.'{
          font-size: '.$hover_text_size.'px !important;
        }
       </style>
        <div  class="wbc_row_col_img_wid_'.$wid.'_'.$i.'_'.$j.' wbc_coloumn wbc_coloumn_'.$j.'">';
         if($row_coloumn['row_video_link'][$i][$j][0]!=""){
        $output.='<a class="swipebox" href="'.$row_coloumn["row_video_link"][$i][$j][0].'">';
       }
      if($row_coloumn['row_link'][$i][$j][0]!=""){
        $output.='<a class="" href="'.$row_coloumn["row_link"][$i][$j][0].'">';
         }
        $output.='<div class="wbc_full_box wbc_gray_'.$row_coloumn["row_gray_scale"][$i][$j][0].'">
        <div class="wbc_image_section wbc_'.$row_coloumn["round_or_sqare"][$i][$j][0].'">';
          if($row_coloumn["row_mousehover_text"][$i][$j][0]=="" && $row_coloumn['row_link'][$i][$j][0]=="" && $row_coloumn['row_video_link'][$i][$j][0]==""){
          $class="wbc_inner_none";
        }
        else{
          $class = "";
          }
        $output .= '<div class="wbc_inner_image '.$class.'">';
            if($row_coloumn["row_mousehover_text"][$i][$j][0]!=""){
               $output.=' <h3 class="wbc_text_on_hover wbc_text_on_hover_'.$wid.'_'.$i.'_'.$j.'">'.$row_coloumn["row_mousehover_text"][$i][$j][0].'</h3>';
              }
                if($row_coloumn['image_link'][$i][$j][0]!=""){
              $output.= '<img height="'.$height.'" width="'.$width.'" src="'.$row_coloumn["image_link"][$i][$j][0].'">';
          	}
        $output .='</div><h3 class="wbc_text_widhout_hover">'.$row_coloumn["row_text"][$i][$j][0].'</h3>       
        </div>
        </div>
        </a>
        </div>';
    $j++;
      }
    $i++;
      $output.='</div>';
     }
    }
    $output.='</div>';
    $output.='</div>';
     return $output;
  
}
add_shortcode('block-widget','wbc_block_widget_shortcode');