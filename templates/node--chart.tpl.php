<?php
/**
 * @file
 * Zen theme's implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   - view-mode-[mode]: The view mode, e.g. 'full', 'teaser'...
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 *   The following applies only to viewers who are registered users:
 *   - node-by-viewer: Node is authored by the user currently viewing the page.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $pubdate: Formatted date and time for when the node was published wrapped
 *   in a HTML5 time element.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content. Currently broken; see http://drupal.org/node/823380
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see zen_preprocess_node()
 * @see template_process()
 */
?>

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
    <div class="percent-change"><?php if (!empty($variables['change'])): print $variables['change'] . '%';endif; ?></div>
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
