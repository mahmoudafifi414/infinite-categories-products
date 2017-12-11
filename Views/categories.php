<div class="container" ng-show="showCategories">
    <div>
        <div class='ui basic content aligned segment'>
            <h1>When editing not to adjust the father to be child of his children</h1>
            <button ng-click="onAdd()" class="btn btn-primary" style="margin-left: 350px; width: 400px; height: 50px;">
                Add Category
            </button>
            <div class='ui centered card' ng-show="enableAdding">
                <div class='content'>
                    <div class='ui form'>
                        <div class='field'>
                            <label>Category Name</label>
                            <input ng-model="cat_name" type='text' defaultValue="">
                        </div>
                        <div class='field'>
                            <label>Parent Category</label>
                            <select ng-model="cat_parent"
                                    ng-options="cat.name for cat in categories">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class='ui two button attached buttons'>
                            <button class='ui basic blue button' ng-click="sendForm()">
                                Save
                            </button>
                            <button class='ui basic red button' ng-click="closeForm()">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class='ui centered card' ng-show="enableEditing">
                <div class='content'>
                    <div class='ui form'>
                        <div class='field'>
                            <label>Category Name</label>
                            <input ng-model="cat_name" type='text' defaultValue="">
                            <input ng-model="cat_id" type='hidden' defaultValue="">
                        </div>
                        <div class='field'>
                            <label>Parent Category</label>
                            <select ng-model="cat_parent"
                                    ng-options="cat.name for cat in categories">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class='ui two button attached buttons'>
                            <button class='ui basic blue button' ng-click="updateCategory()">
                                update
                            </button>
                            <button class='ui basic red button' ng-click="closeForm()">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="row" ng-repeat="cat in categories" ng-if="!cat.parent_id"
             style="border: 2px solid black; padding:25px; margin: 25px;">
            <h2>
                {{cat.name}}
                <span style="margin-left: 100px;">
                    <button class="btn-sm btn-danger" ng-click="deleteCategory(cat.id)">delete</button>
                    <button class="btn-sm btn-info" ng-click="enableEdit(cat.id)">edit</button>
                </span>
            </h2>

            <ul>
                <ul style="border: 2px solid black; padding:25px; margin: 25px;" id="cats{{cat.id}}"><b
                            style="color: #0ea432">sub Categories</b></ul>
                <ul style="border: 2px solid black; padding: 25px; margin: 25px;" id="prod{{cat.id}}"><b
                            style="color: #0ea432">Products</b></ul>
            </ul>
        </div>
    </div>

</div>
<div style="margin-left: 300px; margin-top: 110px; padding: 40px;" ng-show="!showCategories">
    <h1>
        You are Not authenticated to reach here
    </h1>
    <div>
        <a style="font-size: 30px; padding: 140px;" href="#!login">Log in</a>
        <a style="font-size: 30px;" href="#!sign-up">Sign up</a>
    </div>
</div>