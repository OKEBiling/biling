/*!
 * Okebar v0.1.14
 * http://polonel.com/Okebar
 *
 * Copyright 2018 Chris Brame and other contributors
 * Released under the MIT license
 * https://github.com/polonel/Okebar/blob/master/LICENSE
 */

(function(root, factory) {
    'use strict';

    if (typeof define === 'function' && define.amd) {
        define([], function() {
            return (root.Okebar = factory());
        });
    } else if (typeof module === 'object' && module.exports) {
        module.exports = root.Okebar = factory();
    } else {
        root.Okebar = factory();
    }
})(this, function() {
    var Okebar = {};

    Okebar.current = null;
    var $defaults = {
        text: 'Default Text',
        textColor: '#FFFFFF',
        width: 'auto',
        showAction: true,
        actionText: 'Dismiss',
        actionTextAria: 'Dismiss, Description for Screen Readers',
        alertScreenReader: false,
        actionTextColor: '#4CAF50',
        showSecondButton: false,
        secondButtonText: '',
        secondButtonAria: 'Description for Screen Readers',
        secondButtonTextColor: '#4CAF50',
        backgroundColor: 'rgb(51 51 51)',
        pos: 'bottom-center',
        duration: 5000,
        customClass: '',
        onActionClick: function(element) {
            element.style.opacity = 0;
        },
        onSecondButtonClick: function(element) {},
        onClose: function(element) {}
    };

    Okebar.show = function($options) {
        var options = Extend(true, $defaults, $options);

        if (Okebar.current) {
            Okebar.current.style.opacity = 0;
            setTimeout(
                function() {
                    var $parent = this.parentElement;
                    if ($parent)
                    // possible null if too many/fast Okebars
                        $parent.removeChild(this);
                }.bind(Okebar.current),
                500
            );
        }

        Okebar.Okebar = document.createElement('div');
        Okebar.Okebar.className = 'Okebar-container ' + options.customClass;
        Okebar.Okebar.style.width = options.width;
        var $p = document.createElement('p');
        $p.style.margin = 0;
        $p.style.padding = 0;
        $p.style.color = options.textColor;
        $p.style.fontSize = '15px';
        $p.style.fontWeight = 400;
        $p.style.lineHeight = '1em';
        $p.innerHTML = options.text;
        Okebar.Okebar.appendChild($p);
        Okebar.Okebar.style.background = options.backgroundColor;

        if (options.showSecondButton) {
            var secondButton = document.createElement('button');
            secondButton.className = 'action';
            secondButton.innerHTML = options.secondButtonText;
            secondButton.setAttribute('aria-label', options.secondButtonAria);
            secondButton.style.color = options.secondButtonTextColor;
            secondButton.addEventListener('click', function() {
                options.onSecondButtonClick(Okebar.Okebar);
            });
            Okebar.Okebar.appendChild(secondButton);
        }

        if (options.showAction) {
            var actionButton = document.createElement('button');
            actionButton.className = 'action';
            actionButton.innerHTML = options.actionText;
            actionButton.setAttribute('aria-label', options.actionTextAria);
            actionButton.style.color = options.actionTextColor;
            actionButton.addEventListener('click', function() {
                options.onActionClick(Okebar.Okebar);
            });
            Okebar.Okebar.appendChild(actionButton);
        }

        if (options.duration) {
            setTimeout(
                function() {
                    if (Okebar.current === this) {
                        Okebar.current.style.opacity = 0;
                        // When natural remove event occurs let's move the Okebar to its origins
                        Okebar.current.style.top = '-100px';
                        Okebar.current.style.bottom = '-100px';
                    }
                }.bind(Okebar.Okebar),
                options.duration
            );
        }

        if (options.alertScreenReader) {
           Okebar.Okebar.setAttribute('role', 'alert');
        }

        Okebar.Okebar.addEventListener(
            'transitionend',
            function(event, elapsed) {
                if (event.propertyName === 'opacity' && this.style.opacity === '0') {
                    if (typeof(options.onClose) === 'function')
                        options.onClose(this);

                    this.parentElement.removeChild(this);
                    if (Okebar.current === this) {
                        Okebar.current = null;
                    }
                }
            }.bind(Okebar.Okebar)
        );

        Okebar.current = Okebar.Okebar;

        document.body.appendChild(Okebar.Okebar);
        var $bottom = getComputedStyle(Okebar.Okebar).bottom;
        var $top = getComputedStyle(Okebar.Okebar).top;
        Okebar.Okebar.style.opacity = 1;
        Okebar.Okebar.className =
            'Okebar-container ' + options.customClass + ' Okebar-pos ' + options.pos;
    };

    Okebar.close = function() {
        if (Okebar.current) {
            Okebar.current.style.opacity = 0;
        }
    };

    var Extend = function() {
        var extended = {};
        var deep = false;
        var i = 0;
        var length = arguments.length;

        if (Object.prototype.toString.call(arguments[0]) === '[object Boolean]') {
            deep = arguments[0];
            i++;
        }

        var merge = function(obj) {
            for (var prop in obj) {
                if (Object.prototype.hasOwnProperty.call(obj, prop)) {
                    if (deep && Object.prototype.toString.call(obj[prop]) === '[object Object]') {
                        extended[prop] = Extend(true, extended[prop], obj[prop]);
                    } else {
                        extended[prop] = obj[prop];
                    }
                }
            }
        };

        for (; i < length; i++) {
            var obj = arguments[i];
            merge(obj);
        }

        return extended;
    };

    return Okebar;
});
