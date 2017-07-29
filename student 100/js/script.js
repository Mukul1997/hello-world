	var app = angular.module('myApp', ['ngRoute']);

	// configure our routes
	app.config(function($routeProvider) {
		$routeProvider

			// route for the home page
			.when('/', {
				templateUrl : 'pages/home.html',
				controller  : 'mainController'
			})

			// route for the profile page
			.when('/Profile', {
				templateUrl : 'pages/My_Profile.html',
				controller  : 'profileController'
			})

			// route for the attendance page
			.when('/Attendance', {
				templateUrl : 'pages/Attendance_Details.html',
				controller  : 'attendanceController'
			})
	});