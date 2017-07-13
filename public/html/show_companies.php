<?php require('partials/head.php'); ?>

  <?php require('partials/nav.php'); ?>

  <div id="content" class="app-content" role="main">
  <div class="app-content-body app-content-full">
      <div class="app app-header-fixed ">
  <!-- content -->
=
<form method="POST" action="/showCompanies">
  <div class="panel panel-default">
    <div class="panel-heading">
      Firmy
    </div>
    <div class="row wrapper">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle" name="chosenAction">
          <option value="0">Wybierz akcje</option>
          <option value="deleteAll">Usun wszystkie</option>
        </select>
        <input type="submit" class="btn btn-sm btn-default" name="accept" value="Zaakceptuj"></button>             
      </div>
      <div class="col-sm-4">
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID</th>
            <th>
              Nazwa firmy
            </th>
            <th>Telefon</th>
            <th>Data utworzenia</th>
            <th>Handlowiec</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>

          <tr>
              <td>
                <input type="submit" class="btn btn-sm btn-default" name="sort" value="Sortuj"></input>
              </td>
              <td>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="" name="companyName">
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="" name="phoneNumber">
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="data od" name="dateFrom">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="data do" name="dateTo">
                </div>
              </td>
              <td>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="" name="trader">
                </div>
              </td>
          </tr>

          <tr>
            <?php foreach($companies as $company) : ?>
              <td>
                <label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                <?= $company->id; ?>
              </td>
              <td><?= $company->companyName; ?></td>
              <td>1312421</td>
              <td><?= $company->creationDate; ?></td>
              <td><?= $company->trader; ?></td>
            <?php endforeach; ?>
          </tr>
          
        </tbody>
      </table>
    </div>

    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-4 hidden-xs">
          <select class="input-sm form-control w-sm inline v-middle" name="chosenAction">
            <option value="0">Wybierz akcje</option>
            <option value="deleteAll">Usun wszystkie</option>
          </select>
          <input type="submit" class="btn btn-sm btn-default" name="accept2" value="Zaakceptuj"></input>     
        </div>
        <div class="col-sm-4 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href><i class="fa fa-chevron-left"></i></a></li>
            <li><a href>1</a></li>
            <li><a href>2</a></li>
            <li><a href>3</a></li>
            <li><a href>4</a></li>
            <li><a href>5</a></li>
            <li><a href><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
  </form>   
</div>



	</div>
  </div>
  <!-- /content -->
</div>

</div>

<?php require('partials/footer.php'); ?>