"user strict";

// Preloader
$(window).on("load", function () {
  $(".preloader").fadeOut(2000);
});

$(".mb-2").find("div").addClass("pt-2");

// Responsive Menu
var headerTrigger = $(".header-trigger");
headerTrigger.on("click", function () {
  $(".menu, .header-trigger").toggleClass("active");
  $(".overlay").toggleClass("active");
});

var headerTrigger2 = $(".top-bar-trigger");
headerTrigger2.on("click", function () {
  $(".header-top").toggleClass("active");
  $(".overlay").toggleClass("overlay-color");
  $(".overlay").removeClass("active");
});

// Overlay Event
var over = $(".overlay");
over.on("click", function () {
  $(".overlay").removeClass("overlay-color");
  $(".overlay").removeClass("active");
  $(".menu, .header-trigger").removeClass("active");
  $(".header-top").removeClass("active");
  $(".dashboard__sidebar").removeClass("active");
});

// Nice Select
$(".nice-select").niceSelect();

// Scroll To Top
var scrollTop = $(".scrollToTop");
$(window).on("scroll", function () {
  if ($(this).scrollTop() < 500) {
    scrollTop.removeClass("active");
  } else {
    scrollTop.addClass("active");
  }
});

//Click event to scroll to top
$(".scrollToTop").on("click", function () {
  $("html, body").animate(
    {
      scrollTop: 0,
    },
    300
  );
  return false;
});

$(".header-top-trigger").on("click", function () {
  var e = $(".header-top");
  if (e.hasClass("active")) {
    $(".header-top").removeClass("active");
    $(".overlay").removeClass("active");
  } else {
    $(".header-top").addClass("active");
    $(".overlay").addClass("active");
  }
});

$(".freelancer__slider").slick({
  fade: false,
  slidesToShow: 3,
  slidesToScroll: 1,
  infinite: true,
  autoplay: true,
  pauseOnHover: true,
  centerMode: false,
  dots: true,
  arrows: true,
  nextArrow: '<i class="las la-arrow-right arrow-right"></i>',
  prevArrow: '<i class="las la-arrow-left arrow-left"></i> ',
  responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
  ],
});

$(".testimonial-slider").slick({
  fade: false,
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: true,
  autoplay: true,
  pauseOnHover: true,
  centerMode: false,
  dots: true,
  arrows: false,
  nextArrow: '<i class="las la-arrow-right arrow-right"></i>',
  prevArrow: '<i class="las la-arrow-left arrow-left"></i> ',
});

// Odometer Counter
$(".counter__item, .dashboard__card__item").each(function () {
  setTimeout(function () {
    for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
      var el = document.querySelectorAll(".odometer")[i];
      el.innerHTML = el.getAttribute("data-odometer-final");
    }
  }, 100);
});

//Faq
$(".faq__item-title").on("click", function (e) {
  var element = $(this).parent(".faq__item");
  if (element.hasClass("open")) {
    element.removeClass("open");
    element.find(".faq__item-content").removeClass("open");
    element.find(".faq__item-content").slideUp(300, "swing");
  } else {
    element.addClass("open");
    element.children(".faq__item-content").slideDown(300, "swing");
    element
      .siblings(".faq__item")
      .children(".faq__item-content")
      .slideUp(300, "swing");
    element.siblings(".faq__item").removeClass("open");
    element.siblings(".faq__item").find(".faq-title").removeClass("open");
    element
      .siblings(".faq__item")
      .find(".faq__item-content")
      .slideUp(300, "swing");
  }
});

// Slider bar Menu
$(".dashboard__sidebar__menu li a").on("click", function () {
  var element = $(this).parent("li");
  if (element.hasClass("open")) {
    element.removeClass("open");
    element.find("li").removeClass("open");
    element.find("ul").slideUp(300, "swing");
  } else {
    element.addClass("open");
    element.children("ul").slideDown(300, "swing");
    element.siblings("li").children("ul").slideUp(300, "swing");
    element.siblings("li").removeClass("open");
    element.siblings("li").find("li").removeClass("open");
    element.siblings("li").find("ul").slideUp(300, "swing");
  }
});

$(".sidebar__submenu li a.active").closest("ul").addClass("d-block");

$("ul>li>.sidebar__submenu").parent("li").addClass("has__submenu");

$(".dashboard__sidebar__toggler").on("click", function () {
  $(".dashboard__sidebar").addClass("active");
  $(".overlay").addClass("active");
});

$(".dashboard__sidebar__close").on("click", function () {
  $(".dashboard__sidebar").removeClass("active");
  $(".overlay").removeClass("active");
});

// update grid
function previewFile(input) {
  var file = $("input[type=file]").get(0).files[0];
  if (file) {
    var reader = new FileReader();
    reader.onload = function () {
      $("#previewImg").attr("src", reader.result);
    };
    reader.readAsDataURL(file);
  }
}

var inputElements = $("[type=text],[type=password],select,textarea");

$.each(inputElements, function (index, element) {
  element = $(element);
  if (
    !element.hasClass("profilePicUpload") &&
    !element.attr("id") &&
    $(element).attr("type") != "hidden"
  ) {
    element
      .closest(".form-group")
      .find("label")
      .attr("for", element.attr("name"));
    element.attr("id", element.attr("name"));
  }
});

$.each($("input, select, textarea"), function (i, element) {
  if (element.hasAttribute("required")) {
    $(element)
      .closest(".form-group")
      .find("label")
      .first()
      .addClass("required");
  }
});

bkLib.onDomLoaded(function () {
  $(".nicEdit").each(function (index) {
    $(this).attr("id", "nicEditor" + index);
    new nicEditor({
      fullPanel: true,
    }).panelInstance("nicEditor" + index, {
      hasPanel: true,
    });
  });
});

Array.from(document.querySelectorAll("table")).forEach((table) => {
  let heading = table.querySelectorAll("thead tr th");
  Array.from(table.querySelectorAll("tbody tr")).forEach((row) => {
    Array.from(row.querySelectorAll("td")).forEach((colum, i) => {
      colum.setAttribute("data-label", heading[i].innerText);
    });
  });
});

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});