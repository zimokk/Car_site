app.factory('Errors',[function(){
    var errorService = {
        message: "",
        carNotFound: function() {
            errorService.message = "Car not found";
            window.location.replace("#/404");
        }
    };
    return errorService;
}]);