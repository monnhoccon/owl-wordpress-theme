<?php
// 获取选项
$excerpt = cs_get_option( 'i_post_readmore' ); 
$qrcodes = cs_get_option( 'i_code_qrcodes' ); 
$qrcodes_img = cs_get_option( 'i_qrcodes_img' ); 
$font = cs_get_option( 'i_post_font' );
$view = cs_get_option( 'i_post_view' );
$sticky_img = cs_get_option( 'i_related_image' ); 
$featured = cs_get_option( 'i_post_featured' );
$meta_data = get_post_meta( get_the_ID(), 'aside_options', true );
$music = $meta_data['i_post_music'];
$player_id = cs_get_option( 'i_player_id' ); 
$player = cs_get_option('i_player');
$player_mobi = cs_get_option('i_player_mobi');
$author = cs_get_option( 'i_post_author' );
$jieya = cs_get_option( 'i_download_jieya' );
$dlview = cs_get_option( 'i_download_view' );
$download = $meta_data['i_download'];
$web = $meta_data['i_download_web'];
$charge = $meta_data['i_download_charge'];
$link = $meta_data['i_download_link'];
$code = $meta_data['i_download_code'];
?> 		
	<!-- 日志 -->
	
	<div class="box-wrap">
		<div class="box">
		
		<header>
			<?php if(is_single() || is_page()) { ?>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
			<?php } else { ?>					
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<?php } ?>				
			
			<?php if( !is_single()) { ?>

			<?php } else { ?>
			<ul class="top_meta">
				<li class="mate-cat"><i class="fa fa-folder-open-o"></i><?php the_category(' '); ?></li>
				
				<?php if ($author == true) { ?>

				<li class="mate-author"><i class="fa fa-user"></i><?php the_author_posts_link(); ?></li>

				<?php } ?>					
				<li class="mate-time"><i class="fa fa-clock-o"></i><?php echo '发表于 '.timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) ); ?></li>
				<?php if ($view == true) { ?>
				<li class="mate-view"><i class="fa fa-eye"></i><?php echo getPostViews(get_the_ID()); ?>次浏览</li>
				<?php } ?>
				<li class="mate-com"><i class="fa fa-comments-o"></i><a href="<?php the_permalink(); ?>#comments-title" title="comments"><?php comments_number(__('暂无评论','island'),__('1条评论','island'),__( '%条评论','island') );?></a></li>				
				<li><?php edit_post_link( __( '<i class="fa fa-edit"></i>编辑', 'island' ), '<div class="edit-link" alt="编辑文章"  title="编辑文章">', '</div>' ); ?></li>				
				<div class="clearfix"></div>
			</ul>
			<?php } ?>				
			
		</header>		
		

			

		
			<?php if (is_single()) { ?>
				<?php if( $featured == true) { ?>
					<?php if ( has_post_thumbnail()) { ?>
                        <div class="featured-image" >
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php the_post_thumbnail( 'large-image' ); ?>
                            </a>	
                        </div>
					<?php }?>	
				<?php }	?>
			<?php } else { ?> 
				<?php if ( has_post_thumbnail() && !is_mobile()) { ?>
                    <div class="featured-image" >
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail( 'large-image' ); ?>
                        </a>	
                    </div>	
				<?php }else{?>
                    <div class="featured-image" >
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $sticky_img ?>"></a>
                    </div>
				<?php } ?>				
			<?php } ?>		
			<div class="post-content">
				
				<?php if( !is_single() ) { ?>
				<ul class="top_meta">
					<li class="mate-cat"><i class="fa fa-folder-open-o"></i><?php the_category(' '); ?></li>
					

					<?php if ($author == true) { ?>

					<li class="mate-author"><i class="fa fa-user"></i><?php the_author_posts_link(); ?></li>

					<?php } ?>					
					<li class="mate-time"><i class="fa fa-clock-o"></i><?php echo '发表于 '.timeago( get_gmt_from_date(get_the_time('Y-m-d G:i:s')) ); ?></li>
					<?php if ($view == true) { ?>
					<li class="mate-view"><i class="fa fa-eye"></i><?php echo getPostViews(get_the_ID()); ?>次浏览</li>
					<?php } ?>
					<li class="mate-com"><i class="fa fa-comments-o"></i><a href="<?php the_permalink(); ?>#comments-title" title="comments"><?php comments_number(__('暂无评论','island'),__('1条评论','island'),__( '%条评论','island') );?></a></li>						
					<li><?php edit_post_link( __( '<i class="fa fa-edit"></i>编辑', 'island' ), '<div class="edit-link" alt="编辑文章"  title="编辑文章">', '</div>' ); ?></li>									
					<div class="clearfix"></div>
				</ul>
				<?php } else { ?>
				
				<?php } ?>					
				
				<div class="content">
				<?php if(is_search() || is_archive()) { ?>
					<div class="excerpt-more">
						<?php the_excerpt(__( 'Read More','island')); ?>
					</div>
				<?php } else { ?>
						
					<?php if(is_home()) { ?>
						<?php if ($excerpt == true) {
							the_excerpt(__( 'Read More','island'));
						}else{
							the_content(__( 'Read More','island'));
						}?>										
					<?php } else { ?>	
						<?php the_content(__( 'Read More','island')); ?>
					<?php } ?>			
					
				<?php } ?>	
				
				</div>
				
			</div><!-- post content -->	
			
			<?php if (!empty($music) && $player == true) { ?>		
				<div class="clearfix"></div>
				<div class="audio-wrapper">
					<audio class="wp-audio-shortcode" preload="none" style="width: 100%">
						<source type="audio/mpeg" src="<?php echo $music; ?>">
					</audio>
				</div>
			<?php } ?>	
			<?php if ($player == true) {?>
				<?php wp_enqueue_script('mediaelement'); ?>	
				<?php wp_enqueue_style('mediaelement'); ?>
				<script>
					jQuery(document).ready(function($) {
						$('.audio-wrapper audio').mediaelementplayer();
					});
				</script>				
			<?php }	 ?>		

	        <?php if ( is_single() && $download && !is_mobile() ) {?>		
				<!-- 下载盒子 -->	
				<div class="download-wrap">
			        <div class="post-download <?php if ( !current_user_can('level_10') && $dlview == true ){echo 'dlview';}?>">
			            <div class="dl-title"><i class="fa fa-download"></i>资源下载</div>
			            <div class="dl-box">
			                <div class="dl-web">官方网站：<a href="<?php echo $web; ?>" target="_black">访问</a></div>
			                <div class="dl-fei">软件性质：<?php if ( $charge == 'i_charge01' ) {echo '免费';}else { echo '收费';} ?></div>
							<div class="dl-link">下载地址：<a href="javascript:void(0)" data-dl="<?php echo $link; ?>" data-code="<?php if ( $code ) {echo $code;}else { echo '无';} ?>"><span>点击下载</span></a></div>
			                <div class="dl-code">解压密码：<?php if ( $jieya ) {echo $jieya;}else { echo '无';} ?></div>
			            </div>
			            <div class="dl-view">资源评论回复可见！</div>
			        </div>
		        </div>
        	<?php } else { ?>
			
			<?php } ?>					


			
