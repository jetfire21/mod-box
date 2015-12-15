<?php 


remove_filter('the_content', 'wpautop');


function add_more_buttons($buttons) {
 $buttons[] = 'hr';
 $buttons[] = 'del';
 $buttons[] = 'sub';
 $buttons[] = 'p';
 $buttons[] = 'fontselect';
 $buttons[] = 'fontsizeselect';
 $buttons[] = 'cleanup';
 $buttons[] = 'styleselect';
 return $buttons;
}
add_filter("mce_buttons_3", "add_more_buttons");


/* ************* include css and js files ******** */

add_action( 'wp_enqueue_scripts', 'css_js_for_theme' );

function css_js_for_theme(){

  wp_register_style( "font-awesome", "https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" );
  wp_register_style( "custom", get_template_directory_uri() ."/css/custom.css" );
  wp_register_style( "responsive", get_template_directory_uri() ."/css/responsive.css" );
  wp_register_style( "jscrollpane", get_template_directory_uri() ."/css/jquery.jscrollpane.css" );
  // wp_register_style( "res-table", get_template_directory_uri() ."/css/responsive-tables.css" );

    wp_enqueue_style( 'font-awesome' );
    wp_enqueue_style( 'custom' );
    wp_enqueue_style( 'responsive' );
    wp_enqueue_style( 'jscrollpane' );
    // wp_enqueue_style( 'res-table' );

    

     wp_enqueue_script('jquery-custom-js', "https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js");
     // wp_enqueue_script('jquery-custom-js', "http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js");

         // wp_localize_script("jquery-custom-js",'ajaxurl',  array( 'url' => admin_url('admin-ajax.php')));
        
    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() ."/js/owl.carousel.min.js");
    wp_enqueue_script('plaxmove-js', get_template_directory_uri() ."/js/jquery.plaxmove.js");
    wp_enqueue_script('mousewheel-js', get_template_directory_uri() ."/js/jquery.mousewheel.js");
    wp_enqueue_script('jscrollpane-js', get_template_directory_uri() ."/js/jquery.jscrollpane.min.js");
   wp_enqueue_script('threesixty', "http://cdn.rawgit.com/matdumsa/jQuery.threesixty/master/jquery.threesixty.js");
    // wp_enqueue_script('validate-js', get_template_directory_uri() ."/js/responsive-tables.js");
    // wp_enqueue_script('validate-js', get_template_directory_uri() ."/js/jquery.validate.min.js");
   wp_enqueue_script('custom-js', get_template_directory_uri() ."/js/custom.js");
     wp_enqueue_script('ajax-posts-js', get_template_directory_uri() ."/js/ajax-posts.js");

}






/* ******hide admin-bar******** */

add_filter('show_admin_bar', '__return_false');

/* ******Custom Admin Submenu Order******** */

function order_menu_page( $menu_ord ) {
  global $submenu;

  // Enable the next line to see all menus and their orders
  // echo '<pre>'; print_r( $submenu ); echo '</pre>'; exit();

  // Enable the next line to see a specific menu and it's order positions
  //echo '<pre>'; print_r( $submenu['plugins.php'] ); echo '</pre>'; exit();

  // unset($submenu['users.php']);

  // Sort the menu according to your preferences...1 - главные опции, 2 - общие
  $submenu['options-general.php'][11] =  $submenu['options-general.php'][10];
  $submenu['options-general.php'][10] =  $submenu['options-general.php'][41];

  unset( $submenu['options-general.php'][41] );
  ksort( $submenu['options-general.php']);

  return $menu_ord;
}

// add the filter to wordpress
add_filter( 'custom_menu_order', 'order_menu_page' );

register_sidebar(
         array(
          'name' => 'Подвал',
          'id' => 'footer',
          'description' => 'Блоки которые будут выводиться внизу страницы',
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '',
          'after_title' => ''
        ) 
 );

register_sidebar(
         array(
          'name' => 'Главная: Правая колонка',
          'id' => 'offer_honme',
          'description' => 'Добавьте сюда виджеты',
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '',
          'after_title' => ''
        ) 
 );

/* *************** new custom widget *********** */

