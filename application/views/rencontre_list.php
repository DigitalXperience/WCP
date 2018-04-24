<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active"><?php echo $title; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Equipe 1</th>
                    <th>Equipe 2</th>
                    <th>Date</th>
                    <th>Score eq.1</th>
                    <th>Score eq.2</th>
                    <th>Mise en avant?</th>
                  </tr>
                </thead>
                <tbody>
                     <?php if($liste){
                            foreach ($liste as $row){
                                echo '<tr id="row-'.$row->id.'">
                                        <td>'.$row->id.'</td>
                                        <td>'.$row->equipe_id1.'</td>
                                        <td>'.$row->equipe_id2.'</td>
                                        <td>'.$row->date_heure.'</td>
                                        <td>'.$row->score_eq1.'</td>
                                        <td>'.$row->score_eq2.'</td>
                                        <td>'.($row->en_avant == '0' ? 'Non' : 'Oui') .'</td>
                                      </tr>';
                            }
                    } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Equipe 1</th>
                    <th>Equipe 2</th>
                    <th>Date</th>
                    <th>Score eq.1</th>
                    <th>Score eq.2</th>
                    <th>Mise en avant?</th>
                  </tr>
                </tfoot>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
      </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include ('inc/footer.php'); ?>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>