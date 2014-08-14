<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>



            <div id="searchForm">
                <form method="POST">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-2gis.png " class="r">

                    <input type="text"  name="search"
                           id="searchInput"  autofocus  placeholder="Введите организацию либо адрес"
                           maxlength="500"  >

                     <input type="submit" value="Поиск" id="searchSubmit">

                </form>
            </div>

            <div id="map"> </div>

                <div id="card">
                    <div id="organization">
                        <h2 class="font2" >Организации</h2 >

                           <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png" class="close">
                    </div>
                    <div id="cardField">
                    </div>

                </div>


<div id="cardOpen">
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png" class="close1">
    <p class="font2"> Эвалар, сеть аптек</p>
    <p>Скидка 20% в выходные на всю продукцию компании «Эвалар»!


    <p class="font1">Имеются противопоказания, необходимо ознакомиться с инструкцией по применению.</p>

    <a href="">9 Гвардейской Дивизии, 25</a>
    <p class="font1">1 этаж;</p>

    <p>
        Ежедневно 08:00–22:00</p><p class="font1">
        Открыто</p><p>
        8-800-200-5Посмотреть телефон</p>
    <p><a href="evalar.ru">evalar.ru</a></p>

    <p>(383) 356-1Посмотреть телефон
    </p>
    <p>
    <ul>
        <li>Наличный расчет</li> <li>Visa</li><li> MasterCard</li>
    </p> <a href=""><p >Аптеки</p></a>


</div>






