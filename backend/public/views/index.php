<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Artpleasure</title>

        <!-- css -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link href="../css/style.css" rel="stylesheet" >
    </head>

    <body ng-app="mainApp">
        <header>
            <navbar></navbar>
        </header>

        <div class="container-fluid no-padding">
            <div ng-view></div>
        </div>
        
        <footer>
            <bodyfooter></bodyfooter>
        </footer>
    </body>
    
    <!-- scripts js -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.angularjs.org/1.5.7/angular.min.js"></script>
    <script type="text/javascript" src="https://code.angularjs.org/1.5.7/angular-route.min.js"></script>
    <script type="text/javascript" src="https://code.angularjs.org/1.5.8/angular-animate.min.js"></script>

    <script src="../js/app.module.js"></script>
    <script src="../js/app.config.js"></script>
    <script src="../js/home/home.module.js"></script>
    <script src="../js/home/home.component.js"></script>
    <script src="../js/navbar/navbar.module.js"></script>
    <script src="../js/navbar/navbar.component.js"></script>
    <script src="../js/bodyFooter/bodyFooter.module.js"></script>
    <script src="../js/bodyFooter/bodyFooter.component.js"></script>
    <script src="../js/aboutus/aboutus.module.js"></script>
    <script src="../js/aboutus/aboutus.component.js"></script>
    <script src="../js/prodperso/prodperso.module.js"></script>
    <script src="../js/prodperso/prodperso.component.js"></script>
    <script src="../js/navbar-vert/navbar-vert.module.js"></script>
    <script src="../js/navbar-vert/navbar-vert.component.js"></script>
    <script src="../js/miniature/miniature.module.js"></script>
    <script src="../js/miniature/miniature.component.js"></script>
    <script src="../js/restaurations/restaurations.module.js"></script>
    <script src="../js/restaurations/restaurations.component.js"></script>
    <script src="../js/beauxarts/beauxarts.module.js"></script>
    <script src="../js/beauxarts/beauxarts.component.js"></script>
    <script src="../js/window-popup/window-popup.module.js"></script>
    <script src="../js/window-popup/window-popup.component.js"></script>
    <script src="../js/evenements/evenements.module.js"></script>
    <script src="../js/evenements/evenements.component.js"></script>
    <script src="../js/contact/contact.module.js"></script>
    <script src="../js/contact/contact.component.js"></script>
</html>