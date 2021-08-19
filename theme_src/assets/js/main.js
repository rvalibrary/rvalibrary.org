//----------------------------------------------------------------
// >>> TABLE OF CONTENTS:
//----------------------------------------------------------------

//JS BEFORE LOAD
//_______________________________________________________
//01. Modal
//02. Listeners

//JS ONLOAD
//_______________________________________________________
// 01. Mobile Menu
// 02. Header Dropdown Menu
// 03. Select List (Dropdown)
// 04. Facts Counter
// 05. Category Filter (MixItUp Plugin)
// 06. Vertical Tabs
// 07. Blog Tags (Tooltip)
// 08. Owl Carousel
// 09. Sidebar Accordion
// 10. Responsive Tabs
// 11. Responsive Table
// 12. Form Fields (Value Disappear on Focus)
// 13. Bootstrap Carousel Swipe (Testimonials Carousel)
// 14. Bx Carousel
// 15. Contact Form Submit/Validation
// 16. Tooltip Initialize
// 17. Masonry

//----------------------------------------------------------------

//JS before load - global availability
//--------------------------------------------------------

function expandingBtnListWithNode(node){
  console.log('here');
    const buttons = node.querySelectorAll('.btn-expand');
    Array.from(buttons).forEach(button => {
      button.addEventListener('click', function(e) {
        Array.from(button.parentNode.children).forEach(child => {
          if(child.classList.contains('text-box')){
            child.remove();
          }
          if(child.classList.contains('expanded') && child != button){
            child.classList.remove('expanded');
          }
        })
        if(!button.classList.contains('expanded') && button.getAttribute('alt').length){
          button.classList.add('expanded');
          let div = document.createElement('div');
          const btnText = button.children[1].innerText;
          let innerHeader = document.createElement('h3');
          innerHeader.innerText = btnText;
          div.appendChild(innerHeader);
          let p = document.createElement('p');
          p.innerHTML += button.getAttribute('alt');
          div.classList.add('text-box');
          div.appendChild(p);
          button.parentNode.insertBefore(div, button.nextSibling);
        } else {
          button.classList.remove('expanded');
        }
      })
    })
}

  //Modal
  //--------------------------------------------------------

  function loadModal(data = {}) {
    const modal = document.querySelector('#Modal');
    const modalContentCont = modal.querySelector('.modal-content-container');

    modal.style.display = "block";
    modal.onclick = function(e) {
      if(e.target.className !== 'modal-content'){
        modal.style.display = "none";
        modalContentCont.removeChild(document.querySelector('.video-wrapper'));
      }
    }
      if(typeof data === "object"){
        if(data.type === 'html'){
          modalContentCont.appendChild(data.entry);
        } else {
          modalContentCont.appendChild(data.entry);
        }
      } else {
        throw new Error('Provided data arg not object. Pass data as object with key \'type\' either set as \'html\' or \'text\', and include data in key \'entry\'');
      }
    }

  //Listeners
  //--------------------------------------------------------

//window listener for gradient expanding effect on gellman page
function expandingGradientOnScroll(ele) {
  window.addEventListener('scroll', (e) => {
    if(ele.parentElement.getBoundingClientRect().top <= window.innerHeight && ele.parentElement.getBoundingClientRect()){
      ele.style.height = `${window.scrollY * 1.6}px`;
    }
  })
}

//click listeners for expanding button list used for Law Library page
function expandingBtnList(){
    const buttons = document.querySelectorAll('.btn-expand');
    Array.from(buttons).forEach(button => {
      button.addEventListener('click', function(e) {
        Array.from(button.parentNode.children).forEach(child => {
          if(child.classList.contains('text-box')){
            child.remove();
          }
          if(child.classList.contains('expanded') && child != button){
            child.classList.remove('expanded');
          }
        })
        if(!button.classList.contains('expanded') && button.getAttribute('alt').length){
          button.classList.add('expanded');
          let div = document.createElement('div');
          const btnText = button.children[1].innerText;
          let innerHeader = document.createElement('h3');
          innerHeader.innerText = btnText;
          div.appendChild(innerHeader);
          let p = document.createElement('p');
          p.innerHTML += button.getAttribute('alt');
          div.classList.add('text-box');
          div.appendChild(p);
          button.parentNode.insertBefore(div, button.nextSibling);
        } else {
          button.classList.remove('expanded');
          if(button!= null && button.nextElementSibling.classList.contains('text-box')){
            button.nextElementSibling.remove();
          }
        }
      })
    })
}

