app.controller('SidebarList', function($scope,$http) {
  $scope.message = 'Load Collections';
  $scope.collections = [];

    $scope.getCollections = function() {

        $http({
        	method : 'GET',
        	url : 'http://104.255.231.15:3030/v1/collections',
        	headers: {}}
        )
    	.success(function(data, status) {
            $scope.collections = data;
        })
        .error(function(data, status) {
            alert("Error");
        });
    }
});