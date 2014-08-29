<? defined('KOOWA') or die; ?>

<?= @helper('behavior.mootools'); ?>
<?= @helper('behavior.keepalive'); ?>

<script src="media://lib_koowa/js/koowa.js" />

<form action="" class="form-horizontal -koowa-form" method="post">
    <div class="row-fluid">
        <div class="span8">
            <fieldset>
                <legend><?= @text('CONTENT'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('TITLE'); ?></label>
                    <div class="controls">
                        <input class="span12 required" type="text" name="title" value="<?= @escape($publication->title); ?>" placeholder="<?= @text('TITLE'); ?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('SLUG'); ?></label>
                    <div class="controls">
                        <input class="span12" type="text" name="slug" value="<?= $publication->slug; ?>" placeholder="<?= @text('SLUG'); ?>" />
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend><?= @text('FIELDS'); ?></legend>
                <?= @service('com://admin/cck.controller.element')->cck_fieldset_id($publication->cck_fieldset_id)->row($publication->id)->table('publications_publications')->getView()->assign('row', $publication)->layout('list')->display(); ?>
            </fieldset>
        </div>
        <div class="span4">
            <fieldset>
                <legend><?= @text('DETAILS'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('START_PUBLISHING'); ?></label>
                    <div class="controls">
                        <?= @helper('behavior.calendar', array('date' => $publication->publish_up === '0000-00-00' ? date('Y-m-d') : $publication->publish_up, 'name' => 'publish_up', 'format'  => '%Y-%m-%d')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('END_PUBLISHING'); ?></label>
                    <div class="controls">
                        <?= @helper('behavior.calendar', array('date' => $publication->publish_down, 'name' => 'publish_down', 'format'  => '%Y-%m-%d')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('PUBLISHED'); ?></label>
                    <div class="controls">
                        <?= @helper('select.booleanlist', array('name' => 'enabled', 'selected' => $publication->enabled)); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('Translated'); ?></label>
                    <div class="controls">
                        <?= @helper('select.booleanlist', array('name' => 'translated', 'selected' => $publication->translated)); ?>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend><?= @text('RELATIONS'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('ARTICLES'); ?></label>
                    <div class="controls">
                        <?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array(
                            'identifier' => 'com://admin/articles.model.articles',
                            'name' => 'articles[]',
                            'attribs' => array('multiple' => true, 'size' => 10, 'class' => 'select2-listbox'),
                            'filter' => array(
                                'layout' => 'article'
                            )
                        )); ?>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</form>