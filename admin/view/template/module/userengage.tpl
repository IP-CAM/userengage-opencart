<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-userengage" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
      </div>
      <h1><?php echo $heading_title_m; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-userengage" class="form-horizontal">
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="userengage_apikey">
              <span class="label-tooltip" data-toggle="tooltip" title="<?php echo $entry_userengage_key; ?>">
                <?php echo $entry_userengage_apikey; ?>
              </span>
            </label>
            <div class="col-sm-10">
              <textarea name="userengage_apikey" id="userengage-apikey" class="form-control" rows="6"><?php echo $userengage_apikey; ?></textarea>
              <?php if ($error_userengage_apikey) { ?>
              <div class="text-danger"><?php echo $error_userengage_apikey; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-test"><?php echo $entry_test; ?></label>
            <div class="col-sm-10">
              <select name="userengage_status" id="input-userengage" class="form-control">
                <option value="<?php echo $text_enable_no;?>" <?php echo ($userengage_status == $text_enable_no ? ' selected="selected"' : '')?>><?php echo $text_enable_no; ?></option>
                <option value="<?php echo $text_enable_yes;?>" <?php echo ($userengage_status == $text_enable_yes ? ' selected="selected"' : '')?>><?php echo $text_enable_yes; ?></option>
              </select>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $footer; ?>
