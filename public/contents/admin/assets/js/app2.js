/*angular app is defined*/

var app = angular.module('masterApp', ['ngRoute', 'ngCookies']);

app.config(['$routeProvider', '$locationProvider',
  function($routeProvider, $locationProvider) {
    $routeProvider
      .when('/admin/client-message', {
        templateUrl: 'templates/dashboard.html',
      })
      .when('/Book/:bookId/ch/:chapterId', {
        templateUrl: 'chapter.html',
        controller: 'ChapterCtrl',
        controllerAs: 'chapter'
      });
	  
    $locationProvider.html5Mode({
	  enabled: true,
	  requireBase: false
	});
}]);