<div class="row">
  <?php
    if(true)
    {
      echo '
            <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="'.base_url().'Project/progress_boq/'.$project_id.'" >
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="fa fa-line-chart"></i></span>
                   <div class="info-box-content">
                      <h2>Progress</h2>
                    </div>
                  </div>
                </a>
              </div>';
    }

    if(true)
    {
      echo '
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="'.base_url().'Project/inventory_stock/'.$project_id.'" >
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-cubes"></i></span>
            <div class="info-box-content">
              <h2>Stock</h2>
            </div>
          </div>
        </a>
      </div>';
    }


    if(true)
    {
      echo '
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="'.base_url().'Project/boq_new/'.$project_id.'" >
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-calculator"></i></span>
            <div class="info-box-content">
              <h2>BOQs</h2>
            </div>
          </div>
        </a>
      </div>';
    }

    if(true)
    {
      echo '
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="'.base_url().'Project/dr_record/'.$project_id.'" >
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-inbox"></i></span>
            <div class="info-box-content">
              <h2>Daily Report</h2>
            </div>
          </div>
        </a>
      </div>';
    }
  ?>
</div>
