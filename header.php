<?php
// 获取选项
$keywords = cs_get_option( 'i_seo_keywords' ); 
$description = cs_get_option( 'i_seo_description' );
$favicon = cs_get_option( 'i_favicon_icon' ); 
$page = cs_get_option('i_pagination'); 
$style = cs_get_option('i_ajax_style'); 
$symbol = cs_get_option( 'i_symbol' ); 
$logo = cs_get_option( 'i_logo_image' ); 
$search = cs_get_option( 'i_search' ); 
$login = cs_get_option( 'i_login' ); 
$sliders = cs_get_option( 'i_slider' ); 
$switcher = cs_get_option( 'i_switcher' ); 
$bulletin = cs_get_option( 'i_bulletin' ); 
$left_btn = cs_get_option( 'i_left_btn' ); 
$archive_btn = cs_get_option( 'i_archive_btn' ); 
$meta_data = get_post_meta( get_the_ID(), 'aside_options', true );
$meta_data2 = get_post_meta( get_the_ID(), 'archive_page', true );
$index = $meta_data['i_index'];
$archive_index = $meta_data2['i_archive_index'];
?> 

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php if(function_exists('show_wp_title')){show_wp_title();} ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0,minimal-ui">
	<meta name="keywords" content="<?php echo $keywords ?>" />
	<meta name="description" content="<?php echo $description ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" href="<?php echo $favicon; ?>" title="Favicon">	
	<!--[if lte IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" media="screen"/>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ie-html5.js"></script>
	<![endif]-->
	<script type="text/javascript">document.documentElement.className = 'js';</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="app" id="totop">
	<?php if (is_mobile()) { ?>
		<div style="display:none;"><?php the_post_thumbnail( 'medium' ); ?></div>
	<?php }?>	

    <div class="app-header">
        <div class="navbar-header">
            <div class="app-logo">
                <?php if ( $symbol == 'i_text' ) { ?>
                    <div class="logo">	
                        <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
                    </div>
                <?php }elseif( $symbol == 'i_logo' ){ ?>
                    <div  class="logo">
                        <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                            <img src="<?php echo $logo ;?>" alt="<?php bloginfo('name'); ?>" />
                        </a>
                    </div> 
                <?php }else{ ?>
                    <div class="logo">	
                        <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><i class="icon-logo"></i></a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="navbar-collapse clearfix">
            <ul class="nav navbar-nav">
                <?php if ($left_btn == true) { ?>
                    <!-- 边栏 -->                
                    <li class="navbar-ng">
                        <a href="" class="navbar-btn">
                            <i class="fa fa-fw fa-dedent"></i>
                        </a>
                    </li>
                <?php }?>	
                <?php if ($archive_btn == true) { ?>                
                    <!-- 归档 -->                
                    <li class="navbar-archive">
                        <a href="" class="navbar-btn">
                            归档<span class="caret"></span>
                        </a>
                        <div class="nav-cat-cloud dropdown-menu box-shadow dropdown">
                            <?php if (is_active_sidebar(2) && !is_mobile()) { ?>
                            <?php 
                                $column = cs_get_option( 'i_topbar_col' );  
                                $column_style = '';
                                switch ($column) {
                                    case "col_1":
                                        $column_style = 'columns1';
                                        break;

                                    case "col_2":
                                        $column_style = 'columns2';
                                        break;

                                    case "col_3":
                                        $column_style = 'columns3';
                                        break;

                                    case "col_4":
                                        $column_style = 'columns4';
                                        break;				
                                } 
                             ?>	

                                <div id="drawer-inside" class="clearfix <?php echo $column_style; ?>">
                                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Drawer') ) : else : ?>		
                                    <?php endif; ?>		
                                </div>
                            <?php } ?>
                        </div>                    
                    </li> 
                <?php }?>                
            </ul>
            
            <?php if ($search == true && !is_mobile()) { ?>
            <!-- 搜索栏 -->	
                <form method="get" id="searchform" action="<?php echo home_url(); ?>/">
                    <input type="text" class="search-text" name="s" value="<?php _e( '搜索...' , 'tie' ) ?>" onfocus="if (this.value == '<?php _e( '搜索...' , 'tie' ) ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( '搜索...' , 'tie' ) ?>';}"  />
                    <i class="fa fa-search"></i>
                </form>
            <?php }?>	
            
            <ul class="nav navbar-nav navbar-right">
                
                <?php if ($login == true) { ?>
                    <!-- 登陆框 -->
                    <li class="navbar-login">
                    <?php $current_user = wp_get_current_user(); ?>
                    <?php if ( is_user_logged_in() ) { ?>
                        <a class="avatar-box" href="<?php if(current_user_can('level_10')){ echo admin_url( 'admin.php?page=cs-framework' ) ;}else {echo admin_url( 'index.php' ) ;}  ?>" class="tooltip" title="<?php echo __('后台管理', 'pinthis'); ?>">
                            <?php if (strlen(get_avatar($current_user->ID, 40)) > 0) { ?>
                                <?php echo get_avatar($current_user->ID, 40); ?>
                            <?php } else { ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/default-avatar.png" alt="<?php echo $current_user->display_name; ?>">
                            <?php } ?>
                        </a>	
                        <div class="dropdown-menu box-shadow dropdown">
                            <ul class="sub-menu">
                                <li class="name">
                                    <a href="<?php if(current_user_can('level_10')){ echo admin_url( 'admin.php?page=cs-framework' ) ;}else {echo admin_url( 'index.php' ) ;}  ?>"><i class="fa fa-tachometer"></i>后台管理</a>
                                </li>
                                <li class="edit-post">
                                    <a href="<?php echo admin_url( 'post-new.php' ) ; ?>"><i class="fa fa-edit"></i><?php echo __('发文章', 'pinthis'); ?></a>
                                </li>							
                                <li class="log-out">
                                    <a href="<?php echo wp_logout_url(home_url()); ?>" class="tooltip"><i class="fa fa-sign-out"></i><?php echo __('登出', 'pinthis'); ?></a>
                                </li>
                            </ul>
                        </div>
                    <?php } else { ?>
                     <a href="#" onclick="return false;" title="<?php echo __('登录', 'pinthis'); ?>" class="navbar-btn"><i class="fa fa-user"></i></a>
                        <div class="dropdown-menu box-shadow dropdown">
                                <div class="sub-menu clearfix">
                                    <?php 
                                        $login_form_args = array (
                                            'form_id' => 'login-form',
                                            'label_log_in' => __('登录', 'pinthis'),
                                            'remember' => false,
                                            'value_remember' => false
                                        ); 
                                    ?> 
                                    <?php wp_login_form($login_form_args); ?>
                                    <p class="login-links clearfix">
                                        <span class="alignleft">
                                            <a href="<?php echo htmlspecialchars(wp_lostpassword_url(get_permalink()), ENT_QUOTES); ?>"><?php echo __('忘记密码', 'pinthis'); ?></a>
                                        </span>
                                        <?php if (get_option('users_can_register')) { ?>
                                            <span class="alignright"><?php wp_register('', ''); ?></span>
                                        <?php } ?>
                                    </p>
                                </div>
                        </div>
                    <?php } ?>	
                </li>		

            <?php } ?>	 
                
            <?php if ($switcher == true && !is_mobile()) { ?>
                <!-- 切换皮肤 -->	
                <li class="navbar-skin">
                    <a href="" class="navbar-btn">
                        皮肤<span class="caret"></span>
                    </a>
                    <div class="dropdown-menu box-shadow dropdown">
                        <ul class="sub-menu clearfix">
                            <li class="skin1"><a href="<?php echo get_template_directory_uri(); ?>/skin/switcher.php?style=skin01.css"><span></span>复古</a></li>
                            <li class="skin2"><a href="<?php echo get_template_directory_uri(); ?>/skin/switcher.php?style=skin02.css"><span></span>酷黑</a></li>
                            <li class="skin3"><a href="<?php echo get_template_directory_uri(); ?>/skin/switcher.php?style=skin03.css"><span></span>清新</a></li>
                        </ul>
                    </div>
                </li>
            <?php }?>
                
            </ul>
        </div>   
    </div>    
        
    <div class="app-aside">    
        
        <div class="aside-wrap">
            <div class="navi-wrap">
                <div class="app-logo">
                    <?php if ( $symbol == 'i_text' ) { ?>
                        <div class="logo">	
                            <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
                        </div>
                    <?php }elseif( $symbol == 'i_logo' ){ ?>
                        <div  class="logo">
                            <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                                <img src="<?php echo $logo ;?>" alt="<?php bloginfo('name'); ?>" />
                            </a>
                        </div> 
                    <?php }else{ ?>
                        <div class="logo">	
                            <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><i class="icon-logo"></i></a>
                        </div>
                    <?php } ?>
                    <div class="logo-subtitle"><?php bloginfo('description') ?></div>
                </div>
                
                <nav role="navigation" class="header-menu">  	
                    <?php wp_nav_menu(array('theme_location' => 'main', 'container' => 'div', 'container_class' => 'header-menu-wrapper', 'menu_class' => 'header-menu-list', 'walker' => new pinthis_submenu_wrap())); ?>
                </nav>		
            </div>
        </div>
	
    </div>    
        
    <div class="app-content">   	      
        
	<div class="app-content-body">
		<div class="hbox">
			<?php if($index == true || $archive_index == true  ) { ?>
                <div class="index-box col"></div>
			<?php } ?>
		<div class="main col">
            
	<?php if(is_home() && !is_paged() && !is_mobile()) { ?> 
		<?php if ($bulletin == true) {?>
		<div class="bulletin_box">
			<i class="fa fa-bell-o"></i>
			<div id="bulletin">
				<?php	
					$my_bulletins = cs_get_option( 'i_bulletin_custom' );
					echo '<ul class="bulletin_list">';
					if( ! empty( $my_bulletins ) ) {
					  foreach ( $my_bulletins as $bulletin ) {
						echo '<li>';
						if( ! empty( $bulletin['i_bulletin_link'] ) ){ echo '<a href="'. $bulletin['i_bulletin_link'] .'"';}
						if ( ! empty( $bulletin['i_bulletin_link'] ) && $bulletin['i_bulletin_newtab'] == true) { echo 'target="_black">';}else{ if ( ! empty( $bulletin['i_bulletin_link'] )){ echo '>';}}
						echo ''. $bulletin['i_bulletin_text'] .'';
						if( ! empty( $bulletin['i_bulletin_link'] ) ){ echo '</a>';}				    
						echo '</li>';
					  }
					}		
					echo '</ul>';
				?>	
			</div>
			<a href="#" class="bulletin_remove"><i class="fa fa-close"></i></a>
		</div>
		<?php }	?>	
	<?php } ?>	
            
	<?php if(is_home() && !is_paged()) { ?> 
		<!-- 调用幻灯片 -->
		<?php if ($sliders == true) { ?>
            <div class="app_slider theme-bg">
                <div id="slider" class="nivoSlider">
                    <?php	
                        $my_sliders = cs_get_option( 'i_slider_custom' );
                        if( ! empty( $my_sliders ) ) {
                          foreach ( $my_sliders as $slider ) {
                            if( ! empty( $slider['i_slider_link'] ) ){ echo '<a href="'. $slider['i_slider_link'] .'"';}
                            if ( ! empty( $slider['i_slider_link'] ) && $slider['i_slider_newtab'] == true) { echo 'target="_black">';}else{ if ( ! empty( $slider['i_slider_link'] )){ echo '>';}}
                            echo '<img class=" " src="'. $slider['i_slider_image'] .'" data-thumb="'. $slider['i_slider_image'] .'" title="'. $slider['i_slider_text'] .'"/>';
                            if( ! empty( $slider['i_slider_link'] ) ){ echo '</a>';}				    
                          }
                        }		
                    ?>	
                </div>
            </div>
		<?php } ?>
	<?php } ?>	
		