class FooterAddress_Widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'footer_address_widget', // Base ID
      'Aдрес', // Name
      array( 'description' => 'Виджет для вывода адреса')// Args
    );
  }

  public function widget( $args, $instance ) {
     extract($instance);
 
        if($title) echo $title;


  }

  public function form( $instance ) {

    extract($instance);

    ?>

    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label> 
    <textarea class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text">
       <?php if($title) { echo esc_attr( $title ); }?>
    </textarea> 
    </p>

    <?php 
  }

} 

function register_footer_address_widget() {
  register_widget( 'FooterAddress_Widget' );
}

add_action( 'widgets_init', 'register_footer_address_widget' );

/* *************** new custom widget *********** */

/* *************** new custom widget for add headings in part header *********** */

class Offer_Widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'offer_widget', // Base ID
      'Спецпредложение', // Name
      array( 'description' => 'Спецпредложение на главной странице')// Args
    );
  }

  public function widget( $args, $instance ) {
     extract($instance);
        
        if($link_img) echo '<img src="'.$link_img.'" alt="Block" class="cr-image"/>';
        if($date) echo '<h1>' . $date . '</h1>';
        if($product) echo '<h3>' . $product . '</h3>';
        if($price) echo '<h2>' . $price . ' <span>Г</span></h2>';
        if($link_product) echo '<a class="podr-but" href="'.$link_product.'">Подробнее о продукте</a>';

  }

  public function form( $instance ) {
    extract($instance);

    ?>

    <p>
    <label for="<?php echo $this->get_field_id( 'date' ); ?>">Дата окончания:</label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'date' ); ?>" name="<?php echo $this->get_field_name( 'date' ); ?>" type="text" 
    value="<?php if($date) { echo esc_attr( $date ); }?>">

     <label for="<?php echo $this->get_field_id( 'product' ); ?>">Название продукта:</label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'product' ); ?>" name="<?php echo $this->get_field_name( 'product' ); ?>"
    value="<?php if($product) { echo esc_attr( $product); }?>" />

     <label for="<?php echo $this->get_field_id( 'price' ); ?>">Цена:</label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'price' ); ?>" name="<?php echo $this->get_field_name( 'price' ); ?>"
         value="<?php if($price) { echo esc_attr( $price); }?>" />

   <label for="<?php echo $this->get_field_id( 'link_product' ); ?>">Ссылка на продукт:</label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'link_product' ); ?>" name="<?php echo $this->get_field_name( 'link_product' ); ?>" type="text" 
     value="<?php if($link_product) { echo esc_attr( $link_product); }?>">
    </p>

   <label for="<?php echo $this->get_field_id( 'link_img' ); ?>">Ссылка на изображение:</label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'link_img' ); ?>" name="<?php echo $this->get_field_name( 'link_img' ); ?>" type="text"
    value="<?php if($link_img) { echo esc_attr( $link_img); }?>">
    </p>

    <?php 
  }

} 

function register_offer_widget() {
  register_widget( 'Offer_Widget' );
}
add_action( 'widgets_init', 'register_offer_widget' );


/* *************** end new custom widget for add contacts in top part header *********** */


register_nav_menus( array(
  'header_menu' => 'main_menu'
) );

register_nav_menus( array(
  'footer_location' => 'footer_menu'
) );


function additional_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'additional_mime_types');






function filter1 ( $content ) {
    $content = str_replace("<ul>", '<ul class="preim-vn">', $content);
    $content = str_replace("<li>", '<li><span>', $content);
    $content = str_replace("</li>", '</li></span>', $content);
   return $content;
}

add_filter( 'the_content', 'filter1' );



add_theme_support('post-thumbnails'); // поддержка миниатюр



add_filter( 'rwmb_meta_boxes', 'YOURPREFIX_register_meta_boxes' );
function YOURPREFIX_register_meta_boxes( $meta_boxes )
{
    $prefix = 'rw_';
    // 1st meta box
    $meta_boxes[] = array(
        'id'         => 'personal',
         'title'      => 'Левая колонка',
        'post_types' => array( 'post' ),
         'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => 'Встваьте текст',
                'desc'  => 'Format: First Last',
                'id'    => $prefix . 'left_colum_text',
                'type'  => 'wysiwyg',
                'std'   => '',
                'class' => 'custom-class',
                'clone' => false,
            ),
        )
    );
    return $meta_boxes;
}

