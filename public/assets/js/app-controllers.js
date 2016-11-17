  
angular.module('app')


.controller('storeCtrl' ,function($scope, getContent, $rootScope, ngCart) {

     getContent(BASE_URL + 'store/' +  $rootScope.categorieID + '?angular=categories').then(function(res){ alert('res');
         // By || Operator   -   get the promise of $htpp or the promise of $q
         $scope.items = res.data || res;
         alert($scope.items);
     });

     $scope.src = BASE_URL + 'assets/img/';

     $scope.add = function(){
        ngCart.addItem(this.item.id, this.item.name, this.item.price, 1);
        this.q= 1;
     };

     $scope.saveQ = function(){
        ngCart.getItemById(this.item.id).setQuantity(this.q);
        ngCart.$save();
     };

     $scope.plus = function(){
        this.q++;
        ngCart.getItemById(this.item.id).setQuantity(this.q);
        ngCart.$save();
     }


     $scope.remove = function(idFromMinus){
        this.q = undefined;
        ngCart.removeItemById( idFromMinus  || this.item.id );
     }
  
     $scope.minus = function(){
        if (this.q == 1) {
          this.q = undefined;
          return $scope.remove(this.item.id);
        }
        this.q-- ;
        ngCart.getItemById(this.item.id).setQuantity(this.q);
        ngCart.$save();
     }
});