function parallax(){
  parallaxImg = document.querySelector('.parallax-img');
  if(window.innerWidth > 850)
    window.addEventListener('scroll', () =>{
      parallaxImg.style.transform = `translate3d(0px, ${window.pageYOffset * 0.1}px, 0px)`;
    })
}

//JS onload

jQuery(document).ready(function( $ ) {
    'use strict';

  //Disable Download option from Chrome's audio player context menu
    //--------------------------------------------------------

    function disableAudioContextMenu() {
      if(document.querySelector('audio')){
        Array.
        from(document.querySelectorAll('audio')).
        forEach( audioPlayer => audioPlayer.setAttribute('controlsList', 'nodownload'));
      }
    }

    disableAudioContextMenu();

	//START CUSTOM STUFF
    //--------------------------------------------------------

    function homePageModal() {
      setTimeout(() => {
        const modal = document.querySelector('#homeModal');
        modal.style.display = 'block';
        modal.onclick = function(e) {
          if(e.target.className === 'close'){
            modal.style.display = "none";
          }
        }
      }, 1000);
    }
    if(document.querySelector('#homeModal')){
      homePageModal();
    }

    //SEARCH



    $(".catalog_selection_click").click(function() {
      $(this).closest("form").attr("action", "https://rcpl.ent.sirsi.net/client/en_US/default/search/results?");
      $(this).closest("form").attr('target', '_blank');
      $('#searchbar').val('');
      $('#searchbar').attr('name', 'qu');
      $('input#searchbar').attr('placeholder', 'Search the Catalog');

      $('#searchbar').css('display', 'inline-block');
      $('#searchbar').focus();
      $('.search_choice_overlay').css('display', 'none');
      $('#searchbutton').prop("disabled",false);
    });

    $(".site_selection_click").click(function() {
      $(this).closest("form").attr("action", "/");
      $(this).closest("form").attr("onsubmit", "");
      $(this).closest("form").attr('target', '_self');
      $('#searchbar').val('');
      $('#searchbar').attr('name', 's');
      $('input#searchbar').attr('placeholder', 'Search the Site');

      $('#searchbar').css('display', 'inline-block');
      $('#searchbar').focus();
      $('.search_choice_overlay').css('display', 'none');
      $('#searchbutton').prop("disabled",false);
    });


    $('#searchbar').focusout(function(){
      if($(this).val().length === 0){
        $('#searchbar').css('display', 'none');
        $('.search_choice_overlay').css('display', 'inline-block');
        $('#searchbutton').prop("disabled",true);
      }
    });

    // $(".tg-list-item").click(function() {
    //   if($("#cb5").is(':checked')){
    //     $(this).closest("form").attr("action", "/");
    //     $(this).closest("form").attr("onsubmit", "");
    //     $(this).closest("form").attr('target', '_self');
    //     $('#searchbar').val('');
    //     $('#searchbar').attr('name', 's');
    //     $('input#searchbar').attr('placeholder', 'Search the Site');
    //   }else{
    //     $(this).closest("form").attr("action", "http://ibistro.ci.richmond.va.us/uhtbin/cgisirsi/x/0/0/123?");
    //     $(this).closest("form").attr("onsubmit", "_gaq.push(['_trackEvent','Catalog','Search',this.href]);");
    //     $(this).closest("form").attr('target', '_blank');
    //     $('#searchbar').val('');
    //     $('#searchbar').attr('name', 'searchdata1');
    //     $('input#searchbar').attr('placeholder', 'Search the Catalog');
    //   }//checked
    //
    // });

    //ALERTS

    // if(Cookies.get('alerts_exited') == 'true'){
    //   $('#alerts_bar').css('display', 'none');
    //   $('#alerts_bar_button').css('display', 'none');
    // }

    $('#alerts_bar_button').click(function() {

      $('#alerts_bar').css('visibility', 'visible');
      $('#alerts_bar_button').css('display', 'none');
    });


    $('#alert_exit').click(function(){
      $('#alerts_bar').css('display', 'none');
      $('#alerts_bar_button').css('display', 'none');
      // Cookies.set('alerts_exited', 'true');
    })


  //SMOOTH SCROLL ON ANCHOR LINK CLICK
    // Select all links with hashes
    $('a.scrolling_link[href*="#"]')
      // Remove links that don't actually link to anything
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function(event) {
        // On-page links
        if (
          location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
          &&
          location.hostname == this.hostname
        ) {
          // Figure out element to scroll to
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          // Does a scroll target exist?
          if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 1000, function() {
              // Callback after animation
              // Must change focus!
              var $target = $(target);
              $target.focus();
              if ($target.is(":focus")) { // Checking if the target was focused
                return false;
              } else {
                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                $target.focus(); // Set focus again
              };
            });
          }
        }
      });


    //Sticky Useful Links Nav on SCROLLUP

    window.addEventListener("scroll", usefulLinkNav);

      let windowPos = window.pageYOffset;
      function usefulLinkNav(){
        let dropDownNav = document.querySelector('.tip-top-nav2');
        if(document.documentElement.scrollTop > 150 || document.body.scrollTop > 150){
          if(window.pageYOffset > windowPos){
            dropDownNav.style.top = "-40px";
          } else{
            dropDownNav.style.top = "0px";
          }
          windowPos = window.pageYOffset;
        }else {
            dropDownNav.style.top = "-40px";
        }
        }




    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        var windowScroll = 300;
        if (document.body.scrollTop > windowScroll || document.documentElement.scrollTop > windowScroll) {
            // document.getElementById("scroll-to-top-button").style.display = "table";
            $("#scroll-to-top-button").fadeIn(500);

        } else {
            // document.getElementById("scroll-to-top-button").style.display = "none";
            $("#scroll-to-top-button").fadeOut(500);
        }
    }

    // When the user clicks on the button, scroll to the top of the document


    $( "#scroll-to-top-button" ).click(function() {
      $('html,body').animate({ scrollTop: 0 }, 'slow');
      return false;
    });




  //Meeting Rooms sticky headers
  try {
    var eventspacesoffset = $('#event-spaces').offset().top;
    var studyroomsoffset = $('#study-rooms').offset().top;
    var eventsticky = $('#event-spaces');
    var studysticky = $('#study-rooms');
  }
  catch(error) {
  }

  const onlineLibNotificationBar = function(){
    let notificationBar = document.querySelector('.notification-banner');
    setTimeout(function(){
      notificationBar.style.zIndex = "99999";
      notificationBar.style.width = "100%";
      notificationBar.style.opacity = "1";
    }, 1000);
  }

