// initialize the app
var myapp = angular.module('myapp', []);

// set the configuration
myapp.run(['$rootScope', function($rootScope){
    // the following data is fetched from the JavaScript variables created by wp_localize_script(), and stored in the Angular rootScope
    $rootScope.dir = BlogInfo.url;
    $rootScope.site = BlogInfo.site;
    $rootScope.api = AppAPI.url;
}]);

// add a controller
myapp.controller('mycontroller', ['$scope', '$http', '$timeout', function($scope, $http, $timeout) {
    // load posts from the WordPress API
    $scope.users = [];
    $scope.rescalls = [];
    $scope.orderByField = 'id';
    $scope.reverseSort = false;
    $scope.activeUsers = true;
    $scope.currentUser = null;
    $scope.refreshing = false;
    $scope.currentAdress = "";
    var mapOptions = {
        zoom: 9,
        center: new google.maps.LatLng(-34.397, 150.644),
    };

    if(document.getElementById("map-canvas") != null) {
        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        var bounds = new google.maps.LatLngBounds();
        var infowindow = new google.maps.InfoWindow();
    }

    $scope.reverseGeoCoding = function(rescall) {
        $http({
            method: 'GET',
            url: "http://maps.google.com/maps/api/geocode/json?latlng=" + rescall.coordinateX + "," + rescall.coordinateY + "&sensor=false"
        }).
            success(function(data, status, headers, config) {
                if(data.results.length > 0) {
                    rescall.mapUrl = "https://www.google.com/maps/embed/v1/place?key=AIzaSyDKVE7WGRxWXzYqutijCMaT-D8xRRUbE-0&q=" + data.results[0].formatted_address ;
                    document.getElementById('rescalls-maps' + rescall.id).src = rescall.mapUrl;
                }

            }).
            error(function(data, status, headers, config) {
            });
    };

    $scope.getUsers = function() {
        $scope.refreshing = true;
        $http({
            method: 'GET',
            url: $scope.site, // derived from the rootScope
            params: {
                json: 'getUsers'
            }
        }).
            success(function(data, status, headers, config) {
                $scope.refreshing = false;
                $scope.users = data.data;
            }).
            error(function(data, status, headers, config) {
                $scope.refreshing = false;
            });
    };

    $scope.getUsers();

    $scope.getResCalls = function(){
        $scope.refreshing = true;
        $http({
            method: 'GET',
            url: $scope.site, // derived from the rootScope
            params: {
                json: 'getRescalls'
            }
        }).
        success(function(data, status, headers, config) {
            $scope.refreshing = true;
            $scope.rescalls = data.data;
            $scope.rescalls.forEach(function(rescall){
                rescall['createdOn'] = formatDate(new Date(rescall['createdOn'] * 1000));
                $http({
                    method: 'GET',
                    url: $scope.site, // derived from the rootScope
                    params: {
                        json: 'getUser',
                        id: rescall.userId
                    }
                })
                .success(function(data, status, headers, config) {
                    $scope.refreshing = false;
                    rescall['name'] = data.data.firstName + ' ' + data.data.lastName;
                });
                $scope.rescalls.forEach(function(rescall) {
                    if(map != null) {
                    var myLatlng = new google.maps.LatLng(rescall.coordinateX, rescall.coordinateY);


                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        title: rescall.id.toString(),
                        map: map
                    });

                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.setContent('User: ' +rescall.name + '<br/>Created On: ' + rescall.createdOn);
                        infowindow.open(map, this);
                    });
                    map.setCenter(marker.getPosition());
                    }
                });
                $scope.reverseGeoCoding(rescall)
            })
         }).
        error(function(data, status, headers, config) {
            $scope.refreshing = false;
        });
    };

    $scope.getResCalls();

    $scope.deleteRescall = function(resCall){
        $http({
            method: 'GET',
            url: $scope.site, // derived from the rootScope
            params: {
                json: 'deleteRescall',
                id: resCall.id
            }
        }).success(function(){
            $scope.getResCalls();
        });
    };

    $scope.blockUser = function(user)
    {
        $http({
            method: 'POST',
            url: $scope.site, // derived from the rootScope
            params: {
                json: 'deactivateUser',
                id: user.id
            }

        }).then(function(){
            $scope.getUsers();
        });

        jQuery('#block-approve-message').modal('hide')
        $timeout(function() {
            user.active = false;
        }, 50);    };

    $scope.unblockUser = function(user)
    {
        $http({
            method: 'POST',
            url: $scope.site, // derived from the rootScope
            params: {
                json: 'activateUser',
                id: user.id
            }

        }).then(function(){
            $scope.getUsers();
        });
        jQuery('#block-approve-message').modal('hide');
        $timeout(function() {
            user.active = true;
        }, 50);
    };

    $scope.setCurrentUser = function(user){
        $scope.currentUser = user;
    };

    $scope.setCurrentRescall= function(rescall) {
        $scope.currentRescall = rescall;
    };

    function formatDate(date){
        var day = date.getDate();
        var month = date.getMonth() + 1; // Note the `+ 1` -- months start at zero.
        var year = date.getFullYear();
        var hour = date.getHours();
        var min = date.getMinutes();
        return month+"/"+day+"/"+year+" "+hour+":"+padZ(min);
    }

    function padZ(num, n) {
        n = n || 1; // Default assume 10^1
        return num < Math.pow(10, n) ? "0" + num : num;
    }






// To add the marker to the map, call setMap();

}]);


