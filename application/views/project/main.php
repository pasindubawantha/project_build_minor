<div class="row">
  <div class="col-lg-3 col-xs-6">
    <a href="<?=base_url();?>Project/new" class="small-box-footer">
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>Create</h3>

          <p>New Project</p>
        </div>
        <div class="icon">
          <i class="glyphicon glyphicon-plus"></i>
        </div>
        <div class="small-box-footer">
          create <i class="fa fa-arrow-circle-right"></i>
        </div>
      </div>
    </a>
  </div>
  <div class="col-lg-3 col-xs-6">
  </div>
  <div class="col-lg-3 col-xs-6">
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Project List</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="table_projects" class="table table-bordered table-striped" >
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Address</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($projects as $project) {
                echo '<tr>';
                echo '<td>'.$project->id.'</td>';
                echo '<td>'.$project->name.'</td>';
                echo '<td>'.$project->address.'</td>';
                echo '<td><a href="'.base_url().'Project/index/'.$project->id.'"><button type="button" class="btn btn-block btn-info">Pick</button></a></td>';
                echo '</tr>';
              }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Address</th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
