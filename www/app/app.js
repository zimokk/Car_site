var app = angular.module('myApp', [
  'ngRoute'
]);

app.config(['$routeProvider', function($routeProvider) {
  $routeProvider
      .when('/index', {
        templateUrl: 'app/templates/main.html',
        controller: 'MainCtrl'
      })
      .when('/report', {
        templateUrl: 'app/templates/buy_car.html',
        controller: 'BuyCarCtrl'
      })
      .otherwise({redirectTo: '/index'});
}]);
