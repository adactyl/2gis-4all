<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>



            <div id="formS">
                <form method="POST">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-2gis.png">

                    <input type="text"  name="search"       id="search"  autofocus  placeholder="Введите организацию либо адрес"   maxlength="500"  >

                    <input type="submit" value="Поиск" id="submit"  class="skrPokazat">

                </form>
            </div>

            <div id="map"  >





            </div>

            <a href="javascript:hidediv('test_div');"> <input type="button" value="Скрыть\Показать" id="submit1"> </a>

            <div id="test_div" style="display:block;">

                <div id="carta" class="carta">
                    <div id="org">
                        <h2 class="font2">Организации</h2>
                    </div>
                    <div id="baza">
                        <div id="minCarta">


                        </div>

                    </div>

                </div>






            </div>
            <script>
                function hidediv(get_id){
                    div=document.getElementById(get_id);
                    if(div.style.display !== "block") div.style.display = "block";
                    else div.style.display = "none"
                }
            </script>
