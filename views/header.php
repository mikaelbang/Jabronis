<?php
/**
 * Created by PhpStorm.
 * User: byle
 * Date: 15-08-31
 * Time: 15:08
 */
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Jabronis HC</title>
    <meta name="description" content="Da shit">
    <meta name="author" content="Jabronis">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href='/css/maincss.css' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="/img/logoshadows%20kopia.ico"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/jabronis.js"></script>
    <script src="/js/ajax.js"></script>

</head>
<body>
    <div id="page-cover">
    </div>
    <div class="container-fluid text-center wrapper">
        <div class="row col-lg-10 col-lg-offset-1 logoDiv">
            <div class="col-md-3">
                <a href="/" class="noStyle"><img class="headLogo" src="/img/vektorTRY2.png"></a>
            </div>
            <div class="col-md-9">
                <a class="noStyle" href="/"><p class="headLogoText">JABRONIS HOCKEY CLUB</p></a>
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
                        <a class="navbar-brand" href="/">JABRONIS</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="/view/players">Spelare <span class="sr-only">(current)</span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Scheman <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/view/games">Matcher</a></li>
                                    <li><a href="/view/schedule">Spelschema</a></li>
                                    <li><a href="/view/practice">Träning</a></li>
                                </ul>
                            </li>
                            <li><a href="/view/contact">Kontakta oss</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right play">
                            <li><a href="/view/play">PLAY</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <div class="row col-lg-10 col-lg-offset-1">
            <div class="row col-sm-12 allContent">
