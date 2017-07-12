<?php require('partials/head.php'); ?>

<div class="app app-header-fixed ">
  

<div class="container w-xxl w-auto-xs" ng-init="app.settings.container = false;">
  <div class="text-center m-b-lg">
    <h1 class="text-shadow text-white">404</h1>
  </div>
  <div class="list-group bg-info auto m-b-sm m-b-lg">
    <a href="#/" class="list-group-item">
      <i class="fa fa-chevron-right text-muted"></i>
      <i class="fa fa-fw fa-mail-forward m-r-xs"></i> Goto application
    </a>
    <a ui-sref="access.signin" class="list-group-item">
      <i class="fa fa-chevron-right text-muted"></i>
      <i class="fa fa-fw fa-sign-in m-r-xs"></i> Sign in
    </a>
    <a ui-sref="access.signup" class="list-group-item">
      <i class="fa fa-chevron-right text-muted"></i>
      <i class="fa fa-fw fa-unlock-alt m-r-xs"></i> Sign up
    </a>
  </div>
  <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
    <p>
  <small class="text-muted">Web app framework base on Bootstrap and AngularJS<br>&copy; 2014</small>
</p>
  </div>
</div>


</div>

<?php require('partials/footer.php'); ?>