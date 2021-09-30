/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
require('./Index');
require('./commons/Dashboard');


require('./components/Landing/homeLogin');
require('./components/Landing/homeRegister');

require('./components/Auth/StudentLogin');
require('./components/Auth/SupervisorLogin');
require('./components/Auth/CoordinatorLogin');
require('./components/Auth/AdminLogin');

require('./components/Auth/StudentRegister');
require('./components/Auth/SupervisorRegister');
require('./components/Auth/CoordinatorRegister');

/**
 * After requiring bootstrap we can not add our socket io here
 */

 require('./client-socket.js');