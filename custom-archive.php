<?php 
/* 
Template Name: 归档页面
*/ 
$meta_data = get_post_meta( get_the_ID(), 'archive_page', true );
$featured = $meta_data['i_page_image'];
?>

<?php get_header(); ?>

		<!-- 归档页面 -->
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
                                    <div id="archives">      
                                        <div id="archives-content">      
                                        <?php       
                                            $the_query = new WP_Query( 'posts_per_page=-1&ignore_sticky_posts=1' );      
                                            $year=0; $mon=0; $i=0; $j=0;      
                                            $all = array();      
                                            $output = '';      
                                            while ( $the_query->have_posts() ) : $the_query->the_post();      
                                                $year_tmp = get_the_time('Y');      
                                                $mon_tmp = get_the_time('n');      
                                                $y=$year; $m=$mon;      
                                                if ($mon != $mon_tmp && $mon > 0) $output .= '</div></div>';      
                                                if ($year != $year_tmp) { // 输出年份      
                                                    $year = $year_tmp;      
                                                    $all[$year] = array();      
                                                }      
                                                if ($mon != $mon_tmp) { // 输出月份      
                                                    $mon = $mon_tmp;      
                                                    array_push($all[$year], $mon);      
                                                    $output .= "<div class='archive-title' id='arti-$year-$mon'><h3 id='mont-$year-$mon'>$year-$mon</h3><div class='archives archives-$mon' data-date='$year-$mon'>";      
                                                }      
                                                $output .= '<div class="brick"><a href="'.get_permalink() .'"><span class="time">'.get_the_time('n-d').'</span>'.get_the_title() .'<em>('. get_comments_number('0', '1', '%') .')</em></a></div>';      
                                            endwhile;      
                                            wp_reset_postdata();      
                                            $output .= '</div></div>';      
                                            echo $output;      

                                            $html = "";      
                                            $year_now = date("Y");      
                                            foreach($all as $key => $value){// 输出 左侧年份表      
                                                $html .= "<li class='year' id='year-$key'><a href='javascript:void(0)' class='year-toogle' id='yeto-$key'><i class='arrow fa fa-angle-right'></i>$key 年</a><ul class='monthall dropdown'>";      
                                                for($i=12; $i>0; $i--){      
                                                    if($key == $year_now && $i > $value[0]) continue;      
                                                    $html .= in_array($i, $value) ? ("<li class='month monthed'><a href='#mont-$key-$i'>$i 月</a></li>") : ("<li class='month'>$i</li>");      
                                                }      
                                                $html .= "</ul></li>"; 
                                            }      
                                        ?>     
                                        </div>      
                                        <div id="article-index">  
                                            <div class="index-header">归档目录</div>
                                            <div class="index-content">
                                                <ul class="archive-nav"><?php echo $html;?></ul> 
                                            </div
                                        </div>      
                                    </div><!-- #archives -->    									
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>	
				</article>	
				<?php endwhile; ?>
				<?php endif; ?>
		   </div>
		</div>
		<?php get_footer(); ?>