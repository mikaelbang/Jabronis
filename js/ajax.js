
/**
 * Created by mikael on 2015-09-03.
 */

$(document).ready(function(){
    setTimeout(news(),1);
    setTimeout(galleri(),1);
    setTimeout(players(),1);
    setTimeout(allArticles(),1);

    $('body').on('click', '.sideNews', function(){
        //console.log($(this).find(".article_form"));
        var form = $(this).find(".article_form");
        var article_id = $(this).find("#hidden_article_id").val();
        form.submit();
    });

    $('body').on('click', '.player', function(){
        event.preventDefault();
        $(".singlePlayerContent").slideDown();
        $("#page-cover").css("display","block");
        $('.singleName').text($(this).find('.playerNameText').text());
        $('.singlePlayerImg').attr('src', $(this).find('.playerPic').attr('src'));
        $('.popPosition').text($(this).find('.playerPos').val());
        $('.popNumber').text($(this).find('.playerNrText').text());
        $('.popContent').text($(this).find('.playerContent').val());
        $('.popAge').text($(this).find('.playerAge').val());
    });

    $('body').on('click', '#page-cover', function(){
        event.preventDefault();
        $(".singlePlayerContent").hide();
        $("#page-cover").hide();

    });

    $('body').on('click', '.closeButton', function(){
        event.preventDefault();
        $(".singlePlayerContent").hide();
        $("#page-cover").hide();
    });
});

function allArticles(){
    $.ajax({
        url: "/jabronis/test/allArticles" ,
        type: "GET",
        dataType: "json"
    })
        .error(
        function(){
            console.log("Error: ");
        })
        .success(
        function(data){
            for(var key in data){
                if(data.hasOwnProperty(key)){
                    addAllArticles(data[key]);
                }
            }
        }
    );
}

function news(){
    $.ajax({
        url: "/jabronis/test/articles" ,
        type: "GET",
        dataType: "json"
    })
        .error(
        function(){
            console.log("Error: ");
        })
        .success(
        function(data){
            for(var key in data){
                if(data.hasOwnProperty(key)){
                    addArticles(data[key]);
                }
            }
        }
    );
}

function galleri(){
    $.ajax({
        url: "/jabronis/test/galleri" ,
        type: "GET",
        dataType: "json"
    })
        .error(
        function(){
        })
        .success(
        function(data){
            //console.log(data);
            for(var key in data){
                if(data.hasOwnProperty(key)){
                    var x = Number(key);
                    var res = x + 1;
                    $(".news" + res).text(data[key].headline);
                    $(".img" + res).attr("src", data[key].src);
                    $(".pic" + res).attr("src", data[key].src);
                }
            }
        }
    );
}

function players(){
    $.ajax({
        url: "/jabronis/test/getPlayers" ,
        type: "GET",
        dataType: "json"
    })
        .error(
        function(){
            console.log("Error: fuck");
        })
        .success(
        function(data){
            for(var key in data){
                if(data.hasOwnProperty(key)){
                    //console.log(data[key]);
                    sortPlayers(data[key]);
                }
            }
        }
    );
}

function sortPlayers(players){
    if(players.position == "G"){
        //console.log(players);
        $('.goalieAdd').after(addPlayerHTML(players));
    }
    else if(players.position == "D"){
        $('.defenseAdd').after(addPlayerHTML(players));
    }
    else if(players.position == "LW" || players.position == "RW" || players.position == "C"){
        $('.offenseAdd').after(addPlayerHTML(players));
    }
}

function addPlayerHTML(player){
    console.log(player.first_name + ' va');
    var img_src = player.src;
    if(player.src == null){
        img_src = "/jabronis/img/anonym.png";
    }
    var g = '';
    g += '<div class="col-md-3 player text-center">';
    g +=    '<div class="playerImg">';
    g +=        '<img src="' + img_src + '" class="playerPic">';
    g +=    '</div>';
    g +=    '<div class="playerNr">';
    g +=        '<input type="hidden" class="playerAge" value="' + player.age + '">';
    g +=        '<input type="hidden" class="playerPos" value="' + player.position + '">';
    g +=        '<input type="hidden" class="playerContent" value="' + player.info + '">';
    g +=        '<p class="playerNrText goalieNr">' + player.number + '</p>';
    g +=    '</div>';
    g +=    '<div class="playerName">';
    g +=        '<p class="playerNameText goalieName">' + player.first_name + " " + player.last_name + '</p>';
    g +=    '</div>';
    g += '</div>';

    return g;
}

function addArticles(data){

    var d = data.created;
    var da = d.substring(5, 11);
    var date = da.replace("-", "/");

    var t = '';
    t += '<div class="row col-md-12 sideNews">';
    t +=    '<div class="sideNewsContent">';
    t +=        '<form class="article_form" method="post" action="/jabronis/test/article">';
    t +=            '<input type="hidden" id="hidden_article_id" name="hidden_article_id" value="'+ data.article_id +'" />';
    t +=            '<p class="sideNewsText"><span class="newsDate">' + date + '</span>'+ data.headline +'</p>';
    t +=        '</form>';
    t +=    '</div>';
    t += '</div>';

    $(".sideNewsArchive").before(t);
}

function addAllArticles(data){
    console.log(data);
    var t = '';
    t += '<tr>';
    t +=    '<td class="allNews"><span class="newsDate">' + data.created + '</span>' + data.headline + '</td>';
    t += '</tr>';

    $(".articleTable").after(t);
}




