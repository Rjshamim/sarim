<?php
header("Content-Type:text/css");
$color = "#f0f"; // Change your Color Here
function checkhexcolor($color)
{
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if (isset($_GET['color']) and $_GET['color'] != '') {
    $color = "#" . $_GET['color'];
}

if (!$color or !checkhexcolor($color)) {
    $color = "#336699";
}

?>


.btn--base,.cmn--btn,.social-links li a:hover{
background-color: <?php echo $color ?> !important;
border-color: <?php echo $color ?> !important;
}
.price,.job__item-content .title a:hover,.menu li a:hover,.menu li a.active, .social-links li a,.header__top__wrapper .contacts li a:hover,.text--base,.subtitle,.counter__item-icon,.about__content .about__info li::before,.service__item-icon,.footer__widget .widget-title,.faq__tab__menu .tab__link:hover *, .faq__tab__menu .tab__link.active *,.contact__info__wrapper .title,.user__profile-content .designation,.dashboard__sidebar__menu li a:hover, .dashboard__sidebar__menu li a.active,.dashboard__sidebar__menu li a:hover,.overview__content__wrapper .btn,.title a:hover,.read-more:hover,.footer-links li a:hover,.latest-posts .post-info .posts-date i,.announcement__meta li i,.sidebar__widget .info__item .content .title,.pagination .page-item a,
.pagination .page-item span,.username,.dashboard__sidebar__toggler,.job__price,.text--primary,.tag,.icon ,.breadcums li a:hover,.preloader .search-icon,.dashboard__sidebar__menu li::before, .menu .btn,.finished__job__item .job__header-title a:hover, .post-info a:hover{
color: <?php echo $color ?> !important;
}
.scrollToTop,.counter__item::before, .counter__item::after,.overview__content__wrapper.right-bg .btn,.read-more:hover::before,.bg--base {
background-color: <?php echo $color ?> !important;
}
.overview__content__wrapper::before,.section__header-title::before,.slick-arrow:hover, .slick-arrow.arrow-right,.slick-arrow:hover, .slick-arrow.arrow-right,.slick-arrow,.slick-dots li.slick-active button,.footer__widget .widget-title::before,.post-widget .pro-title::before,.post-widget .pro-title::after,.faq__tab__menu .tab__link::before,.faq__item.open .faq__item-title::before,.custom--card .card-header,.sidebar__widget-title::before, .sidebar__widget-title::after,.table thead tr, .user__profile::after,.pagination .page-item.active span, .pagination .page-item.active a, .pagination .page-item:hover span, .pagination .page-item:hover a,.custom--checkbox input[type=checkbox]::after,.menu.active{
background: <?php echo $color ?> !important;
}
.social-links li a,.form--control:focus,.nice-select:focus,.pagination .page-item a, .pagination .page-item span{
border:1px solid <?php echo $color ?> !important;
}
.popular__tags .tags-list li a:hover{
color: <?php echo $color ?> !important;
border-color: <?php echo $color ?> !important;
}
.btn--primary{
border-color: <?php echo $color ?> !important;
background-color: <?php echo $color ?> !important;
}
.user__profile::before{
background-color: <?php echo $color ?>15 !important;
}
.slick-dots li button{
background: <?php echo $color ?>33 !important;
}
.job__search .form--group{
box-shadow:0 0 10px 5px <?php echo $color ?>26 !important;
}

@media (max-width: 575px){
.job__search .form--group {
box-shadow: none !important;
}
}
.cmn--btn,.user__profile-thumb {
box-shadow:0 0 10px 5px <?php echo $color ?>1a !important;
}
.form--control:focus{
box-shadow: 1px 1px 15px 3px <?php echo $color ?>14 !important;
}
.ticket__wrapper{
box-shadow: 0 0 10px <?php echo $color ?>66 !important;
}
.reply-item{
border: 1px solid <?php echo $color ?>33 !important;
}
.counter__item:hover{
background: <?php echo $color ?>05 !important;
}
.part{
border-color: <?php echo $color ?> !important;
}


.custom--accordion .accordion-button:not(.collapsed) {
background-color: <?php echo $color ?> !important;

}