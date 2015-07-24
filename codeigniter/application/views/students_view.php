<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=0;">
    <meta name="description" content="">
    <meta name="author" content="Guillermo B.">

    <title>Guillermo's Student Management App</title>

    <!--
    NOTE: Loading from global CDN speeds up loading and increases the probabilities that the client already has the file cached in the browser.
          We also force https to maintain security
    -->
    <script type="text/javascript" data-main="./resources/js/main.min" src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.1.17/require.min.js"></script>

    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasmine/2.3.4/jasmine.min.css">
    <link type="text/css" rel="stylesheet" href="./resources/css/style.min.css">
</head>

<body>
    <!--
    NOTE: The header should go in another file
    -->
    <!-- NAVBAR -->
    <div id="navbar-container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-student">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- LOGO -->
                    <div class="navbar-brand txt_white" href="#">
                        <section class="cubetainer">
                            <div id="cube">
                                <figure class="front"><i class="fa fa-globe"></i></figure>
                                <figure class="back"><i class="fa fa-leaf"></i></figure>
                                <figure class="right"><i class="fa fa-magic"></i></figure>
                                <figure class="left"><i class="fa fa-cogs"></i></figure>
                                <figure class="top"><i class="fa fa-info"></i></figure>
                                <figure class="bottom"><i class="fa fa-lightbulb-o"></i></figure>
                            </div>
                        </section>
                        <div class="navbar-brand-title student-option">Student Management Systems</div>
                    </div>
                </div>

                <!-- MENU -->
                <div class="collapse navbar-collapse" id="navbar-student">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle txt_white" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-cogs"></i>Options <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a id="student-add" href="#" class="student-option"><i class="fa fa-user-plus"></i>Add a new user</a></li>
                                <li><a id="student-chaos" href="#" class="student-option"><i class="fa fa-futbol-o"></i>Seed chaos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle txt_white" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-database"></i>Source <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a id="student-test-backend" href="https://www.letsdofunshit.today/test/ciunit/"><i class="fa fa-rebel"></i>Test Backend</a></li>
                                <li><a id="student-test-frontend" href="#"><i class="fa fa-empire"></i>Test Frontend</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a id="student-git" href="https://github.com/dokinoki/ciseed"><i class="fa fa-github"></i>View source in Github</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- SEARCH -->
        <div class="navbar-search-container">
            <div class="col-sm-12">
                <div id="navbar-search" class="navbar-form navbar-right" role="search">
                    <div class="input-group">
                        <input id="student-search-input" type="text" class="form-control student-option" placeholder="Search a student...">
                        <span class="input-group-btn">
                           <button id="student-search" type="submit" class="btn btn-default"><i class="fa fa-search no-margin-right"></i></button>
                         </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BODY -->
    <div class="container">
        <div class="students-body">
            <div class="row">
                <!-- We are going to load our students table here -->
                <div id="students-table-placeholder"></div>
            </div>

            <!-- ERRORS -->
            <div class="row">
                <!-- The search result ended with no results -->
                <div id="students-no-result" class="alert alert-warning text-center" role="alert" style="display: none"><i class="fa fa-exclamation-triangle"></i>Oh no! We couldn't find the student or there are no students yet</div>
            </div>
        </div>

        <!-- JASMINE CONTAINER-->
        <div id="jasmine-container" class="margin-top-130"></div>
    </div>

    <!-- LOADING OVERLAY, Lets be nice to the user, loading stuff is not fun... -->
    <div class="overlay">
        <img class="loading" src="./resources/img/loading.gif">
    </div>

    <!-- INTRO OVERLAY -->
    <div class="overlay-intro intro-1 container">Welcome</div>
</body>
</html>