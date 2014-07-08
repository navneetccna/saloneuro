<div id="adminMessage">
    <?php echo ViewMessage::renderMessages(); ?>
</div>
<h1>Online Quotation - Edit info</h1>
<form method="post" action="<?php echo URL::base(); ?>admin/quotation/editinfo">
    <?php foreach ($minfo as $info): ?>
    <div style="margin: 20px 10px;">
        <input type="hidden" name="nm[]" value="<?php echo $info->name; ?>" />
        <h2><?php echo $info->title; ?></h2>
        <textarea class="info" id="<?php echo $info->name; ?>" name="<?php echo $info->name; ?>"><?php echo $info->info; ?></textarea>
    </div>
    <?php endforeach; ?>
    <input type="submit" value="Save" class="submit" />
</form>
<script type="text/javascript">
    jQuery(document).ready(function(){
        var editor1 = CKEDITOR.replace('varnish',
        {
            uiColor : 'orange',
            language: 'en'
        });
        CKFinder.setupCKEditor( editor1, '/js/ckeditor/ckfinder/' );
        var editor2 = CKEDITOR.replace('statining',
        {
            uiColor : 'orange',
            language: 'en'
        });
         CKFinder.setupCKEditor( editor2, '/js/ckeditor/ckfinder/' );
        var editor3 = CKEDITOR.replace('liftremova',
        {
            uiColor : 'orange',
            language: 'en'
        });
         CKFinder.setupCKEditor( editor3, '/js/ckeditor/ckfinder/' );
        var editor4 = CKEDITOR.replace('gapfilling',
        {
            uiColor : 'orange',
            language: 'en'
        });
         CKFinder.setupCKEditor( editor4, '/js/ckeditor/ckfinder/' );
        var editor5 = CKEDITOR.replace('widegapfil',
        {
            uiColor : 'orange',
            language: 'en'
        });
        CKFinder.setupCKEditor( editor5, '/js/ckeditor/ckfinder/' );
        var editor6 = CKEDITOR.replace('bitumenbb',
        {
            uiColor : 'orange',
            language: 'en'
        });
         CKFinder.setupCKEditor( editor6, '/js/ckeditor/ckfinder/' );
        
    });
</script>