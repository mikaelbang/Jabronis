<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Jabronis HC</title>
    <meta name="description" content="Da shit">
    <meta name="author" content="Jabronis">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href='/css/maincss.css' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/js/jquery.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/jabronis.js"></script>
    <script src="/js/ajax.js"></script>
</head>
<body>
    <div class="container-fluid text-center wrapper">
        <div class="row col-md-6 col-md-offset-3 loginImg">
            <img src="/img/vektorTRY2.png" class="loginPic">
            <div class="errorMsg">
                <p><?php echo $error; ?></p>
            </div>
        </div>
        <div class="row col-md-6 col-md-offset-3 loginContent">
            <p class="loginText">Logga in som admin</p>
            <form method="post" action="/admin/index">
                <input class="loginName" type="text" name="username" placeholder="Användarnamn" required=""/>
                <input class="loginName" type="password" name="password" placeholder="Lösenord" required=""/>
                <button class="loginButton" type="submit" name="login_button">Logga in</button>
            </form>
        </div>
    </div>
</body>