<?php include_once("setup.php"); ?>
    <!--<meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
	<script src='js/moment.min.js'></script>
	<link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome-animation.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo $version; ?>" type="text/css">
	
	</head>
	<body>
		<section ng-app="ACClient" ng-controller="ACController">
            <span class="full-back" ng-style="(activeProject?activeFullBackStyle:fullBackStyle)"></span>
            <span class="header-back"></span>
            <div class="header">
                <div class="content">
                    <p class="header-text">Hello.</p>
                    <div class="header-nav">
                        <a class="header-nav-entry" target="_blank" href="resume.pdf">Resume</a>
                    </div>
                    <span class="clearfix"></span>
                </div>
            </div>
            <div class="content body-content">
                <p class="flavor col-sm-12 col-md-6">My name is Albert, and I create.</p>
                <div class="projects-container">
                    <div ng-if="projects" ng-click="selectProject(project);" class="project-square" ng-repeat="project in projects" ng-style="(activeProject?activeProjectStyle:project.projectStyle)"></div>
                </div>
            </div>
		</section>

		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular-sanitize.js" type="text/javascript"></script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
		
	
		<script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.4/angular-material.min.js"></script>
		
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
		<script src="js/helpers.js"></script>
        <script src="js/csv.js"></script>
		
		<script>
			var apiUrl = "<?php echo API_LOCATION; ?>";
            var currentVersion = "<?php echo $version ?>";
		</script>
        
		<script src="js/contextMenu.js?v=<?php echo $version ?>"></script>
		
		<script src="js/app/util.js?v=<?php echo $version ?>"></script>
		<script src="js/app/app.js?v=<?php echo $version ?>"></script>
	</body>
</html>