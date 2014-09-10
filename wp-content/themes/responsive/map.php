<?php
/**
 * Created by PhpStorm.
 * User: alonbrimer
 * Date: 9/2/14
 * Time: 1:25 AM
 */
?>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
        html { height: 800px }
        body { height: 800px; margin: 0; padding: 0 }
        #map-canvas { height: 800px }
    </style>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABPQKIbVeEyWlafgM6LB-4PKLS8iNF5SM">
    </script>
</head>
<body>
<div class="row">
    <button class="btn btn-primary pull-right" disabled="disabled" ng-show="refreshing">
        Loading...
        <span>
            <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
        </span>
    </button>
    <button class="btn btn-primary pull-right" ng-click="getUsers()" ng-hide="refreshing">
        Refresh
        <span>
            <span class="glyphicon glyphicon-refresh"></span>
        </span>
    </button>
</div>
<div id="map-canvas"/>
</body>
</html>