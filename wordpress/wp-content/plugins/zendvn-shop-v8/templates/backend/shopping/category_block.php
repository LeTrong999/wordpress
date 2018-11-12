<?php 
	$args = array(
				'hide_empty' 		=> false,
				'number' 			=> 8,
				'orderby' 			=>'id',
				'order' 			=> 'DESC',
				'hierarchical'		=> false
			);
	$za_category = get_terms('za_category', $args);
	
	/* echo '<pre>';
	print_r($za_category);
	echo '</pre>'; */
	
?>
<div id="normal-sortables" class="meta-box-sortables ui-sortable">
	<div id="dashboard_right_now" class="postbox ">
		<div class="handlediv" title="Click to toggle">
			<br>
		</div>
		<h3 class="hndle ui-sortable-handle">
			<span><?php echo __('Latest Categories')?>
			</span>
		</h3>
		<div class="inside">
			<div class="main">
				<ul>
					<?php 
						 $i = 1;
							if(count($za_category)>0){
								foreach ($za_category as $key => $val){
									$link = 'edit-tags.php?action=edit&taxonomy=za_category
												&tag_ID=' . $val->term_id . '&post_type=zaproduct';
									echo '<li class="page-count"><a href="' . $link . '">' 
										 . $i . ' - ' . $val->name . '</a></li>';
						
									$i++;
								}
							}
					?>
					
				</ul>
				<p id="wp-version-message">
					<span id="wp-version">View all products <a href="edit-tags.php?taxonomy=za_category&post_type=zaproduct">click here</a>.
					</span>
				</p>
			</div>
		</div>
	</div>

</div>
