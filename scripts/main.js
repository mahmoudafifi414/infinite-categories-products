var app = angular.module("myApp", ["ngRoute"]);
app.config(function ($routeProvider) {
    $routeProvider
        .when("/categories", {
            templateUrl: "views/categories.php",
            controller: "categoryController"
        })
        .when("/products", {
            templateUrl: "views/products.php",
            controller: "productController"
        })
        .when("/login", {
            templateUrl: "views/login.php",
            controller: "loginController"
        })
        .when("/sign-up", {
            templateUrl: "views/sign_up.php",
            controller: "signUpController"
        })
        .when("/logout", {
            templateUrl: "views/logout.php",
            controller: "logOutController"
        })
});

