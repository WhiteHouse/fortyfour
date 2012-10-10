<?php
/**
 * Stripped down html template for embeds
 */
?><!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->
<!-- add custom styles-->
<?php print $styles; ?>
<!-- Embed specific styles -->
<style type="text/css">
  body{
    height: 600px;
    min-width:520px;
    overflow: scroll;
  }
  .share-box{
    margin: 10px 0px;
  }
  #content{
    border-radius: 0;
    border: 2px solid #C5C5C5;
    height: 100%;
    margin: 0px;
    width: 97%;
    float: left;
  }
  h1.title{
    margin: 0;
  }
  .title-area{
    background: none;
    width: 100%; 
  }
  .node-chart{
    width: 97%;
    float: left;
  }
  .chart-info{
    background: none;
    float: left;
    display: none;
    padding-left:5%;
    width: 95%;
  }
  .bottom-content{
    width: 97%;
    float:left;
  }
  .share-box{
    text-align: left;
  }
  #content{
    padding-right: 0px;
  }
  .chart-embed{
    width: 100%;
    float: left;
  }
  .slide-wrap{
    border-left: 1px solid #cec;
    background-color: whiteSmoke;
    float: left;
    width: 3%;
    height: 100%;
    position: relative;
  }
  a.embed-handle{
    height: 230px;
    width: 25px;
    border-bottom-left-radius: 5px;
    border-top-left-radius: 5px;
    background: url(/sites/d7dashboard/themes/dashboard/images/menu_open-vert.png) 2px center no-repeat whiteSmoke;
    border-top: 1px solid #c5c5c5;
    border-bottom: 1px solid #c5c5c5;
    border-left: 1px solid #c5c5c5;
    margin-left: -25px;
    display: block;
    padding-top: 50%;
    z-index: 9999;
    position: absolute;
    top:180px;
  }
  .embed-handle span{
    -webkit-transform:rotate(90deg);
    -moz-transform:rotate(90deg);
    -o-transform: rotate(90deg);
    display: block;
    padding-left: 130px;
  }
  .embed-open{
    display: block;
  }
  h3.aside{
    text-align: left;
  }
  .chart-info p{
    width: 95% !important;
  }
  .highcharts-container{
    height: 285px;
  }
</style>
<head>
</head>
<body class="clearfix">
  <?php print $page; ?>
  <?php print $scripts; ?>
  <?php if ($add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5-respond.js"></script>
    <![endif]-->
  <?php elseif ($add_html5_shim): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5.js"></script>
    <![endif]-->
  <?php endif; ?>
  <?php print $page_bottom; ?>
</body>
</html>
