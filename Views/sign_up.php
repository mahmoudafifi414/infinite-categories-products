<link rel="stylesheet" href="../aw/css/sign_up.css">
<h2>Signup Form</h2>
<div class="container">
    <div class="alert alert-danger" ng-show="error">
        <strong>Warning!</strong> {{errors}}
    </div>
    <label><b>Email</b></label>
    <input type="text" ng-model="email" placeholder="Enter Email" name="email" required>

    <label><b>Password</b></label>
    <input type="password" ng-model="password" placeholder="Enter Password" name="psw" required>

    <label><b>Repeat Password</b></label>
    <input type="password" ng-model="confirm" placeholder="Repeat Password" name="psw-repeat" required>
    <input type="checkbox" ng-model="remember" checked="checked"> Remember me
    <div class="clearfix">
        <button ng-click="signUp()" class="signupbtn">Sign Up</button>
    </div>
</div>