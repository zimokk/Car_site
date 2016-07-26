var app = angular.module('myApp', [
    'ngRoute',
    'ngMaterial',
    'angular-loading-bar',
    'ngAnimate',
    'angular.filter',
    'ngFileUpload'
]);

app.config(['$routeProvider', function($routeProvider) {
  $routeProvider
        .when('/', {
            templateUrl: 'app/templates/main.html',
            controller: 'MainCtrl'
        })
        .when('/registration', {
          templateUrl: 'app/templates/registration.html',
          controller: 'RegistrationCtrl'
        })
        .when('/index', {
            templateUrl: 'app/templates/main.html',
            controller: 'MainCtrl'
        })
        .when('/buy_car', {
            templateUrl: 'app/templates/buy_car.html',
            controller: 'BuyCarCtrl',
            resolve:{
                cars: ['Cars', function(Cars) {
                    return Cars.getAll();
                }]
            }
        })
        .when('/sell_car', {
            templateUrl: 'app/templates/sell_car.html',
            controller: 'SellCarCtrl',
            resolve:{
                images: ['Images', function(Images) {
                    return Images.flush();
                }]
            }
        })
        .when('/car_info/:id', {
          templateUrl: 'app/templates/car_info.html',
          controller: 'CarInfoCtrl',
          resolve:{
              cars: ['Cars', '$route', function(Cars,$route) {
                return Cars.setCurrentCar($route.current.params.id);
              }]
          }
        })
        .when('/buy_part', {
          templateUrl: 'app/templates/buy_part.html',
          controller: 'BuyPartCtrl'
        })
        .when('/sell_part', {
          templateUrl: 'app/templates/sell_part.html',
          controller: 'SellPartCtrl'
        })
      .when('/404', {
          templateUrl: 'app/templates/errors_templates/404.html',
          controller: 'NotFoundCtrl'
      })
      .otherwise({redirectTo: '/404'});
}]);
