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
<hr>

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

<?php
    foreach($result['data'] as $get_result){?>
        <p><?php echo $get_result['title'] .'<br>' ;?></p>
        <img src="<?php echo $get_result['images']['480w_still']['url'] .'<br>' ;?>" width="30px" height="30">
  <?php }?>


<hr>
<?php  get_footer();?>