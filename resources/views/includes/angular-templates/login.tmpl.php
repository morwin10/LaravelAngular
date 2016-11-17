<md-dialog aria-label="Log in to your account" style="width: 23%; overflow-y: hidden;" class="mdDialog-signin">
<!--   <md-toolbar>
    <div class="md-toolbar-tools">
      Log in :
      <span flex></span>
      <md-button ng-click="cancel()" class="md-icon-button">
        <md-icon md-svg-icon="close3" aria-label="Close dialog"></md-icon>
      </md-button>
    </div>
  </md-toolbar> -->
  <md-dialog-content>
    <md-tabs md-border-bottom md-stretch-tabs="always" md-dynamic-height>

      <md-tab label="Log in" md-active="location.hash == '#login' "> 
        <md-content class="md-padding md-no-momentum">
          <form name="formLogin" ng-submit="formLogin.$valid ? enter('login') : false " novalidate>
            <!-- Name -->
            <md-input-container class="name md-block md-icon-left">
              <label>Email</label>
              <md-icon md-svg-icon="user" class="user-icon"></md-icon>
              <input ng-model="email" type="email" name="email" required ng-minlength="3" md-autofocus />
              
              <!-- messages -->
              <div ng-class="['inp-mess-error', {'valid-characters': !formLogin.email.$error.email && email }]">
                    valid Email
              </div>
              <div class="inp-mess-error" ng-show="formLogin.$submitted && formLogin.email.$isEmpty(formLogin.email.$viewValue)">
                this field is required
              </div>
              <!-- messages -->

            </md-input-container>


            <!-- Password -->
            <md-input-container class="md-block md-icon-left">
              <label>Password</label>
              <md-icon md-svg-icon="password" class="password-icon"></md-icon>
              <input ng-model="login.password" type="password" name="password" required>

              <!-- messages -->
              <sapn  class="inp-mess-error" ng-show="formLogin.$submitted && !login.password.length" >
                this fild is required
              </sapn>
              <!-- messages -->
            </md-input-container>


            <!-- Submit signin -->
            <md-input-container layout="column">
              <md-button type="submit" style="background-color: #1CAD4E; margin: 0;" class="md-warn md-raised md-hue-2 md-ink-ripple">Sign in</md-button>
              <div class="signin-error" ng-style="error ? {visibility: 'visible'} : null">{{error}}</div>
            </md-input-container>
            <!-- Submit signin -->

          </form>
        </md-content>
      </md-tab>

      <md-tab label="sign up" md-active="location.hash == '#signup' ">
        <md-content class="md-padding">

          <form name="formRegister" ng-submit="formRegister.$valid ? enter('register') : false " novalidate>
            <!-- Name -->
            <md-input-container class="name md-block md-icon-left">
              <label>Name</label>
              <md-icon md-svg-icon="user" class="user-icon"></md-icon>
              <input  ng-model="register.name" type="text" name="name" required ng-minlength="3" md-autofocus="location.hash == '#signup'" />

              <!-- messages -->
              <div ng-class="['inp-mess-error', {'valid-characters': register.name.length >= 3}]">
                min 3 characters
              </div>

              <div class="inp-mess-error" ng-show="formRegister.$submitted && formRegister.name.$isEmpty(formRegister.name.$viewValue)">
                this field is required
              </div>
              <!-- messages -->
            </md-input-container>



            <!-- Email -->
            <md-input-container class="md-block md-icon-left">
              <label>Email</label>
              <md-icon md-svg-icon="email" ></md-icon>
              <input ng-model="email" type="email" name="email" required available-email />

              <!-- messages -->
              <div ng-class="['inp-mess-error', {'valid-characters': !formRegister.email.$error.email && email }]">
                    valid Email
              </div>
              
              <div ng-class="getIconClas(this)">
                    available Email
              </div> 

              
              <div class="inp-mess-error" ng-show="formRegister.$submitted && !email">
                this field is required
              </div>
              <!-- messages -->
            </md-input-container>


            <!-- Password -->
            <md-input-container class="md-block md-icon-left">
              <label>Password</label>
              <md-icon md-svg-icon="password" class="password-icon"></md-icon>
              <input ng-model="register.password" type="password" name="password" required>

              <!-- messages -->
              <sapn  class="inp-mess-error" ng-show="formRegister.$submitted && !register.password" >
                this fild is required
              </sapn>
              <!-- messages -->
            </md-input-container>


            <!-- Submit signup -->
            <md-input-container layout="column">
              <md-button type="submit" style="background-color: #1CAD4E; margin: 0;" class="md-warn md-raised md-hue-2 md-ink-ripple">Sign up</md-button>
            </md-input-container>
            <!-- Submit signin -->

          </form>



        </md-content>
      </md-tab>

    </md-tabs>
  </md-dialog-content>

  <md-dialog-actions layout="row" layout-align="space-between start">


    <md-button class="md-icon-button md-raised" ng-click="cancel()">
      <md-icon md-svg-icon="close4" style="color: #FF6F6F;"></md-icon>
    </md-button>

    <p ng-click="openBottomSheet($event);" class="forgot-pass md-warn md-ink-ripple">
      Forgot your password ?
    </p>
    
    <a href="/">
      <md-button class="md-icon-button md-raised" ng-click="cancel()">
        <md-icon md-svg-icon="home" style="color: lightskyblue;"></md-icon>    
      </md-button>
    </a>
      
  </md-dialog-actions>
</md-dialog>
