app.controller("loginController", function ($scope, $http) {
    $scope.email = '';
    $scope.password = '';
    $scope.signIn = function () {
        $http.post('user/login', {
            'email': $scope.email,
            'password': $scope.password,
            'remember': $scope.remember
        }).then(function (response) {
            if (response.data == 'redirect') {
                window.location = 'http://localhost/aw/#!/products';
            }
            else
            {
                $scope.error = true;
                $scope.errors = response.data;
                return;
            }
        });
    }
    $scope.checkSession = function () {
        $http.get('user/checkSession').then(function (response) {
            if (response.data == 'redirect') {
                console.log('session')
                window.location = 'http://localhost/aw/#!/products';
            }
        });
    }
    $scope.checkCookie = function () {
        $http.get('user/checkCookie').then(function (response) {
            if (response.data == 'redirect') {
                console.log('cookie')
                window.location = 'http://localhost/aw/#!/products';
            }
        });
    }
    $scope.checkSession();
    $scope.checkCookie();

})
app.controller("logOutController", function ($scope, $http) {
    $http.get('user/logout').then(function (response) {
        console.log(response.data)
    });
})
app.controller("signUpController", function ($scope, $http) {
    $scope.email = '';
    $scope.password = '';
    $scope.confirm = '';
    $scope.signUp = function () {
        if ($scope.password !== $scope.confirm) {
            $scope.error = true;
            $scope.errors = 'Password and confirmation do not match';
            return;
        }
        $http.post('user/register', {
            'email': $scope.email,
            'password': $scope.password,
            'remember': $scope.remember
        }).then(function (response) {
            if (response.data == 'redirect') {
                window.location = 'http://localhost/aw/#!/products';
            }
        });
    }
    $scope.checkSession = function () {
        $http.get('user/checkSession').then(function (response) {
            if (response.data == 'redirect') {
                console.log('session')
                window.location = 'http://localhost/aw/#!/products';
            }
        });
    }
    $scope.checkCookie = function () {
        $http.get('user/checkCookie').then(function (response) {
            if (response.data == 'redirect') {
                console.log('cookie')
                window.location = 'http://localhost/aw/#!/products';
            }
        });
    }
    $scope.checkSession();
    $scope.checkCookie();
})
