<div class="tab">
	<ul class="tabs">
		<li><a href="#"><i class="fa fa-comments-o"></i></a></li>
		<li><a href="#"><i class="fa fa-clock-o"></i></a></li>
		<li><a href="#"><i class="fa fa-fire"></i></a></li>
	</ul>
	<div class="tab_content">
		<div class="tabs_item" id="comment-list">
            <ul>
                <?php h_comments($outer='博主',$limit= 10);?>   
            </ul>
		</div> <!-- / tabs_item -->
		<div class="tabs_item" id="hot-post">
            <ul class="new-posts">
                <?php
                $recentPosts = new WP_Query();
                $recentPosts->query('showposts=12'); ?>
                <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </li>
                <?php endwhile; ?>
            </ul>
		</div> <!-- / tabs_item -->
		<div class="tabs_item">
            <ul class="comm_posts">            
                <?php if(function_exists('most_comm_posts')) most_comm_posts(120,12); ?> 
            </ul>
		</div> <!-- / tabs_item -->
	</div> <!-- / tab_content -->
</div> <!-- / tab -->