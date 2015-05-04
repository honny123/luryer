seajs.config({
	// Enable plugins
	plugins : ['shim'],

	// Configure alias
	alias : {
		'jquery' : {
			src : 'vendor/jquery-1.9.1.min.js',
			exports : 'jQuery'
		},
		'underscore': {
			src: 'vendor/underscore-min.js',
			exports: '_'
		},
		'jquery.easing' : {
			src : 'vendor/jquery.easing.min.js',
			deps: ['jquery']
		},
		'jquery.cookie':{
			src:'vendor/jquery.cookie.js',
			deps: ['jquery']
		},
		'jquery.masonry':{
			src:'vendor/jquery.masonry.min.js',
			deps: ['jquery']
		},
		'jquery.form':{
			src:'vendor/jquery.form.js',
			deps: ['jquery']
		},
		'jquery.fancybox':{
			src:'vendor/fancybox/jquery.fancybox.js',
			deps: ['jquery']
		},
		'jquery.sly':{
			src:'vendor/jquery.sly.min.js',
			deps: ['jquery']
		},
		'bootstrap':{
			src:'vendor/bootstrap.min.js',
			deps: ['jquery']
		},
		'klass':{
			src:'vendor/klass.min.js'
		}
	}
});
