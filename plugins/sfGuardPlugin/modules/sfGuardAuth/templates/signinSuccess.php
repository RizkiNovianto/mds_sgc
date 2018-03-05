<?php use_helper('Validation', 'I18N') ?>

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                            </li>
                            <li>
                                <a href="/faskel_symfony/web/main_dev.php"> </a>
                            </li>
                            <li class="active">
                                 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->

<div class="panel panel-primary" id="sf_guard_auth_form">
<div class=panel-heading> <h3 class=panel-title align="center" style="font-weight: bold">Login</h3> </div>
<div class=panel-body align="center"> 

<?php echo form_tag('@sf_guard_signin') ?>

  <fieldset>
        <table>
            <tr>
    <div class="form-row" id="sf_guard_auth_username">
      <?php
      echo 
      '<td style="padding-top: 14px">',
      form_error('username'), 
      label_for('username', __('User')),
      '</td><td style="padding: 4px 0px 0px 10px">: ',
      input_tag('username', $sf_data->get('sf_params')->get('username')),
      '</td>';
      ?>
    </div>
             </tr>
             <tr>
    <div class="form-row" id="sf_guard_auth_password">
      <?php
      echo 
      '<td style="padding-top: 14px">',
      form_error('password'),
      label_for('password', __('Password')),
      '</td><td style="padding: 4px 0px 0px 10px">: ',
      input_password_tag('password'),
      '</td>';
      ?>
    </div>
             </tr>
        </table>
      <div class="form-row" id="sf_guard_auth_remember" style="margin: 6px 0px 6px 0px  ">
      <?php
      echo label_for('remember', __('Ingat Saya?')),
      '<span style="margin-left: 4px">',
      checkbox_tag('remember'),
      '</span>';
      ?>
    </div>
  </fieldset>

  
  <?php 
  echo submit_tag(__('Masuk')), 
          '<br/><div style="margin-top: 4px">'
  ?>
</form>


</div>

</div>

