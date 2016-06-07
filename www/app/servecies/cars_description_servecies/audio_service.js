app.factory('Audio',function($http){
    var audioService = {
        all: [],
        getAll: function() {
            $http.get("php/commands/audio_commands/read_audios.php").success(function(response){
                angular.copy(response.audios,audioService.all);
            }).error(function(msg){

            });
        },
        getById: function(id){
            $http.post('php/commands/audio_commands/read_audios_by_id.php', {
                'id' : id
            }).success(function(response){
                angular.copy(response.audios,audioService.all);
            }).error(function(msg){

            });
        }
    };
    return audioService;
});