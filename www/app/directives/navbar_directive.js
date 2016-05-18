app.directive('navbarBlock', function() {
    return {
        restrict: 'E',
        scope: {
            info: '='
        },
        templateUrl: 'app/templates/directive_templates/navbar_template.html',
        link: function (scope) {
            scope.info;
        }
    };
});