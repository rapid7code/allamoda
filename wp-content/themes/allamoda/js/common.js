var Common = window.Common || {};
var facebook_app_id = '345432578955234';
(function ($) {
    Common = {
        init: function () {
            this.facebookShare();
        }, isValidEmail: function (strEmail) {
            validRegExp = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
            if (strEmail.search(validRegExp) == -1) {
                return false;
            }
            return true;
        }, isValidPhone: function (str) {
            str = str.replace(/([- ])/g, '');
            validRegExp = /^[0-9]{8,}$/i;
            if (str.search(validRegExp) == -1) {
                return false;
            }
            return true;
        }, appendAlertErrorContent: function (popup_id, class2, title, message) {
            $('#' + popup_id).find('.' + class2).html(message);
        }, facebookLogin: function (callback) {
            FB.login(function (response) {
                if (response.authResponse) {
                    var access_token = response.authResponse.accessToken;
                    FB.api('/me?fields=id,name,email', function (response) {
                        if (typeof callback === 'function') {
                            callback(response);
                        }
                    });
                }
            }, {scope: 'public_profile,email'});
        }, facebookShare: function(){
            $(document).on('click', '.fb-custom-feed', function (e) {
                e.preventDefault();
                var $this = $(this);
                var title = $this.data('title');
                var link = $this.data('link');
                if (!link) {
                    link = window.location.href;
                }
                FB.ui({
                    "method": "feed",
                    "name": title,
                    "link": link,
                    "picture": $this.data('picture'),
                    "description": $this.data('description')
                }, function (response) {
                });
            });
        }, SetCookies: function (cname, cvalue, exdays) {
            if (exdays != '') {
                var d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ';path=/';
            } else {
                document.cookie = cname + "=" + cvalue + ";expires=0;path=/";
            }
        }, GetCookie: function (cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ')c = c.substring(1);
                if (c.indexOf(name) == 0)return c.substring(name.length, c.length);
            }
            return "";
        }
    }
})(jQuery);
$(document).ready(function () {
    Common.init();
    window.fbAsyncInit = function () {
        FB.init({appId: facebook_app_id, oauth: true, status: true, cookie: true, xfbml: true});
    };
    (function () {
        var e = document.createElement('script');
        e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
        e.async = true;
        document.getElementById('fb-root').appendChild(e);
    }());
});