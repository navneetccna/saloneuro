<?php require_once('header.php'); ?>
<?php $currents_url = Request::instance()->uri(); ?>
<?php $pos = strripos($currents_url, '?'); ?>
<?php if ($pos === false) {
    $currents_url_type = '?';
} else {
    $currents_url_type = '&';
} ?>
<?php
function transliterate($string) {
    $roman = array("Sch", "sch", 'Yo', 'Zh', 'Kh', 'Ts', 'Ch', 'Sh', 'Yu', 'ya', 'yo', 'zh', 'kh', 'ts', 'ch', 'sh', 'yu', 'ya', 'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', '', 'Y', '', 'E', 'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', '', 'y', '', 'e', '_');
    $cyrillic = array("Щ", "щ", 'Ё', 'Ж', 'Х', 'Ц', 'Ч', 'Ш', 'Ю', 'я', 'ё', 'ж', 'х', 'ц', 'ч', 'ш', 'ю', 'я', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Ь', 'Ы', 'Ъ', 'Э', 'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'ь', 'ы', 'ъ', 'э', ' ');
    return str_replace($cyrillic, $roman, $string);
}

?>
<div class="catalog">
<?php $city_geo = (array)$city; ?>
<?php $city_geo = $city[0]; ?>
<div class="geocity" style="display:none">
    <?php echo $session_city; ?>
</div>
<div class="darker-stripe blocks-spacer more-space latest-news with-shadows">
    <div class="bread-center">
        <?php echo $breadcrumbs; ?>
    </div>
</div>
<div class="with-borders">
    <div class="oncenter">

    </div>
