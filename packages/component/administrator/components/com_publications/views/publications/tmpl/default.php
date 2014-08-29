<? defined('KOOWA') or die; ?>

<?= @helper('behavior.mootools'); ?>

<script src="media://lib_koowa/js/koowa.js" />

<div class="row-fluid">
    <form action="" method="get" class="-koowa-grid" data-toolbar=".toolbar-list">
        <div class="btn-toolbar" id="filter-bar">
            <div class="filter-search btn-group pull-left">
                <input type="text" value="<?= $state->search; ?>" placeholder="Search" id="filter_search" name="search" style="margin-bottom: 0;">
            </div>
            <div class="btn-group pull-left hidden-phone">
                <button title="" class="btn hasTooltip" type="submit" data-original-title="Search"><i class="icon-search"></i></button>
                <button onclick="document.id('filter_search').value='';this.form.submit();" title="" class="btn hasTooltip" type="button" data-original-title="Clear"><i class="icon-remove"></i></button>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="text-align: center;" width="1">
                        <?= @helper('grid.checkall')?>
                    </th>
                    <th>
                        <?= @helper('grid.sort', array('column' => 'title', 'title' => @text('TITLE'))); ?>
                    </th>
                    <th>
                        <?= @helper('grid.sort', array('column' => 'enabled', 'title' => @text('PUBLISHED'))); ?>
                    </th>
                    <? if($publications->isTranslatable()) : ?>
                        <th>
                            <?= @text('Translations') ?>
                        </th>
                    <? endif; ?>
                    <th>
                        <?= @text('Owner'); ?>
                    </th>
                    <th>
                        <?= @helper('grid.sort', array('column' => 'created_on', 'title' => @text('Date'))); ?>
                    </th>
                    <th>
                        <?= @helper('grid.sort', array('column' => 'ordering', 'title' => @text('ORDER'))); ?>
                    </th>
                    <th>
                        <?= @helper('grid.sort', array('column' => 'id', 'title' => @text('ID'))); ?>
                    </th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <td colspan="9">
                        <?= @helper('paginator.pagination', array('total' => $total)) ?>
                    </td>
                </tr>
            </tfoot>

            <tbody>
                <? foreach ($publications as $publication) : ?>
                    <tr>
                        <td style="text-align: center;">
                            <?= @helper('grid.checkbox', array('row' => $publication))?>
                        </td>
                        <td>
                            <a href="<?= @route('view=publication&id='.$publication->id); ?>">
                                <?= @escape($publication->title); ?>
                            </a>
                        </td>
                        <td>
                            <?= @helper('grid.enable', array('row' => $publication)); ?>
                        </td>
                        <? if($publication->isTranslatable()) : ?>
                            <td>
                                <?= @helper('com://admin/translations.template.helper.language.translations', array(
                                    'row' => $publication->id,
                                    'table' => $publication->getTable()->getName()
                                )); ?>
                            </td>
                        <? endif; ?>
                        <td>
                            <?= $publication->created_by_name; ?>
                        </td>
                        <td>
                            <?= @helper('date.humanize', array('date' => $publication->created_on)) ?>
                        </td>
                        <td>
                            <?= @helper('grid.order', array('row' => $publication, 'total' => $total)); ?>
                        </td>
                        <td>
                            <?= $publication->id; ?>
                        </td>
                    </tr>
                <? endforeach; ?>

                <? if (!count($publications)) : ?>
                    <tr>
                        <td colspan="9" align="center" style="text-align: center;">
                            <?= @text('PUBLICATIONS_NO_ITEMS') ?>
                        </td>
                    </tr>
                <? endif; ?>
            </tbody>
        </table>
    </form>
</div>