$(function(){"use strict";$(function(){$(".preloader").fadeOut()});var i=function(){(window.innerWidth>0?window.innerWidth:this.screen.width)<1170?($("body").addClass("mini-sidebar"),$(".navbar-brand span").hide(),$(".scroll-sidebar, .slimScrollDiv").css("overflow-x","visible").parent().css("overflow","visible"),$(".sidebartoggler i").addClass("ti-menu")):($("body").removeClass("mini-sidebar"),$(".navbar-brand span").show());var i=(window.innerHeight>0?window.innerHeight:this.screen.height)-1;(i-=70)<1&&(i=1),i>70&&$(".page-wrapper").css("min-height",i+"px")};$(window).ready(i),$(window).on("resize",i),$(".fix-header .topbar").stick_in_parent({}),$(".nav-toggler").click(function(){$("body").toggleClass("show-sidebar"),$(".nav-toggler i").toggleClass("ti-menu"),$(".nav-toggler i").addClass("ti-close")}),$(".sidebartoggler").on("click",function(){}),$(".search-box a, .search-box .app-search .srh-btn").on("click",function(){$(".app-search").toggle(200)}),$(function(){for(var i=window.location,e=$("ul#sidebarnav a").filter(function(){return this.href==i}).addClass("active").parent().addClass("active");e.is("li");)e=e.parent().addClass("in").parent().addClass("active")}),$(function(){$('[data-toggle="tooltip"]').tooltip()}),$(function(){$("#sidebarnav").metisMenu()}),$(".scroll-sidebar").slimScroll({position:"left",size:"5px",height:"100%",color:"#dcdcdc"}),$("body").trigger("resize")});