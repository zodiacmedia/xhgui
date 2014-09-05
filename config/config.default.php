<?php
/**
 * Default configuration for Xhgui
 */
return array(
    'debug' => false,
    'mode' => 'development',

    // Can be either mongodb or file.
    /* 
    'save.handler' => 'file',
    'save.handler.filename' => dirname(__DIR__) . '/cache/' . 'xhgui.data.' . microtime(true) . '_' . substr(md5($url), 0, 6),
    */
    'save.handler' => 'mongodb',

    // Needed for file save handler. Beware of file locking. You can adujst this file path 
    // to reduce locking problems (eg uniqid, time ...)
    //'save.handler.filename' => __DIR__.'/../data/xhgui_'.date('Ymd').'.dat',
    'db.host' => 'mongodb://127.0.0.1:27017',
    'db.db' => 'xhprof',

    // Allows you to pass additional options like replicaSet to MongoClient.
    // 'username', 'password' and 'db' (where the user is added)
    'db.options' => array(),
    'templates.path' => dirname(__DIR__) . '/src/templates',
    'date.format' => 'M jS H:i:s',
    'detail.count' => 6,
    'page.limit' => 25,

    // Profile 1 in 100 requests.
    // You can return true to profile every request.
    'profiler.enable' => function() {
        return rand(0, 100) === 42;
    },

    'profiler.simple_url' => function($url) {
        return preg_replace('/\=\d+/', '', $url);
    },

	/* This option will be passed to xhprof_enable() or uprofiler_enable()
	 * See: http://php.net/manual/en/xhprof.constants.php
	 *
	 *
	 * XHPROF_FLAGS_NO_BUILTINS
	 *  Omit built in functions from return
	 *  This can be useful to simplify the output, but there's some value in seeing that you've called strpos() 2000 times
	 *  (disabled on PHP 5.5+ as it causes a segfault)
	 *
	 * XHPROF_FLAGS_CPU or UPROFILER_FLAGS_CPU
	 *  Include CPU profiling information in output
	 *
	 * XHPROF_FLAGS_MEMORY or UPROFILER_FLAGS_MEMORY
	 *  Include Memory profiling information in output
	 *
	 * Use bitwise operators to combine, so XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY to profile CPU and Memory
	 *
	 * For PHP < 5.4 use 
	 * 	'profiler.options' => XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY | XHPROF_FLAGS_NO_BUILTINS
	 */
	'profiler.options' => XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY | XHPROF_FLAGS_NO_BUILTINS

);
