<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Jabronis HC</title>
    <meta name="description" content="Da shit">
    <meta name="author" content="Jabronis">
    <link href="/jabronis/css/bootstrap.css" rel="stylesheet">
    <link href='/jabronis/css/maincss.css' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/jabronis/js/jquery.min.js" type="text/javascript"></script>
    <script src="/jabronis/js/bootstrap.js"></script>
    <script src="/jabronis/js/jabronis.js"></script>
    <script src="/jabronis/js/ajax.js"></script>
</head>
<body>
<div class="container-fluid text-center wrapper">
    <div class="row col-lg-10 col-lg-offset-1 logoDiv">
        <div class="col-md-3">
            <a href="/jabronis" class="noStyle"><img class="headLogo" src="/jabronis/img/vektorTRY2.png"></a>
        </div>
        <div class="col-md-9">
            <a class="noStyle" href="/jabronis/test/index"><p class="headLogoText">JABRONIS HOCKEY CLUB</p></a>
        </div>
    </div>
    <div class="row col-lg-10 col-lg-offset-1">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#" id="addArticle">Add Article</a></li>
                        <li><a href="#" id="addImg">Add Image</a></li>
                        <li><a href="#" id="addPlayer">Add Player</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    <div class="row col-lg-10 col-lg-offset-1">
        <div class="row col-sm-12 allContent">
            <div class="addImageContent col-md-8 col-md-offset-2">
                <input class="addInput" placeholder="Img src: /jabronis/img/example.png" required=""/>
                <button class="uploadImg">Upload</button>
            </div>
            <div class="addArticleContent col-md-8 col-md-offset-2">
                <input class="addInput" type="text" placeholder="Headline" required="" />
                <textarea class="addInput addContent" required="" placeholder="Content"></textarea>
                <select class="addArtPic">
                    <option>jerka.png</option>
                    <option>johanback600x336.png</option>
                    <option>awayjab.png</option>
                    <option>mickebig.png</option>
                </select>
                <button class="postArticle">Post</button>
            </div>
            <div class="addPlayerContent col-md-8 col-md-offset-2">
                <input class="addPlayerInput" type="text" required="" placeholder="First Name"/>
                <input class="addPlayerInput" type="text" required="" placeholder="Last Name"/>
                <input class="addPlayerInput" type="text" required="" placeholder="Age"/>
                <input class="addPlayerInput" type="text" required="" placeholder="Number"/>
                <textarea class="addInput addInfo" required="" placeholder="Player Info"></textarea>
                <select class="addArtPic">
                    <option>Position</option>
                    <option>G</option>
                    <option>D</option>
                    <option>C</option>
                    <option>RW</option>
                    <option>LW</option>
                </select>
                <button>Add Player</button>

            </div>
<?php include 'footer.php'?>