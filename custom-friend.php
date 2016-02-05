<?php 
/* 
Template Name: 友链页面
*/ 
$meta_data = get_post_meta( get_the_ID(), 'friend_page', true );
$featured = $meta_data['i_page_image'];
?>

<?php get_header(); ?>

		<!-- 友链页面 -->
		<div id="content">
			<div class="posts fade out">	
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article <?php post_class('post'); ?>>			
					<div class="box-wrap">
						<div class="box">
							 <?php if (!empty($featured)) { ?>		
									<a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $featured; ?>" class="attachment-large-image wp-post-image ajax_gif"></a>
							 <?php } else { ?>
								<?php if ( has_post_thumbnail()) { ?>
									<a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'large-image' ); ?></a>
								<?php } ?>
							<?php } ?>			
							<div class="post-content">
								<header>
									<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
									<ul class="top_meta"></ul>
								</header>
								<div class="content">
									<?php the_content(__( 'Read More','island')); ?>
									<?php wp_list_bookmarks('orderby=id&category_orderby=id'); ?>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>	
				</article>	
				<?php endwhile; ?>
				<?php endif; ?>
		   </div>
			<!-- 评论 -->
			<?php if ('open' == $post->comment_status) { ?>
			<div id="comment-jump" class="comments">
				<?php comments_template(); ?>
			</div>
			<?php } ?>	
		</div>

		<?php get_footer(); ?>