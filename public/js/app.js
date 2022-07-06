// Submenu
$(document).ready(function () {
  $(".sub-btn").click(function () {
    $(this).next(".sub-menu").slideToggle();
  });
});
// :: Loading
$(window).on("load", function () {
  $(".loading").fadeOut();
});
// :: Scroll Smooth To Go Section
$(".move-section").on("click", function (e) {
  e.preventDefault();
  var anchorLink = $(this);
  $("html, body")
    .stop()
    .animate(
      {
        scrollTop: $(anchorLink.attr("href")).offset().top + 1,
      },
      1000
    );
});

// Light Box
$(document).on("click", '[data-toggle="lightbox"]', function (event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});

// Text  Limit for description
$(document).ready(function () {
  $(".limit-service").each(function (i) {
    var len = $(this).text().trim().length;
    if (len > 120) {
      $(this).text($(this).text().substr(0, 120) + "...");
    }
  });
});

// Text  Limit for description
$(document).ready(function () {
  $(".limit-description").each(function (i) {
    var len = $(this).text().trim().length;
    if (len > 200) {
      $(this).text($(this).text().substr(0, 150) + "...");
    }
  });
});

// Text  Limit for description
$(document).ready(function () {
  $(".limit-about").each(function (i) {
    var len = $(this).text().trim().length;
    if (len > 500) {
      $(this).text($(this).text().substr(0, 500) + "...");
    }
  });
});
// Text Limit for Title
$(document).ready(function () {
  $(".limit-title").each(function (i) {
    var len = $(this).text().trim().length;
    if (len > 60) {
      $(this).text($(this).text().substr(0, 60) + "...");
    }
  });
});

$(document).ready(function () {
  $(".limit-message").each(function (i) {
    var len = $(this).text().trim().length;
    if (len > 250) {
      $(this).text($(this).text().substr(0, 250) + "...");
    }
  });
});

// Slider
$(".banner").owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  autoplay: true,
  dots: false,
  animateOut: "fadeOut",
  autoplayTimeout: 10000,
  navText: [
    "<i class='fa-solid fa-arrow-right'></i>",
    "<i class='fa-solid fa-arrow-left'></i>",
  ],
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});

// Responsive Menu
let menu = document.querySelector(".menu");
let menuBtn = document.querySelector(".menu-btn");
let closeBtn = document.querySelector(".close-btn");

// menuBtn.innerHTML = " Menu "

menuBtn.addEventListener("click", function () {
  menu.classList.add("active");
});

closeBtn.addEventListener("click", function () {
  menu.classList.remove("active");
});

// function myFunction() {
//   alert("Page is loaded");
// }

// Testimonials
$(document).ready(function () {
  $("#testimonial-slider").owlCarousel({
    items: 2,
    loop: true,
    autoplay: true,
    autoplayTimeout: 7000,
    mouseDrag: true,
    // autoPlay: true,
    responsive: {
      0: {
        items: 1,
      },
      480: {
        items: 1,
      },
      767: {
        items: 1,
      },
      992: {
        items: 2,
      },
      1200: {
        items: 2,
      },
    },
  });
});

$(document).ready(function () {
  $(".news_events").owlCarousel({
    items: 4,
    nav: true,
    loop: true,
    margin: 10,
    mouseDrag: true,
    responsiveClass: true,
    navText: [
      "<i class='icofont-bubble-left'></i>",
      "<i class='icofont-bubble-right'></i>",
    ],
    responsive: {
      0: {
        items: 1,
      },
      480: {
        items: 2,
      },
      767: {
        items: 3,
      },
      992: {
        items: 3,
      },
      1200: {
        items: 3,
      },
    },
  });
});

$(".services").owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  autoplay: true,
  autoplayTimeout: 5000,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 3,
    },
  },
});

$("#play-video").on("click", function (e) {
  e.preventDefault();
  $("#video-overlay").addClass("open");
  $("#video-overlay").append(
    '<iframe width="860" height="415" src="https://www.youtube.com/embed/D2dV2qgKtOk" frameborder="0" allowfullscreen></iframe>'
  );
});

$(".video-overlay, .video-overlay-close").on("click", function (e) {
  e.preventDefault();
  close_video();
});

$(document).keyup(function (e) {
  if (e.keyCode === 27) {
    close_video();
  }
});

function close_video() {
  $(".video-overlay.open").removeClass("open").find("iframe").remove();
}

$("form").on("change", ".file-upload-field", function () {
  $(this)
    .parent(".file-upload-wrapper")
    .attr(
      "data-text",
      $(this)
        .val()
        .replace(/.*(\/|\\)/, "")
    );
});

function customPopup() {
  let $btnShowPopup = $(".js-open-popup");
  let $btnClosePopup = $(".js-close-popup");
  let $popup = $(".js-custom-popup");

  $btnShowPopup.on("click", function () {
    let targetPopup = $(this).attr("data-target");
    $("[data-popup=" + targetPopup + "]").addClass("is-active");
  });

  $btnClosePopup.on("click", function () {
    $(this).parents(".is-active").removeClass("is-active");
  });

  $popup.on("click", function (event) {
    if (
      !$(event.target).closest(".js-custom-popup-holder").length &&
      !$(event.target).is("js-custom-popup")
    ) {
      if ($popup.hasClass("is-active")) {
        $popup.removeClass("is-active");
      }
    }
  });
}
customPopup();
