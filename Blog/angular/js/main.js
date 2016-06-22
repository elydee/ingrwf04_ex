var myApp = angular.module('myApp', []);

myApp.controller('UserCtrl', ["$scope", function($scope) {
	$scope.user = {
		"nom" : "Dickinson",
		"prenom" : "Elisabeth"
	};
}]);

myApp.controller('meteoCtrl', ["$scope", function($scope) {
	$scope.weather = {
		"today" : "raining!"
	};
}]);

myApp.controller('ProductsCtrl', ["$scope", function($scope){
	$scope.products = {
		  "category 1": [
		    {
		      "title": "dog",
		      "prix": 45.99
		    },
		    {
		      "title": "turtle",
		      "prix": 15.99
		    },
		    {
		      "title": "frog",
		      "prix": 8.75
		    }
		  ],
		  "category 2": [
		    {
		      "title": "item 4",
		      "prix": 45.99
		    },
		    {
		      "title": "item 5",
		      "prix": 89.99
		    }
		  ]
		}
}]);

myApp.controller('ajaxCtrl', ["$scope", function($http) {
	$http.get("http://localhost:8888/exercices/Blog/index.php?feed&alt=json").success(function(data){
		$scope.contents=data;
	});
}])