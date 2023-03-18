$(window).on("load",function(){"use strict";$(".post_project").on("click",function(){$(".post-popup.pst-pj").addClass("active");$(".wrapper").addClass("overlay");return false;});$(".post-project > a").on("click",function(){$(".post-popup.pst-pj").removeClass("active");$(".wrapper").removeClass("overlay");return false;});$(".post-jb").on("click",function(){$(".post-popup.job_post").addClass("active");$(".wrapper").addClass("overlay");return false;});$(".post-project > a").on("click",function(){$(".post-popup.job_post").removeClass("active");$(".wrapper").removeClass("overlay");return false;});$('.sign-control li').on("click",function(){var tab_id=$(this).attr('data-tab');$('.sign-control li').removeClass('current');$('.sign_in_sec').removeClass('current');$(this).addClass('current animated fadeIn');$("#"+tab_id).addClass('current animated fadeIn');return false;});$('.signup-tab ul li').on("click",function(){var tab_id=$(this).attr('data-tab');$('.signup-tab ul li').removeClass('current');$('.dff-tab').removeClass('current');$(this).addClass('current animated fadeIn');$("#"+tab_id).addClass('current animated fadeIn');return false;});$('.tab-feed ul li').on("click",function(){var tab_id=$(this).attr('data-tab');$('.tab-feed ul li').removeClass('active');$('.product-feed-tab').removeClass('current');$(this).addClass('active animated fadeIn');$("#"+tab_id).addClass('current animated fadeIn');return false;});var gap=$(".container").offset().left;$(".cover-sec > a, .chatbox-list").css({"right":gap});$(".overview-open").on("click",function(){$("#overview-box").addClass("open");$(".wrapper").addClass("overlay");return false;});$(".close-box").on("click",function(){$("#overview-box").removeClass("open");$(".wrapper").removeClass("overlay");return false;});$(".exp-bx-open").on("click",function(){$("#experience-box").addClass("open");$(".wrapper").addClass("overlay");return false;});$(".close-box").on("click",function(){$("#experience-box").removeClass("open");$(".wrapper").removeClass("overlay");return false;});$(".ed-box-open").on("click",function(){$("#education-box").addClass("open");$(".wrapper").addClass("overlay");return false;});$(".close-box").on("click",function(){$("#education-box").removeClass("open");$(".wrapper").removeClass("overlay");return false;});$(".lct-box-open").on("click",function(){$("#location-box").addClass("open");$(".wrapper").addClass("overlay");return false;});$(".close-box").on("click",function(){$("#location-box").removeClass("open");$(".wrapper").removeClass("overlay");return false;});$(".skills-open").on("click",function(){$("#skills-box").addClass("open");$(".wrapper").addClass("overlay");return false;});$(".close-box").on("click",function(){$("#skills-box").removeClass("open");$(".wrapper").removeClass("overlay");return false;});$(".esp-bx-open").on("click",function(){$("#establish-box").addClass("open");$(".wrapper").addClass("overlay");return false;});$(".close-box").on("click",function(){$("#establish-box").removeClass("open");$(".wrapper").removeClass("overlay");return false;});$(".portfolio-btn > a").on("click",function(){$("#create-portfolio").addClass("open");$(".wrapper").addClass("overlay");return false;});$(".close-box").on("click",function(){$("#create-portfolio").removeClass("open");$(".wrapper").removeClass("overlay");return false;});$(".emp-open").on("click",function(){$("#total-employes").addClass("open");$(".wrapper").addClass("overlay");return false;});$(".close-box").on("click",function(){$("#total-employes").removeClass("open");$(".wrapper").removeClass("overlay");return false;});$(".ask-question").on("click",function(){$("#question-box").addClass("open");$(".wrapper").addClass("overlay");return false;});$(".close-box").on("click",function(){$("#question-box").removeClass("open");$(".wrapper").removeClass("overlay");return false;});$(".chat-mg").on("click",function(){;$(this).next(".conversation-box").toggleClass("active");return false;});$(".close-chat").on("click",function(){$(".conversation-box").removeClass("active");return false;});$(".ed-opts-open").on("click",function(){$(this).next(".ed-options").toggleClass("active");return false;});$(".menu-btn > a").on("click",function(){$("nav").toggleClass("active");return false;});$(".not-box-open").on("click",function(){$("#message").hide();$(".user-account-settingss").hide();$(this).next("#notification").toggle();});$(".not-box-openm").on("click",function(){$("#notification").hide();$(".user-account-settingss").hide();$(this).next("#message").toggle();});$(".user-info").click(function(){$(".user-account-settingss").slideToggle("fast");$("#message").not($(this).next("#message")).slideUp();$("#notification").not($(this).next("#notification")).slideUp();});$(".forum-links-btn > a").on("click",function(){$(".forum-links").toggleClass("active");return false;});$("html").on("click",function(){$(".forum-links").removeClass("active");});$(".forum-links-btn > a, .forum-links").on("click",function(){e.stopPropagation();});$('.profiles-slider').slick({slidesToShow:3,slck:true,slidesToScroll:1,prevArrow:'<span class="slick-previous"></span>',nextArrow:'<span class="slick-nexti"></span>',autoplay:true,dots:false,autoplaySpeed:2000,responsive:[{breakpoint:1200,settings:{slidesToShow:2,slidesToScroll:1,infinite:true,dots:false}},{breakpoint:991,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1}}]});});

