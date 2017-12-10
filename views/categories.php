<?php include 'header.php'; ?>

<div ng-app="category" ng-controller="categoryController">
    <?php include 'add_cat.php'; ?>
    <div class='ui centered card' style="width: 1000px;">
        <div class="content" v-show="!isEditing">
            <div class='header'>
                {{ name }}
            </div>
            <div class='meta'>
                <li v-for="num in todo.numbers">
                    {{ num }}
                    <span class='right floated trash icon' v-on:click="deleteNumber(num)">
      <i class='trash icon'></i>
    </span>
                </li>
            </div>
            <div class='extra content'>
          <span class='right floated edit icon' v-on:click="showForm">
          <i class='edit icon'></i>
        </span>
            </div>
            <span class='right floated trash icon' v-on:click="deleteTodo(todo)">
      <i class='trash icon'></i>
    </span>
            <span class='right floated trash icon' v-on:click="addNewNumber">
      <i class='plus icon'></i>
    </span>

        </div>
        <div class="content" v-show="isEditing">
            <div class='ui form'>
                <div class='field'>
                    <label>Name</label>
                    <input type='text' v-model="todo.name">
                </div>
                <div class='field'>
                    <label>Phone Number</label>
                    <input type='text' v-model="todo.numbers">
                </div>
                <div class='ui two button attached buttons'>
                    <button class='ui basic blue button' v-on:click="sendForm()">
                        Create
                    </button>
                    <button class='ui basic red button' v-on:click="hideForm">
                        Close X
                    </button>
                </div>
            </div>
        </div>
        <div class="content" v-show="isAddingNumber">
            <div class='ui form'>
                <div class='field'>
                    <label>New Phone Number</label>
                    <input type='text' v-model="newNum">
                </div>
                <div class='ui two button attached buttons'>
                    <button class='ui basic blue button' v-on:click="sendNewNumber()">
                        Create
                    </button>
                    <button class='ui basic red button' v-on:click="hideNewNumberForm">
                        Close X
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