// add_filter( 'rwmb_meta_boxes', 'YOURPREFIX_register_meta_boxes2' );
// function YOURPREFIX_register_meta_boxes2( $meta_boxes )
// {
//     $prefix = 'rw_';
//     // 1st meta box
//     $meta_boxes[] = array(
//         'id'         => 'upload_file',
//          'title'      => 'Слайдер',
//         'post_types' => array( 'post' ),
//          'context'    => 'normal',
//         'priority'   => 'high',
//         'fields' => array(
//             array(
//                 'name'  => 'Загрузить изображение',
//                 'desc'  => 'Добавить новый файл',
//                 'id'    => $prefix . 'slider_img',
//                 'type'  => 'file',
//                 'std'   => '',
//                 'class' => 'custom-class',
//                 'clone' => false,
//             ),
//         )
//     );
//     return $meta_boxes;
// }

 function my_shortcode_function($atts,$content = null) {
    $html = '
    <div class="cr-tabs">
        <span class="tab-1 tab-current"><span>Модификации и цены</span></span>
        <span class="tab-2"><span>Подробные характеристики</span></span>
        <div class="clear"></div>
      </div>';
    return $html;
 }

 add_shortcode('table-switcher', 'my_shortcode_function');



 // function my_shortcode_function2($atts,$content = null) {
 //    $html = '
 //    <div class="cr-tabs">
 //        <span class="tab-1 tab-current"><span>Модификации и цены</span></span>
 //        <span class="tab-2"><span>Подробные характеристики</span></span>
 //        <div class="clear"></div>
 //      </div>';
 //    return $html;
 // }

 // add_shortcode('code_slider', 'my_shortcode_function2');



/******* добавляет столбец id картинки в админ панели ********/
add_filter('manage_media_columns', 'posts_columns_attachment_id', 1);
add_action('manage_media_custom_column', 'posts_custom_columns_attachment_id', 1, 2);

function posts_columns_attachment_id($defaults){
    $defaults['wps_post_attachments_id'] = __('ID');
    return $defaults;
} //добавляем функцию

function posts_custom_columns_attachment_id($column_name, $id){
  if($column_name === 'wps_post_attachments_id'){
  echo $id;
    }
}
/******* добавляет столбец id картинки в админ панели ********/


function my_shortcode_function2($atts,$content = null) {
  if($atts['ids']){
    $ids = explode(",",$atts['ids']);
      foreach ( $ids as $k => $val ) {
        if($k == 0) $first_img = wp_get_attachment_url($val);
        $url .= wp_get_attachment_url($val).",";
      }    
      $url = mb_substr($url, 0,-1);
      $path = get_template_directory_uri();
      if($atts['shema-id']) $img_shema = '<img src="'.wp_get_attachment_url($atts['shema-id']).'" alt=""/>';
      $html = '<div class="pic-block2">
          <div class="pic-left"><img id="product1" src="'.$first_img .'" alt=""/><span class="but360"><img src="'.$path.'/images/content/360.svg" alt=""/></span></div>
          <div class="pic-right">'.$img_shema.'</div>
          <div data-src="'.$url.'" id="3d-img-url"></div>
          <div class="clear"></div>
      </div>';
      
  }
    
    return $html;
 }

 add_shortcode('3d-imgs', 'my_shortcode_function2');



function my_shortcode_function10($atts,$content = null) {
  if($atts['ids']){
    $ids = explode(",",$atts['ids']);

      $html =
      '<div class="pic-block">
           <div class="pic-carusel">';
               
      foreach ( $ids as $k => $val ) {

          $url = wp_get_attachment_url($val);
          $html .= '<a href="#"><div class="pic-item"><img src="'.$url .'" alt=""/></div></a>';
      }    

        $html .= '</div>
        <div class="clear"></div>
      </div>';  
  }
    
    return $html;
    return $url;
 }

 add_shortcode('code_slider', 'my_shortcode_function10');




function my_shortcode_function3($atts,$content = null) {


      $html = '<br><br><a class="cr-but mail-form2 clear" href="#"><i class="cr-calc"></i>Оформить заказ</a>';
        
    return $html;
 }

 add_shortcode('button-oformit-zakaz', 'my_shortcode_function3');




add_filter('the_content', 'do_shortcode', 11);

add_action( 'init', 'load_tablepress_in_the_admin', 11 );

