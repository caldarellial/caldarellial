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
		<section ng-app="ACClient" ng-controller="ACController" layout-fill>
            <span class="full-back" ng-style="((activeProject && activeTab=='home')?activeFullBackStyle:fullBackStyle)"></span>
            <span class="header-back" ng-style="(activeProject?fullBackStyle:false)"></span>
            <div class="header">
                <div class="content">
                    <p class="header-text">Hello.</p>
                    <div class="header-nav">
                        <p class="header-nav-entry float-left" ng-click="setActiveTab('home');" ng-class="{'active':(activeTab=='home')}">Home</p>
                        <p class="header-nav-entry float-left" ng-click="setActiveTab('about');" ng-class="{'active':(activeTab=='about')}">About</p>
                        <a class="header-nav-entry float-left" target="_blank" href="resume.pdf">Resume</a>
                    </div>
                    <span class="clearfix"></span>
                </div>
            </div>
            <div class="content body-content">
                <p class="flavor col-sm-12 col-md-8">My name is Albert. I love to make things.</p>
                <div class="projects-container" ng-hide="activeTab=='about'">
                    <div class="row">
                        <div class="col-sm-12 col-md-6" ng-if="projects" ng-repeat="project in (projects | filter:displayProject)">
                            <div class="project-square" ng-mouseover="isHovered=true;" ng-mouseleave="isHovered=false;" ng-click="selectProject(project);" ng-style="(activeTab=='home')?(activeProject?activeProjectStyle:project.projectStyle):(buildAnimatedProjectStyle(project,$index))">
                                <div class="project-cover" ng-style="project.projectStyle" ng-show="isHovered && !activeProject">
                                    <div class="project-overlay-text">
                                        <p class="project-title">{{project.title}}</p>
                                        <p class="project-subtitle">{{project.subtitle}}</p>
                                    </div>
                                </div>
                                <img class="project-image" src="img/{{(activeProject)?project.image_active:project.image_default}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 project-content" ng-show="activeProject">
                            <p class="project-content-title">{{activeProject.title}}</p>
                            <p class="project-content-subtitle">{{activeProject.subtitle}}</p>
                            <a class="project-content-url" target="_blank" ng-href="{{activeProject.url}}">{{activeProject.url}}</a>
                            <p class="project-content-description">{{activeProject.description}}</p>
                        </div>
                    </div>
                </div>
                <div class="about-container" ng-hide="activeTab=='home'">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="project-square">
                                <img class="project-image" src="img/about_ac.png">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 about-content">
                            <p class="about-content-description">Hello! My name is Albert Caldarelli. I'm a senior at Cornell University studying Information Science, and will be continuing
                            my studies until December of 2019 to complete a Master of Professional Studies.</p>
                        </div>
                    </div>
                </div>
            </div>
		</section>

		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular-sanitize.js" type="text/javascript"></script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
		
	
		<script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.4/angular-material.min.js"></script>
        <script src="js/angular-animate.js"></script>
		
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