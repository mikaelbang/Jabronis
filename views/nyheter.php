<?php include 'header.php'?>

    <div class="row col-md-8 frameContent">
        <div class="newsFrame">
            <img src="/jabronis/img/huddle600x336.png" class="newsPic">
        </div>
        <div class="archiveHeadline">
            <h1 class="archiveHeadlineText"><?php echo($article[0]["headline"])?></h1>
        </div>
        <div class="newsContent">
            <p class="newsContentText"><?php echo($article[0]["content"])?></p>
        </div>
        <div class="articleDate">
            <p><?php echo($article[0]["created"])?></p>
        </div>
    </div>
    <div class="col-md-4 archive">
        <div class="row col-md-12 newsHeadline">
            <p class="newsHeadlineText">Nyheter</p>
        </div>
        <div class="row col-md-12 sideNewsArchive">
            <div class="sideNewsContent">
                <p class="sideNewsText archiveText">Läs fler nyheter från arkivet >></p>
            </div>
        </div>
    </div>


<?php include 'footer.php'?>