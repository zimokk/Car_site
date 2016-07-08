app.directive('imagePreviewDiv', function() {
    return {
        restrict: 'E',
        scope: {
            image: '=',
            remove: "&"
        },
        templateUrl: 'app/templates/directive_templates/image_preview_template.html',
        link: function (scope) {
        }
    };
});