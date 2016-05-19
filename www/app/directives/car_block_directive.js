app.directive('carBlock', function() {
    return {
        restrict: 'E',
        scope: {
            car: '='
        },
        templateUrl: 'app/templates/directive_templates/car_block_template.html',
        link: function (scope) {
            scope.car;
        }
    };
});