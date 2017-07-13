<?php require('partials/head.php'); ?>

<?php require('partials/nav.php'); ?>

  <div id="content" class="app-content" role="main">
  <div class="app-content-body app-content-full">
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
              <input type="checkbox"   value="true" name="aggreeCommercials" ng-model="agree"> Zgoda na otrzymywanie materiałów reklamowych
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
  
</div>
</div>

<?php require('partials/footer.php'); ?>