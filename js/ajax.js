
/**
 * Created by mikael on 2015-09-03.
 */

$(document).ready(function(){
    //Calls all ajax functions efter 1 millisecond.
    setTimeout(articles(),1);
    setTimeout(players(),1);
    setTimeout(images(),1);

});

//Ajax call that gets all articles and places them in different html.
function articles(){
    $.ajax({
        url: "/jabronis/ajax/galleri" ,
        type: "GET",
        dataType: "json"
    })
        .error(
        function(){
        })
        .success(
        function(data){
            //console.log(data);
            //Counter for side-news-bar
            var i = 0;
            for(var key in data){
                if(data.hasOwnProperty(key)){
                    //Checks if 10 articles has been added to the side-news-bar
                    if(i < 10){
                        addArticles(data[key]);
                        i++;
                    }
                    addAllArticles(data[key]);
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
        url: "/jabronis/ajax/getPlayers" ,
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

function images(){
    $.ajax({
        url: "/jabronis/ajax/getImages" ,
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
                    addImage(data[key]);
                }
            }
        }
    );
}


function addImage(data){
    var t = '';
    t += '<option value="' + data.image_id +'">' + data.src + '</option>';
    $(".addArtPic").append(t);
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
    //console.log(player.first_name + ' va');
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
    t += '<a href="/jabronis/view/article/?id='+ data.article_id +'">';
    t += '<div class="row col-md-12 sideNews">';
    t +=    '<div class="sideNewsContent">';
    t +=        '<p class="sideNewsText"><span class="newsDate">' + date + '</span>'+ data.headline +'</p>';
    t +=    '</div>';
    t += '</div>';
    t += '</a>';

    $(".sideNewsArchive").before(t);
}

function addAllArticles(data){
    //console.log(data);
    var t = '';
    t += '<tr class="article_submit">';
    t +=    '<td class="allNews"><a href="/jabronis/view/article/?id='+ data.article_id +'"><span class="newsDate">' + data.created + '</span>' + data.headline +'</a></td>';
    t += '</tr>';

    $(".articleTable").append(t);
}




