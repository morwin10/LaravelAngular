    
angular.module( 'app', ['ui.router','ngMaterial', 'ngCart', 'ngMessages'] )

.provider('auth', function() {
  
  var user = {}

  this.init = function() {
    user = JSON.parse( localStorage.getItem('user') );
  }

  this.$get = function( $http ) {
    return {
      get: function() {
        return this.user || user;
      },
      set: function( userData ) {
        this.user = userData.data;
        localStorage.setItem('user', JSON.stringify( this.user ) );
      },
      send: function( actionType , data ) {
        return $http.post(BASE_URL + 'user/' + actionType, data)
          .then( ( res ) => {   // Arrow function ES6: (ergument) => {return ...}
            this.set( res );    // this.set in Arrow function referens to parent scope;
            (res.data.admin) ? location.reload() : null;
            console.log(res);
            location.hash = '';
          });
      },
      logout: function() {
        user = undefined;
        delete this.user;
        localStorage.removeItem('user');
      }
    }
  }

})


.directive('cartIcon', function() {
  return {
    restrict: 'E',
    template: '<svg id="cart" width="100%" height="125%" viewBox="2 0 105 125"> <path fill="#ffffff" d="m14.999,91c0,5.523 4.477,10 10.001,10s9.999,-4.477 9.999,-10s-4.475,-10 -9.999,-10s-10.001,4.477 -10.001,10zm50,0c0,5.523 4.477,10 10.001,10s9.999,-4.477 9.999,-10s-4.475,-10 -9.999,-10s-10.001,4.477 -10.001,10zm-32.264,-23.638l55.342,-15.812c1.058,-0.303 1.923,-1.45 1.923,-2.55v-27.5h-70.5v-8.5c0,-1.1 -0.899,-2 -2,-2h-15.5c-1.101,0 -2,0.9 -2,2v8h9.718l9.839,45.284l0.943,4.716v7.5c0,1.1 0.899,2 2,2h2.5h50h13c1.101,0 2,-0.9 2,-2v-7.5h-56.239c-5.748,0 -5.865,-2.253 -1.026,-3.638z"/><circle id="svg_2" r="34.07537" cy="20" cx="62.25" stroke-linecap="null" stroke-linejoin="null" fill="#3F51B5"/><text font-weight="bold" transform="matrix(2.1106928560326748,0,0,2.129052277984602,-65.3584283903659,-19.319146851608494) " xml:space="preserve" text-anchor="middle" font-family="serif" font-size="24" id="svg_3" y="25.41743" x="60.40827" stroke-linecap="null" stroke-linejoin="null" stroke-width="0" fill=" #FFFFFF" style="text-shadow: aliceblue; text-shadow: 2px 2px rgba(75, 150, 120, 0.62);">{{quantity}}</text></svg>'
  }
})



.controller('baseController', function($window, $scope, $timeout, $mdSidenav, auth, ngCart, $mdDialog, $mdMedia, $mdBottomSheet){

    $scope.userinfo = auth;

    $scope.location = location;

    function DialogController($scope) {

      $scope.openBottomSheet = function(){
      
        $mdBottomSheet.show({
          controller : DialogController,
          hasBackdrop : false,
          scope: $scope.$new(true),
          templateUrl: 'bottomSheet-restore-password.php',
          parent: angular.element('md-dialog')
        })

    };

    $scope.getIconClas = function(){

      if(this.formRegister && this.formRegister.email.$pending){
        return 'inp-mess l';
      }
      if( $scope.availableEmail == true && $scope.email ){
        return 'inp-mess v';
      }
      return 'inp-mess e';
    };

    $scope.isLoading = function () {
       return $http.pendingRequests;
    };
    
    $scope.availableEmail = false; 

    $scope.enter = function(actionType){ /* actionType = 'login' |'signup' | 'rest-password' */ 
      
      if( actionType !== 'rest-password' ) {
          $scope[actionType].email = $scope.email;
      } else {

          $scope[actionType] = { email: $scope.$parent.email };
      }

      auth.send( actionType, $scope[actionType] )
        .then( function( res ) {
          $scope.cancel();
        }, function( res ) {
          // show the error
          $scope.error = res.data.error;
        });


    };

    $scope.hide = function() {
      $mdDialog.hide();
    };


    $scope.cancel = function() {
      $mdDialog.cancel();
    };

    $scope.answer = function() {
      $mdDialog.hide();
    };
  };
  
  $scope.ngCart = ngCart;

  $scope.menus = window.MENUS;
  
  $scope.toggleRight = function() {
    $mdSidenav('right').toggle();
  };



  $scope.showTabDialog = function(ev) {

    $timeout(function() {
      $mdDialog.show({
          controller: DialogController,
          templateUrl: 'login.tmpl.php',
          parent: angular.element(document.body),
          targetEvent: ev,
          clickOutsideToClose: true,
          fullscreen : true,
          focusOnOpen : true,
        })
        .then(function(answer) {
          $scope.status = 'You said the information was "' + answer + '".';
        }, function() {
          $scope.status = 'You cancelled the dialog.';
          $mdBottomSheet.cancel();
        });
    }, 0);
  };

  $scope.showTabDialog2 = function(ev) {

    $timeout(function() {
      $mdDialog.show({
          controller: DialogController,
          templateUrl: 'cart_button.tmpl.php',
          parent: angular.element(document.body),
          targetEvent: ev,
          clickOutsideToClose: true,
          fullscreen : true,
          focusOnOpen : true,
        })
        .then(function(answer) {
          $scope.status = 'You said the information was "' + answer + '".';
        }, function() {
          $scope.status = 'You cancelled the dialog.';
          $mdBottomSheet.cancel();
        });
    }, 0);
  };

  if(!localStorage.getItem('user') && location.hash == '#login' || location.hash == '#signup' || location.hash == '#restore-password' ){
    $scope.showTabDialog();
  };

})


