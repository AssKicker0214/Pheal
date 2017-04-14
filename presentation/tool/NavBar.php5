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
            <a class="navbar-brand" href="#">Pheal</a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-center">
                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                <li><a href="http://localhost:63342/Pheal/presentation/PersonalIndex/PersonalIndexPHP.php5">我<span class="sr-only">(current)</span></a></li>
                <li><a href="#">朋友</a></li>
<!--                <li ',$doctorAndCoachActive, '><a href="../presentation/ProfessionalIndex/ProfessionalPHP.php5">医生和教练</a> </li>-->
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">专业人士 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="http://localhost:63342/Pheal/presentation/ProfessionalIndex/Doctor.php5">医生</a></li>
                    <li><a href="http://localhost:63342/Pheal/presentation/ProfessionalIndex/Coach.php5">教练</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                    <ul class= "dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a role="button" href="http://localhost:63342/Pheal/presentation/Index/LoginPage.html" class="btn btn-block btn-danger">注销</a> </li>
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>