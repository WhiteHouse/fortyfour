<?php if (!empty($node->field_source_attribution["und"][0]["value"])): ?>
  <?php $source = $node->field_source_attribution["und"][0]["value"]?>
<?php endif; ?>
<?php if (!empty($node->field_last_update["und"][0]["value"])): ?>
  <?php $update = $node->field_last_update["und"][0]["value"]; ?>
<?php endif;?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <a name="chart" />
  <div class="content"<?php print $content_attributes; ?>>
  <a class="sidebar-open" href="#"><<</a>
  <div class="title-area clearfix">
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
      <h1 class="title" id="page-title"><?php print $title; ?></h1>
    <?php endif; ?>
      <?php if (!empty($variables['chart_units'])):?>
        <div class="sub-title">
          <?php print $variables['chart_units'];?>
        </div>
      <?php endif; ?>
      <?php print render($content['field_chart_sub_title']); ?>
      <!--<audio controls="controls">-->
        <!--<source src="/sites/d7dashboard/files/mp3/raptor-sound.mp3" type="audio/mpeg" />-->
      <!--</audio>-->
  </div>
  	<div id="chart-<?php print $node->nid ?>"></div>
    <div class="source-info clearfix">
      <!--Add Source Attribution code: print 'Source: ' . $source-->
      <?php if (!empty($source)):?>
        <div class="source-attr">Source: <?php print $source;?></div>
      <?php endif;?>
      <?php if ($variables['last_update']): ?>
        <div class="source-date">Last Update: <?php print $variables['last_update']; ?></div>
      <?php endif;?>
    </div>
  </div>
</div>
<aside class="chart-info">
  <a class="sidebar-close" href="#">>></a>
  <a name="about" />
  <div class="change-box">
    <div class="percent-change"><?php if (!empty($variables['change'])){ print $variables['change'] . '%';} ?></div>
    <div class="change-text">Change Over Last Month</div>
  </div>
  <div class="share-box">
    <a name="share" />
    <h3 class="aside">Share This Chart</h3>
    <a class="btn share-btn" href="#">Facebook</a>
    <a class="btn share-btn" href="#">Twitter</a>
    <a class="btn share-btn last-btn" href="#">Google +</a>
  </div>
  <h3 class="aside">About This Chart</h3>
  <?php
    unset($content['comments']);
    unset($content['links']);
    print render($content)
  ?>
</aside>