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
        })
        .when("/login", {
            templateUrl: "views/login.html",
            controller: "loginController"
        })
        .when("/sign-up", {
            templateUrl: "views/sign_up.html",
            controller: "signUpController"
        })
});
app.controller("productController", function ($scope, $http) {
    $scope.enableEditing = false;
    $scope.products = '';
    $scope.categories = '';
    $scope.fetechData = function () {
        $http.get('products/all').then(function (response) {
            $scope.products = response.data;
        })
    }
    $scope.fetechData();
    $scope.fetechAllCats = function () {
        $http.get('categories/all').then(function (response) {
            $scope.categories = response.data;
        })
    }
    $scope.fetechAllCats();
    //add product
    $scope.addProduct = function () {
        $http.post('products/store', {
            'name': $scope.name,
            'cat_id': $scope.product_cat.id,
            'image': $scope.image
        }).then(function (response) {
            if (response.status == 200) {
                $scope.fetechData();
                $scope.name = '';
                $scope.product_cat = '';
                $scope.image = '';
            }
        })
    }
    $scope.deleteProduct = function (id) {
        $http.delete("products/delete/id", {params: {'id': id}}).then(function (response) {
            $scope.fetechData()
        })
    }
    $scope.cancelEditing = function () {
        $scope.enableEditing = '';

    }
    $scope.editProduct = function (id) {
        $scope.enableEditing = id;
    }
    $scope.updateProduct = function (id) {
        console.log($scope.productaa)
    }

});

app.controller("categoryController", function ($scope, $http) {

    $scope.enableAdding = false;
    $scope.categories = ''
    $scope.body = ''
    $scope.cat_name = '';
    $scope.cat_parent = ''
    $scope.onAdd = function () {
        $scope.enableAdding = true;
    }
    $scope.closeForm = function () {
        $scope.enableAdding = false;

    }
    $scope.fetechAllCats = function () {
        $http.get('categories/all').then(function (response) {
            $scope.categories = response.data;
            render($scope.categories);
        })
    }
    $scope.fetechAllCats();
    $scope.sendForm = function () {
        $http.post('categories/store', {
            'name': $scope.cat_name,
            'parent_id': $scope.cat_parent.id
        }).then(function (response) {
            console.log(response.data)
            $scope.fetechAllCats();
        })
    }
    $scope.deleteCategory = function (id) {
        $http.delete("categories/delete/id", {params: {'id': id}}).then(function (response) {
            $scope.fetechAllCats()
        })
    }
})

function render(categories) {
    $(document).ready(function () {
        var allBody = $('#all-body');
        categories.forEach(function (cat) {
            $('#cats' + cat.parent_id).append(
                '<li style="margin-top: 20px;"><h3>'
                + cat.name +
                '<span style="margin-left: 100px;">' +
                '<button class="btn-sm btn-danger">delete</button>' +
                '<button class="btn-sm btn-info">edit</button>' +
                '</span>' +
                (cat.children.length > 0 ? '<ul style="border: 2px solid black; padding: 25px; margin: 25px;" id=cats' + cat.id + '><b style="color: #0ea432">sub Categories:</b></ul>' : '') +
                (cat.products.length > 0 ? '<ul style="border: 2px solid black; padding: 25px; margin: 25px;" id=prod' + cat.id + '><b style="color: #0ea432">Products:</b></ul>' : '') +
                '</li></h3>')
            if (cat.products.length > 0) {
                cat.products.forEach(function (product) {
                    $('#prod' + product.cat_id).append(
                        '<li><h4>'
                        + product.name +
                        '</h4></li>'
                    )
                })

            }
        })
    })

}

app.controller("loginController", function ($scope, $http) {

})
app.controller("signUpController", function ($scope, $http) {
    $scope.email = '';
    $scope.password = '';
    $scope.confirm = '';
    $scope.signUp = function () {
        if ($scope.password !== $scope.confirm)
        {
            $scope.error=true;
            $scope.errors='Password and confirmation do not match';
            return;
        }


    }
})

