import $ from "jquery";

var homePage = function(){

    // object
    var _ = this;

    // view
    _.$page = $('[data-page="home"]');

    // init
    _.init = function () {
        console.log('init home.js')
    }

    if (_.$page.length) {
        _.init();
    }

};

var pageHome = new homePage();