$(document).ready(function(){

	$(".profile-pic-file").on("change", function(){
		$("#pic-form").submit();
	});

	var all_skills = '';
	jQuery(".skills-edit-box .skl-name").each(function(){
		var single_skill = $(this).text().toString();
		all_skills = all_skills + single_skill + ',';

		$('#all-skills').val(all_skills);
	});

	$("#add-skill").click(function(){
		var skill = $("#skill-tag").val();

		var new_skill = '<li><a href="#" title="" class="skl-name">'+ skill +'</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>';
		
		$("ul.skills-list").append(new_skill);	

		$("#skill-tag").val('');

		var all_skills = '';
		jQuery(".skills-edit-box .skl-name").each(function(){
			var single_skill = $(this).text().toString();
			all_skills = all_skills + single_skill + ',';

			$('#all-skills').val(all_skills);
		});
	});

	jQuery(document).on("click", ".skl-name", function(e){
		e.preventDefault();
	});

	jQuery(document).on("click", ".close-skl", function(e){
		e.preventDefault();

		var li = $(this).parent();
		li.remove();

		var all_skills = '';
		jQuery(".skills-edit-box .skl-name").each(function(){
			var single_skill = $(this).text().toString();
			all_skills = all_skills + single_skill + ',';

			$('#all-skills').val(all_skills);
		});
	});


	//==========================================
	//Code for suggestion in skills (Project Posting)
	//==========================================

	jQuery(document).on("click", ".close-skill", function(e){
		e.preventDefault();

		var li = $(this).parent();
		li.remove();

		// getting estimated amounts
        var total_mins = 0;
        var total_maxs = 0;

        $('#allSelectedSkills li[data-min]').each(function() {
		    var min_value = jQuery(this).attr('data-min');
		    total_mins += parseInt(min_value);

		    var max_value = jQuery(this).attr('data-max');
		    total_maxs += parseInt(max_value);
		});

		$('#min-input').val(total_mins);
		$('#max-input').val(total_maxs);


		//adding skills to hidden input field
		var all_skills = '';
		jQuery("#allSelectedSkills li.selectedSkills, #allSelectedSkills-2 li.selectedSkills").each(function(){
			var single_skill = $(this).text().toString();
			all_skills = all_skills + single_skill + ',';

			$('#all-selected-skills').val(all_skills);
			$('#all-selected-skills-2').val(all_skills);
		});
		
	});

	$("#listSkill li").on("click", function() {

		var skill = $(this).text();
		var min_price = jQuery(this).attr('data-min');
        var max_price = jQuery(this).attr('data-max');

		var new_skill = '<li class="selectedSkills" data-min="'+ min_price +'" data-max="'+ max_price +'">'
		+ skill + '<a href="#" title="" class="close-skill"><i class="la la-close"></i></a></li>';
		
		$("#allSelectedSkills li:last").after(new_skill);

        $("#listSkill li").parent().hide();


        // getting estimated amounts
        var total_mins = 0;
        var total_maxs = 0;

        $('#allSelectedSkills li[data-min]').each(function() {
		    var min_value = jQuery(this).attr('data-min');
		    total_mins += parseInt(min_value);

		    var max_value = jQuery(this).attr('data-max');
		    total_maxs += parseInt(max_value);
		});

		$('#min-input').val(total_mins);
		$('#max-input').val(total_maxs);


		//adding skills to hidden input field
		var all_skills = '';
		jQuery("#allSelectedSkills li.selectedSkills").each(function(){
			var single_skill = $(this).text().toString();
			all_skills = all_skills + single_skill + ',';

			$('#all-selected-skills').val(all_skills);
		});

		$("#searchSkill").val("");
		$("#searchSkill").focus();

    });

	$("#searchSkill").on("keyup", function() {

		// $('#no-skill-found').hide();

	    $("#listSkill li").parent().show();
	    var value = $(this).val().toLowerCase();
	    $("#listSkill li.skill-name a").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

	    });
	});


	// Scripts for Jobs
	
	$("#listSkill-2 li").on("click", function() {

		var skill = $(this).text();

		var new_skill = '<li class="selectedSkills">' + skill + 
		'<a href="#" title="" class="close-skill"><i class="la la-close"></i></a></li>';
		
		$("#allSelectedSkills-2 li:last").after(new_skill);

        $("#listSkill-2 li").parent().hide();


		//adding skills to hidden input field
		var all_skills = '';
		jQuery("#allSelectedSkills-2 li.selectedSkills").each(function(){
			var single_skill = $(this).text().toString();
			all_skills = all_skills + single_skill + ',';

			$('#all-selected-skills-2').val(all_skills);
		});

		$("#searchSkill-2").val("");
		$("#searchSkill-2").focus();

    });

	$("#searchSkill-2").on("keyup", function() {

		// $('#no-skill-found').hide();

	    $("#listSkill-2 li").parent().show();
	    var value = $(this).val().toLowerCase();
	    $("#listSkill-2 li.skill-name a").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

	    });
	});


	// Star Rating System

	var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var review_taker = $('#review_taker').val();

        var review_giver = $('#review_giver').val();

        var user_review = $('#user_review').val();

        if(user_review == '')
        {
            alert("Please Add a Review");
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, review_taker:review_taker, review_giver:review_giver, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    // load_rating_data();

                    alert(data);
                }
            })
        }

    });

    // load_rating_data();

    // function load_rating_data()
    // {
    //     $.ajax({
    //         url:"submit_rating.php",
    //         method:"POST",
    //         data:{action:'load_data'},
    //         dataType:"JSON",
    //         success:function(data)
    //         {
    //             $('#average_rating').text(data.average_rating);
    //             $('#total_review').text(data.total_review);

    //             var count_star = 0;

    //             $('.main_star').each(function(){
    //                 count_star++;
    //                 if(Math.ceil(data.average_rating) >= count_star)
    //                 {
    //                     $(this).addClass('text-warning');
    //                     $(this).addClass('star-light');
    //                 }
    //             });

    //             $('#total_five_star_review').text(data.five_star_review);

    //             $('#total_four_star_review').text(data.four_star_review);

    //             $('#total_three_star_review').text(data.three_star_review);

    //             $('#total_two_star_review').text(data.two_star_review);

    //             $('#total_one_star_review').text(data.one_star_review);

    //             $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

    //             $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

    //             $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

    //             $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

    //             $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

    //             if(data.review_data.length > 0)
    //             {
    //                 var html = '';

    //                 for(var count = 0; count < data.review_data.length; count++)
    //                 {
    //                     html += '<div class="row mb-3">';

    //                     html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

    //                     html += '<div class="col-sm-11">';

    //                     html += '<div class="card">';

    //                     html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

    //                     html += '<div class="card-body">';

    //                     for(var star = 1; star <= 5; star++)
    //                     {
    //                         var class_name = '';

    //                         if(data.review_data[count].rating >= star)
    //                         {
    //                             class_name = 'text-warning';
    //                         }
    //                         else
    //                         {
    //                             class_name = 'star-light';
    //                         }

    //                         html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
    //                     }

    //                     html += '<br />';

    //                     html += data.review_data[count].user_review;

    //                     html += '</div>';

    //                     html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

    //                     html += '</div>';

    //                     html += '</div>';

    //                     html += '</div>';
    //                 }

    //                 $('#review_content').html(html);
    //             }
    //         }
    //     })
    // }


});
