<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>



            <div id="searchForm">
                <form method="POST">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-2gis.png">

                    <input type="text"  name="search"
                           id="searchInput"  autofocus  placeholder="Введите организацию либо адрес"
                           maxlength="500"  >

                     <input type="submit" value="Поиск" id="searchSubmit">

                </form>
            </div>

            <div id="map"> </div>





                <div id="card">
                    <div id="organization">
                        <h2 class="font2">Организации</h2>

                           <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png" class="close">
                    </div>
                    <div id="cardField ">

                    </div>

                </div>







