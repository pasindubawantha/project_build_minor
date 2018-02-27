<div class="row">
  <?php
    if($access['project'])
    {
      echo '
            <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="'.base_url().'Project" >
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-futbol-o"></i></span>
                   <div class="info-box-content">
                      <h2>Projects</h2>
                    </div>
                  </div>
                </a>
              </div>';
    }

    if($access['inventory'])
    {
      echo '
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="'.base_url().'Inventory" >
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-cubes"></i></span>
            <div class="info-box-content">
              <h2>Inventory</h2>
            </div>
          </div>
        </a>
      </div>';
    }

    if($access['supplier'])
    {
      echo '
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="'.base_url().'Supplier" >
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-shopping-cart"></i></span>
            <div class="info-box-content">
              <h2>Suppliers</h2>
            </div>
          </div>
        </a>
      </div>';
    }

    if($access['contractor'])
    {
      echo '
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="'.base_url().'Contractor" >
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-shopping-cart"></i></span>
            <div class="info-box-content">
              <h2>Contractors</h2>
            </div>
          </div>
        </a>
      </div>';
    }

    if($access['user'])
    {
      echo '
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="'.base_url().'User" >
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-users"></i></span>
            <div class="info-box-content">
              <h2>Users</h2>
            </div>
          </div>
        </a>
      </div>';
    }

    if($access['prn'])
    {
      echo '
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="'.base_url().'PRN" >
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-shopping-cart"></i></span>
            <div class="info-box-content">
              <h2>Purnchase Request</h2>
            </div>
          </div>
        </a>
      </div>';
    }
  ?>
</div>
