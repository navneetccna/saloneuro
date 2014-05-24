<script type="text/javascript" src="/js/ckeditor/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>
<div class="inner-content">
    <div class="widget-content" align="center">

        <div class="category-toggle">
            <div class="span4" style="float: none !important; width:100%; margin-left:0px ">
                <div class="widget">
                    <form class="form-horizontal" action="/admin/productscat/edit/<?php echo $productscat->id; ?>"
                          method="POST" enctype="multipart/form-data">
                        <div class="widget-header">
                            <h5>Новый:</h5>
                        </div>
                        <div class="widget-content no-padding">
                            <div class="form-row">
                                <label class="field-name" for="standard">Наименование:</label>

                                <div class="field">
                                    <input type="text" class="input-large name-edit" name="name"
                                           style="float: left;width: 100%;" value="<?php echo $productscat->name; ?>"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="field-name" for="standard">Title (мета тэг):</label>
                                <div class="field">
                                    <input type="text" class="input-large name-edit" name="title_meta" style="float: left;width: 100%;" value="<?php echo $productscat->title; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="field-name" for="standard">Keywords (мета тэг):</label>
                                <div class="field">
                                    <input type="text" class="input-large name-edit" name="keywords" style="float: left;width: 100%;" value="<?php echo $productscat->keywords; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="field-name" for="standard">Description (мета тэг):</label>
                                <div class="field">
                                    <input type="text" class="input-large name-edit" name="description" style="float: left;width: 100%;" value="<?php echo $productscat->description; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="field-name" for="standard">Текст:</label>
                                <div class="field">
                                    <textarea name="content" id="add-answer" class="input-large name-edit"><?php echo $productscat->content; ?></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="field-name" for="standard">Выводить массажные опции:</label>

                                <div class="field" style="text-align: left;">
                                    <input type="checkbox" name="massage_on"
                                           class="uniform" <?php if ($productscat->massage_on == 'on') {
                                        echo 'checked';
                                    } ?>/>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="field-name" for="standard">Выводить комплектацию:</label>

                                <div class="field" style="text-align: left;">
                                    <input type="checkbox" name="grade_on"
                                           class="uniform" <?php if ($productscat->grade_on == 'on') {
                                        echo 'checked';
                                    } ?>/>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="field-name" for="standard">Изображение категории:</label>

                                <div class="field">
                                    <input type="file" name="image"/>
                                    <?php if ($productscat->image != '') { ?>
                                        <img src="<?php echo $productscat->image; ?>" width="200"/>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="field-name" for="standard">Тип товаров в категории (если ванны):</label>
                                <div class="field" style="text-align:left;">
                                    <select name="type" class="uniform">
                                        <option value="" <?php if($productscat->type=='') echo 'selected'; ?>></option>
                                        <option value="acrylic" <?php if($productscat->type=='acrylic') echo 'selected'; ?>>Массажные опции скрыты, гидромассажная опция не выбрана</option>
                                        <option value="massage" <?php if($productscat->type=='massage') echo 'selected'; ?>>Массажные опции раскрыты, гидромассажная опция выбрана</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="field-name" for="standard">Тип (для фильтров):</label>

                                <div class="field" style="text-align: left;">
                                    <select class="form-control uniform" name="type_filter">
                                        <option value="bath" <?php if($productscat->type_filter=='bath') echo 'selected'; ?>>Ванна</option>
                                        <option value="accessory" <?php if($productscat->type_filter=='accessory') echo 'selected'; ?>>Аксессуар</option>
                                        <option value="shower" <?php if($productscat->type_filter=='shower') echo 'selected'; ?>>Душевая Кабина</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="field-name" for="standard">Порядок:</label>

                                <div class="field">
                                    <input type="text" class="input-large name-edit" name="order"
                                           style="float: left;width: 100%;" value="<?php echo $productscat->order; ?>">
                                </div>
                            </div>
                            <br/>
                            <input type="submit" class="button button-blue small-button margintop18 marginleft128"
                                   value="Добавить">
                            <br/>
                            <br/>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function() {
        var editor = CKEDITOR.replace('add-answer',
            {
                uiColor : 'lightgrey',
                language: 'en'
            });
        CKFinder.setupCKEditor( editor, '/js/ckeditor/ckfinder/' );
    });
</script>
