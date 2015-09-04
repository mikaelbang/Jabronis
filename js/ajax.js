
/**
 * Created by mikael on 2015-09-03.
 */

$(document).ready(function(){
    setTimeout(news(),1);
    setTimeout(galleri(),1);
    setTimeout(players(),1);

    $('body').on('click', '.sideNews', function(){
        console.log($(this).find("#hidden_article_id").val());
        var article_id = $(this).find("#hidden_article_id").val();
        goToArticle(article_id);
    });

});

function goToArticle(article_id){

    $.ajax({
        url: "/jabronis/test/article" ,
        type: "POST",
        data: {hidden_article_id: article_id},
        dataType: "json"
    })
        .error(
        function(){
            console.log("Error: fisk");
        })
        .success(
        function(data){
            console.log(data);
            /*for(var key in data){
                if(data.hasOwnProperty(key)){
                    //console.log(key + " -> " + data[key].headline);
                    //addArticles(data[key]);
                }
            }*/
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
            //for(var i = 0; i < data.length; i++){
                //console.log(data[i]);
                //show_search_result(data[i]);
            //}
            for(var key in data){
                if(data.hasOwnProperty(key)){
                    //console.log(key + " -> " + data[key].headline);
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
            //console.log("Error: fuck");
        })
        .success(
        function(data){
            for(var key in data){
                if(data.hasOwnProperty(key)){
                    var x = Number(key);
                    var res = x + 1;
                    //console.log(key + " -> " + data[key].src + " " + res);
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
            //console.log(data);
            for(var key in data){
                if(data.hasOwnProperty(key)){
                    //console.log(key + " -> " + data[key].first_name);
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
    t +=        '<input type="hidden" id="hidden_article_id" name="hidden_article_id" value="'+ data.article_id +'" />';
    t +=        '<p class="sideNewsText"><span class="newsDate">' + date + '</span>'+ data.headline +'</p>';
    t +=    '</div>';
    t += '</div>';

    $(".sideNewsArchive").before(t);
}




