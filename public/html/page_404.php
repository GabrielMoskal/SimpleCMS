<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <title>Html version | Angulr</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="../public/libs/assets/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../public/libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../public/libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="../public/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />

  <link rel="stylesheet" href="../public/html/css/font.css" type="text/css" />
  <link rel="stylesheet" href="../public/html/css/app.css" type="text/css" />

</head>
<body>
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

<script src="../public/libs/jquery/jquery/dist/jquery.js"></script>
<script src="../public/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<script src="../public/html/js/ui-load.js"></script>
<script src="../public/html/js/ui-jp.config.js"></script>
<script src="../public/html/js/ui-jp.js"></script>
<script src="../public/html/js/ui-nav.js"></script>
<script src="../public/html/js/ui-toggle.js"></script>
<script src="../public/html/js/ui-client.js"></script>

</body>
</html>