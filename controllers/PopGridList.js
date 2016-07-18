app.controller('PopGridList', function($scope,$http) {
  $scope.message = 'Load the funko pops...';
  $scope.items = [];

    $scope.getItems = function() {

        $http({
        	method : 'GET',
        	url : 'http://104.255.231.15:3030/v1/pops',
        	headers: {}}
        )
        	.success(function(data, status) {
                $scope.items = data;
            })
            .error(function(data, status) {
                alert("Error");
            });
    }

    $scope.sort = function(keyname){
    	$scope.sortKey = keyname;
    	$scope.sortOrder = !$scope.sortOrder;
    }
});