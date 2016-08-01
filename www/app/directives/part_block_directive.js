app.directive('partBlock', function() {
    return {
        restrict: 'E',
        scope: {
            part: '='
        },
        templateUrl: 'app/templates/directive_templates/part_block_template.html',
        link: function (scope) {
            scope.part;
        }
    };
});