if( document.querySelector('.notification-banner') ){
    onlineLibNotificationBar();
}





  $(window).scroll(function(){
      var scroll = $(window).scrollTop();

      if (scroll >= eventspacesoffset && scroll < studyroomsoffset){
        $('body').css('padding-top', eventsticky.height() + 'px');
        eventsticky.addClass('fixed');
        studysticky.removeClass('fixed');
      }else if (scroll >= studyroomsoffset){
        $('body').css('padding-top', eventsticky.height() + 'px');
        try {
          studysticky.addClass('fixed');
          eventsticky.removeClass('fixed');
        }
        catch(error){}
      }else{
        $('body').css('padding-top', '0px');
        try {
          eventsticky.removeClass('fixed');
          studysticky.removeClass('fixed');
        }
        catch(error){}
      }
  });
	//END CUSTOM STUFF
    //--------------------------------------------------------





    //Mobile Menu
    //--------------------------------------------------------
    var bodyObj = $('body');
    var MenuObj = $("#menu");
    var mobileMenuObj = $('#mobile-menu');

    bodyObj.wrapInner('<div id="wrap"></div>');

    var toggleMenu = {
        elem: MenuObj,
        mobile: function () {
            //activate mmenu
            mobileMenuObj.mmenu({
                slidingSubmenus: false,
                position: 'right',
                zposition: 'front'
            }, {
                pageSelector: '#wrap'
            });

            //hide desktop top menu
            this.elem.hide();
        },
        desktop: function () {
            //close the menu
            mobileMenuObj.trigger("close.mm");

            //reshow desktop menu
            this.elem.show();
        }
    };

    Harvey.attach('screen and (max-width:991px)', {
        setup: function () {
            //called when the query becomes valid for the first time
        },
        on: function () {
            //called each time the query is activated
            toggleMenu.mobile();
        },
        off: function () {
            //called each time the query is deactivated
        }
    });

    Harvey.attach('screen and (min-width:992px)', {
        setup: function () {
            //called when the query becomes valid for the first time
        },
        on: function () {
            //called each time the query is activated
            toggleMenu.desktop();
        },
        off: function () {
            //called each time the query is deactivated
        }
    });

    //Header Dropdown Menu
    //--------------------------------------------------------
    var megaMenuHasChildren = $('.dropdown');
    var megaMenuDropdownMenu = $('.dropdown-menu');

    megaMenuHasChildren.on({
        mouseenter: function () {
            if (navigator.userAgent.match(/iPad/i) !== null) {
                $(this).find(megaMenuDropdownMenu).stop(true, true).slideDown('400');
            } else {
                $(this).find(megaMenuDropdownMenu).stop(true, true).delay(400).slideDown();
            }
        }, mouseleave: function () {
            if (navigator.userAgent.match(/iPad/i) !== null) {
                $(this).find(megaMenuDropdownMenu).stop(true, true).slideUp('400');
            } else {
                $(this).find(megaMenuDropdownMenu).stop(true, true).delay(400).slideUp();
            }
        }
    });

    //Select List (Dropdown)
    //--------------------------------------------------------
    var selectObj = $('select');
    var selectListObj = $('ul.select-list');
    selectObj.each(function () {
        var $this = $(this), numberOfOptions = $(this).children('option').length;

        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'select-list'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');

        $styledSelect.on('click', function (e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function () {
                $(this).removeClass('active').next(selectListObj).hide();
            });
            $(this).toggleClass('active').next(selectListObj).toggle();
        });

        $listItems.on('click', function (e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
        });

        $(document).on('click', function () {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });

    //Facts Counter
    //--------------------------------------------------------
    var counterObj = $('.fact-counter');
    counterObj.counterUp({
        delay: 10,
        time: 500
    });

    //Category Filter (MixItUp Plugin)
    //--------------------------------------------------------
    // var folioFilterObj = $('#category-filter');
    // folioFilterObj.mixItUp();

    //Vertical Tabs
    //--------------------------------------------------------
    var tabObject = $(".tabs-menu li");
    var tabContent = $(".tabs-list .tab-content");
    tabObject.on('click', function (e) {
        e.preventDefault();
        $(this).siblings('li.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        tabContent.removeClass("active");
        tabContent.eq(index).addClass("active");
    });

    //Blog Tags (Tooltip)
    //--------------------------------------------------------
    var tagObj = $('[data-toggle="blog-tags"]');
    tagObj.tooltip();

    //Owl Carousel Play/Pause Toggle
    //--------------------------------------------------------
    function toggleIcons(play, pause) {
        play.classList.toggle('invisible');
        pause.classList.toggle('invisible');
    }

    //Owl Carousel
    //--------------------------------------------------------

    if(document.querySelector('.featured_event_container') ){

      let featuredEventSection = document.querySelector('.featured_event_container');
      const playBtn = document.querySelector('.dashicons-controls-play');
      const pauseBtn = document.querySelector('.dashicons-controls-pause');
      let autoPlayBoolean = undefined;

      if(featuredEventSection.getAttribute('data-sticky') == 'true'){
        autoPlayBoolean = false;
      } else {
        autoPlayBoolean = true;
        toggleIcons(playBtn, pauseBtn);
      }

        var owlObj = $('.owl-carousel');

        owlObj.owlCarousel({
          items : 1,
          loop : true,
          // animateIn: true,

          autoplay : autoPlayBoolean,
          autoplayTimeout : 10000,
          autoplaySpeed : 10000,
          autoHeight : true,
          slideTransition : 'linear',
          animateIn : 'fadeIn',
          animateOut: 'fadeOut',
          mouseDrag : false,
          dots : true,
          nav : true,
          navContainerClass: 'rpl-nav',
          navClass: ['rpl-prev', 'rpl-next'],
          responsiveRefreshRate : 50,
        });

        $('.dashicons-controls-play').on('click',function(){
          owlObj.trigger('play.owl.autoplay',[5000]);
          toggleIcons(playBtn, pauseBtn);
        })
        $('.dashicons-controls-pause').on('click',function(){
            owlObj.trigger('stop.owl.autoplay');
            toggleIcons(playBtn, pauseBtn);
        })

        var myowlchange={};

        (function(context) {
            // var $contentMask = featuredEventSection;
            var contentBoxId = '.owl-carousel';
            var currentHeight = getCurrentHeight(contentBoxId);

            context.change = function() {
              // var $contentMask = featuredEventSection;
              var contentBoxId = '.owl-carousel';
              var currentHeight = getCurrentHeight(contentBoxId);
              featuredEventSection.style.height = currentHeight;
            };
            context.changed = function() {
              currentHeight = getCurrentHeight(contentBoxId);
              featuredEventSection.style.height = currentHeight + 100;        }
        })(myowlchange);

        owlObj.on('change.owl.carousel', function(event) {
          myowlchange.change();
        })
        // Listen to owl events:
        owlObj.on('changed.owl.carousel', function(event) {
          myowlchange.changed();
        })



        function getCurrentHeight(selector) {
         return $(selector).height();
        }
    }

    //Sidebar Accordion
    //--------------------------------------------------------
    var secondaryObj = $('#secondary [data-accordion]');
    var multipleObj = $('#multiple [data-accordion]');
    var singleObj = $('#single[data-accordion]');

    secondaryObj.accordion({
        singleOpen: true
    });

    multipleObj.accordion({
        singleOpen: false
    });

    singleObj.accordion({
        transitionEasing: 'cubic-bezier(0.455, 0.030, 0.515, 0.955)',
        transitionSpeed: 200
    });

    //Responsive Tabs
    //--------------------------------------------------------
    var restabObj = $('#responsiveTabs');
    restabObj.responsiveTabs({
        startCollapsed: 'accordion'
    });

    //Responsive Tables
    //--------------------------------------------------------
    // var tableObj = $('.table');
    // var shoptableObj = $('.shop_table');
    // tableObj.basictable({
    //     breakpoint: 991
    // });
    //
    // shoptableObj.basictable({
    //     breakpoint: 991
    // });

    //Form Fields (Value Disappear on Focus)
    //--------------------------------------------------------
    var requiredFieldObj = $('.input-required');

    requiredFieldObj.find('input').on('focus',function(){
        if(!$(this).parent(requiredFieldObj).find('label').hasClass('hide')){
            $(this).parent(requiredFieldObj).find('label').addClass('hide');
        }
    });
    requiredFieldObj.find('input').on('blur',function(){
        if($(this).val() === '' && $(this).parent(requiredFieldObj).find('label').hasClass('hide')){
            $(this).parent(requiredFieldObj).find('label').removeClass('hide');
        }
    });

    //Bootstrap Carousel Swipe (Testimonials Carousel)
    //--------------------------------------------------------
    var testimonialsObj = $("#testimonials");
    testimonialsObj.swiperight(function () {
        $(this).carousel('prev');
    });
    testimonialsObj.swipeleft(function () {
        $(this).carousel('next');
    });

    //Bx Carousel
    //--------------------------------------------------------

    //Popular Items Detail V1

    var popularSlidesD1 = 2;
    var popularWidthD1 = 370;
    var popularMarginD1 = 54;

    if($(window).width() <= 1199) {
        popularSlidesD1 = 2;
        popularWidthD1 = 330;
        popularMarginD1 = 37;
    }
    if($(window).width() <= 991) {
        popularSlidesD1 = 2;
        popularWidthD1 = 350;
        popularMarginD1 = 20;
    }
    if($(window).width() <= 767) {
        popularSlidesD1 = 1;
        popularWidthD1 = 320;
        popularMarginD1 = 0;
    }

    var popularItemObjD1 = $('.popular-items-detail-v1');
    popularItemObjD1.bxSlider({
        minSlides: 1,
        maxSlides: popularSlidesD1,
        slideWidth: popularWidthD1,
        slideMargin: popularMarginD1,
        responsive: true,
        touchEnabled: true,
        controls: false,
        infiniteLoop: true,
        shrinkItems: true
    });

    //Popular Items Detail V2

    var popularSlidesD2 = 3;
    var popularWidthD2 = 360;
    var popularMarginD2 = 30;

    if($(window).width() <= 1199) {
        popularSlidesD2 = 3;
        popularWidthD2 = 300;
        popularMarginD2 = 20;
    }
    if($(window).width() <= 991) {
        popularSlidesD2 = 2;
        popularWidthD2 = 350;
        popularMarginD2 = 20;
    }
    if($(window).width() <= 767) {
        popularSlidesD2 = 1;
        popularWidthD2 = 320;
        popularMarginD2 = 0;
    }

    var popularItemObjD2 = $('.popular-items-detail-v2');
    popularItemObjD2.bxSlider({
        minSlides: 1,
        maxSlides: popularSlidesD2,
        slideWidth: popularWidthD2,
        slideMargin: popularMarginD2,
        responsive: true,
        touchEnabled: true,
        controls: false,
        infiniteLoop: true,
        shrinkItems: true
    });

    //Contact Form Submit/Validation
    //--------------------------------------------------------
    var emailerrorvalidation = 0;
    var formObj = $('#contact');
    var contactFormObj = $('#submit-contact-form');
    var firstNameFieldObj = $("#first-name");
    var lastNameFieldObj = $("#last-name");
    var emailFieldObj = $("#email");
    var phoneFieldObj = $("#phone");
    var messageFieldObj = $("#message");
    var successObj = $('#success');
    var errorObj = $('#error');

    contactFormObj.on('click', function () {
        var emailaddress = emailFieldObj.val();
        function validateEmail(emailaddress) {
            var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
            if (filter.test(emailaddress)) {
                return true;
            } else {
                return false;
            }
        }

        var data = {
            firstname: firstNameFieldObj.val(),
            lastname: lastNameFieldObj.val(),
            email: emailFieldObj.val(),
            phone: phoneFieldObj.val(),
            message: messageFieldObj.val()
        };
        if (data.firstname === '' || data.lastname === '' || data.email === '' || data.phone === '' || data.message === '') {
            alert("All fields are mandatory");
        } else {
            if (validateEmail(emailaddress)) {
                if (emailerrorvalidation === 1) {
                    alert('Nice! your Email is valid, you can proceed now.');
                }
                emailerrorvalidation = 0;
                $.ajax({
                    type: "POST",
                    url: "contact.php",
                    data: data,
                    cache: false,
                    success: function () {
                        successObj.fadeIn(1000);
                        formObj[0].reset();
                    },
                    error: function () {
                        errorObj.fadeIn(1000);
                    }
                });
            } else {
                emailerrorvalidation = 1;
                alert('Oops! Invalid Email Address');
            }
        }
        return false;
    });

    //Latest Blog Listener
    //--------------------------------------------------------

    function latestBlogPostsListener(ele){
      ele.addEventListener("click", (e) => {
        let attr = e.target.getAttribute("data-id");
        let contentBoxes = document.querySelectorAll('.content');
        Array.from(contentBoxes).forEach((box) => {
          if(box.getAttribute('data-id') != attr){
            box.style.display = "none";
            setTimeout(()=>{
              box.classList.remove('selected');
              box.classList.add('hide');
            }, 100)
          } else {
            box.style.display = "flex";
            setTimeout(()=>{
              box.classList.remove('hide');
              box.classList.add('selected');
            }, 100)
          }
        })
      })
    }

    if(document.querySelector('.tab-container')){
      latestBlogPostsListener(document.querySelector('.tab-container'));
    }

    function latestBlogPostsListener2(ele){
      ele.addEventListener("click", (e) => {
        let attr = e.target.getAttribute("data-id");
        e.target.style.flex = '10';
        e.target.style.fontSize = '19px';
        Array.from(document.getElementsByClassName(e.target.className)).forEach((date) => {
          if(date != e.target){
            date.style.flex = '1';
            date.style.fontSize = '14px';
          }
        })
        let contentBoxes = document.querySelectorAll('.blog-content-container');
        Array.from(contentBoxes).forEach((box) => {
          if(box.getAttribute('data-id') != attr){
            box.style.display = "none";
            setTimeout(()=>{
              box.classList.remove('show');
              box.classList.add('hide');
            }, 100)
          } else {
            box.style.display = "flex";
            setTimeout(()=>{
              box.classList.remove('hide');
              box.classList.add('show');
            }, 100)
          }
        })
      })
    }

    if(document.querySelector('.post-dates')){
      latestBlogPostsListener2(document.querySelector('.post-dates'));
    }

    //Initialize Tooltips across site
    //--------------------------------------------------------

    let tooltipTags = $('[data-toggle="tooltip"]');
    tooltipTags.tooltip({trigger: 'hover click'});

});


jQuery( window ).load(function() {
    //Masonry
    //--------------------------------------------------------
    var girdFieldObj = jQuery('.grid');
    girdFieldObj.masonry({
        itemSelector: '.grid-item',
        percentPosition: true,
        // gutter: '.gutter-sizer'
    });
});
