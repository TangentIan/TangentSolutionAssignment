<!DOCTYPE html>
<html>
    <head>
        <title>ID REST</title>

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="fragment" content="!">

        <base href="/">

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/app.css">
    </head>
    <body data-ng-app="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-items" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" data-ui-sref="generate">ID REST</a>
            </div>
            <div class="collapse navbar-collapse" id="menu-items">
                <ul class="nav navbar-nav">
                    <li data-ng-class="{active: $state.includes('generate')}"><a data-ui-sref="generate">Generate</a></li>
                    <li data-ng-class="{active: $state.includes('validate')}"><a data-ui-sref="validate">Validate</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <data-ui-view></data-ui-view>
        </div>
        <script src="js/index.js"></script>
    </body>
</html>
