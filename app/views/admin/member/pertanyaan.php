<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="<?php echo MAIN_DESC ?>">
    <meta name="author" content="" />

    <link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.ico">

    <title><?php echo MAIN_TITLE ?></title>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/neon-core.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/neon-theme.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/neon-forms.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

    <script src="<?php echo base_url() ?>/assets/js/jquery-1.11.3.min.js"></script>

</head>

<body class="page-body">

    <div class="page-container">

        <?php $this->load->view('_part/sidebar'); ?>

        <div class="main-content">

            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3>
                                    <?php echo $title; ?>
                                </h3>
                            </div>

                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>

                        </div>

                        <div class="panel-body with-table">

                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                    var $table3 = jQuery("#table-3");

                                    var table3 = $table3.DataTable({
                                        "aLengthMenu": [
                                            [10, 25, 50, -1],
                                            [10, 25, 50, "All"]
                                        ]
                                    });

                                    $table3.closest('.dataTables_wrapper').find('select').select2({
                                        minimumResultsForSearch: -1
                                    });

                                    $('#table-3 tfoot th').each(function() {
                                        var title = $('#table-3 thead th').eq($(this).index()).text();
                                        $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
                                    });

                                    table3.columns().every(function() {
                                        var that = this;

                                        $('input', this.footer()).on('keyup change', function() {
                                            if (that.search() !== this.value) {
                                                that
                                                    .search(this.value)
                                                    .draw();
                                            }
                                        });
                                    });
                                });
                            </script>

                            <table class="table table-bordered datatable" id="table-3">

                                <thead>
                                    <tr class="replace-inputs">
                                        <th width="5%" class="text-center"></th>
                                        <th width="30%">Member</th>
                                        <th width="45%">Komen</th>
                                        <th width="10%">Status</th>
                                        <th width="10%"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($pertanyaan as $p) {
                                        $no++;
                                        echo "<tr class='odd gradeX'>
                                        <td class='text-center'>$no</td>
                                        <td class='center'>
                                        <strong><font color='black'>$p->member</font></strong>
                                        <br>
                                        <u>Bertanya di $p->nama_link.</u>
                                        </td>
                                        <td>";
                                        
                                        $limit = 30;
                                        if (strlen($p->komen)>$limit){
                                            echo "".substr("$p->komen",0,$limit)."...";
                                        } else{
                                            echo $p->komen;
                                        }
                                        
                                        echo "</td>";

                                        echo "<td>";
                                        if ($p->status == 0) {
                                            echo "<div class='label label-danger'>Belum dilihat</div>";
                                        } elseif ($p->status == 1) {
                                            echo "<div class='label label-warning'>Sudah dilihat</div>";
                                        }elseif ($p->status == 2) {
                                            echo "<div class='label label-success'>Dijawab</div>";
                                        }
                                        echo "</td>";

                                        echo "<td><a type='button' class='btn btn-xs btn-orange btn-icon icon-left'>Lihat<i class='fa fa-eye'></i></a></td>";

                                        echo "</tr>";
                                    } 
                                    
                                    ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                    </tr>
                                </tfoot>

                            </table>

                        </div>
                    </div>

                </div>
            </div>

            <?php echo FOOTER ?>

        </div>
    </div>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-icons/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/datatables/datatables.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/select2/select2.css">

    <script src="<?php echo base_url() ?>/assets/js/gsap/TweenMax.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/joinable.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/resizeable.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/neon-api.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/datatables/datatables.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/select2/select2.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/neon-chat.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/neon-custom.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/neon-demo.js"></script>

</body>

</html>