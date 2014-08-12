<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div id="map">
    <div id="formS">
        <form method="POST">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-2gis.png">
            <input type="text" pattern="^[А-Яа-яЁё\s]+$" name="search" id="search"  autofocus placeholder="Введите организацию" >
            <input type="submit" value="Поиск" id="submit" >
        </form>
    </div>
</div>

<div id="carta" class="carta">
    <div id="org">
        <h2>Организации</h2>
    </div>
    <div id="baza">
    </div>
</div>
