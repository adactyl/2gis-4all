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
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/card.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://requirejs.org/docs/release/2.1.14/minified/require.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/start.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/helpers.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/event_handlers.js"></script>


    <script src="http://maps.api.2gis.ru/2.0/loader.js?pkg=full" data-id="dgLoader"></script>
    <script type="text/javascript">
    var map, markers, context;
    context = new Object();
    DG.then(function () {
    map = DG.map('map', {
            "center": [55.00,82.94],
            "zoom": 12,
            "fullscreenControl": false,
            "zoomControl": false
        }
    );
        DG.control.zoom({position:'topright'}).addTo(map);
    markers = DG.featureGroup();
    //DG.control.location({position: 'bottomright'}).addTo(map);
    DG.control.scale().addTo(map);
    //DG.control.Fullscreen().removeFrom(map);
    //DG.control.Zoom().setPosition('topright');
    //DG.control.ruler({position: 'bottomleft'}).addTo(map);
    });
    </script>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<?php echo $content; ?>
</body>
</html>
