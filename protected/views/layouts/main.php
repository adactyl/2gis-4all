<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="ru">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://maps.api.2gis.ru/2.0/loader.js?pkg=full" data-id="dgLoader"></script>
    <script type="text/javascript">
    var map;

    DG.then(function () {
    map = DG.map('map', {
    "center": [55.03,82.92],
    "zoom": 15
    });

    DG.control.location({position: 'bottomright'}).addTo(map);
    DG.control.scale().addTo(map);
    DG.control.ruler({position: 'bottomleft'}).addTo(map);
    DG.marker([54.98, 82.89]).addTo(map).bindPopup('Выбрано!');
    });
    </script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/all.js"></script>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<?php echo $content; ?>
</body>
</html>