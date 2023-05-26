
<?php

function mytheme_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>
  <div <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>" class="comments-item">
    <div class="comments-item__header">
        <p class="name"><?php echo get_comment_author_link() ?></p>
        <span class="date post-date"><?php printf( '%1$s в %2$s', get_comment_date(),  get_comment_time()) ?><?php edit_comment_link('(Edit)', '  ', '') ?></span>
    </div>
      <?php if ($comment->comment_approved == '0') : ?>
        <p class="awaiting">Ваш комментарий на модерации</p>
      <?php endif; ?>
      <div class="comments-item__body">
        <?php comment_text() ?>
      </div>
      <div class="comments-item__footer">
          <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
 
    </div>
  
<?php } ?>
 
 
<?php
add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
function kama_reorder_comment_fields( $fields ){ 
  $new_fields = array(); // new order of the field
 
  $myorder = array('author','email','comment'); // my order
 
  foreach( $myorder as $key ){
    $new_fields[ $key ] = $fields[ $key ];
    unset( $fields[ $key ] );
  }
 
// other fields to the end of form
  if( $fields )
    foreach( $fields as $key => $val )
      $new_fields[ $key ] = $val;
 
    return $new_fields;
  }
  ?>
 
 
<div id="comments" class="comments-area comments-items">
 
  <?php if ( have_comments() ) : ?>
    <!-- <h2 class="comments-title"><?php printf( _nx( '1 Комментарий', '%1$s Комментарии', get_comments_number(), 'comments title', '' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></h2> -->
 
    <div class="comment-list">
      <?php
      wp_list_comments( array(
        'style'       => 'div',
        'type'        => 'comment',
        'short_ping'  => true,
        'avatar_size' => 32,
        'callback'    => 'mytheme_comment',
        )
      );
      ?>
    </div><!-- .comment-list -->
 
 
    <?php
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
      ?>
    <nav class="navigation comment-navigation" role="navigation">
      <h2 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', '' ); ?></h2>
      <div class="nav-previous alignleft"><?php previous_comments_link( __( '&larr; Older Comments', '' ) ); ?></div>
      <div class="nav-next alignright"><?php next_comments_link( __( 'Newer Comments &rarr;', '' ) ); ?></div>
    </nav><!-- .comment-navigation -->
    <?php
    endif; // Check for comment navigation
    ?>
 
    <?php if ( ! comments_open() && get_comments_number() ) : ?>
      <p class="no-comments"><?php _e( 'Comments are closed.' , '' ); ?></p>
    <?php endif; ?>
 
  <?php endif; // have_comments() ?>
 
 
  <?php
  // change fields in the comments form
  $commenter = wp_get_current_commenter();
  $req = get_option( 'require_name_email' );
  $aria_req = ( $req ? " aria-required='true'" : '' );
 
  $comments_args = array(
 
    // reply link
    'cancel_reply_link' => __( 'Cancel Repy' ), 
    'label_submit'=>'Отправить',
    'title_reply'=>'',    
    'comment_notes_before' => '',
    'comment_notes_after'  => '',
    'class_submit' => 'arrow-link d-block',
    'submit_button' => '
    <div class="form-group col-md-6 align-self-end">
      <div class="d-flex align-items-center comment-submit">
        <input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />     
        <span class="icon">
            <svg width="61" height="20" viewBox="0 0 61 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M58.1651 4.22558L-2.31877e-07 4.22558L-1.6631e-07 5.72558L58.2135 5.72558L55.4696 8.46969L56.5304 9.5303L60.5304 5.52997C60.671 5.38931 60.75 5.19854 60.75 4.99963C60.75 4.80072 60.671 4.60996 60.5303 4.46931L56.5303 0.469642L55.4697 1.53035L58.1651 4.22558Z" fill="#181818"/>
            </svg>                                            
        </span>
      </div>
   </div>',
    'fields' => array(
      'author' =>
      '<div class="form-row"><div class="form-group col-md-3"><label for="author">' . __( 'Ваше имя', '' ) . '</label> ' .
      ( $req ? '<span class="required">*</span>' : '' ) .
      '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . $aria_req . ' class="form-control" required/></div>',
 
      'email' =>
      '<div class="form-group col-md-3"><label for="email">' . __( 'Email', '' ) . '</label> ' .
      ( $req ? '<span class="required">*</span>' : '' ) .
      '<input id="email" name="email" type="text" class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' required/></div></div>',
 
      'url' =>
      '',
      ),
 
    // redefine your own textarea (the comment body)
    'comment_field' =>
    '<div class="form-group"><label for="comment">' . _x( 'Введите текст', '' ) . '</label> <span class="required">*</span><br/>
    <textarea id="comment" class="form-control" name="comment" aria-required="true" required ></textarea></div>',
    );
 
  comment_form($comments_args);
  ?>
 
</div><!-- #comments -->