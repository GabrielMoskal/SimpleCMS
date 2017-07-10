<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <title>Html version | Angulr</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="../libs/assets/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="../libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />

  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />

</head>
<body>
<div class="app app-header-fixed ">
  


  <!-- content -->
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
	    
<div class="wrapper-md" ng-controller="FormDemoCtrl">
  
  <div class="panel panel-default">
    <div class="panel-heading font-bold">
      <h1>Dane firmy</h1>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" method="POST" action="/addCompany">
        <div class="form-group">
          <label class="col-sm-2 control-label">Nazwa firmy</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded">                        
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Adres</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded">                        
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Ulica</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded">                        
          </div>
        </div><div class="form-group">
          <label class="col-sm-2 control-label">Miejscowość</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded">                        
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Miasto</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded">                        
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Kraj</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded">                        
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">NIP</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded">                        
          </div>
        </div><div class="form-group">
          <label class="col-sm-2 control-label">Adres e-mail</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded">                        
          </div>
        </div>
        

        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Handlowiec:</label>
          <div class="col-sm-10">
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Handlowiec 2
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Handlowiec 2
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                Handlowiec 3
              </label>
            </div>
          </div>
        </div>

        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group">
          <label class="col-sm-2 control-label"></label>
          <div class="col-sm-10">
            <label class="checkbox-inline">
              <input type="checkbox" value="option1"> Zgoda na przedawatanie danych osobowych
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" value="option2"> Zgoda na otrzymywanie materiałów reklamowych
            </label>
          </div>
        </div>

        <button type="submit" class="btn btn-sm btn-primary">Anuluj</button>
        <button type="submit" class="btn btn-sm btn-primary">Zapisz zmiany</button>
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

<script src="../libs/jquery/jquery/dist/jquery.js"></script>
<script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<script src="js/ui-load.js"></script>
<script src="js/ui-jp.config.js"></script>
<script src="js/ui-jp.js"></script>
<script src="js/ui-nav.js"></script>
<script src="js/ui-toggle.js"></script>
<script src="js/ui-client.js"></script>

</body>
</html>
