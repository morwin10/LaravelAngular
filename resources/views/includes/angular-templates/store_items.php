
    <div layout="row" layout-align="space-between" layout-xs="column" layout-wrap>
        <md-content ng-repeat="item in items" flex-gt-xs="50" flex-gt-md="33">  
            <md-card class="md-whiteframe-2dp">
                <md-card-title style="padding: 4px;" restore-item-from-storage>
                    <md-card-title-media class="md-whiteframe-4dp" style="margin: 0 0; " layout-margin>

                        <div class="img-bar" ng-show="q">

                            <div class="btn-rmv" ng-click="cart.remove(this)">
                              <span class="btn-rmv-head"></span>
                              <span class="btn-rmv-base"></span>
                            </div>
                            
                            <sapn class="qua">{{q}}</sapn>
                        </div>
                        
                        <img class="md-media-lg" style="margin: 0; z-index: 1;" ng-src="{{ src + item.img }}">
                        <center style="color: #FF3C3C; font-size: larger; font-weight: bold; border: 1px dashed blue;">{{item.price | currency}}</center>
                    
                    </md-card-title-media>
      			  	

      			  	<center style="width: 100%;">

      			  		<md-button class="btn-add md-fab md-primary" aria-label="button add to cart" ng-click="cart.add(this)" ng-hide="q || focus">
                           
                            <md-icon md-svg-icon="cart-add" style="fill: #B2E6A3; width: 29px; height: 31px;"></md-icon>
                       
                        </md-button>
                        
                        <div class="plus-minus-area" ng-show="q || focus">

                            <md-button class="md-fab md-primary btn-plus" ng-click="cart.plus(this)">+</md-button>

                            <input type class="inp-qua" ng-model="q" only-numbers ng-trim="false" ng-focus="focus = true" ng-blur="focus = false">

                            <center>
                                <div style="margin-top: 5px;color: tomato;font-weight: bold;font-size: 14px;background-color: #F5F5F5;border: dashed 1px;"> {{ ngCart.getItemById(item.id).getTotal() | currency }}</div>
                            </center>                                                   
                            
                            <md-button aria-label="minus button" class="md-fab md-primary btn-minus" ng-class="q <= 1 ? 'btn-m-remove' : '' " ng-click="cart.minus(this)">
                                <md-icon md-svg-icon="rmv-cart" ng-show="q <= 1" style="width: 38px; height: 44px;"></md-icon>
                            </md-button>

                        
                        </div>
                	
                    </center>
                
                </md-card-title>

                <md-card-content style="height: 100px; overflow: hidden;">
                    <h2 class="md-subhead" style="margin-left: 16px; text-transform: none; font-size: large;">{{ item.name }}</h2>
                    <p>{{item.article}} </p>
                </md-card-content>    
            </md-card>
        </md-content>
    </div>
