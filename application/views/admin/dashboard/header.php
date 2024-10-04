<!--  PHPBack
Ivan Diaz <ivan@phpback.org>
Copyright (c) 2014 PHPBack
http://www.phpback.org
Released under the GNU General Public License WITHOUT ANY WARRANTY.
See LICENSE.TXT for details.  -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>ClickMelhorias - Painel de Administrador</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="public/img/favicon_click.svg" sizes="16x16">

  <!-- Loading Bootstrap -->
  <link href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>public/bootstrap/css/prettify.css" rel="stylesheet">

  <!-- Loading Flat UI -->
  <link href="<?php echo base_url(); ?>public/css/flat-ui.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>public/css/docs.css" rel="stylesheet">

  <!-- Loading custom styles-->
  <link href="<?php echo base_url(); ?>public/css/all.css" rel="stylesheet">

  <link rel="shortcut icon" href="images/favicon.ico">
  <script src="<?php echo base_url(); ?>public/js/jquery-1.8.3.min.js"></script>
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  <script type="text/javascript">
    function showtable(tableid, tablelink) {
      document.getElementById('newideastable').style.display = 'none';
      document.getElementById('allideastable').style.display = 'none';
      document.getElementById('commentstable').style.display = 'none';
      document.getElementById(tableid).style.display = '';

      document.getElementById("table1").className = "";
      document.getElementById("table2").className = "";
      document.getElementById("table3").className = "";
      document.getElementById(tablelink).className = "active";
    }

    function showtable2(tableid, tablelink) {
      document.getElementById('bannedtable').style.display = 'none';
      document.getElementById('newuserstable').style.display = 'none';
      document.getElementById('bantable').style.display = 'none';
      document.getElementById(tableid).style.display = '';

      document.getElementById("table1").className = "";
      document.getElementById("table2").className = "";
      document.getElementById("table3").className = "";
      document.getElementById(tablelink).className = "active";
    }

    function showtable3(tableid, tablelink) {
      document.getElementById('generaltable').style.display = 'none';
      document.getElementById('admintable').style.display = 'none';
      document.getElementById('categorytable').style.display = 'none';
      document.getElementById('upgradetable').style.display = 'none';
      document.getElementById(tableid).style.display = '';

      document.getElementById("table1").className = "";
      document.getElementById("table2").className = "";
      document.getElementById("table3").className = "";
      document.getElementById("table4").className = "";
      document.getElementById(tablelink).className = "active";
    }

    function popup_sure(text, url) {
      if (confirm(text) == true) {
        window.location = url;
      }
    }
  </script>

  <style type="text/css">
    .logosmall {
      display: flex;
      align-items: center;
      padding-top: 8px;
      padding-left: 8px;
      margin-right: 10px;
    }

    .logosmall img {
      max-width: 200px;
      height: auto;
      margin-right: 10px;
      color: white;
    }

    @media (max-width: 768px) {
      .logosmall img {
        max-width: 80px;
      }

      .logosmall p {
        font-size: 14px;
      }
    }

    @media (max-width: 480px) {
      .logosmall img {
        max-width: 60px;
      }

      .logosmall p {
        font-size: 12px;
      }
    }

    .navbar {
      background-color: #87CEEB; 
      margin-top: 5px;
    }

    .dashboard-center {
      background-color: #F0F8FF; 
    }

    body {
      background-color: #ADD8E6;
    }
  </style>
  <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/bootstrap-select.js"></script>
  <script src="<?php echo base_url(); ?>public/js/bootstrap-switch.js"></script>
  <script src="<?php echo base_url(); ?>public/js/flatui-checkbox.js"></script>
  <script src="<?php echo base_url(); ?>public/js/flatui-radio.js"></script>
  <script src="<?php echo base_url(); ?>public/js/jquery.tagsinput.js"></script>
  <script src="<?php echo base_url(); ?>public/js/jquery.placeholder.js"></script>
  <script src="<?php echo base_url(); ?>public/bootstrap/js/application.js"></script>

  <script>
    $('.popover-with-html').popover({
      html: true
    });
    $('.contentdiv').css('width', '100%').css('width', '-=400px');
  </script>

</head>

<body onload="<?php if (isset($toall) && $toall) echo "showtable('allideastable','table2');";
              if (isset($idban)) echo "showtable2('bantable','table3');"; ?>">