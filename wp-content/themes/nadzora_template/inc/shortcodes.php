<?php 
	add_shortcode('projects','projects_func');
	function projects_func($attr,$content){
		global $post;
		$post_id=false;	
		if($post){$post_id=$post->ID;}
		global $termThis;
		if($termThis){$post_id=$termThis;}
		ob_start();
	?>

	<div class="projects-gallery">
		<div class="row">
			<?php 
				$projects_r=get_field('projects');				
			?>
			<?php if($projects_r) {
				foreach($projects_r as $projectitem) {
					$project_obj=$projectitem['project-item'];					
					$img=get_field('image',$project_obj->ID);	
							
			?>

				<div class="col-md-6 col-lg-6">					
					<a href="<?php echo get_permalink($project_obj->ID); ?>"  class="projects-gallery_item" style="background: url('<?php echo $img; ?>') no-repeat center top;">
					</a>												
				</div>

			<?php } } ?>

		</div>
	</div>

<?php
	$rty=ob_get_contents();
	ob_end_clean();
	return $rty;
} ?>
<?php 
	add_shortcode('specialist','specialist_func');
	function specialist_func($attr,$content){
		global $post;
		$post_id=false;	
		if($post){$post_id=$post->ID;}
		global $termThis;
		if($termThis){$post_id=$termThis;}
		ob_start();
	?>
	<?php 
				$s_items=get_field('s_items');				
			?>
		<div class="row">
		<?php if($s_items) {
			foreach($s_items as $s_item) {
				$s_img=$s_item['Image'];					
				$s_text=$s_item['Text'];			
						
		?>

		<div class="col-6 col-lg-4">
			<div class="gallery-item-wrap">
				<a href="#" class="doc-item">
					<img src="<?php echo $s_img; ?>" alt=''>
				</a>
				<div class="doc-item__name mt-2">
					<?php echo $s_text; ?>
				</div>
			</div>
		</div>

		<?php }  }?>
 </div>
<?php
	$rty=ob_get_contents();
	ob_end_clean();
	return $rty;
}

?>