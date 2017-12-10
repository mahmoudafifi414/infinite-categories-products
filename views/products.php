<?php include 'header.php'; ?>
<div class="row" ng-app="products" ng-controller="productController">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h1 style="color: red;margin-left: 600px;" class="box-title">Products</h1>
            </div>
            <br>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Product</th>
                        <th>Photo</th>
                        <th>Category</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" ng-model="name" class="form-control">
                        </td>
                        <td>
                            <input type="text" ng-model="category" class="form-control">
                        </td>
                        <td>
                            <input type="text" ng-model="photo" class="form-control">
                        </td>
                        <td>
                            <button class="btn btn-primary" ng-click="addProduct()">Add</button>
                        </td>
                    </tr>
                    <tr ng-repeat="product in products">
                        <td>
                            {{product.name}}
                        </td>
                        <td>
                            {{product.category}}
                        </td>
                        <td>
                            {{product .photo}}
                        </td>
                        <td>
                            <button class="btn btn-danger" ng-click="deleteProduct($index)">Delete</button>
                            <button class="btn btn-info" ng-click="editProduct($index)">Edit</button>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
        </div>