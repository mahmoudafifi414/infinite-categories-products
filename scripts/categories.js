var app = angular.module("myApp", ["ngRoute"]);
app.config(function ($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "paris.htm",
        })
        .when("/categories", {
            templateUrl: "views/categories.html",
            controller: "categoryController"
        })
        .when("/products", {
            templateUrl: "views/products.html",
            controller: "productController"
        });
});
app.controller("productController", function ($scope, $http) {
    $scope.enableEditing = false;
    $scope.products = '';
    $http.get('products/all').then(function (response) {
        $scope.products = response.data;
        console.log(response.data)
    })
    $scope.addProduct = function (index) {
        $http.post('products/store','aaa').then(function (response) {
            console.log(response.data)
        })
    }
    $scope.deleteProduct = function (index) {
        $scope.products.splice(index, 1)
    }
    $scope.closeForm = function () {
        $scope.enableAdding = false;

    }
    $scope.editProduct = function (index) {
        $scope.enableEditing = true;
    }

});

app.controller("categoryController", function ($scope, $http) {

    $scope.enableAdding = false;
    $scope.onAdd = function () {
        $scope.categories = [
            {"name": "mahmoud", "category": "SW", "photo": "gggg.jpg"},
            {"name": "mahmoud", "category": "SW", "photo": "gggg.jpg"},
            {"name": "mahmoud", "category": "SW", "photo": "gggg.jpg"},
            {"name": "mahmoud", "category": "SW", "photo": "gggg.jpg"},
        ]
        $scope.enableAdding = true;
    }
    $scope.closeForm = function () {
        $scope.enableAdding = false;

    }
});

