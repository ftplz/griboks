'use strict';

// import Tick from '../../../node_modules/@pqina/flip/dist/flip.module.js';
// import Tick from '@pqina/flip'; 



// import Swiper from "swiper";


document.addEventListener("DOMContentLoaded", () => {




	var logosliderworktime = new Swiper('.main-slider', {
		slidesPerView: 1,
		spaceBetween: 0,
		// loop:true,	
		pagination: {
		  el: '.m-pagination',
		  clickable: true,
		//   type: 'fraction',
		},
		navigation: {
			nextEl: '.m-next',
			prevEl: '.m-prev',
		},
		autoplay: {
			delay: 10000,
		},
		on: {
			init: function () {
				
				// $('.counts .current').text();
				var index = this.activeIndex+1;
				var totalSlides = this.slides.length;

				$('.counts .current').text(index);
				$('.counts .total').text(totalSlides);
			},
			slideChange:  function () {
				var index = this.activeIndex+1; 			
				$('.counts .current').text(index);
			},
		}


	});

	var projectslider = new Swiper('.project-slider', {
		slidesPerView: 1,
		spaceBetween: 0,
		// loop:true,	
		pagination: {
		  el: '.p-pagination',
		  clickable: true,
		//   type: 'fraction',
		},
		navigation: {
			nextEl: '.p-next',
			prevEl: '.p-prev',
		},

		on: {
			init: function () {
				
			},
			slideChange:  function () {
	
			},
		}


	});



	$('.menu-item-has-children .open-sub').click(function(e){
		$(this).parent().find('>.sub-menu').slideToggle();

		$(this).toggleClass('opened');

	});


	$(".phone-mask").inputmask("+7(999)999-99-99",{ showMaskOnFocus: true });




	// burger animation
	var toggles = document.querySelectorAll(".cmn-toggle-switch");
	for (var i = toggles.length - 1; i >= 0; i--) {
	  var toggle = toggles[i];
	  toggleHandler(toggle);
	};    
	function toggleHandler(toggle) {
		toggle.addEventListener( "click", function(e) {
		e.preventDefault();     
		if(this.classList.contains("active") === true) {
		  this.classList.remove("active")  		      
		} 
		else{
		 this.classList.add("active");   
		 
		} 
	  });
	}

	// menu open
	$('.cmn-toggle-switch').click(function(){
		let menu=$('.cmn-toggle-switch__htx');
		  if (menu.hasClass('active')) {
			$('.menu-wrap').animate({"right":"0px"});			
			$('.overlay').fadeIn();
		  } else {
			$('.menu-wrap').animate({"right":"-100%"});
			$('.overlay').fadeOut();
		  }
		 
		});

		$('.s-item__header').click(function(e){
			e.preventDefault();
			$(this).closest('.s-item').find('.s-item__body').slideToggle();
			$(this).toggleClass('opened');
		});


	// menu close
	// document.querySelector('.menu-wrap__inner .close').onclick = function(e) {
	// 	e.preventDefault();
	// 	let menuwrap=document.querySelector(".menu-wrap");
	// 	menuwrap.classList.remove("open-menu");   	
	// 	document.querySelector(".cmn-toggle-switch").classList.remove('active');	
    // }
	

	// ask events

	// var askitems = document.querySelectorAll('.ask-item__header');    
	// [].forEach.call( askitems, function(el) {		
	// 	el.onclick = function(e) {
	// 		this.classList.toggle('header_opened');
	// 		this.nextElementSibling.classList.toggle('body_opened');			
	// 	}
	// });

	if(document.body.contains(document.querySelector('.open-modal'))) {
		document.querySelector('.open-modal').onclick = function(e) {		
			e.preventDefault();
			document.querySelector('.modal-overlay_1').classList.toggle('modal-opened');
			document.querySelector('.modal-overlay_1').classList.toggle('fade-in');		
		};
	}

	if($('.sidebar .sub-menu .current-menu-item').length>0){
		$('.current-menu-parent').find('.open-sub').addClass('opened');
	}

	if(document.body.contains(document.querySelector('.sidebar .sub-menu .current-menu-item'))) {
		
	}


	



	document.addEventListener( 'wpcf7mailsent', function( event ) {
		if (
			('125' == event.detail.contactFormId)||
			('124' == event.detail.contactFormId)
		) {
		 $.fancybox.close();
		 $.fancybox.open({
		  src: '#modal-success',
		  type: 'inline',
		  'showCloseButton':false
		});
	
		setTimeout(function(){
		  $.fancybox.close();
		}, 3000);
		}
	
	}, false );
	

	// document.querySelector('.modal__close').onclick = function(e) {		
	// 	e.preventDefault();
	// 	document.querySelector('.modal-overlay_1').classList.remove('modal-opened');		
    // };
	
	const anchors = document.querySelectorAll('a.go-home')

	for (let anchor of anchors) {
		anchor.addEventListener('click', function (e) {
		e.preventDefault()		
		const blockID = anchor.getAttribute('href')		
		document.querySelector(blockID).scrollIntoView({
		behavior: 'smooth',
		block: 'start'
		})
		})
	}








	document.querySelector('.input-file input').addEventListener('change', function() {
		var splittedFakePath = this.value.split('\\');
		document.querySelector('.input-file label').textContent =
		  splittedFakePath[splittedFakePath.length - 1];
	  });





		

	
})