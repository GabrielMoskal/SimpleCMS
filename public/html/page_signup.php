<?php require('partials/head.php'); ?>

<?php require('partials/nav.php'); ?>

<div id="content" class="app-content" role="main">
  <div class="app-content-body app-content-full">
              <div class="app app-header-fixed ">
  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">

    
    <div class="container w-xxl w-auto-xs" ng-controller="SignupFormController" ng-init="app.settings.container = false;">
      <a href class="navbar-brand block m-t">Angulr</a>
      <div class="m-b-lg">
        <div class="wrapper text-center">
          <strong>Sign up to find interesting thing</strong>
        </div>
        <form name="form" class="form-validation" method=POST action="/register">
          <div class="text-danger wrapper text-center" ng-show="authError">
              
          </div>
          <div class="list-group list-group-sm">
            <div class="list-group-item">
              <input placeholder="Name" class="form-control no-border" ng-model="user.name" required name="username">
            </div>
            <div class="list-group-item">
              <input type="email" placeholder="Email" class="form-control no-border" ng-model="user.email" required name="email">
            </div>
            <div class="list-group-item">
               <input type="password" placeholder="Password" class="form-control no-border" ng-model="user.password" required name="password">
            </div>
          </div>
          <div class="checkbox m-b-md m-t-none">
            <label class="i-checks">
              <input type="checkbox" ng-model="agree" required name="agreeTerms"><i></i> Agree the <a href>terms and policy</a>
            </label>
          </div>
          <button type="submit" class="btn btn-lg btn-primary btn-block" ng-click="signup()" ng-disabled='form.$invalid'>Sign up</button>
          <div class="line line-dashed"></div>
          <p class="text-center"><small>Already have an account?</small></p>
          <a ui-sref="access.signin" class="btn btn-lg btn-default btn-block" href="/login">Sign in</a>
        </form>
      </div>
      <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
        <p>
  <small class="text-muted">Web app framework base on Bootstrap and AngularJS<br>&copy; 2014</small>
</p>
      </div>
    </div>


</div>

<?php require('partials/footer.php'); ?>