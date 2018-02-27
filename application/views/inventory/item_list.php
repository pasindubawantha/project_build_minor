<div class="row">
  <div class="col-xs-12">
    <div style="display:<?php if(isset($fail)) echo"block"; else echo "none"; ?>;" class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-ban"></i> Failed!</h4>
      <?php if(isset($message)) echo $message; ?>
    </div>
    <div style="display:<?php if(isset($success)) echo"block"; else echo "none"; ?>;"  class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Success!</h4>
      <?php if(isset($message)) echo $message; ?>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Items</h3>
      </div>
      <div class="box-body">
        <table id="table_items" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Item ID</th>
              <th>description</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($items as $i)
              {
                echo "<tr>";
                echo '<td> '.$i->id.'</td>';
                echo '<td> '.$i->name.'</td>';
                echo "</tr>";
              }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Item ID</th>
              <th>description</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="box-footer">
      </div>
    </div>
  </div>
</div>
