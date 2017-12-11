<div class="row" ng-show="showProducts">
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
                        <th>category</th>
                        <th>Image</th>
                        <th>Status</th>
                    </tr>
                    <tr ng-show="!enableEditing">
                        <td>
                            <input type="text" ng-model="name" class="form-control">
                        </td>
                        <td>
                            <select class="form-control" ng-model="product_cat"
                                    ng-options="cat.name for cat in categories">
                            </select>
                        </td>
                        <td>
                            <input id="avatar" type="file" name="avatar" ng->
                        </td>
                        <td>
                            <button class="btn btn-primary" id="add" ng-click="addProduct()">Add</button>
                        </td>
                    </tr>
                    <tr ng-show="enableEditing">
                        <td>
                            <input type="text" ng-model="cat_name" class="form-control">
                        </td>
                        <td>
                            <select class="form-control" ng-model="product_cat_edit"
                                    ng-options="cat.name for cat in categories">
                            </select>
                        </td>
                        <td>
                            <input id="avatar_edit" type="file" name="avatar_edit" ng->
                        </td>
                        <td>
                            <button class="btn btn-info"
                                    ng-click="updateProduct()">Update
                            </button>
                            <button class="btn btn-info" ng-click="cancelEditing()">
                                Cancel
                            </button>
                        </td>
                    </tr>
                    <tr ng-repeat="product in products">
                        <td>
                            <h4>{{product.name}}</h4>
                        </td>
                        <td>
                            <h4>{{product.categories.name}}</h4>
                        </td>
                        <td>
                            <h4><img width="200" height="100" ng-src="../aw/uploads/{{product.image}}"></h4>
                        </td>
                        <td>
                            <button class="btn btn-danger" ng-if="enableEditing != product.id"
                                    ng-click="deleteProduct(product.id)">Delete
                            </button>
                            <button class="btn btn-info" ng-if="enableEditing != product.id"
                                    ng-click="enableEdit(product.id)">Edit
                            </button>

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div style="margin-left: 300px; margin-top: 110px; padding: 40px;" ng-show="!showProducts">
    <h1>
        You are Not authenticated to reach here
    </h1>
    <div>
        <a style="font-size: 30px; padding: 140px;" href="#!login">Log in</a>
        <a style="font-size: 30px;" href="#!sign-up">Sign up</a>
    </div>
</div>