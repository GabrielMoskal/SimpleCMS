<?php require('partials/head.php'); ?>

<?php require('partials/nav.php'); ?>

 <!-- content -->
  <div id="content" class="app-content" role="main">
  <div class="app-content-body app-content-full">
      <div class="app app-header-fixed ">
  <!-- content -->
      
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
            <input type="text" class="form-control rounded" name="companyName">                        
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Adres</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="address">                        
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Ulica</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="street">                        
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Miasto</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="town">                        
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Kraj</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="country">                      
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">NIP</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="NIP">                        
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Adres e-mail</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="email">                        
          </div>
        </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Handlowiec:</label>
          <div class="col-sm-10">
            <div class="radio">
              <label>
                <input type="radio" id="optionsRadios0" value="option1" name="trader" checked>
                Handlowiec 1
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" id="optionsRadios1" value="option2" name="trader">
                Handlowiec 2
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" id="optionsRadios2" value="option3" name="trader">
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
              <input type="checkbox" value="true" name="aggreePersonalData" ng-model="agree">Zgoda na przetwarzanie danych osobowych
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" value="true" name="aggreeCommercials" ng-model="agree">Zgoda na otrzymywanie materiałów reklamowych
            </label>
          </div>
        </div>
        
        <button type="submit" class="btn btn-sm btn-primary" name="cancel">Anuluj</button>
        <button type="submit" class="btn btn-sm btn-primary" name="accept">Zapisz zmiany</button>
       </form>
     </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  <!-- /content -->


</div>
<!-- /hbox layout -->

  </div>
  </div>
  <!-- /content -->

</div>

<?php require('partials/footer.php'); ?>
