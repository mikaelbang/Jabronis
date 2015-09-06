/**
 * Created by byle on 15-09-01.
 */


$(document).ready(function(){
    $(".player").click(function(){
        event.preventDefault();
        $(".singlePlayerContent").slideDown();
        $("#page-cover").css("display","block")
    });

    $("#page-cover").click(function(){
        event.preventDefault();
        $(".singlePlayerContent").hide();
        $("#page-cover").hide();

    });

    $(".closeButton").click(function(){
        event.preventDefault();
        $(".singlePlayerContent").hide();
        $("#page-cover").hide();

    });

    $(".pic1").hover(function(){
        event.preventDefault();
        $(".img1").show();
        $(".img2").hide();
        $(".img3").hide();
        $(".img4").hide();
        $(".news1").show();
        $(".news2").hide();
        $(".news3").hide();
        $(".news4").hide();
    });

    $(".pic2").hover(function(){
        event.preventDefault();
        $(".img1").hide();
        $(".img2").show();
        $(".img3").hide();
        $(".img4").hide();
        $(".news1").hide();
        $(".news2").show();
        $(".news3").hide();
        $(".news4").hide();
    });

    $(".pic3").hover(function(){
        event.preventDefault();
        $(".img1").hide();
        $(".img2").hide();
        $(".img3").show();
        $(".img4").hide();
        $(".news1").hide();
        $(".news2").hide();
        $(".news3").show();
        $(".news4").hide();
    });

    $(".pic4").hover(function(){
        event.preventDefault();
        $(".img1").hide();
        $(".img2").hide();
        $(".img3").hide();
        $(".img4").show();
        $(".news1").hide();
        $(".news2").hide();
        $(".news3").hide();
        $(".news4").show();
    });

})

$(document).ready(function(){
    $('li img').on('click',function(){
        var src = $(this).attr('src');
        var img = '<img src="' + src + '" class="img-responsive bigGalleriPic"/>';

        //Start of new code
        var index = $(this).parent('li').index();
        var html = '';
        html += '<p class="galleriHeadline">Här kan man beskriva bilden</p>'
        html += img;
        html += '<div style="height:25px;clear:both;display:block;">';
        html += '<a class="controls next" href="'+ (index+2) + '"><p class="glyphicon glyphicon-chevron-right"></p></a>';
        html += '<a class="controls previous" href="' + (index) + '"><p class="glyphicon glyphicon-chevron-left"></p></a>';
        html += '</div>';
        //End of new code

        $('#myModal').modal();
        $('#myModal').on('shown.bs.modal', function(){
            $('#myModal .modal-body').html(html);
        })
        $('#myModal').on('hidden.bs.modal', function(){
            $('#myModal .modal-body').html('');
        });
    });
})

$(document).on('click', 'a.controls', function(){
    //this is where we add our logic
    var index = $(this).attr('href');
    var src = $('ul.row li:nth-child('+ index +') img').attr('src');
    $('.modal-body img').attr('src', src);

    var newPrevIndex = parseInt(index) - 1;
    var newNextIndex = parseInt(newPrevIndex) + 2;

    if($(this).hasClass('previous')){
        $(this).attr('href', newPrevIndex);
        $('a.next').attr('href', newNextIndex);
    }else{
        $(this).attr('href', newNextIndex);
        $('a.previous').attr('href', newPrevIndex);
    }

    var total = $('ul.row li').length + 1;
//hide next button
    if(total === newNextIndex){
        $('a.next').hide();
    }else{
        $('a.next').show()
    }
//hide previous button
    if(newPrevIndex === 0){
        $('a.previous').hide();
    }else{
        $('a.previous').show()
    }
    $('#myModal').on('shown.bs.modal', function(){
        $('#myModal .modal-body').html(html);
        //this will hide or show the right links:
        $('a.controls').trigger('click');
    })

    return false;

});


