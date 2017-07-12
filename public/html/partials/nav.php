<div class="app app-header-fixed app-aside-fixed">
    <!-- aside -->
    <aside id="aside" class="app-aside hidden-xs bg-dark">
      <div class="aside-wrap">
        <div class="navi-wrap">
          <!-- nav -->
          <nav ui-nav class="navi clearfix">
            <ul class="nav">

            <li class="nav-sub-header">
                  <li>
                    <a href="/">
                      <span>Strona Główna</span>
                    </a>
                  </li>
                  <?php if (isset($_SESSION['user'])) : ?>
                    <li id="menuli"><a href="/logout">Wyloguj</a></li>
                  <?php else : ?>
                    <li id="menuli"><a href="/login">Zaloguj</a></li>
                  <?php endif; ?>
                  <li>
                    <a href="/register">
                      <span>Zarejestruj</span>
                    </a>
                  </li>
                  <li>
                    <a href="/addCompany">
                      <span>Dodaj firmę</span>
                    </a>
                  </li>
                  <li>
                    <a href="/addContact">
                      <span>Dodaj kontakt</span>
                    </a>
                  </li>
            </ul>
          </nav>
          <!-- nav -->
        </div>
      </div>
  </aside>
  <!-- / aside -->

</div>


	</div>
  </div>
</div>
