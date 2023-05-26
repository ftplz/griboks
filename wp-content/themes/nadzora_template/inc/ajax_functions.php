<?php 


// load reviews


add_action('wp_ajax_reviewsload', 'reviewsload');  
add_action('wp_ajax_nopriv_reviewsload', 'reviewsload'); 

function reviewsload()
{

    $json['success'] = false;

    $termid = !empty($_POST['termid']) ? $_POST['termid'] : '';

    $arg = array(
      'post_type'      => 'reviews',     
      'posts_per_page' => -1, 
      'post_status' => 'publish',
      'meta_query' => [
        [
          'key' => 'cat_id',
          'value' => $termid,
        ]
      ]
      // 'tax_query' => array(
      //   array(
      //     'taxonomy' => 'recipes_cat', 
      //     'terms' => $termid,
      //     'field' => 'id',         
      //   )
      // )
    );

    if($termid==0) {
      $arg = array(
        'post_type' => 'reviews',
        'posts_per_page' => -1,     
        'post_status' => 'publish'
      );
    }

    $reviewsloop = new WP_Query($arg); 

?>

<?php $count=0; while ( $reviewsloop->have_posts() ) : $reviewsloop->the_post();
                        $rimg=get_field('r_img')['sizes']['2048x2048'];
                        $rpost=get_field('r_post');
                        $starcount=get_field('review_rate');
                        $count++;
				?>

            <div class="rew-item <?php if($count>1) echo 'rew-item_hidden'; ?>">
                    <div class="review-slide__img" style="background: url('<?php echo $rimg; ?>') no-repeat center;">
                    </div>
                    <div class="rew-item__data">
                        <p class="name"><?php the_title(); ?></p>
                        <p class="post"><?php echo $rpost; ?> </p>
                        <ul class="stars">
                            <?php for($i=0;$i<5;$i++) { ?>
                                <li class="star <?php if($i<$starcount) echo 'full'; ?>"></li>
                            <?php } ?>
                        </ul>
                        <span class="date"><?php the_date();?></span>
                    </div>
                    <div class="rew-item__text">
                        <?php the_content(); ?>
                    </div>
            </div>

<?php endwhile; wp_reset_postdata();?>

<?php   
    wp_die(); 
}

// addreview

add_action( 'wp_ajax_sendreview', 'addreview_function' ); 
add_action( 'wp_ajax_nopriv_sendreview', 'addreview_function' ); 
 
function addreview_function(){

  $result = array('success' => false, 'error' => '' , 'message'=> '');

  $reviewname = $_POST['reviewname'];
  $reviewemail = $_POST['reviewemail']; 
  $reviewpost = $_POST['reviewpost']; 

  $reviewcatid = $_POST['reviewcatid'];  
  $reviewmessage = $_POST['reviewmessage']; 
  $reviewrate = $_POST['reviewrate']; 


  $post_id = wp_insert_post( array(
    'post_status' => 'draft',
    'post_type' => 'reviews',
    'post_title' => $reviewname,
    'post_content' => $reviewmessage,
  ) );


  update_post_meta($post_id,'r_post',$reviewpost);
  update_post_meta($post_id,'review_rate',$reviewrate);
  update_post_meta($post_id,'cat_id',$reviewcatid);


  if ($post_id) {
    $result['success'] = true;
  }


  $files = $_FILES[ 'inputfile' ];
  
  $attachments = [];
  
  foreach ( $files['name'] as $key => $value ) {

    if ( $files[ 'name' ][ $key ] ) {
      $file = array(
        'name'     => $files[ 'name' ][ $key ],
        'type'     => $files[ 'type' ][ $key ],
        'tmp_name' => $files[ 'tmp_name' ][ $key ],
        'error'    => $files[ 'error' ][ $key ],
        'size'     => $files[ 'size' ][ $key ]
      );
      $attachments[] = $file;
    }
    
  }
  
  foreach ($attachments as $file) {
    if (is_uploaded_file($file['tmp_name'])) {
      $remove_these = array(' ', '', '\"', '\\', '\/');
  
      $newname = str_replace($remove_these, '', $file['name']);
      $newname = time() . '-' . $newname;
      $uploads = wp_upload_dir();
      $upload_path = "{$uploads['path']}/$newname";
      move_uploaded_file($file['tmp_name'], $upload_path);
      $upload_file_url = "{$uploads['url']}/$newname";
  
      $wp_filetype = wp_check_filetype(basename($upload_path), null );
      $attachment = array(
        'guid' => $upload_file_url,
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => preg_replace('/\.[^.]+$/', '', basename($upload_path)),
        'post_content' => '',
        'post_status' => 'inherit'
      );
      $attach_id = wp_insert_attachment($attachment, $upload_path, $post_id);
  

      update_post_meta($post_id, 'r_img', $attach_id);

  
      // require_once(ABSPATH . 'wp-admin/includes/image.php');
      // $attach_data = wp_generate_attachment_metadata( $attach_id, $upload_path );
      // wp_update_attachment_metadata( $attach_id, $attach_data );
      
    }
  }






  
 
  echo json_encode($result);
      
  wp_die(); 
  
}







?>