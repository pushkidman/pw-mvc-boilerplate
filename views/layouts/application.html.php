<?php
/**
 * The default layout for your site.
 *
 * Information on using the delegate approach can be found here:
 * http://processwire.com/talk/topic/740-a-different-way-of-using-templates-delegate-approach/
 */
?>
<!doctype html>
<!--[if lte IE 9]>    <html class="no-js ie9 oldie" lang="<?= __('en', 'theme_text_domain'); ?>"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="<?= __('en', 'theme_text_domain'); ?>"> <!--<![endif]-->
<?= $this->partial('meta') ?>
<body>
  <?= $this->partial('admin/bar') ?>
  <?= $this->partial('header') ?>

  <main id="main" class="area-main">
    <?php $this->spit(); ?>
  </main><!-- .area-content -->

  <?= $this->partial('footer') ?>
  <?= $this->partial('scripts') ?>
</body>
</html>
