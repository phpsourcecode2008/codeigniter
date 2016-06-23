<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to CodeIgniter</title>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/bootstrap.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/bootstrap-theme.css">

        <script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

        <style type="text/css">

            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body {
                margin: 0 15px 0 15px;
            }

            p.footer {
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container {
                margin: 10px;
                border: 1px solid #D0D0D0;
                box-shadow: 0 0 8px #D0D0D0;
            }

            .trash { color:rgb(209, 91, 71); }
            .flag { color:rgb(248, 148, 6); }
            .panel-body { padding:0px; }
            .panel-footer .pagination { margin: 0; }
            .panel .glyphicon,.list-group-item .glyphicon { margin-right:5px; }
            .panel-body .radio, .checkbox { display:inline-block;margin:0px; }
            .panel-body input[type=checkbox]:checked + label { text-decoration: line-through;color: rgb(128, 144, 160); }
            .list-group-item:hover, a.list-group-item:focus {text-decoration: none;background-color: rgb(245, 245, 245);}
            .list-group { margin-bottom:0px; }
        </style>
    </head>
    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand">Shanmugadoss</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo base_url('welcome'); ?>">Manage Brands</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('welcome'); ?>">Manage Products</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>


        <!-- Page Content -->
        <div class="container" style="padding-top: 50px;">
            <div class=" row col-md-10">
                <a href="<?php echo base_url('welcome/add_brand'); ?>" class="btn btn-primary pull-right"><b>+</b> Add Brand</a><br/><br/>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-list"></span>Manage Brands
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php
                            if (isset($brands) && count($brands) > 0)
                            {
                                foreach ($brands as $brand)
                                {
                                    ?>
                                    <li class="list-group-item" style="padding-left: 0px;">
                                        <div class="checkbox">
                                            <!--<input type="checkbox" id="checkbox" />-->
                                            <label for="checkbox">
                                                <?php echo $brand['brand_name']; ?>
                                            </label>
                                        </div>
                                        <div class="pull-right action-buttons">
                                            <a href="<?php echo base_url() . 'welcome/edit_brand/' . $brand['brand_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a class="trash" style="cursor: pointer;" onclick="delete_brand('<?php echo $brand['brand_id']; ?>');"><span class="glyphicon glyphicon-trash"></span></a>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                <li class="list-group-item" style="padding-left: 0px;">
                                    <div class="checkbox">
                                        <!--<input type="checkbox" id="checkbox" />-->
                                        <label for="checkbox">
                                            No Records Available.
                                        </label>
                                    </div>

                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->
        <script>
            function delete_brand(id)
            {
                if (confirm("Do you want to delete this brand?") == true) {
                    location.href = '<?php echo  base_url().'welcome/delete_brand/'; ?>'+id;
                }
            }
        </script>
    </body>

</html>