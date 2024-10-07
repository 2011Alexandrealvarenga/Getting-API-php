<?php
/**
 * Template Name: consumir api
 * Template Post Type: post, page, event
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Prodesp
 */

get_header();?>
<style>
  .content{
    border: 1px solid black;
    margin: 10px;
  }
</style>
<?php
$urlEmbed = 'https://api.giphy.com/v1/gifs/trending?api_key=pLURtkhVrUXr3KG25Gy5IvzziV5OrZGa';
    $responseEmbed = wp_remote_get( $urlEmbed, array(
        'method'      => 'GET'
        )
    );     
    if ( is_wp_error( $responseEmbed ) ) {      
        return false;
    } else {
        $rEmbed = wp_remote_retrieve_body( $responseEmbed );
        $result = json_decode($rEmbed, true);
    }
    ?>
<pre>

  <?php 
  // var_dump($result) 
  ;?>
</pre>
  <?php
    foreach($result['data'] as $get_result){?>
    <div class="content">
        <a href="<?php echo $get_result['url'] ;?>">
          <p>Titulo: <?php echo $get_result['title'] ;?></p>
        </a>
        <p class="">Id: <?php echo $get_result['id'] ;?></p>
        <p class="">img sem caracteres: 
          <?php           
            $new_image = $get_result['images']['480w_still']['url'];            
            $image_new = substr($new_image, 0, -5);
            echo $image_new           
          ;?>
        </p>
        <img src="<?php echo $image_new?>" width="170px" height="170px">
        <br><br>
    </div>
  <?php }?>


<?php  get_footer();?>