.directive('availableEmail', function($http, $timeout) {
  return {
    restrict: 'A',
    require: 'ngModel', // directive 
    link: function(scope, elm, attr, ngModel) { // Ctrl directive
      ngModel.$asyncValidators.availableEmail = function(Modelvalue) {
        // Validate Email only if it pass to a model !
        $timeout.cancel(window.timeOut_availableEmail);
        if(Modelvalue){
          return window.timeOut_availableEmail = $timeout(function(){

            $http.get(BASE_URL + 'user/register/' + Modelvalue)
              .then(function(res){
                scope.availableEmail = true;
              }, function(res){
                scope.availableEmail = false;
              });

          }, 500);
        }
      
      };
    }
  } 
})

.directive('restoreItemFromStorage', ['ngCart', function(ngCart){
  return function(scope, element){
    scope.q  = ( item = ngCart.getItemById(scope.item.id) ) ? item.getQuantity() : '';
  }
}])



.directive('onlyNumbers', function( ngCart ){
     return {
       require: 'ngModel',
       link: function(scope, element, attrs, ngModelCtrl) {

         var itemId = scope.item.id;

         element.on('focusout', function(){
          if(!scope.q){
            ngCart.removeItemById(itemId);
          }  
         });

         ngModelCtrl.$parsers.push( function( inputValue ) {

          /*  Remove all leading zeros and all non-digit symbols */
          var validValue = inputValue.replace(/^0+|\D/g, '').substr(0,3); 

          if (validValue != inputValue) {

              ngModelCtrl.$setViewValue(validValue);
              ngModelCtrl.$render();
              return validValue;

          }
            ngCart.getItemById(itemId).setQuantity(inputValue);
            ngCart.$save();
            return inputValue ;
          
         });
         
       }
     };
  })


.factory('storeFactory', function($http, $q, ngCart){

  return {

    getContent: function(url){
      //  return promise always. 
      //  if window.CONTENT exist, return it as a promise. and unset the variable for the next request
      return (temp =  window.CONTENT) ? $q.when( temp , window.CONTENT = undefined ) : $http.get(url); 
    },


    add: function(e){
        ngCart.addItem(e.item.id, e.item.name, e.item.price, 1);
        e.q= 1;
     },

    plus: function(e){
        e.q++;
        ngCart.getItemById(e.item.id).setQuantity(e.q);
        ngCart.$save();
     },

    remove: function(e){
        e.q = undefined;
        ngCart.removeItemById(e.item.id );
     },

    minus: function(e){
      if (e.q <= 1) {
        e.q = undefined;
        return this.remove(e);
      }
      e.q-- ;
      ngCart.getItemById(e.item.id).setQuantity(e.q);
      ngCart.$save();
    }

  }
})

.run(function($http) {


  window.onhashchange = function(){


  }


})

.config(function($httpProvider, $stateProvider, $urlRouterProvider, $locationProvider, $mdIconProvider, authProvider) {
    
    authProvider.init();
    
    // $httpProvider.defults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    $httpProvider.defaults.xsrfCookieName = 'csrftoken';
    $httpProvider.defaults.xsrfHeaderName = 'X-CSRFToken';



    $mdIconProvider.defaultIconSet('defult-icons');
    $mdIconProvider.defaultViewBoxSize(110);


    $locationProvider.html5Mode({
      enabled: true,
      requireBase: false
    });

    $locationProvider.hashPrefix('#');


       $stateProvider

               .state('cms',{url: '/cms', templateUrl: 'cms.php'})

               .state('store',{
                   url: '/store',
                   templateUrl: 'main_store.php',
                   controller: function($scope, storeFactory) { 
                       storeFactory.getContent(BASE_URL + 'store?angular=categories').then(function(res){ 
                           // By || Operator   -   get the promise of $htpp or the promise of $q
                           $scope.categories = res.data || res;
                           $scope.src = BASE_URL + 'assets/img/';
                       });
                   }

               })


               .state('store.items', {
                   url: "/:items",
                   views: {
                           '@': {
                                  templateProvider: function ($templateCache) {
                                         return $templateCache.get('store_items.php');
                                  },

                                  controller: function($scope, $rootScope, storeFactory) {
                                    storeFactory.getContent(BASE_URL + 'store/' +  $rootScope.categorieID + '?angular=categories').then(function(res){
                                     // By || Operator   -   get the promise of $htpp or the promise of $q

                                     $scope.items = res.data || res;
                                     $scope.src = BASE_URL + 'assets/img/';

                                    });

                                    $scope.cart =  storeFactory;
                                  }

                                }
                          }

               })

               .state('pages', {
                   url: '/:page',
                   controller: function($scope, $stateParams, storeFactory, $sce) { 
                       storeFactory.getContent(BASE_URL + $stateParams.page + '?angular=pageName')
                       
                           .then(function(res){
                           // By || Operator   -   get the promise of $htpp or the promise of $q
                           var data = res.data || res;
                           $scope.contentPage = $sce.trustAsHtml(data.body);
                       });
                   }


               })

    $urlRouterProvider.otherwise("/");

  });