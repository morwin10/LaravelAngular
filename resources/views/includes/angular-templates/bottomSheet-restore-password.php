<md-bottom-sheet>

      <form name="formRest" ng-submit="formRest.$valid ? enter('rest-password') : false" novalidate>
        <md-input-container class="restore-password md-block md-icon-left">
          <label>Type your Email :</label>
          <md-icon md-svg-icon="email" class="user-icon"></md-icon>
          <input ng-model="$parent.email" type="email" name="email" required md-autofocus/>

          <!-- messages -->
          <div ng-class="['inp-mess-error', {'valid-characters': !formRest.email.$error.email && $parent.email }]">
                valid Email
          </div>

          <div class="inp-mess-error" ng-show="formRest.$submitted && !$parent.email">
                Hey! it's required
          </div>

<!--           <div class="inp-mess-error" ng-show="formRestPassword.restorePass.$error.email">
                No valid Email
          </div> -->
          <!-- messages -->

          <!-- Submit formRestPassword -->
          </md-input-container>

          <md-input-container layout="column">
           
            <md-button type="submit" style="background-color: #1CAD4E; margin: 0;" class="md-warn md-raised md-hue-2 md-ink-ripple">Reset my password</md-button>
            <div class="signin-error">The email dosn't valid.</div>
         
          </md-input-container>
          <!-- Submit formRestPassword -->

      </form>

</md-bottom-sheet>