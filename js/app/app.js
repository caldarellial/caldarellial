var app = angular.module('ACClient',['ngSanitize','ngMaterial','ui.bootstrap.contextMenu',"ngAnimate"],function($httpProvider) {
	// Use x-www-form-urlencoded Content-Type
	$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
  
	/**
	 * The workhorse; converts an object to x-www-form-urlencoded serialization.
	 * @param {Object} obj
	 * @return {String}
	 */ 
	var param = function(obj) {
	  var query = '', name, value, fullSubName, subName, subValue, innerObj, i;
  
	  for(name in obj) {
		value = obj[name];
  
		if(value instanceof Array) {
		  for(i=0; i<value.length; ++i) {
			subValue = value[i];
			fullSubName = name + '[' + i + ']';
			innerObj = {};
			innerObj[fullSubName] = subValue;
			query += param(innerObj) + '&';
		  }
		}
		else if(value instanceof Object) {
		  for(subName in value) {
			subValue = value[subName];
			fullSubName = name + '[' + subName + ']';
			innerObj = {};
			innerObj[fullSubName] = subValue;
			query += param(innerObj) + '&';
		  }
		}
		else if(value !== undefined && value !== null)
		  query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';
	  }
  
	  return query.length ? query.substr(0, query.length - 1) : query;
	};
  
	// Override $http service's default transformRequest
	$httpProvider.defaults.transformRequest = [function(data) {
	  return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
	}];
})
.config( ['$provide', function ($provide){
	$provide.decorator('$browser', ['$delegate', function ($delegate) {
		$delegate.onUrlChange = function () {};
		$delegate.url = function () { return "";};
		return $delegate;
	}]);
}])
.controller('ACController', ['$scope','$http','$location',function ($scope,$http,$location) {
	$scope.version = currentVersion;
	
	$scope.activeTab = 'home';
	$scope.setActiveTab = function(tab){
		$scope.activeTab = tab;
		if (tab != 'home'){
			$scope.activeProject = false;
		}
	};
	
	//**Fetchers**//
	$scope.projects = false;
	$scope.fetchProjects = function(){
		$.post(apiUrl+"projects/fetch",{},function(data){
			if (data.success){
				$scope.projects = data.success.map(function(curVal){
					curVal.projectStyle = {background:curVal.color};
					return curVal;
				});
			}else{
				$scope.projectsError = data.error;
			}
			$scope.$apply();
		},"json");
	};
	$scope.fetchProjects();
	//**Fetchers End**//
	
	$scope.activeProject = false;
	
	$scope.fullBackStyle = {background:"#f3f5fb"};
	$scope.activeProjectStyle = {background:"white"};
	$scope.buildAnimatedProjectStyle = function(project,index){
		return {color:project.color,left:(index%2==0?"-2000px":"2000px")};
	};
	
	$scope.selectProject = function(project){
		if (project == $scope.activeProject){$scope.activeProject = false; return;}
		$scope.activeProject = project;
		$scope.activeFullBackStyle = project.projectStyle;
	};
	
	//Filter to show all projects when no active one, and only active when selected
	$scope.displayProject = function(project){
		if (!$scope.activeProject){return true;}
		return $scope.activeProject == project;
	};
}])
.filter('reverse', function() {
	return function(items) {
		return items.slice().reverse();
	};
});