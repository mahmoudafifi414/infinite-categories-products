<script src="../aw/scripts/angular.min.js"></script>
<script src="../aw/scripts/jquery.min.js"></script>
<link rel="stylesheet" href="../aw/css/semantic.min.css">
<script src="../aw/scripts/semantic.min.js"></script>
<link rel="stylesheet" href="../aw/css/bootstrap.min.css">
<script src="../aw/scripts/main.js"></script>
<script src="../aw/scripts/categories.js"></script>
<script src="../aw/scripts/products.js"></script>
<script src="../aw/scripts/user.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>-->
<script src="../aw/scripts/angular-route.js"></script>
<div id="whole" class="container-fluid" ng-app="myApp">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    </button> <a class="navbar-brand" href="#">AW</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php
                        if (isset($_SESSION['login'])) {
                            ?>
                            <li>
                                <a href="#!categories">Categories</a>
                            </li>
                            <li>
                                <a href="#!products">Products</a>
                            </li>

                            <li>
                                <a href="#!logout">logout</a>
                            </li>
                            <?php
                            }else{
                            ?>
                            <li>
                                <a href="#!login">Login</a>
                            </li>
                            <li>
                                <a href="#!sign-up">Sign Up</a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </nav>
            <div class="row">
                <div class="col-md-12">
                    <div ng-view></div>
                </div>
            </div>
        </div>
    </div>
</div>
