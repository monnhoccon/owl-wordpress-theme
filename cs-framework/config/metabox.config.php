<?php if ( ! defined( 'ABSPATH' ) ) { die; } //不能直接访问网页.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// 文章和页面属性选项
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();

// -----------------------------------------
// 页面选项                -
// -----------------------------------------
$options[]    = array(
  'id'        => 'default_page',
  'title'     => '默认模板选项',
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'  => 'page_section_1',
      'fields' => array(

		
      ), 
    ), 

  ),
);

$options[]    = array(
  'id'        => 'archive_page',
  'title'     => '归档模板选项',
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'  => 'page_section_1',
      'fields' => array(

        // 文章目录
		array(
          'id'    	  => 'i_archive_index',
          'type'      => 'switcher',
          'title'     => '归档目录',
        ),	          
		
      ), 
    ), 

  ),
);


$options[]    = array(
  'id'        => 'friend_page',
  'title'     => '友链模板选项',
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'  => 'page_section_1',
      'fields' => array(
		
      ), 
    ), 

  ),
);

$options[]    = array(
  'id'        => 'message_page',
  'title'     => '留意模板选项',
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'  => 'page_section_1',
      'fields' => array(
		
		
      ), 
    ), 

  ),
);


// -----------------------------------------
// 文章属性选项                    -
// -----------------------------------------

// 标准文章选项
$options[]    = array(
  'id'        => 'standard_options',
  'title'     => '标准文章选项',
  'post_type' => 'post',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'standard_section_1',
      'fields' => array( 

      ),
    ),	
	
  ),
);

// 日志文章选项
$options[]    = array(
  'id'        => 'aside_options',
  'title'     => '日志文章选项',
  'post_type' => 'post',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'aside_section_1',
      'title' => ' 音乐',
      'icon'  => 'fa fa-music',      
      'fields' => array(
	  
	  // 音乐外链
        array(
          'id'        => 'i_post_music',
          'type'      => 'text',
          'title'     => '音乐外链',
		  'help'     => '前提是正确开启Cue播放器，并且Cue歌单里存在歌曲',
          'attributes'    => array(
            'placeholder' => 'http://...'
          )		  
        ),

      ),
    ),	

    array(
      'name'   => 'aside_section_2',
      'title' => ' 下载',
      'icon'  => 'fa fa-download',        
      'fields' => array(
	  
          // 资源下载
		array(
          'id'    	  => 'i_download',
          'type'      => 'switcher',
          'title'     => '资源下载',
        ),			
          
          // 官方网站
        array(
          'id'         => 'i_download_web',
          'type'       => 'text',
          'title'      => '官方网站',
          'attributes'    => array(
            'placeholder' => 'http://...'
          ),         
        ),
          
		// 软件性质
        array(
          'id'        => 'i_download_charge',
          'type'      => 'select',
          'title'     => '软件性质',
          'options'   => array(
          'i_charge01' => '免费',
          'i_charge02' => '收费',
          ),
          'default'   => 'i_charge01',
        ),	
          
          // 下载地址
        array(
          'id'         => 'i_download_link',
          'type'       => 'text',
          'title'      => '下载地址',
          'attributes'    => array(
            'placeholder' => 'http://...'
          ),        
        ), 
          
          // 提取码
        array(
          'id'         => 'i_download_code',
          'type'       => 'text',
          'title'      => '提取码',
		  'after'  		  => '<p class="cs-text-muted">留空即无</p>',		  		              
        ),  

      ),
    ),	 
      
    array(
      'name'   => 'aside_section_3',
      'title' => '目录',
      'icon'  => 'fa fa-list-ul',      
      'fields' => array(
	  
        // 文章目录
		array(
          'id'    	  => 'i_index',
          'type'      => 'switcher',
          'title'     => '文章目录',
        ),	
          
        // 宽屏模式
		array(
          'id'    	  => 'i_index_width',
          'type'      => 'switcher',
          'title'     => '宽屏模式',
        ),	          

      ),
    ),	      
	
  ),
);

// -----------------------------------------
// 作品属性选项                    -
// -----------------------------------------

// 日志文章选项
$options[]    = array(
  'id'        => 'work_options',
  'title'     => '作品选项',
  'post_type' => 'work',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'aside_section_1',
      'fields' => array(
	  
		// 内页特色图
        array(
          'id'         => 'i_work_featured',
          'type'       => 'radio',
          'title'      => '内页特色图',
          'class'      => 'horizontal',
          'options'    => array(
            'i_featured'   => '特色图',
            'i_slider'   => '轮播图',
          ),
          'default'    => 'i_featured',
        ),	
		
			// 自定义轮播图
        array(
          'id'              => 'i_work_custom',
          'type'            => 'group',
          'title'           => '自定义轮播图',
          'info'            => '更多详细设置方式可以浏览使用说明',
          'dependency' => array( 'i_work_featured_i_slider', '==', 'true' ),		  
          'button_title'    => '添加滑块',
          'accordion_title' => '滑块',
          'fields'          => array(
		  
				// 自定义幻灯片--标题
            array(
              'id'          => 'i_work_title',
			  'type'        => 'text',
              'title'       => '标题',
			  'attributes'    => array(
				'placeholder' => '例如：滑块01'
			  )
            ),
			
				// 自定义幻灯片--图片		
			array(
			  'id'      => 'i_work_image',
			  'type'    => 'upload',
			  'title'   => '图片',
			),		
			
				// 自定义幻灯片--链接						
			array(
			  'id'            => 'i_work_link',
			  'type'          => 'text',
			  'title'         => '链接',
			  'attributes'    => array(
				'placeholder' => 'http://...'
			  )
			),
			
				// 自定义幻灯片--新标签	
			array(
			  'id'    	  => 'i_work_newtab',
			  'type'      => 'switcher',
			  'title'     => '新标签打开',
			  'dependency'   => array( 'i_work_link', '!=', '' ),
			),				

          )
        ),		
		
 		// 自定义背景图片
		array(
          'id'    	  => 'i_work_bg',
          'type'      => 'switcher',
          'title'     => '自定义背景图片',
        ),			
		
		// 设置背景图片
        array(
          'id'      => 'i_work_bg_scr',
          'type'    => 'upload',
          'title'   => '设置背景图片',
          'help'      => '',
          'default' => get_template_directory_uri()."/images/work_bg.jpg",	
		  'help'      => '建议使用模糊背景图片',	
		  'dependency'   => array( 'i_work_bg', '==', 'true' ),		  
        ),	

 		// 开启评论
		array(
          'id'    	  => 'i_work_comment',
          'type'      => 'switcher',
          'title'     => '开启评论',
        ),				

      ),
    ),	
	
  ),
);

CSFramework_Metabox::instance( $options );
