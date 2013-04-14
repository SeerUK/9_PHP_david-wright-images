/*!
 * SeerUK - DWright
 * CoreBundle - core.js
 *
 * Copyright 2012 Elliot Wright
 */


;(function( $, window, undefined ) {

    var DWright = function() {
        this.bindEvents();
    };

    /* --- Bindings -------------------------------------*/

    /**
     * Aggregates all of the bind events, to keep the logic seperate
     */
    DWright.prototype.bindEvents = function()
    {
        return this;
    }

    /* --- Create ---------------------------------------*/

    window.DWright = new DWright;

})( jQuery, window );