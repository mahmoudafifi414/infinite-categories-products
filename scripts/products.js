app.controller("productController", function ($scope, $http) {
    $scope.showProducts = true;
    $scope.checkSession = function () {
        $http.get('user/checkSession').then(function (response) {
            if (response.data == 'redirect') {
                $scope.showProducts = true;
            }
        });
    }
    $scope.checkCookie = function () {
        $http.get('user/checkCookie').then(function (response) {
            if (response.data == 'redirect') {
                $scope.showProducts = true;
            }
        });
    }
    $scope.enableEditing = false;
    $scope.products = '';
    $scope.categories = '';
    $scope.fetechData = function () {
        $http.get('products/all').then(function (response) {
            if (response.data == 'not allowed') {
                $scope.showProducts = false;
                return;
            }
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
        if (uploadFile()) {
            $http.post('products/store', {
                'name': $scope.name,
                'cat_id': $scope.product_cat.id,
                'image': $("#avatar").prop("files")[0].name
            }).then(function (response) {
                if (response.status == 200) {
                    $scope.fetechData();
                    $scope.name = '';
                    $scope.product_cat = '';
                    $scope.image = '';

                }
            })
        }
    }
    $scope.deleteProduct = function (id) {
        $http.delete("products/delete/id", {params: {'id': id}}).then(function (response) {
            $scope.fetechData()
        })
    }
    $scope.enableEdit = function (id) {
        $scope.enableEditing = true;
        $scope.enableAdding = false;
        $http.post('products/edit', {'id': id}).then(function (response) {
            $scope.fetechAllCats();
            $scope.cat_name=response.data.name;
            $scope.product_cat_edit=response.data.categories.name;
            $scope.product_id = response.data.id;
            $scope.image=response.data.image
        })
    }
    $scope.updateProduct = function () {
        var image
        if ($("#avatar_edit").prop("files")[0])
        {
            uploadFile();
            image=$("#avatar_edit").prop("files")[0].name;
        }
        else
        {
            image=$scope.image;
        }
        $http.post('products/update', {
            'id': $scope.product_id,
            'name': $scope.cat_name,
            'product_cat': $scope.product_cat_edit.id,
            'image':image
        }).then(function (response) {
            console.log(response.data)
            $scope.fetechData();
        })
    }
    $scope.checkSession();
    $scope.checkCookie();
});
function uploadFile() {

    $("#add").on("click", function () {
        var file_data = $("#avatar").prop("files")[0];
        var form_data = new FormData();
        form_data.append("file", file_data)
        $.ajax({
            url: "fileupload",
            dataType: 'script',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (data) {

            }
        })
    })
    return true;
}