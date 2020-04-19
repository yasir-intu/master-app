/*angular app is defined*/

var app = angular.module('masterApp', ['ngRoute', 'ngCookies']);

app.config(['$routeProvider', '$locationProvider',
  function($routeProvider, $locationProvider) {
    $routeProvider
	  .when('/admin', {
        templateUrl: 'angulartemplates/dashboard/dashboard.html',
        controller: 'mdmessageController',
		authenticated: true,
      })
      .when('/admin/client-message', {
        templateUrl: '/angulartemplates/facebook page messages/all-messages.html',
        controller: 'mdmessageController',
		authenticated: true,
		role: '2'
      })
	  .when('/admin/senior-executive/client-message', {
        templateUrl: '/angulartemplates/facebook page messages/executive-all-messages.html',
        controller: 'semessageController',
		authenticated: true,
		role: '3'
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

app.run(["$rootScope", "$location",
	function($rootScope, $location){
		$rootScope.$on("$routeChangeStart",
		function(event, next, current){
			if(next.$$route.authenticated){
				if(!auth){
					$location.path('/');
				}
				if(next.$$route.role < auth.role_id){
					$location.path('/admin');
				}else{
					console.log(auth.role_id);
				}
			}
		});
	}
]);

app.filter('str_limit', function () {
    return function (input, chars) {
        return input.length > chars ? input.substring(0, chars) + '...' : input;
    };
});