<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once __DIR__ . '/config.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Google Vision Demo</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="./css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="./js/script.js"></script>
</head>
<body>
<div class="col-md-4 col-md-offset-2 main">
<div id="message"></div>
<h1>Image Upload</h1><br/>
<form id="uploadimage" action="" class="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Detection Type</label>
<select class="select" id="detect_type" name="detect_type" required>
<option value="">Select Type</option>
<option value="LABEL_DETECTION">LABEL DETECTION</option>
<option value="TEXT_DETECTION">TEXT DETECTION</option>
<option value="FACE_DETECTION">FACE DETECTION</option>
<option value="LANDMARK_DETECTION">LANDMARK DETECTION</option>
<option value="LOGO_DETECTION">LOGO DETECTION</option>
<option value="SAFE_SEARCH_DETECTION">SAFE SEARCH DETECTION</option>
<option value="IMAGE_PROPERTIES">IMAGE PROPERTIES</option>
</select>
</div>
<div class="form-group">
<label>Select Your Image</label>
<input type="file" name="file" id="file" required />
</div>
<div class="form-group">
<input type="submit" value="Submit" class="btn btn-block btn-info" />
</div>
</form>
</div>
<div id="loading">
  <div id="text">loading...</div>
</div>
</body>
</html>