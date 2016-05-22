var app = angular.module('myApp', [
    'ngRoute',
    'ngMaterial'
]);

app.config(['$routeProvider', function($routeProvider) {
  $routeProvider
      .when('/index', {
        templateUrl: 'app/templates/main.html',
        controller: 'MainCtrl'
      })
      .when('/buy_car', {
        templateUrl: 'app/templates/buy_car.html',
        controller: 'BuyCarCtrl'
      })
      .when('/sell_car', {
          templateUrl: 'app/templates/sell_car.html',
          controller: 'SellCarCtrl'
      })
      .otherwise({redirectTo: '/index'});
}]);