function load_tablepress_in_the_admin() {
  if ( is_admin() && defined( 'DOING_AJAX' ) && DOING_AJAX ) {
    TablePress::load_controller( 'frontend' ); // работает на дефолтной теме
    // TablePress::$controller = TablePress::load_controller( 'admin_ajax' );
  }
}

function my_shcode( $atts, $content = null ) {
  $html = '<h1>' . $content . '</h1>';
  return $html;
}
add_shortcode('my_code', 'my_shcode');



/******** морские контейнеры - загрузка контента без перезагрузки страницы ******/

/* шорткоды собственого написания подключаются,а плагниов нет(((((((((((((  */


function true_load_posts(){
   global $wpdb;


      function filter_ajax_cont ( $content ) {
          $content = str_replace("<ul>", '<ul class="preim-vn">', $content);
          $content = str_replace("<li>", '<li><span>', $content);
          $content = str_replace("</li>", '</li></span>', $content);
         return $content;
      }
   

  $args = unserialize(stripslashes($_POST['query']));
  $html['cur_post_id'] .= unserialize(stripslashes($_POST['cur_post_id']));
  // $args = unserialize(stripslashes($_POST['current_post_id']));
  // $args = get_post($args);
// $args = substr($args,0,-1);
$args = explode(",",$args);

  // $arr['res'] = $args;
  // $arr['url'] = $args['guid']; //  http://modulbox/?p=45
  // $args['p'] = $_GET['post'];
if($args){

  $data_cat = get_the_category( $args[0] );

    foreach ($args as $k => $id) {
      $p_id = get_post($id);
        
        $post_title = $p_id->post_title; 
        $post_content = $p_id->post_content;

       $html["id".$id] .= '<div class="cr-title"> 
              <h1>'.$post_title.'</h1>';
              if( $data_cat[0]->slug != "arenda" and $data_cat[0]->slug != "informatsiya"){
               $html["id".$id] .= '<a class="cr-but mail-form2" href="#"><i class="cr-calc"></i>Оформить заказ</a>';
            }

               $html["id".$id] .= '
            <div class="clear"></div>
          </div>';

         $code = do_shortcode(get_post_field('post_content', $p_id->ID));

      $code = filter_ajax_cont($code);

         $code = ' <div class="cr-text"><p>'.$code.'</div></p>';

          $html["id".$id] .= $code;
    }
}

// $arr['res'] = $html;
 echo json_encode($html);
 exit;
}

 
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
/******** морские контейнеры - загрузка контента без перезагрузки страницы ******/






// function my_shortcode_function($atts,$content = null) {
//     // var_dump($atts);
//     $row = explode(";", $content);
//     unset( $row[count($row)-1] );
//     // print_r($row);

//     $html .= '<section id="flip-scroll">
//                   <table class="cr-table1" cellspacing="0"><thead>';
//     $i = 1;
//     foreach ($row as $el) {
//         $cell = explode("|", $el);


//         if($i == 1) {

//             $html .= '<tr class="row-title">';
//             $j = 1;
//              foreach ($cell as $item) {
//                if($j == 1 ) $html .= '<th class="t1-name">'.$item. '</th>';
//                if($j == 2 ) $html .= '<th class="t1-sost">'.$item. '</th>';
//                if($j == 3 ) $html .= '<th class="t1-cost">'.$item. '</th>';
//                if($j > 3)  $html .= '<th class="t1-cost">'.$item. '</th>';
//                 $j++;
//              }
            
//              $html .= "</tr></thead><tbody>";

//         } else{

//           $html .= '
//                       <tr class="row-info">';
//             $k = 1;
//            foreach ($cell as $item) {
//               if($k == 1 ) $html .= '<td class="t1-name">'.$item. '</td>';
//                if($k == 2 ) $html .= '<td class="t1-sost">'.$item. '</td>';
//                if($k == 3 ) $html .= '<td class="t1-cost">'.$item. '</td>';
//                if($k > 3)  $html .= '<td class="t1-cost">'.$item. '</td>';
//                $k++;
//            }
           
//            $html .= "</tr>";

//         }
//         $i++;
//     }
//       $html .= " </tbody></table>
//           </section>";
//     $html = str_replace("<br />", "", $html);
//     return $html;
// }
// add_shortcode('table', 'my_shortcode_function');
