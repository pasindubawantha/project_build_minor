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
  <div class="col-sm-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">New Purchase Request Note</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" method="post" action="<?php base_url(); ?>">
        <div class="box-body">
          <div class="form-group fieldGroup">
            <div class="input-group">
              <label class="col-sm-2 control-label">Project</label>
              <div class="col-sm-10">
                <select name="project_id" class="select2" style="width: 100%;">
                <?php
                  foreach ($projects as $p)
                  {
                    echo '<option value="'.$p->id.'">'.$p->name.'</option>';
                  }
                ?>
                </select>
              </div>
            </div>

            <div class="input-group">
              <label class="col-sm-1 control-label">Items :</label>
              <div class="col-sm-12">
                <div class="col-sm-3">
                  <label class="col-sm-1 control-label">Item</label>
                </div>
                <div class="col-sm-2">
                  <label class="col-sm-1 control-label">Qunatity</label>
                </div>
                <div class="col-sm-2">
                  <label class="col-sm-1 control-label">Rate</label>
                </div>
                <div class="col-sm-2">
                  <label class="col-sm-1 control-label">PO number</label>
                </div>
                <div class="col-sm-3">
                  <label class="col-sm-1 control-label">Supplier</label>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-3">
                  <select name="item[]" class="select2" style="width: 100%;">
                  <?php
                  echo '<option value="null"> Select Item </option>';
                    foreach ($items as $i)
                    {
                      echo '<option value="'.$i->id.'">'.$i->name.'</option>';
                    }
                  ?>
                  </select>
                </div>
                <div class="col-sm-2">
                  <input type="number" name="quantity[]" class="form-control" placeholder="quantity" style="width: 100%;"/>
                </div>
                <div class="col-sm-2">
                  <input type="number" name="rate[]" class="form-control" placeholder="rate" style="width: 100%;"/>
                </div>
                <div class="col-sm-2">
                  <input type="number" name="po_number[]" class="form-control" placeholder="PO number" style="width: 100%;"/>
                </div>
                <div class="col-sm-2">
                  <select name="supplier_id[]" class="select2" style="width: 100%;">
                  <?php
                    foreach ($suppliers as $s)
                    {
                      echo '<option value="'.$s->id.'">'.$s->name.'</option>';
                    }
                  ?>
                  </select>
                </div>
                <div class="col-sm-1">
                  <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus"></span>Add</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" name="form" class="btn btn-info pull-right">Create</button>
        </div>
        <!-- /.box-footer -->
      </form>
      <!-- copy of input fields group -->
      <div class="form-group fieldGroupCopy" style="display: none;">
        <div class="input-group">
          <div class="col-sm-12">
            <div class="col-sm-3">
              <select name="item[]" class="select2s" style="width: 100%;">
              <?php
              echo '<option value="null"> Select Item </option>';
                foreach ($items as $i)
                {
                  echo '<option value="'.$i->id.'">'.$i->name.'</option>';
                }
              ?>
              </select>
            </div>
            <div class="col-sm-2">
              <input type="number" name="quantity[]" class="form-control" placeholder="quantity" style="width: 100%;"/>
            </div>
            <div class="col-sm-2">
              <input type="number" name="rate[]" class="form-control" placeholder="rate" style="width: 100%;"/>
            </div>
            <div class="col-sm-2">
              <input type="number" name="po_number[]" class="form-control" placeholder="PO number" style="width: 100%;"/>
            </div>
            <div class="col-sm-2">
              <select name="supplier_id[]" class="select2s" style="width: 100%;">
              <?php
                foreach ($suppliers as $s)
                {
                  echo '<option value="'.$s->id.'">'.$s->name.'</option>';
                }
              ?>
              </select>
            </div>
            <div class="col-sm-1">
              <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
