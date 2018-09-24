import './../css-dev/main.scss';
import jQuery from 'jquery';
import cssVars from './cssVars';
import {browserSupportCssVariables} from './utils';

'use strict';

/*if (!browserSupportCssVariables()) {
    cssVars(); // css variables polyfill for IE9+
}*/

(function ($) {
    $('.crdm-cards article .wp-show-posts-inner').addClass('widget');

})(jQuery);