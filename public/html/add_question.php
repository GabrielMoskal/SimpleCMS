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
      <h1>Pytania</h1>
    </div>

    <div class="panel-body">
      <form class="form-horizontal" method="POST" action="/addQuestion">

        <div class="form-group">
          <label class="col-sm-2 control-label">Treść pytania</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="questionValue">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Kategoria</label>
          <div class="col-sm-10">
            <select class="form-control m-b" name="category">
                <option>Wybierz kategorię</option>
                <option>Kategoria 1</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Typy odpowiedzi</label>
          <div class="col-sm-10">
            <div class="radio">
              <label>
                <input type="radio" id="optionsRadios0" value="radiobutton" name="answerType" checked>
                Radiobuttony
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" id="optionsRadios1" value="checkbox" name="answerType">
                Checkboxy
              </label>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-sm btn-primary" name="addAnswers">Dodaj odpowiedzi</button>

        <div class="form-group">
          <label class="col-sm-2 control-label">Treść odpowiedzi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="answer1">                
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Treść odpowiedzi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="answer2">                
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Treść odpowiedzi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="answer3">                
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Treść odpowiedzi</label>
          <div class="col-sm-10">
            <input type="text" class="form-control rounded" name="answer4">                
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
