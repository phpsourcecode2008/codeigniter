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
            
            .form-error{
                color: red;
            }
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
                <!--                 Collect the nav links, forms, and other content for toggling 
                -->                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
        <div class="container">
            <div class="row col-md-9">
                <form role="form" action="" method="POST">
                    <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: left;"><?php echo $page_title; ?></h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Brand Name" value="<?php echo set_value('brand_name', (isset($brand['brand_name'])) ? $brand['brand_name'] : ''); ?>" maxlength="60">
                        <?php echo form_error('brand_name', '<div class="form-error">', '</div>'); ?>
                    </div>
                    <input type="hidden" class="form-control" id="brand_id" name="brand_id"value="<?php echo (isset($brand['brand_id'])) ? $brand['brand_id'] : ''; ?>">
                    <input type="submit" id="Cancel" name="Cancel" class="btn btn-default" value="Cancel"/> &nbsp;&nbsp;
                    <input type="submit" id="Save" name="Save" class="btn btn-primary" value="Save"/> &nbsp;&nbsp;
                </form>
            </div>
        </div>
        <!-- /.container -->
    </body>
</html>