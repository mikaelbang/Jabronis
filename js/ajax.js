
/**
 * Created by mikael on 2015-09-03.
 */

$(document).ready(function(){
    setTimeout(news(),1);
});

function news(){

    $.ajax({
        url: "/jabronis/test/test" ,
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

function addArticles(data){

    var t = '';
    t += '<div class="row col-md-12 sideNews">';
    t +=    '<div class="sideNewsContent">';
    t +=        '<p class="sideNewsText"><span class="newsDate">' + data.created + '</span>'+ data.headline +'</p>';
    t +=    '</div>';
    t += '</div>';

    $(".sideNewsArchive").before(t);
}


