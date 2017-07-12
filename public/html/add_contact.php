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

<?php require('partials/nav.php'); ?>

<div class="app app-header-fixed ">
  


  <!-- content -->
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
	    
<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="panel panel-default">
    <div class="panel-heading font-bold">
      <h1>Dane klienta</h1>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="/addContact">
        <div class="form-group">
          <label class="col-sm-2 control-label">Nazwa firmy</label>
          <div class="col-sm-10">
            <select name="companyName" class="form-control m-b">
              <?php array_map(function($companyName) {
                echo '<option>' . $companyName . '</option>';
              }, $companiesNames); ?>
            </select>
          </div>
        </div>  

        <div class="form-group">
          <label class="col-sm-2 control-label">
            <button type="submit" class="btn btn-sm btn-primary" name="cancel">Utwórz nową firmę</button>
          </label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="createNewCompany  ">                    
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Imię i nazwisko</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="clientName">                        
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Stanowisko</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="job">                        
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Telefon</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="phoneNumber">                        
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">E-mail</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="email">                        
          </div>
        </div>

      
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Skan</label>
          <div class="col-sm-10">
            <input ui-jq="filestyle" type="file" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" name="userImage" accept="image/*">
          </div>
        </div>

        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group">
          <label class="col-sm-2 control-label"></label>
          <div class="col-sm-10">
            <label class="checkbox-inline">
              <input type="checkbox" value="true" name="aggreePersonalData" ng-model="agree"> Zgoda na przetwarzanie danych osobowych
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" value="true" name="aggreeCommercials" ng-model="agree"> Zgoda na otrzymywanie materiałów reklamowych
            </label>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-2 control-label">Handlowiec</label>
          <div class="col-sm-10">
            <select class="form-control m-b" name="trader">
              <!-- user shouldn't be able to choose 'wybierz' -->
              <option>wybierz</option>
              <option>Handlowiec 1</option>
              <option>Handlowiec 2</option>
              <option>Handlowiec 3</option>
            </select>
          </div>
        </div>  
        
        <button type="submit" class="btn btn-sm btn-primary" name="cancel">Anuluj</button>
        <button type="submit" class="btn btn-sm btn-primary" name="accept">Zapisz zmiany</button>
       </form>
	</div>
  </div>
  <!-- /content -->
  
  <!-- footer -->
  <footer id="footer" class="app-footer" role="footer">
    <div class="wrapper b-t bg-light">
      <span class="pull-right">2.2.0 <a href ui-scroll="app" class="m-l-sm text-muted"><i class="fa fa-long-arrow-up"></i></a></span>
      &copy; 2016 Copyright.
    </div>
  </footer>
  <!-- / footer -->

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
