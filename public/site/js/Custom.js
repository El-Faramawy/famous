$(document).ready(function () {
  //navbar animation
  // $(window).scroll(function () {
  //   var appScroll = $(document).scrollTop();

  //   if ((appScroll > 60) && (appScroll < 99999999999)) {
  //     $(".navbar").addClass("animatedNav");

  //   };
  //   if ((appScroll > 0) && (appScroll < 60)) {
  //     $(".navbar").removeClass("animatedNav");
  //   };
  // });

  // vertical Slider
  var swiper = new Swiper(".verticalSlider", {
    direction: "vertical",
    slidesPerView: 1,
    // effect:'fade',
    // spaceBetween: 30,
    // mousewheel: true,
    // keyboard: {
    //   enabled: true,
    // },
    // reverseDirection: true,
    loop: true,
    speed: 1000,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    allowTouchMove: false,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  // main Slider
  var swiper = new Swiper(".mainSlider", {
    slidesPerView: 1,
    loop: true,
    speed: 1000,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    allowTouchMove: false,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  // change on custom width
  // var MainWindowWidth = $(window).width();
  // if ( MainWindowWidth < 960) {
  //   var swiper = new Swiper(".mainSlider", {
  //     effect: "fade",
  //   })
  // };




  // famousVIP Slider
  var swiper = new Swiper('.famousVIPSlider .swiper-container', {
    navigation: {
      nextEl: ' .famousVIPSlider .swiper-button-next',
      prevEl: ' .famousVIPSlider .swiper-button-prev',
    },
    speed: 1500,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    slidesPerView: 'auto',
    breakpoints: {
      0: {
        slidesPerView: 2,
      },
      576: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      991: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 5,
      },
    },
    observer: true,
    observeParents: true,
  });

  // search result
  $(".search form .form-control").click(function () {
    $('.search form .searchList').slideDown('slow')
  });

  // BG animation
  document.getElementById("particles-js") && particlesJS("particles-js", {
    particles: {
      number: {
        value: 40,
        density: {
          enable: !0,
          value_area: 600
        }
      },
      color: {
        value: ["#fbe5e5", "#e9fbf7", "#dbf9f2"]
      },
      shape: {
        type: "circle",
        stroke: {
          width: 0,
          color: "#fff"
        },
        polygon: {
          nb_sides: 5
        },
        image: {
          src: "img/github.svg",
          width: 50,
          height: 50
        }
      },
      opacity: {
        value: 1,
        random: !0,
        anim: {
          enable: !0,
          speed: .2,
          opacity_min: 0,
          sync: !1
        }
      },
      size: {
        value: 50,
        random: !0,
        anim: {
          enable: !0,
          speed: 2,
          size_min: 5,
          sync: !1
        }
      },
      line_linked: {
        enable: !1,
        distance: 150,
        color: "#ffffff",
        opacity: .4,
        width: 1
      },
      move: {
        enable: !0,
        speed: 2,
        direction: "top",
        random: !0,
        straight: !1,
        out_mode: "out",
        bounce: !1,
        attract: {
          enable: !1,
          rotateX: 600,
          rotateY: 600
        }
      }
    },
    interactivity: {
      detect_on: "canvas",
      events: {
        onhover: {
          enable: !1,
          mode: "bubble"
        },
        onclick: {
          enable: !1,
          mode: "repulse"
        },
        resize: !0
      },
      modes: {
        grab: {
          distance: 400,
          line_linked: {
            opacity: 1
          }
        },
        bubble: {
          distance: 250,
          size: 0,
          duration: 2,
          opacity: 0,
          speed: 3
        },
        repulse: {
          distance: 400,
          duration: .4
        },
        push: {
          particles_nb: 4
        },
        remove: {
          particles_nb: 2
        }
      }
    },
    retina_detect: !0
  });

  // odometer
  $('.odometer').appear(function (e) {
    var odo = $(".odometer");
    odo.each(function () {
      var countNumber = $(this).attr("data-count");
      $(this).html(countNumber);
    });
  });



  /////// steps
  $(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
      allWells = $('.setup-content'),
      allNextBtn = $('.nextBtn'),
      allPrevBtn = $('.prevBtn');
    allWells.hide();
    navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
        $item = $(this);
      if (!$item.hasClass('disabled')) {
        navListItems.removeClass('btn-indigo').addClass('btn-default');
        $item.addClass('btn-indigo');
        allWells.hide();
        $target.show();
        $target.find('input:eq(0)').focus();
      }
    });
    allPrevBtn.click(function () {
      var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        prevStepSteps = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent()
        .prev().children("a");
      prevStepSteps.removeAttr('disabled').trigger('click');
    });
    allNextBtn.click(function () {
      var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent()
        .next().children("a"),
        curInputs = curStep.find("input[type='text'],input[type='url']"),
        isValid = true;
      $(".form-group").removeClass("has-error");
      for (var i = 0; i < curInputs.length; i++) {
        if (!curInputs[i].validity.valid) {
          isValid = false;
          $(curInputs[i]).closest(".form-group").addClass("has-error");
        }
      }
      if (isValid)
        nextStepWizard.removeAttr('disabled').trigger('click');
    });
    $('div.setup-panel div a.btn-indigo').trigger('click');
  });




    // category filter 
    $(".filterControl").on('click', function () {
      $(".filter").removeClass("hideFilter").addClass("showFilter");
    });
    $(".closeFilter").on('click', function () {
      $(".filter").removeClass("showFilter").addClass("hideFilter");
    });
  

});
////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////
//////////////////  main  //////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////
$(document).ready(function () {
  // load
  $('.spinner').fadeOut("slow");

  // Tooltips Initialization
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
  // select2
  $('.select2').select2({
    minimumResultsForSearch: -1
  });
  $('.select2-search').select2({});
  // img gallery
  $('[data-fancybox]').fancybox({
    buttons: [
      "zoom",
      // "share",
      "slideShow",
      "fullScreen",
      // "download",
      "thumbs",
      "close"
    ],
    transitionEffect: "slide",
  });

  //dropify
  $('.dropify').dropify();


  var wow = new WOW({
    boxClass: 'wow', // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset: 0, // distance to the element when triggering the animation (default is 0)
    mobile: true, // trigger animations on mobile devices (default is true)
    live: true, // act on asynchronously loaded content (default is true)
    callback: function (box) {
      // the callback is fired every time an animation is started
      // the argument that is passed in is the DOM node being animated
    },
    scrollContainer: null, // optional scroll container selector, otherwise use window,
    resetAnimation: true, // reset animation on end (default is true)
  });

  wow.init();

});