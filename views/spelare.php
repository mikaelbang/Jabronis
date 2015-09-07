<?php include 'header.php'?>

<div class="row col-md-9 col-md-offset-2 singlePlayerContent">
    <div class="col-md-8 col-md-offset-3 singlePlayer">
        <div class="row">
            <button class="closeButton"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </button>
            <div class="col-md-5 singlePlayerPic">
                <img src="/jabronis/img/henkebig.png" class="singlePlayerImg">
            </div>

            <div class="col-md-6 singlePlayerName">
                <p class="singleName"></p>
                <div class="singlePlayerInfo">
                    <div class="infoTable top">
                        <p class="leftInfo">Position:</p><span class="rightInfo popPosition"></span>
                    </div>
                    <div class="infoTable">
                        <p class="leftInfo">Ålder:</p><span class="rightInfo popAge"></span>
                    </div>
                    <div class="infoTable">
                        <p class="leftInfo">Nummer:</p><span class="rightInfo popNumber"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 infoContent">
                <p class="popContent"></p>
            </div>
        </div>
    </div>
</div>
<div class="row goalie">
    <p class="goalieHeadline goalieAdd">Målvakter</p>
</div>
<div class="row defense">
    <p class="goalieHeadline defenseAdd">Backar</p>
</div>
<div class="row forward">
    <p class="goalieHeadline backar offenseAdd">Anfallare</p>
</div>


<?php include 'footer.php'?>

