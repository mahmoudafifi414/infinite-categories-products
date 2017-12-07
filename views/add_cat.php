<div class='ui basic content aligned segment'>
    <button class='btn btn-primary' ng-click="onAdd()">Add Category</button>
    <div class='ui centered card' ng-show="enableAdding">
        <div class='content'>
            <div class='ui form'>
                <div class='field'>
                    <label>Category Name</label>
                    <input v-model="titleText" type='text' defaultValue="">
                </div>
                <div class='field'>
                    <label>Parent Category</label>
                    <select v-model="projectText" type='text' defaultValue="">
                        <option ng-repeat="cat in categories">
                            {{cat}}
                        </option>
                    </select>
                </div>
                <div class='ui two button attached buttons'>
                    <button class='ui basic blue button'>
                        Create
                    </button>
                    <button class='ui basic red button' ng-click="closeForm()">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>