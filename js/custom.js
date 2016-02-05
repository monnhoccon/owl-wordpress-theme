// 图像懒加载
echo.init({
	offset: 100,
	throttle: 250,
	unload: false,
});

// 作品模板
(function(){
minigrid('.grid', '.grid-item');

window.addEventListener('resize', function(){
  minigrid('.grid', '.grid-item');
});
})();

// Banner + 读者墙提示文本
MouseTooltip.init();

// 播放器	
jQuery(window).load(function($) {
	jQuery('<div class="mejs-button mejs-toggle-player-button mejs-toggle-player"><button type="button" aria-controls="" title=""></button></div>').appendTo(jQuery(".cue-playlist-container .mejs-controls"));

	jQuery(".mejs-toggle-playlist-button").click(function() {
		jQuery(".cue-playlist").toggleClass("open");
	});

	jQuery(".mejs-toggle-player-button").click(function() {
		jQuery(".cue-playlist").toggleClass("is-closed");
		jQuery(".cue-playlist-container").toggleClass("playlist-closed");
	});

});

//滚动公告栏	
function AutoScroll(obj){ 
	jQuery(obj).find("ul:first").animate({ 
		marginTop:"-25px" 
	},500,function(){ 
		jQuery(this).css({marginTop:"0px"}).find("li:first").appendTo(this); 
		}); 
} 
jQuery(document).ready(function(){ 
	setInterval('AutoScroll("#bulletin")',4000);
	jQuery(".bulletin_remove").click(function() {
		event.preventDefault();
		jQuery(".bulletin_box").addClass("hide");
	});	
});

jQuery(document).ready(function($) {   
    
// 评论分页
$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');
// 点击分页导航链接时触发分页
$('body').on('click', '#comment-nav-below a', function(e) {
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: $(this).attr('href'),
        beforeSend: function(){
            $('#comment-nav-below').remove();
            $('.commentlist').remove();
            $('#loading-comments').slideDown();
            $body.animate({scrollTop: $('#comments-title').offset().top - 65}, 800 );
        },
        dataType: "html",
        success: function(out){
            result = $(out).find('.commentlist');
            nextlink = $(out).find('#comment-nav-below');
            $('#loading-comments').slideUp('fast');
            $('#loading-comments').after(result.fadeIn(500));
            $('.commentlist').after(nextlink);
        }
    });
});	
	
// 评论拖动验证
//http://codepen.io/souporserious/pen/XJQLEb
	if($(".pullee").length>0){	
		$(".form-submit #submit").attr("disabled", true);				
		$(".form-submit #submit").addClass("disabled");				

		var inputRange = document.getElementsByClassName('pullee')[0],
			maxValue = 250,
			speed = 12,
			currValue, rafID;
		inputRange.min = 0;
		inputRange.max = maxValue;

		function unlockStartHandler() {
			window.cancelAnimationFrame(rafID);
			currValue = +this.value
		}
		function unlockEndHandler() {
			currValue = +this.value;
			if (currValue >= maxValue) {
				successHandler()
			} else {
				rafID = window.requestAnimationFrame(animateHandler)
			}
		}
		function animateHandler() {
			inputRange.value = currValue;
			if (currValue > -1) {
				window.requestAnimationFrame(animateHandler)
			}
			currValue = currValue - speed
		}
		function successHandler() {
			$(".unlock .fa").removeClass("fa-lock");
			$(".unlock .fa").addClass("fa-check");
			inputRange.value = 250;
			$(".pullee").attr("disabled", "disabled");		
			$(".form-submit #submit").attr("disabled", false);
			$(".form-submit #submit").removeClass("disabled");			
			
		};
		inputRange.addEventListener('mousedown', unlockStartHandler, false);
		inputRange.addEventListener('mousestart', unlockStartHandler, false);
		inputRange.addEventListener('mouseup', unlockEndHandler, false);
		inputRange.addEventListener('touchend', unlockEndHandler, false);
	} else {}		

	
//固定小工具
	var rw = $('.sidebar-contentWrapper').width();	
	var rh = $('.rightbar').height();
	var bh = $('.main').height();	
	$('#wrapper').css('min-height', rh + 100 + "px");
	
	if($(".rightbar aside").length>0){
		var documentHeight = 0;
		var topPadding = 15;		
		$(function() {
			var offset = $(".rightbar aside:last").offset();
			documentHeight = $(document).height();
			$(window).scroll(function() {
				var sideBarHeight = $(".rightbar aside:last").height();
				if ($(window).scrollTop() > offset.top) {
					var newPosition = ($(window).scrollTop() - offset.top) + topPadding;
					var maxPosition = documentHeight - (sideBarHeight + 368);
					if (newPosition > maxPosition) {
						newPosition = maxPosition;
					}
					$(".rightbar aside:last").addClass("affix").css({width: rw});
				} else {
					$(".rightbar aside:last").removeClass("affix");
				};
			});
		});		
	} else {}	

