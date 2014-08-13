<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>



            <div id="formS">
                <form method="POST">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-2gis.png">

                    <input type="text"  name="search"       id="search"  autofocus  placeholder="Введите организацию либо адрес"   maxlength="500"  >

                    <a href="javascript:hidediv('test_div');">  <input type="button" value="Поиск" id="submit"  class="skrPokazat">  </a>

                </form>
            </div>

            <div id="map"> </div>



            <div id="test_div" style="display:none;">

                <div id="carta" class="carta">
                    <div id="org">
                        <h2 class="font2">Организации</h2>

                        <a href="javascript:closer('test_div');">   <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/cross.png" class="close"></a>
                    </div>
                    <div id="baza">
                        <div id="minCarta"></div>
                    </div>

                </div>
            </div>

            <script>
                function hidediv(get_id){
                    div=document.getElementById(get_id);
                    if(div.style.display !== "block") div.style.display = "block";

                }
            </script>


<script>
    function closer(get_id){
        div=document.getElementById(get_id);
        if(div.style.display !== "none") div.style.display = "none";

    }
</script>