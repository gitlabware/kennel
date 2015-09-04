<html>
<head>
<style type="text/css" media="print">
  @page {
    size: 21cm 32.5cm;
    margin: 0;
     }
  table{
    border-spacing: 0px;
    padding: 0px;
  }
  div{
    border-spacing: 0px;
    padding: 0px;
  }
  td{
    border-spacing: 0px;
    padding: 0px;
  }
  .oculto{
    display: none;
  }
  
</style>
<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
<script src="<?php echo $this->webroot;?>js/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>
    <?php echo $this->fetch('content'); ?>
    <?php echo $this->fetch('scriptQR');?>
</body>
</html>