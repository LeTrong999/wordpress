<?php 
	$args = array(
				'post_type' 		=> 'zaproduct',
				'posts_per_page' 	=> 8,
				'orderby' 			=>'date',
				'order' 			=> 'DESC'
			);
	$the_query = new WP_Query($args);
	
?>
<div id="normal-sortables" class="meta-box-sortables ui-sortable">
	<div id="dashboard_right_now" class="postbox ">
		<div class="handlediv" title="Click to toggle">
			<br>
		</div>
		<h3 class="hndle ui-sortable-handle">
			<span><?php echo __('Latest Products')?>
			</span>
		</h3>
		<div class="inside">
			<div class="main">
				<ul>
					<?php 
						$i = 1;
						if($the_query->have_posts()){
							while ($the_query->have_posts()){
								$the_query->the_post();
								$link = 'post.php?post_type=zaproduct&post=' . get_the_ID() . '&action=edit';
								echo '<li class="page-count"><a href="' . $link . '">' 
									 . $i . ' - ' . get_the_title() . '</a></li>';
					
								$i++;
							}//$the_query->have_posts()
						}
						wp_reset_postdata();
					?>
					
				</ul>
				<p id="wp-version-message">
					<span id="wp-version">View all products <a href="edit.php?post_type=zaproduct">click here</a>.
					</span>
				</p>
			</div>
		</div>
	</div>

</div>
