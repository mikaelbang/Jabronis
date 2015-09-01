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

})

