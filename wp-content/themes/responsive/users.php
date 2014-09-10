<select ui-select2 data-placeholder="Active" allow-clear="true" ng-model="activeUsers" ng-change="updateUsersTable(activeUsers)" >
    <option value="true">Active</option>
    <option value="false">Inactive</option>

</select>
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
<table class="table table-striped table-bordered table-condensed table-hover">
    <thead>
    <tr>
        <th><a href="#" ng-click="orderByField='id'; reverseSort = !reverseSort">
                ID <span ng-show="orderByField == 'id'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span></span></a></th>
        <th><a href="#" ng-click="orderByField='firstName'; reverseSort = !reverseSort">
                First Name <span ng-show="orderByField == 'firstName'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span></span></a></th>
        <th><a href="#" ng-click="orderByField='lastName'; reverseSort = !reverseSort">
                Last Name <span ng-show="orderByField == 'lastName'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span></span></a></th>
        <th><a href="#" ng-click="orderByField='age'; reverseSort = !reverseSort">
                Age <span ng-show="orderByField == 'age'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span></span></a></th>
        <th><a href="#" ng-click="orderByField='gender'; reverseSort = !reverseSort">
                Gender <span ng-show="orderByField == 'gender'"><span ng-show="!reverseSort">^</span><span ng-show="reverseSort">v</span></span></a></th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <tr ng-repeat="user in users  | orderBy:orderByField:reverseSort | filter: activeUsers">
            <td>
                {{ user.id }}
            </td>
            <td>
                {{ user.firstName }}
            </td>
            <td>
                {{ user.lastName }}
            </td>
            <td>
                {{ user.age }}
            </td>
            <td>
                {{ user.gender }}
            </td>
            <td>
                {{ user.email }}
            </td>

            <td>
                <div ng-if="user.active" class="center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#" data-target="#block-approve-message" data-toggle="modal" ng-click="setCurrentUser(user)">
                                    Deactivate
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div ng-if="!user.active" class="center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#" data-target="#block-approve-message" data-toggle="modal" ng-click="setCurrentUser(user)">
                                    Unblock
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </td>
    </tr>
    </tbody>
</table>
<div class="modal fade" id="block-approve-message" tabindex="-1" role="dialog" aria-labelledby="block-approve-message" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 ng-if="currentUser.active" class="modal-title" id="myModalLabel">Deactivate User</h4>
                <h4 ng-if="!currentUser.active" class="modal-title" id="hgdhd">Activate User</h4>
            </div>
            <div class="modal-body">
                <h3 ng-if="currentUser.active">Are you sure you want to deactivate {{ currentUser.firstName }} {{ currentUser.lastName }}</h3>
                <h3 ng-if="!currentUser.active">Are you sure you want to activate {{ currentUser.firstName }} {{ currentUser.lastName }}</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button ng-if="currentUser.active" type="button" class="btn btn-danger" data-dismiss="modal" ng-click="blockUser(currentUser)">Deactivate</button>
                <button ng-if="!currentUser.active" type="button" class="btn btn-primary" data-dismiss="modal" ng-click="unblockUser(currentUser)">Activate</button>
            </div>
        </div>
    </div>
</div>