//选项卡
(function ($) { 
    $('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');

    $('.tab ul.tabs li a').click(function (g) { 
        var tab = $(this).closest('.tab'), 
            index = $(this).closest('li').index();

        tab.find('ul.tabs > li').removeClass('current');
        $(this).closest('li').addClass('current');

        tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
        tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();

        g.preventDefault();
    } );
})(jQuery);
   
//左边栏  
    $(".navbar-ng a").click(function(){
        $("body").toggleClass("left-close");
        $(".navbar-ng a i").toggleClass("fa-indent");
    });
    
//文章目录     
    $(".index-box").append($(".content #article-index").clone());
	$('.index-box a[href^="#"]').click(function() {
		var _rel = jQuery(this).attr("href");
		var _targetTop = jQuery(_rel).offset().top;
		jQuery("html,body").animate({
			scrollTop: _targetTop - 50
		}, 700);
		return false
	});
 
//下拉效果	
	$(".navbar-nav>li>a,.menu-item-has-children>a,.year-toogle").toggle(function() {
		$(this).siblings(".dropdown").slideToggle(300).parent().siblings().find(".dropdown").slideUp();
		return false;
	}, function() {
		$(this).siblings(".dropdown").slideToggle(300).parent().siblings().find(".dropdown").slideUp();
		$(this).find(".arrow").removeClass('fa-angle-down');        
		return false;
	});
    
//图像CSS类	
	$("#content img, .avatar").addClass('ajax_gif');
	$("#content img").parent().addClass('content-img');
	$("#content img, .avatar").load(function() {
		$(this).removeClass('ajax_gif');
	});

//Tooltip
	$(".tagcloud a , .linkcat li a").each(function(i) {
		var formattedDate = $(this).attr('title');
		$(this).attr("data-tooltip", function(n, v) {
			return formattedDate;
		});
		$(this).removeAttr("title").addClass("with-tooltip");
	});
	
	$(".linkcat li a").each(function(i) {
		var linkhref = $(this).attr('href');
		$(this).prepend( '<img src="' + linkhref + 'favicon.ico">');
	});	

	$('.linkcat li a img , .avatar').on('error', function () {
	  $(this).prop('src', '../wp-content/themes/Island/images/broken.jpg');
	});	

//底部按钮
	$(window).scroll(function() {
		if ($(window).scrollTop() > 200) {
			$(".foot_btn").fadeIn(500);
		} else {
			$(".foot_btn").fadeOut(500);
		}
	});

	$(".scrolltotop").click(function() {
		$('body,html').animate({
			scrollTop: 0
		}, 1000);
		return false;
	});    
    
	$(".comment_btn").click(function() {
		$("html,body").animate({
			scrollTop: $("#comment-jump").offset().top - 60
		}, 1000);
		return false;
	});

	$("#r-wx").mouseenter(function() {
		$("#fi-wx-show").css({
			display: "block"
		});
	});

	$("#r-wx").mouseleave(function() {
		$("#fi-wx-show").css({
			display: "none"
		});
	});
	
	$(".baidu_share").mouseenter(function() {
		$(".share_show").css({
			display: "block"
		});
	});

	$(".baidu_share").mouseleave(function() {
		$(".share_show").css({
			display: "none"
		});
	});	


//登录面板	

	$(".login-toggle").toggle(function() {
		$(".login_bg").slideToggle(300);
		return false;
	}, function() {
		$(".login_bg").slideToggle(300);
		return false;
	});

//自适应菜单
	$("#menu-toggle").click(function() {
		$(".mobile-nav , #menu-toggle").toggleClass("open-nav");
	});
	
//Modal
	$(".modal-close").click(function() {
		$(".modal-bg").addClass("hide").removeClass("show");
	});

//下载盒子
	$(".dl-link a").click(function() {
		$(".download-bg").addClass("show").removeClass("hide");
		var dlLink = $(this).attr('data-dl');
		var dlCode = $(this).attr('data-code');
		$(".dl-btn a").attr("href",dlLink);		
		$(".dl-tqcode span").text(dlCode);		
	});		
	
//手风琴
    var headers = ["H1"];
    $(".accordion").click(function(e) {
      var target = e.target,
          name = target.nodeName.toUpperCase();

      if($.inArray(name,headers) > -1) {
        var subItem = $(target).next();
        var depth = $(subItem).parents().length;
        var allAtDepth = $(".accordion div").filter(function() {
          if($(this).parents().length >= depth && this !== subItem.get(0)) {
            return true; 
          }
        });
        $(allAtDepth).slideUp("fast");
            subItem.slideToggle("fast",function() {
            $(".accordion :visible:last").css("border-radius","0");
        });
            $(target).toggleClass("open").siblings().removeClass("open");
            $(target).children().toggleClass("fa-minus");
            $(target).siblings().children().removeClass("fa-minus");
      }
    });
	
});
