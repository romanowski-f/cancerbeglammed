module.exports = function(grunt) {
	grunt.initConfig({
		purifycss: {
			options: {},
			target: {
				src: ['*.php', 'templates/*.php', 'template-parts/*.php', 'inc/*.php'],
				css: ['style.css'],
				dest: 'assets/css/purestyles.css'
			},
		},
	});

	grunt.loadNpmTasks('grunt-purifycss');
};
