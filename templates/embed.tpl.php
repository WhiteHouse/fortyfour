<?php
/**
 * Stripped down template for embeds.
 */
?>
<?php if (!empty($node->field_source_attribution["und"][0]["value"])): ?>
  <?php $source = $node->field_source_attribution["und"][0]["value"]?>
<?php endif; ?>
<?php if (!empty($node->field_last_update["und"][0]["value"])): ?>
  <?php $update = $node->field_last_update["und"][0]["value"]; ?>
<?php endif;?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-chart clearfix"<?php print $attributes; ?>>
  <div class="content"<?php print $content_attributes; ?>>
    <?php if ($node->title): ?>
    <div class="title-area clearfix">
      <h1 class="title" id="page-title"><?php print $node->title; ?></h1>
    </div>
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
  	<div id="chart-<?php print $node->nid ?>" class="chart-embed"></div>
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
  <div class="bottom-content">
    <div class="share-box">
      <a class="btn share-btn" href="#">Facebook</a>
      <a class="btn share-btn" href="#">Twitter</a>
      <a class="btn share-btn last-btn" href="#">Google +</a>
    </div>
  </div>
</div>
<div class="slide-wrap">
  <a class="embed-handle embed-closed" href="#"></a>
  <aside class="chart-info">
    <h3 class="aside">About This Chart</h3>
    <?php if (!empty($node->body["und"][0]["value"])): ?>
      <p><?php print $node->body["und"][0]["value"] ; ?></p>
    <?php endif; ?>
  </aside>
</div>