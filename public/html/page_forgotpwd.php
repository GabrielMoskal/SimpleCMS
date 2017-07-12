<?php require('partials/head.php'); ?>

<?php require('partials/nav.php'); ?>

<div id="content" class="app-content" role="main">
  <div class="app-content-body app-content-full">
              <div class="app app-header-fixed ">
  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="app-content-body ">
  

<div class="container w-xl w-auto-xs" ng-init="app.settings.container = false;">
  <a href class="navbar-brand block m-t">Angulr</a>
  <div class="m-b-lg">
    <div class="wrapper text-center">
      <strong>Input your email to reset your password</strong>
    </div>
    <form name="reset" ng-init="isCollapsed=true" method="POST" action="forgotPassword">
      <div class="list-group list-group-sm">
        <div class="list-group-item">
          <input type="email" placeholder="Email" ng-model="email" class="form-control no-border" required name="email">
        </div>
      </div>
      <button type="submit" ng-disabled="reset.$invalid" class="btn btn-lg btn-primary btn-block"  ng-click="isCollapsed = !isCollapsed" >Send</button>
    </form>
    <div collapse="isCollapsed" class="m-t">
      <div class="alert alert-success">
        <p>A reset link sent to your email address, please check it in 7 days. <a ui-sref="access.signin" class="btn btn-sm btn-success">Sign in</a></p>
      </div>
    </div>
  </div>
  <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
    <p>
  <small class="text-muted">Web app framework base on Bootstrap and AngularJS<br>&copy; 2014</small>
</p>
  </div>
</div>


</div>

<?php require('partials/footer.php'); ?>
