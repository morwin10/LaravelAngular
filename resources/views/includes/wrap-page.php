<div layout="column" ng-cloak ng-controller="baseController">
  <md-toolbar class="md-primary" layout-align="end end">
    
    <span flex>

    <div ng-hide="user = userinfo.get()">

      <md-button href="#login" class="md-primary md-raised" ng-click="showTabDialog($event)">Sign in</md-button>
      <md-button href="#signup" ng-click="showTabDialog($event)">Sign up</md-button>

    </div>

    <div ng-show="user">
      <md-button >Hi {{user.name}} !</md-button>
      <md-button ng-click="userinfo.logout()" style="color: red;">Logout</md-button>
    </div>

    <div>
      
    </div>
    <!-- 
       <md-button class="md-primary md-raised" ng-click="showAdvanced($event)"   flex="100"  flex-gt-md="auto">
          Alert Dialog
      </md-button>
 -->
    </span>
    <span class=""></span>
  </md-toolbar>

  <md-content layout-padding>

    <ui-view>
      <sapn ng-bind-html="contentPage"></span>
   </ui-view>

  </md-content>


  <div flex layout="row" layout-align="end end">
    <md-button class="md-fab md-primary md-fab-bottom-left" ng-click="toggleRight()" style="font-size: 43px; position: fixed;">≡</md-button>
   

    <span ng-show="quantity = ngCart.$cart.items.length">
      <md-button ng-click="showTabDialog2($event)" class="md-fab md-primary md-fab-bottom-right" aria-label="cart-icon" style="position: fixed;"> 
        <cart-icon style="width: 41px; height: 48px; color: black; fill: #fff; vertical-align: sub;"></cart-icon>
      </md-button>
    </span>
  
  </div>
  

  <md-sidenav md-component-id="right">

    <md-content layout-padding> 
      <md-toolbar class="md-tall md-hue-2">
        <span>
          <md-button></md-button>
        </span>
      </md-toolbar>
      <div layout="column">
        <md-button class="md-secondary" ui-sref='pages({page: ""})' ng-click="toggleRight()">Home</md-button> 
        <md-button ng-repeat="menu in menus" ng-if="! $first" class="md-secondary" ui-sref="pages({ page: menu.href })" ng-click="toggleRight()">{{menu.link}}</md-button>
        <md-button class="md-secondary" ui-sref="store" ng-click="toggleRight()">Store</md-button>
      </div>    
    </md-content>

  </md-sidenav>

</div>