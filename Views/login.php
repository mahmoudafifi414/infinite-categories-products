<link rel="stylesheet" href="../aw/css/login.css">
<h2>Login Form</h2>
<div class="container">
    <div class="alert alert-danger" ng-show="error">
        <strong>Warning!</strong><span ng-repeat="error in errors">{{error}}</span>
    </div>
    <label><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="uname" ng-model="email" required>
    <label><b>Password</b></label>
    <input type="password" ng-model="password" placeholder="Enter Password" name="psw" required>
    <input type="checkbox" ng-model="remember" checked="checked"> Remember me
    <button ng-click="signIn()">Login</button>
</div>

<div class="container" style="background-color:#f1f1f1">
    <span class="psw">Do not have account?<a href="#!sign-up">sign up</a></span>
</div>