</div>
<div class="common">
    <div class="container inner-narrow">
        <div class="rightblock">
            <div class="category-right-wrapper catalog-wrapper">
                <div class="wheretobuyblock">
                    <div class="aqua-header">Thermolux</div>
                    <br/>

                    <div class="cities">
                        <div class="cat-info">
                            <?php foreach ($categories as $value) { ?>
                                <?php $current_url = strtolower(FrontHelper::transliterate($value->name)); ?>
                                <a href="/catalog/<?php echo $current_url; ?>">
                                    <div class="address <?php if ($current_url == $current) {
                                        echo 'current';
                                    } ?>"><span><?php echo $value->name; ?></span></div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <br/>
                </div>
                <?php if ($this_category->type_filter == 'bath') { ?>
                    <div class="wheretobuyblock">
                        <div class="aqua-header">Фильтр раздела</div>
                        <hr/>

                        <div class="green-head">Форма ванны</div>
                        <br/>

                        <div class="checkbox" rel="angular">
                            <label style="text-align:left;">
                                <input type="checkbox" class="angular" <?php if ($angular == 'on') {
                                    echo 'checked';
                                } ?>> Угловая ванна
                            </label>
                        </div>
                        <div class="checkbox" rel="rectangular">
                            <label style="text-align:left;">
                                <input type="checkbox" class="rectangular" <?php if ($rectangular == 'on') {
                                    echo 'checked';
                                } ?>> Прямоугольная ванна
                            </label>
                        </div>
                        <div class="checkbox" rel="increased">
                            <label style="text-align:left;">
                                <input type="checkbox" class="increased " <?php if ($increased == 'on') {
                                    echo 'checked';
                                } ?>> Увеличенного объема
                            </label>
                        </div>
                        <br/>

                        <div class="green-head">Размеры ванны</div>
                        <br/>

                        <div>
                            <div class="sizes">
                                Длина
                                <label style="text-align:left;">
                                    <select class="width">
                                        <option value=""></option>
                                        <?php foreach ($widths as $width_tut) { ?>
                                            <option
                                                value="<?php echo $width_tut->width; ?>" <?php if ($width == $width_tut->width) {
                                                echo 'selected';
                                            } ?>><?php echo $width_tut->width; ?></option>
                                        <?php } ?>
                                    </select>
                                </label>
                            </div>
                            <div class="sizes">
                                Ширина
                                <label style="text-align:left;">

                                    <select class="height">
                                        <option value=""></option>
                                        <?php if ($width != '') { ?>
                                            <?php foreach ($heights as $height_this) { ?>
                                                <option
                                                    value="<?php echo $height_this->length; ?>" <?php if ($height == $height_this->length) {
                                                    echo 'selected';
                                                } ?>><?php echo $height_this->length; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <br/>
                        <input type="button" class="green accept-filter" value="Применить"
                               style="margin-bottom:10px;"><br/>
                    </div>
                <?php } ?>

                <?php if ($this_category->type_filter == 'shower') { ?>
                    <div class="wheretobuyblock filter-shower">
                        <div class="aqua-header">Фильтр раздела</div>
                        <hr/>

                        <div class="green-head">Форма</div>
                        <br/>

                        <div class="checkbox" rel="angular">
                            <label style="text-align:left;">
                                <input type="checkbox" class="angular" <?php if ($angular == 'on') {
                                    echo 'checked';
                                } ?>> Угловая Полукруглая
                            </label>
                        </div>
                        <div class="checkbox" rel="rectangular">
                            <label style="text-align:left;">
                                <input type="checkbox" class="rectangular " <?php if ($rectangular == 'on') {
                                    echo 'checked';
                                } ?>> Прямоугольная
                            </label>
                        </div>
                        <div class="checkbox" rel="pentagon">
                            <label style="text-align:left;">
                                <input type="checkbox" class="pentagon " <?php if ($pentagon == 'on') {
                                    echo 'checked';
                                } ?>> Угловая пятиугольная
                            </label>
                        </div>
                        <br/>

                        <div class="green-head">Размеры</div>
                        <br/>

                        <div>
                            <div class="sizes">
                                Длина
                                <label style="text-align:left;">
                                    <select class="width">
                                        <option value=""></option>
                                        <?php foreach ($widths as $width_tut) { ?>
                                            <option
                                                value="<?php echo $width_tut->width; ?>" <?php if ($width == $width_tut->width) {
                                                echo 'selected';
                                            } ?>><?php echo $width_tut->width; ?></option>
                                        <?php } ?>
                                    </select>
                                </label>
                            </div>
                            <div class="sizes">
                                Ширина
                                <label style="text-align:left;">

                                    <select class="length">
                                        <option value=""></option>
                                        <?php if ($width != '') { ?>
                                            <?php foreach ($heights as $height_this) { ?>
                                                <option
                                                    value="<?php echo $height_this->length; ?>" <?php if ($length == $height_this->length) {
                                                    echo 'selected';
                                                } ?>><?php echo $height_this->length; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </label>
                            </div>
                            <div class="sizes">
                                Высота
                                <label style="text-align:left;">

                                    <select class="height">
<!--                                        <option value=""></option>-->
                                        <?php if ($width != '') { ?>
                                                <option
                                                    value="<?php echo $height; ?>" selected><?php echo $height; ?></option>

                                        <?php } ?>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <br/>
                        <input type="button" class="green accept-filter" value="Применить"
                               style="margin-bottom:10px;"><br/>
                    </div>
                <?php } ?>
                <?php if ($this_category->type_filter == 'accessory') { ?>
                    <div class="wheretobuyblock filter-shower">
                        <div class="aqua-header">Фильтр раздела</div>
                        <hr/>

                        <div class="green-head">Тип</div>
                        <br/>

                        <div class="checkbox" rel="blinds">
                            <label style="text-align:left;">
                                <input type="checkbox" class="blinds" <?php if ($blinds == 'on') {
                                    echo 'checked';
                                } ?>> <?php echo ORM::factory('settings')->getSetting('blinds'); ?>
                            </label>
                        </div>
                        <div class="checkbox" rel="mixer">
                            <label style="text-align:left;">
                                <input type="checkbox" class="mixer" <?php if ($mixer == 'on') {
                                    echo 'checked';
                                } ?>> <?php echo ORM::factory('settings')->getSetting('mixer'); ?>
                            </label>
                        </div>
                        <div class="checkbox" rel="sink">
                            <label style="text-align:left;">
                                <input type="checkbox" class="sink " <?php if ($sink == 'on') {
                                    echo 'checked';
                                } ?>> <?php echo ORM::factory('settings')->getSetting('sink'); ?>
                            </label>
                        </div>
                        <div class="checkbox" rel="accessory">
                            <label style="text-align:left;">
                                <input type="checkbox" class="accessory " <?php if ($accessory == 'on') {
                                    echo 'checked';
                                } ?>> <?php echo ORM::factory('settings')->getSetting('accessory'); ?>
                            </label>
                        </div>
                        <div class="checkbox" rel="rod">
                            <label style="text-align:left;">
                                <input type="checkbox" class="rod " <?php if ($rod == 'on') {
                                    echo 'checked';
                                } ?>> <?php echo ORM::factory('settings')->getSetting('rod'); ?>
                            </label>
                        </div>
                        <div class="checkbox" rel="bede">
                            <label style="text-align:left;">
                                <input type="checkbox" class="bede " <?php if ($bede == 'on') {
                                    echo 'checked';
                                } ?>> <?php echo ORM::factory('settings')->getSetting('bede'); ?>
                            </label>
                        </div>
                        <br/>

                        <br/>
                        <input type="button" class="green accept-filter" value="Применить"
                               style="margin-bottom:10px;"><br/>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="width862">
            <?php echo $content; ?>
        </div>
    </div>
</div>
<div class="fancy-address" style="display:none">
    <div id="fancy-body">
        <h2>Где купить?</h2>

        <div class="change-city">
            <select class="change-city-select">
                <?php foreach ($order_cities as $city) { ?>
                    <option value="<?php echo $city->id; ?>"><?php echo $city->city; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="cities-all" style="overflow:auto">
            <?php $count = 1; ?>
            <?php $all_cities = ORM::factory('addresses')->order_by('id', 'desc')->find_all()->as_array(); ?>
            <?php foreach ($all_cities as $value) { ?>
                <div class="city-item rel<?php echo $value->id; ?>" rel="<?php echo $value->id; ?>" style="width:100%">
                    <div class="">
                        <?php if ($value->type == 'address') { ?>
                            &#9679;  &nbsp;&nbsp;<span><?php echo $value->city . ', ' . $value->address; ?></span>
                        <?php } else { ?>
                            <span><img
                                    src="/images/webmarket/savelocale.png"/>&nbsp;&nbsp;<?php echo $value->city . ', (все адреса)'; ?></span>
                        <?php } ?>
                        <i><?php echo $value->phone; ?></i>
                    </div>

                </div>

            <?php } ?>
            <script type="text/javascript">
                jQuery(document).ready(function () {
                    jQuery('.ball').mouseenter(function () {
                        jQuery(this).addClass('active');
                    });
                    jQuery('.ball').mouseleave(function () {
                        jQuery(this).removeClass('active');
                    });
                    jQuery('.ball').click(function () {
                        jQuery('.ball').removeClass('byclick');
                        jQuery(this).addClass('byclick');
                    });
                });
            </script>
        </div>
        <div class="maps">
            <?php //foreach ($all_cities as $value) { ?>
            <!--<div class="map-item rel<?php //echo $value->id; ?>" style="display:none">
                    <?php //echo $value->map; ?>
                </div>-->
            <?php //} ?>
        </div>
    </div>
</div>
<div class="fancy-ways" style="display:none">
    <div id="ways">
        <div class="ways-header">
            <a href="#" class="consult">Онлайн-консультант</a>
        </div>
        <div class="ways-text">
            Задать вопросы с помощью <br/>чата в режиме реального времени
        </div>
        <div class="ways-header order-call">
            <a href="#">Заказать обратный звонок</a>
        </div>
        <div class="ways-text">
            Выберите удобное для звонка<br/> время и мы перезвоним Вам
        </div>
        <div class="ways-header order-link">
            <a href="#">Форма обратной связи</a>
        </div>
        <div class="ways-text">
            Задать вопрос нам <br/> на адрес электронной почты
        </div>
        <div class="ways-header" style="cursor:pointer;">
            <a onclick="window.open('http://lk.mango-office.ru/widget/MTIwNDM0', '_blank', 'width=238,height=350,resizable=no,toolbar=no,menubar=no,location=no,status=no'); return false;">Звонок с сайта</a>
        </div>
        <div class="ways-text">
            Воспользуйтесь бесплатной услугой
        </div>
    </div>
</div>
<div class="fancy-call" style="display:none">
    <form action="/callback/new" id="callback-form" method="POST">
        <div class="resp">
            <h3>Заказать обратный звонок</h3>

            <div class="input-name">
                <input type="text" id="response-name1" class="name_call" name="name" placeholder="Имя" required>
            </div>
            <div class="input-phone">
                <input type="text" id="response-phone1" class="name_phone" name="phone" placeholder="Телефон" required>
            </div>
            <!-- <div class="input-question">
                 <textarea id="response-question" name="response" placeholder="Сообщение..."></textarea>
                 <div class="response-err-question error"></div>
             </div> -->
            <div class="choose-time">
                <font class="form-font">Выбрать время звонка:</font>
            </div>
            <div class="time-container-from">
                <div>
                    <font class="form-font">c</font>
                    <input type="text" name="time_from" id="time_from" value="09:00" class="hasDatepicker" required>
                </div>
                <div>
                    <font class="form-font">до</font>
                    <input type="text" name="time_to" id="time_to" class="input-time"
                           value="17:59" required/></div>
            </div>
            <div class="order-submit">
                <input type="button" class="order-button green ways-call-submit" value="Заказать звонок"
                       style="margin-left:0px">
            </div><br/><br/>
            <div class="ways-header" style="cursor:pointer;text-align:center">
                <a onclick="window.open('http://lk.mango-office.ru/widget/MTIwNDM0', '_blank', 'width=238,height=350,resizable=no,toolbar=no,menubar=no,location=no,status=no'); return false;">Звонок с сайта</a>
            </div>
            <div class="ways-text" style="text-align:center">
                Воспользуйтесь бесплатной услугой
            </div>
        </div>
    </form>
</div>
<div class="fancy-link" style="display:none">
    <form action="/consult/new" id="response-form" method="POST">
        <div class="resp">
            <h3>Консультация</h3>

            <div class="input-name">
                <input type="text" id="response-name" class="link-name" name="name" placeholder="Имя" required>

                <div class="response-err-name error"></div>
            </div>
            <div class="input-email">
                <input type="text" id="response-email" class="link-email" name="email" placeholder="E-mail" required>

                <div class="response-err-email error"></div>
            </div>
            <div class="input-question">
                <textarea id="response-question" class="link-response" name="response"
                          placeholder="Ваш вопрос..." required></textarea>

                <div class="response-err-question error"></div>
            </div>
        </div>
        <br>

        <div class="order-submit">
            <input type="button" class="order-button green ways-call-submit" value="Отправить" style="margin-left:0px;">
        </div>
        <div class="clearboth">&nbsp;</div>
    </form>
</div>

<script type="text/javascript">
function validateEmail(email) {
    var re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
    return re.test(email);
}
jQuery(document).ready(function () {
    jQuery('#response-form').validate();
    jQuery('#callback-form').validate();
    jQuery('.cat-info .address').mouseover(function () {
        jQuery('.cat-info .address').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.cat-info .address .right-cat').remove();
        jQuery(this).find('span').after('<span class="right-cat" style="float:right">      ></span>');
    });
    <?php if ($this_category->type_filter == 'bath') { ?>
    jQuery('.accept-filter').click(function () {
        var angular = jQuery('.angular').prop('checked');
        var rectangular = jQuery('.rectangular').prop('checked');
        var increased = jQuery('.increased').prop('checked');
        var width = jQuery('.width option:selected').val();
        var height = jQuery('.height option:selected').val();
        var resp = [];
        if (angular) {
            resp.push('angular=on');
        }
        if (rectangular) {
            resp.push('rectangular=on');
        }
        if (increased) {
            resp.push('increased=on');
        }
        if ((height != undefined) && (height != '')) {
            resp.push('height=' + height);
        }
        if ((width != undefined) && (width != '')) {
            resp.push('width=' + width);
        }
        var query = resp.join('&');
        <?php if($currents_url_type=='?') { ?>
        window.location = '/<?php echo $currents_url; ?>?<?php echo $order_by; ?>' + query;
        <?php } else { ?>
        window.location = '/<?php echo $currents_url; ?>&<?php echo $order_by; ?>' + query;
        <?php } ?>
    });
    jQuery('.width').change(function () {
        var angular = jQuery('.angular').prop('checked');
        var rectangular = jQuery('.rectangular').prop('checked');
        var increased = jQuery('.increased').prop('checked');
        var value = jQuery(this).val();
        jQuery.post('/index/getsizes', {value: value, angular: angular, rectangular: rectangular, increased: increased}, function (response) {
            var heights = jQuery.parseJSON(response);
            jQuery('.height').html('<option value=""></option>');
            jQuery.each(heights, function (index, key) {
                jQuery('.height').append('<option value="' + key + '">' + key + '</option>');
            });

        });
    });
    jQuery('.wheretobuyblock input[type=checkbox]').change(function () {
        var angular = jQuery('.angular').prop('checked');
        var rectangular = jQuery('.rectangular').prop('checked');
        var increased = jQuery('.increased').prop('checked');
        jQuery.post('/index/getwidths', {angular: angular, rectangular: rectangular, increased: increased}, function (response) {
            console.log(response);
            var widths = jQuery.parseJSON(response);
            jQuery('.width').html('<option value=""></option>');
            jQuery.each(widths, function (index, key) {
                jQuery('.width').append('<option value="' + key + '">' + key + '</option>');
            });

        });
    });
    <?php } ?>

    <?php if ($this_category->type_filter == 'shower') { ?>
    jQuery('.accept-filter').click(function () {
        var angular = jQuery('.angular').prop('checked');
        var semicircular = jQuery('.semicircular').prop('checked');
        var rectangular = jQuery('.rectangular').prop('checked');
        var pentagon = jQuery('.pentagon').prop('checked');
        var width = jQuery('.width option:selected').val();
        var length = jQuery('.length option:selected').val();
        var height = jQuery('.height option:selected').val();
        var resp = [];
        if (angular) {
            resp.push('angular=on');
        }
        if (semicircular) {
            resp.push('semicircular=on');
        }
        if (rectangular) {
            resp.push('rectangular=on');
        }
        if (pentagon) {
            resp.push('pentagon=on');
        }
        if ((height != undefined) && (height != '')) {
            resp.push('height=' + height);
        }
        if ((length != undefined) && (length != '')) {
            resp.push('length=' + length);
        }
        if ((width != undefined) && (width != '')) {
            resp.push('width=' + width);
        }
        var query = resp.join('&');
        <?php if($currents_url_type=='?') { ?>
        window.location = '/<?php echo $currents_url; ?>?<?php echo $order_by; ?>' + query;
        <?php } else { ?>
        window.location = '/<?php echo $currents_url; ?>&<?php echo $order_by; ?>' + query;
        <?php } ?>

    });
    jQuery('.width').change(function () {
        var angular = jQuery('.angular').prop('checked');
        var semicircular = jQuery('.semicircular').prop('checked');
        var rectangular = jQuery('.rectangular').prop('checked');
        var pentagon = jQuery('.pentagon').prop('checked');
        var value = jQuery(this).val();
        jQuery.post('/index/getsizesshowerlength', {value: value, angular: angular, semicircular: semicircular, rectangular: rectangular, pentagon: pentagon}, function (response) {
            var lengths = jQuery.parseJSON(response);
            jQuery('.length').html('<option value=""></option>');
            jQuery('.height').html('<option value=""></option>');
            jQuery.each(lengths, function (index, key) {
                jQuery('.length').append('<option value="' + key + '">' + key + '</option>');
            });

        });
    });
    jQuery('.length').change(function () {
        var angular = jQuery('.angular').prop('checked');
        var semicircular = jQuery('.semicircular').prop('checked');
        var rectangular = jQuery('.rectangular').prop('checked');
        var pentagon = jQuery('.pentagon').prop('checked');
        var value = jQuery(this).val();
        var width = jQuery('.width').val();
        jQuery.post('/index/getsizesshowerheight', {value: value, width: width, angular: angular, semicircular: semicircular, rectangular: rectangular, pentagon: pentagon}, function (response) {
            var heights = jQuery.parseJSON(response);
            jQuery('.height').html('<option value=""></option>');
            jQuery.each(heights, function (index, key) {
                jQuery('.height').append('<option value="' + key + '">' + key + '</option>');
            });

        });
    });
    jQuery('.wheretobuyblock input[type=checkbox]').change(function () {
        var angular = jQuery('.angular').prop('checked');
        var semicircular = jQuery('.semicircular').prop('checked');
        var rectangular = jQuery('.rectangular').prop('checked');
        var pentagon = jQuery('.pentagon').prop('checked');
        jQuery.post('/index/getwidthsshower', {angular: angular, semicircular:semicircular, rectangular: rectangular, pentagon: pentagon}, function (response) {
            console.log(response);
            var widths = jQuery.parseJSON(response);
            jQuery('.width').html('<option value=""></option>');
            jQuery('.length').html('<option value=""></option>');
            jQuery('.height').html('<option value=""></option>');
            jQuery.each(widths, function (index, key) {
                jQuery('.width').append('<option value="' + key + '">' + key + '</option>');
            });

        });
    });
    <?php } ?>

    <?php if ($this_category->type_filter == 'accessory') { ?>
    jQuery('.accept-filter').click(function () {
        var blinds = jQuery('.blinds').prop('checked');
        var sink = jQuery('.sink').prop('checked');
        var mixer = jQuery('.mixer').prop('checked');
        var accessory = jQuery('.accessory').prop('checked');
        var rod = jQuery('.rod').prop('checked');
        var bede = jQuery('.bede').prop('checked');
        var width = jQuery('.width option:selected').val();
        var length = jQuery('.length option:selected').val();
        var height = jQuery('.height option:selected').val();
        var resp = [];
        if (blinds) {
            resp.push('blinds=on');
        }
        if (sink) {
            resp.push('sink=on');
        }
        if (mixer) {
            resp.push('mixer=on');
        }
        if (accessory) {
            resp.push('accessory=on');
        }
        if (rod) {
            resp.push('rod=on');
        }
        if (bede) {
            resp.push('bede=on');
        }
        if ((height != undefined) && (height != '')) {
            resp.push('height=' + height);
        }
        if ((length != undefined) && (length != '')) {
            resp.push('length=' + length);
        }
        if ((width != undefined) && (width != '')) {
            resp.push('width=' + width);
        }
        var query = resp.join('&');
        <?php if($currents_url_type=='?') { ?>
        window.location = '/<?php echo $currents_url; ?>?<?php echo $order_by; ?>' + query;
        <?php } else { ?>
        window.location = '/<?php echo $currents_url; ?>&<?php echo $order_by; ?>' + query;
        <?php } ?>

    });

    <?php } ?>


    jQuery(".fancybox").fancybox({
        'beforeShow': function () {
            var city = jQuery('.geocity').html();
            jQuery('.city-item').each(function(index, value){
                var e = $(this);
                if(e.find('img').length>0) {
                    var id = e.prop('rel');
                    var html = e.clone();
                    e.remove();
                    $('.cities-all').prepend(html);
                }
            });
            if (city != '') {
                jQuery('.change-city-select option').each(function () {
                    if (jQuery.trim(city) == jQuery(this).html()) {
                        jQuery(this).attr('selected', 'selected');
                        var id = jQuery(this).html();
                        changeCity(id);
                    }
                });
                jQuery('.change-city-select :contains("' + city + '")').attr('selected', 'selected');
            }
        },
        'afterShow': function () {
            jQuery('.change-city-select').change(function () {
                jQuery('.map-item').css('display', 'none');
                var id = jQuery(this).children('option:selected').html();
                changeCity(id);
                jQuery.fancybox.update();
            });
            jQuery('.city-item').click(function () {
                jQuery('.maps').html('');
                jQuery('.city-item').removeClass('active');
                jQuery(this).addClass('active');
                var id = jQuery(this).attr('rel');
                jQuery('.map-item').css('display', 'none');
                jQuery.post('/index/getmap', {id: id}, function (response) {
                    var spl = response.split('src="');
                    var scripturl = spl[1].replace('script>', '');
                    var scripturl = scripturl.replace('><', '');
                    var scripturl = scripturl.replace('"', '');
                    var scripturl = scripturl.replace('450/', '450');
                    console.log(scripturl);

                    var script = document.createElement('script');
                    script.type = 'text/javascript';
                    //console.log('//api-maps.yandex.ru/services/constructor/1.0/js/?sid=RpQ9qAI22RJuJi8JLEynmH7pBSmS0jd2&width=750&height=450');
                    //script.src = scripturl;
                    //script.scr = '//api-maps.yandex.ru/services/constructor/1.0/js/?sid=RpQ9qAI22RJuJi8JLEynmH7pBSmS0jd2&width=750&height=450';

                    //script.src = '//api-maps.yandex.ru/services/constructor/1.0/js/?sid=RpQ9qAI22RJuJi8JLEynmH7pBSmS0jd2&width=750&height=450';
                    script.src = scripturl;
                    document.getElementsByClassName('maps')[0].appendChild(script);
                    jQuery('.maps').css('width', '750px');
                    jQuery('.maps').css('height', '450px');
                    jQuery('.maps').css('display', 'block');
                    jQuery.fancybox.update();
//                        $.getScript( "", function( data, textStatus, jqxhr ) {
//                            console.log( data ); // Data returned
//                            console.log( textStatus ); // Success
//                            console.log( jqxhr.status ); // 200
//                            console.log( "Load was performed." );
//                        });

                    //jQuery('.maps').html('<img type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=RpQ9qAI22RJuJi8JLEynmH7pBSmS0jd2&width=750&height=450"></img>');
                });
                jQuery('.map-item.rel' + id).css('display', 'block');
                jQuery.fancybox.update();
            });
        }
    });
    jQuery('.ways-call').fancybox({
        'beforeShow': function () {
            jQuery('.fancybox-wrap').addClass('certif-fancybox');
            jQuery('.consult').click(function () {
                jQuery.fancybox.close();
                jQuery('#sh_button').trigger('click');
            });
            jQuery('.order-call').click(function () {
                jQuery.fancybox.close();
                jQuery.fancybox(jQuery('.fancy-call').html(), {
                    //'content': jQuery(".fancy-call").html(),
                    beforeShow: function () {
                        jQuery('.fancybox-wrap').addClass('certif-fancybox');
                        jQuery('.order-button.green.ways-call-submit').click(function () {
                            var name = jQuery('.fancybox-outer #response-name1').val();
                            var phone = jQuery('.fancybox-outer #response-phone1').val();
                            var time_from = jQuery('#time_from').val();
                            var time_to = jQuery('#time_to').val();
                            var send = '1';
                            if (name == '') {
                                send = 0;
                                jQuery('.fancybox-outer #response-name1').addClass('error');
                            }
                            if (phone == '') {
                                send = 0;
                                jQuery('.fancybox-outer #response-phone1').addClass('error');
                            }
                            if (time_from == '') {
                                send = 0;
                                jQuery('#time_from').addClass('error');
                            }
                            if (time_to == '') {
                                send = 0;
                                jQuery('#time_to').addClass('error');
                            }
                            if (send == '1') {
                                jQuery.post('/callback/new', {name: name, phone: phone, time_from: time_from, time_to: time_to}, function (response) {
                                    if (response == 'success') {
                                        jQuery.fancybox.close();
                                        jQuery.fancybox('<h3 style="width:315px">Ваш запрос успешно отправлен!</h3>');
                                        jQuery.fancybox.update();
                                    }
                                });
                            }
                        });
                    }
                });
            });
            jQuery('.order-link').click(function () {
                jQuery.fancybox.close();
                jQuery.fancybox(jQuery('.fancy-link').html(), {
                    //'content': jQuery(".fancy-call").html(),
                    beforeShow: function () {
                        jQuery('.fancybox-wrap').addClass('certif-fancybox');
                        var nameelem = jQuery('.fancybox-outer .link-name');
                        var emailelem = jQuery('.fancybox-outer .link-email');
                        var responseelem = jQuery('.fancybox-outer .link-response');
                        nameelem.keypress(function () {
                            if (nameelem.val() == '') {
                                jQuery(this).addClass('error');
                            } else {
                                jQuery(this).removeClass('error');
                            }
                        });
                        emailelem.keypress(function () {
                            if (emailelem.val() == '') {
                                jQuery(this).addClass('error');
                            } else {
                                if (validateEmail(emailelem.val()))
                                    jQuery(this).removeClass('error');
                            }
                        });
                        responseelem.keypress(function () {
                            if (nameelem.val() == '') {
                                jQuery(this).addClass('error');
                            } else {
                                jQuery(this).removeClass('error');
                            }
                        });
                        jQuery('.order-button.green.ways-call-submit').click(function () {
                            var nameelem = jQuery('.fancybox-outer .link-name');
                            var emailelem = jQuery('.fancybox-outer .link-email');
                            var responseelem = jQuery('.fancybox-outer .link-response');
                            var name = nameelem.val();
                            var email = emailelem.val();
                            var response = responseelem.val();

                            var send = '1';
                            if (name == '') {
                                send = 0;
                                jQuery('.fancybox-outer .link-name').addClass('error');
                            }
                            if (email == '') {
                                send = 0;
                                jQuery('.fancybox-outer .link-email').addClass('error');
                            }
                            if (!validateEmail(email)) {
                                send = 0;
                                jQuery('.fancybox-outer .link-email').addClass('error');
                            }
                            if (response == '') {
                                send = 0;
                                jQuery('.fancybox-outer .link-response').addClass('error');
                            }
                            if (send == '1') {
                                jQuery.post('/consult/new', {name: name, email: email, response: response}, function (response) {
                                    console.log(response);
                                    if (response == 'success') {
                                        jQuery.fancybox.close();
                                        jQuery.fancybox('<h3 style="width:315px">Ваш заказ успешно отправлен!</h3>');
                                        jQuery.fancybox.update();
                                    }
                                });
                            }
                        });
                    }
                });
            });
        }
    });

    var city = jQuery('.geocity').html();
    if (city != '') {
        jQuery('.fancy-address-block .change-city-select option').each(function () {
            if (jQuery.trim(city) == jQuery(this).html()) {
                jQuery(this).attr('selected', 'selected');
                var id = jQuery(this).html();
                changeCityBlock(id);
            }
        });
        jQuery('.fancy-address-block .change-city-select :contains("' + city + '")').attr('selected', 'selected');
    }
    jQuery('.fancy-address-block .change-city-select').change(function () {
        jQuery('.fancy-address-block .map-item').css('display', 'none');
        var id = jQuery(this).children('option:selected').html();
        changeCityBlock(id);
    });
    jQuery('.fancy-address-block .city-item').click(function () {
        jQuery('.fancy-address-block .city-item').removeClass('active');
        jQuery(this).addClass('active');
        var id = jQuery(this).attr('rel');
        jQuery('.fancy-address-block .map-item').css('display', 'none');
        jQuery('.fancy-address-block .map-item.rel' + id).css('display', 'block');
        jQuery.fancybox.update();
    });
})
;

function changeCityBlock(city) {

    jQuery('.maps').css('display', 'none');
    jQuery('.fancy-address-block .city-item').css('display', 'none');
    var city = jQuery.trim(city);
    jQuery('.fancy-address-block .city-item span:contains("' + city + ',")').parents().each(function () {
        jQuery(this).css('display', 'block');
    });
    console.log(jQuery('.fancy-address-block span:contains("' + city + '")').html());
    jQuery('.fancy-address-block .city-item span:contains("' + city + ',")').parents().css('display', 'block');
}

function changeCity(city) {

    jQuery('.maps').css('display', 'none');
    jQuery('.city-item').css('display', 'none');
    var city = jQuery.trim(city);
    jQuery('.city-item span:contains("' + city + ',")').parents().each(function () {
        jQuery(this).css('display', 'block');
    });
    console.log(jQuery('span:contains("' + city + '")').html());
    jQuery('.city-item span:contains("' + city + ',")').parents().css('display', 'block');
}
</script>
</div>
<div class="boxed-area blocks-spacer grey-catalog1">
    <div class="container">
        <div class="category-right-wrapper">
            <div class="wheretobuyblock <?php if($session_city=='Санкт-Петербург') echo 'piter'; ?>">
                <?php echo ORM::factory('settings')->getSetting('trouble'); ?>
            </div>
        </div>
        <div class="category-right-wrapper">
            <div class="wheretobuyblock <?php if($session_city=='Санкт-Петербург') echo 'piter'; ?>">
                <div class="aqua-header">Где купить?</div>
                <i class="find-store">найти магазин дилера</i><br/>

                <div class="geo-label">
                    <div class="geo-image">
                        <img src="/images/webmarket/savelocale.png"/>
                    </div>
                    <div class="your-city">
                        Ваш город:
                    </div>
                    <div class="city1">
                        <select class="all_cities" style="width:186px">
                            <?php $all_group_cities = ORM::factory('addresses')->group_by('city')->find_all()->as_array(); ?>
                            <?php foreach ($all_group_cities as $value) { ?>
                                <option
                                    value="<?php echo $value->city; ?>" <?php if ($value->city == $session_city) {
                                    echo 'selected';
                                } ?>><?php echo $value->city; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="cities">
                    <?php $i = 0;

                    foreach ($session_cities as $value) {
                        if ($value->type == 'address') {
                            if ($i % 2 == 0) {
                                ?>
                                <div class="address"><?php echo $value->city . ', ' . $value->address; ?></div>
                            <?php } else { ?>
                                <div
                                    class="blue-address"><?php echo $value->city . ', ' . $value->address; ?></div>
                            <?php
                            }
                            $i++;
                        }
                    } ?>
                </div>
                <div class="other">
                    <a class="fancybox" href="#fancy-body">
                        <input type="button" class="green floatright enter-partner" value="Подробнее...">
                    </a>
                </div>
                <div class="other lightgreytext">
                    <?php if (!isset($link_manufacturer)) {
                        $link_manufacturer = 'http://salonevro.ru/';
                    } ?>
                    <a href="<?php echo $link_manufacturer; ?>">
                        Хочу купить онлайн!
                    </a>
                </div>
            </div>
        </div>
        <div class="category-right-wrapper <?php if($session_city=='Санкт-Петербург') echo 'piter'; ?>">
            <?php echo ORM::factory('settings')->getSetting('callus'); ?>
        </div>

    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.all_cities').change(function () {
            $el = jQuery(this).val();
            jQuery.post('/index/changecity', {city: $el}, function (response) {
                window.location = '<?php echo $_SERVER['REQUEST_URI']; ?>';
            })
        });
    });
</script>
<?php require_once 'footer_catalog.php'; ?>
