/**
 * Created by byle on 15-09-01.
 */


$(document).ready(function(){
    $(".player").click(function(){
        event.preventDefault();
        $("#singlePlayerContent").slideDown();
        $("#page-cover").css("display","block")
    });

    $("#page-cover").click(function(){
        event.preventDefault();
        $("#singlePlayerContent").hide();
        $("#page-cover").hide();

    });

    $(".closeButton").click(function(){
        event.preventDefault();
        $("#singlePlayerContent").hide();
        $("#page-cover").hide();

    });

    $(".pic1").hover(function(){
        event.preventDefault();
        $(".img1").show();
        $(".img2").hide();
        $(".img3").hide();
        $(".img4").hide();
    });

    $(".pic2").hover(function(){
        event.preventDefault();
        $(".img1").hide();
        $(".img2").show();
        $(".img3").hide();
        $(".img4").hide();
    });

    $(".pic3").hover(function(){
        event.preventDefault();
        $(".img1").hide();
        $(".img2").hide();
        $(".img3").show();
        $(".img4").hide();
    });

    $(".pic4").hover(function(){
        event.preventDefault();
        $(".img1").hide();
        $(".img2").hide();
        $(".img3").hide();
        $(".img4").show();
    });
});

