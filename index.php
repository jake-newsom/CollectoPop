<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" ng-app="collectoPop" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" ng-app="collectoPop" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" ng-app="collectoPop" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" ng-app="collectoPop" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CollectoPop</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="bower_components/html5-boilerplate/dist/css/normalize.css">
  <link rel="stylesheet" href="bower_components/html5-boilerplate/dist/css/main.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="app.css">
  <script src="bower_components/html5-boilerplate/dist/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
  <!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <div class="container-fluid">
    <div class="row">
      <!--<div id="left-side-bar" ng-controller="SidebarList" ng-init="getCollections()" class="col-xs-12 col-sm-3">
        <ul>
          <li>Pops</li>
          <li>My Collection</li>
          <li>Add Custom</li>
        </ul>
      </div>-->
      <div id="pop-grid-list" ng-controller="PopGridList" ng-init="getItems()" class="col-xs-12">
        <div class="row" id="list-title-bar">
          <div class="col-xs-12 col-sm-6">
            <h2>{{pageName}}</h2>
          </div>
          <div class='col-xs-12 col-sm-6'>
            <form class="form" id="funko-filter">
              <div class="form-group">
                <input type="text" ng-model="search" class="form-control col-xs-12" placeholder="Looking for Something?" id="search">
              </div>
            </form>
          </div>
        </div>
        <div class="row" id="funko-list">
            <div dir-paginate="item in items|orderBy:sortKey:sortOrder|filter:search|itemsPerPage:12">
              <div class="clearfix" ng-if="$index % 4 == 0"></div>
              <div  class="col-xs-12 col-sm-3">
                <div class="funko-grid-item">
                  <img ng-src="images/pops/{{item.id}}.jpg"/>
                  <h3>{{item.name}}</h3>
                </div>
              </div>
            </div>
        </div>
        <dir-pagination-controls
           max-size="5"
           direction-links="true"
           boundary-links="true" >
        </dir-pagination-controls>
      </div>
    </div>
  </div>

  <!-- In production use:
  <script src="//ajax.googleapis.com/ajax/libs/angularjs/x.x.x/angular.min.js"></script>
  -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="bower_components/angular/angular.js"></script>
  <script src="bower_components/angular-route/angular-route.js"></script>
  <script src="node_modules/angular-utils-pagination/dirPagination.js"></script>
  <script src="app.js"></script>
  <script src="components/version/version.js"></script>
  <script src="components/version/version-directive.js"></script>
  <script src="components/version/interpolate-filter.js"></script>


  <!-- include controllers -->
  <script src="controllers/PopGridList.js"></script>
  <script src="controllers/SidebarList.js"></script>
</body>
</html>
