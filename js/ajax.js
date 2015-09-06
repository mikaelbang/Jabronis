
/**
 * Created by mikael on 2015-09-03.
 */

$(document).ready(function(){
    setTimeout(news(),1);
    setTimeout(galleri(),1);
    setTimeout(players(),1);

    $('body').on('click', '.sideNews', function(){
        //console.log($(this).find(".article_form"));
        var form = $(this).find(".article_form");
        var article_id = $(this).find("#hidden_article_id").val();
        form.submit();
    });

});

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
            for(var key in data){
                if(data.hasOwnProperty(key)){
                    var x = Number(key);
                    var res = x + 1;
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
                    sortPlayers(data[key]);
                }
            }
        }
    );
}

function sortPlayers(players){
    if(players.position == "G"){
        console.log(players.first_name);
        $('.goalieNr').text(players.number);
        $('.goalieName').text(players.first_name + " " + players.last_name);
    }
    else if(players.position == "D"){
        $('.dNr').text(players.number);
        $('.dName').text(players.first_name + " " + players.last_name);
    }
    else if(players.position == "LW" || players.position == "RW" || players.position == "C"){
        $('.offenseNr').text(players.number);
        $('.offenseName').text(players.first_name + " " + players.last_name);
    }

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




