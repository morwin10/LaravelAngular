var app = angular.module('clientApp', ['ngRoute']);
    app.config($routeProvider,$locationProvider,function() {
        $locationProvider.html5Mode(true);
        $routeProvider.when('/',{
          template: '',
          controller: ''
          
        }).when('/:pageName',{
          template: '',
          controller: ''
          
        }).otherwise({
        'redirectTo': '/'
        });
        
        $scope.menus = menus;
        
        console.log(this.menus);
    });
    
    app.controller('menuCtrl',function($scope){
      
    });



        
