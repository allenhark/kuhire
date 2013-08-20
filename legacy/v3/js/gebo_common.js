    //* popovers
    gebo_popOver = {
        init: function() {
            $(".pop_over").popover();
        }
    };
    
    //* breadcrumbs
    gebo_crumbs = {
        init: function() {
            if($('#jCrumbs').length) {
				$('#jCrumbs').jBreadCrumb({
					endElementsToLeaveOpen: 0,
					beginingElementsToLeaveOpen: 0,
					timeExpansionAnimation: 500,
					timeCompressionAnimation: 500,
					timeInitialCollapse: 500,
					previewWidth: 30
				});
			}
        }
    };
	
	//* external links
	gebo_external_links = {
		init: function() {
			$("a[href^='http']").not('.thumbnail>a,.ext_disabled').each(function() {
				$(this).attr('target','_blank').addClass('external_link');
			})
		}
	};
	
	//* accordion icons
	gebo_acc_icons = {
		init: function() {
			var accordions = $('.main_content .accordion');
			
			accordions.find('.accordion-group').each(function(){
				var acc_active = $(this).find('.accordion-body').filter('.in');
				acc_active.prev('.accordion-heading').find('.accordion-toggle').addClass('acc-in');
			});
			accordions.on('show', function(option) {
				$(this).find('.accordion-toggle').removeClass('acc-in');
				$(option.target).prev('.accordion-heading').find('.accordion-toggle').addClass('acc-in');
			});
			accordions.on('hide', function(option) {
				$(option.target).prev('.accordion-heading').find('.accordion-toggle').removeClass('acc-in');
			});	
		}
	};
	
	//* main menu mouseover
	gebo_nav_mouseover = {
		init: function() {
			$('header li.dropdown').mouseenter(function() {
				if($('body').hasClass('menu_hover')) {
					$(this).addClass('navHover')
				}
			}).mouseleave(function() {
				if($('body').hasClass('menu_hover')) {
					$(this).removeClass('navHover open')
				}
			});
		}
	};
    
	//* single image colorbox
	gebo_colorbox_single = {
		init: function() {
			if($('.cbox_single').length) {
				$('.cbox_single').colorbox({
					maxWidth	: '80%',
					maxHeight	: '80%',
					opacity		: '0.2', 
					fixed		: true
				});
			}
		}
	};
/* [ ---- Gebo Admin Panel - extended form elements ---- ] */

	$(document).ready(function() {
		
		//* datepicker
		gebo_datepicker.init();
		//* timepicker
		gebo_timepicker.init();
		//* words, characters limit for textarea
		gebo_limiter.init();
		//* autosize for textareas
		gebo_auto_expand.init();
        //* tag handler for inputs
		gebo_tag_handler.init();
		
	});
	
	//* masked input
	gebo_mask_input = {
		init: function() {
			$("#mask_date").inputmask("99/99/9999",{placeholder:"dd/mm/yyyy"});
			$("#mask_phone").inputmask("(999) 999-9999");
			$("#mask_ssn").inputmask("999-99-9999");
			$("#mask_product").inputmask("AA-999-A999");
		}
	};
	
	//* bootstrap datepicker
	gebo_datepicker = {
		init: function() {
			$('#dp1').datepicker();
			$('#dp2').datepicker();
			
			$('#dp_start').datepicker({format: "mm/dd/yyyy"}).on('changeDate', function(ev){
				var dateText = $(this).data('date');
				
				var endDateTextBox = $('#dp_end input');
				if (endDateTextBox.val() != '') {
					var testStartDate = new Date(dateText);
					var testEndDate = new Date(endDateTextBox.val());
					if (testStartDate > testEndDate) {
						endDateTextBox.val(dateText);
					}
				}
				else {
					endDateTextBox.val(dateText);
				};
				$('#dp_end').datepicker('setStartDate', dateText);
				$('#dp_start').datepicker('hide');
			});
			$('#dp_end').datepicker({format: "mm/dd/yyyy"}).on('changeDate', function(ev){
				var dateText = $(this).data('date');
				var startDateTextBox = $('#dp_start input');
				if (startDateTextBox.val() != '') {
					var testStartDate = new Date(startDateTextBox.val());
					var testEndDate = new Date(dateText);
					if (testStartDate > testEndDate) {
						startDateTextBox.val(dateText);
					}
				}
				else {
					startDateTextBox.val(dateText);
				};
				$('#dp_start').datepicker('setEndDate', dateText);
				$('#dp_end').datepicker('hide');
			});
			$('#dp_modal').datepicker();
		}
	};
	
	//* bootstrap timepicker
	gebo_timepicker = {
		init: function() {
			$('#tp_1').timepicker({
				defaultTime: 'current',
				minuteStep: 10,
				disableFocus: true,
				template: 'modal',
				showMeridian: false
			});
			$('#tp_2').timepicker({
				defaultTime: 'current',
				minuteStep: 1,
				disableFocus: true,
				template: 'dropdown'
			});
			$('#tp_modal').timepicker({
				defaultTime: 'current',
				minuteStep: 1,
				disableFocus: true,
				template: 'dropdown'
			});
		}
	};
	
	//* textarea limiter
	gebo_limiter = {
		init: function(){
			$("#txtarea_limit_chars").counter({
				goal: 120
			});
			$("#txtarea_limit_words").counter({
				goal: 20,
				type: 'word'
			});
		}
	};
	
	//* textarea autosize
	gebo_auto_expand = {
		init: function() {
			$('#auto_expand').autosize();
		}
	};
    
    //* tag handler
	gebo_tag_handler = {
		init: function() {
			$("#array_tag_handler").tagHandler({
				assignedTags: [ 'C', 'Perl', 'PHP' ],
				availableTags: [ 'C', 'C++', 'C#', 'Java', 'Perl', 'PHP', 'Python' ],
				autocomplete: true
			});
			$("#max_tags_tag_handler").tagHandler({
				assignedTags: [ 'Hire' ],
				availableTags: [ 'Cheap', 'Qiuck Response', 'Negotiable', 'Fixed Price', 'Instant Delivery', 'Hire' ],
				autocomplete: true,
				maxTags:10
			});
		}
	}; 