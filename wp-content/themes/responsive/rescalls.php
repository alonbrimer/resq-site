<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABPQKIbVeEyWlafgM6LB-4PKLS8iNF5SM">
</script>
<button class="btn btn-primary pull-right" disabled="disabled" ng-show="refreshing">
    Loading...
        <span>
            <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
        </span>
</button>
<button class="btn btn-primary pull-right" ng-click="getResCalls()" ng-hide="refreshing">
    Refresh
        <span>
            <span class="glyphicon glyphicon-refresh"></span>
        </span>
</button>
<table class="table table-striped table-bordered table-condensed">
        <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Location</th>
            <th>Created On</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="rescall in rescalls | filter:searchText">
            <td>
                {{ rescall.id }}
            </td>
            <td>
                {{ rescall.name }}
            </td>
            <td>
                <iframe
                    id="rescalls-maps{{rescall.id}}"
                    ng-model="currentAdress"
                    width="450"
                    height="250"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDKVE7WGRxWXzYqutijCMaT-D8xRRUbE-0 ">
                </iframe>
            </td>
            <td>
                {{ rescall.createdOn }}
            </td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" data-target="#delete-rescall-modal" data-toggle="modal" ng-click="setCurrentRescall(rescall)">
                                Delete
                            </a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        </tbody>
    </table>


<div class="modal fade" id="delete-rescall-modal" tabindex="-1" role="dialog" aria-labelledby="delete-rescall-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Delete ResCall</h4>
            </div>
            <div class="modal-body">
                <h3>Are you sure you want to delete This ResCcall</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="deleteRescall(currentRescall)">Delete</button>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="map-modal" tabindex="-1" role="dialog" aria-labelledby="map-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <iframe
                    width="450"
                    height="250"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDKVE7WGRxWXzYqutijCMaT-D8xRRUbE-0&q=Space+Needle,Seattle+WA&q=Israel National Trail, Tel Aviv, Israel">
                </iframe>
            </div>
        </div>
    </div>
