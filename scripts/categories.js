
app.controller("categoryController", ['$scope', '$rootScope', '$http', '$compile', function ($scope, $rootScope, $http, $compile) {

    $scope.showCategories = true;
    $scope.enableAdding = false;
    $scope.enableEditing = false;
    $scope.categories = ''
    $scope.body = ''
    $scope.cat_name = '';
    $scope.cat_parent = '';
    $scope.name = '';
    $scope.cat_id = '';
    $scope.checkSession = function () {
        $http.get('user/checkSession').then(function (response) {
            if (response.data == 'redirect') {
                $scope.showCategories = true;
            }
        });
    }
    $scope.checkCookie = function () {
        $http.get('user/checkCookie').then(function (response) {
            if (response.data == 'redirect') {
                $scope.showCategories = true;
            }
        });
    }
    $scope.onAdd = function () {
        $scope.enableAdding = true;
        $scope.enableEditing = false;
    }
    $scope.closeForm = function () {
        $scope.enableEditing = false;

    }
    $scope.fetechAllCats = function () {
        $http.get('categories/all').then(function (response) {
            if (response.data == 'not allowed') {
                $scope.showCategories = false;
                return;
            }
            $scope.categories = response.data;
            $(document).ready(function () {
                var allBody = $('#all-body');
                $scope.categories.forEach(function (cat) {
                    $('#cats' + cat.parent_id).append($compile(
                        '<li style="margin-top: 20px;"><h3>'
                        + cat.name +
                        '<span style="margin-left: 100px;">' +
                        '<button class="btn-sm btn-danger" ng-click="deleteCategory(' + cat.id + ')">delete</button>' +
                        '<button class="btn-sm btn-info" ng-click="enableEdit(' + cat.id + ')">edit</button>' +
                        '</button>' +
                        '</span>' +
                        (cat.children.length > 0 ? '<ul style="border: 2px solid black; padding: 25px; margin: 25px;" id=cats' + cat.id + '><b style="color: #0ea432">sub Categories:</b></ul>' : '') +
                        (cat.products.length > 0 ? '<ul style="border: 2px solid black; padding: 25px; margin: 25px;" id=prod' + cat.id + '><b style="color: #0ea432">Products:</b></ul>' : '') +
                        '</li></h3>')($scope))
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
    $scope.enableEdit = function (id) {
        $scope.enableEditing = true;
        $scope.enableAdding = false;
        $http.post('categories/edit', {'id': id}).then(function (response) {
            $scope.cat_name = response.data.name;
            $scope.cat_id = response.data.id;
        })
    }
    $scope.updateCategory = function () {
        $http.post('categories/update', {
            'id': $scope.cat_id,
            'name': $scope.cat_name,
            'parent_id': $scope.cat_parent.id
        }).then(function (response) {
            $scope.fetechAllCats();
        })
    }
    $scope.checkSession();
    $scope.checkCookie();
}])



