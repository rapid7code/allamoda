var VNTourism = window.VNTourism || {};
(function ($) {
    VNTourism.HomePage = {
        init: function () {
            this.instagramIndex();
            this.discoverMore();
            this.welcomePopup();
        }, instagramIndex: function () {
            var json_data = {};
            json_data.access_token = '';
            json_data.action = 'instagram';
            var data = {insta: 'index'};
            json_data.data = data;
            $.ajax({
                url: '/api/instagram',
                type: 'POST',
                dataType: 'json',
                data: {json_data: JSON.stringify(json_data)},
                beforeSend: function () {
                },
                success: function (response) {
                    $('.insgram-content').html(response);
                    VNTourism.HomePage.instagramLoadmore();
                },
                error: function (error) {
                }
            });
        }, instagramLoadmore: function () {
            $('#btn-instagram').on('click', function () {
                $('#btn-instagram').hide().after('<i class="fa fa-spin fa-spinner" style="font-size: 32px; line-height: 50px; color: #a5190e;"></i>');
                var json_data = {};
                json_data.access_token = '';
                json_data.action = 'instagram';
                var next_url = $('#btn-instagram').attr('data-next-url');
                var display_count = $('#btn-instagram').attr('data-count');
                var current_page = $('#btn-instagram').attr('data-current-page');
                var data = {
                    insta: 'index',
                    next_url: next_url,
                    display_count: display_count,
                    current_page: current_page
                };
                json_data.data = data;
                $.ajax({
                    url: '/api/instagram',
                    type: 'POST',
                    dataType: 'json',
                    data: {json_data: JSON.stringify(json_data)},
                    beforeSend: function () {
                    },
                    success: function (response) {
                        console.log(response.list);
                        $('.instagram-wrap').remove();
                        $('.insgram-content').append(response);
                        VNTourism.HomePage.instagramLoadmore();
                        $('#btn-instagram').show().next().remove();
                    },
                    error: function (error) {
                    }
                });
            });
        }, discoverMore: function () {
            var json_data = '';
            $.ajax({
                url: '/api/discover',
                type: 'POST',
                dataType: 'json',
                data: {json_data: JSON.stringify(json_data)},
                beforeSend: function () {
                },
                success: function (response) {
                    console.log(response);
                },
                error: function (error) {
                }
            });
        }, welcomePopup: function () {
            var homewelcome = $('#home-welcome');
            var welcome = Common.GetCookie('welcome');
            if (welcome == '' && (homewelcome.length > 0)) {
                Common.SetCookies('welcome', true, 3600);
                $('#modal-home-welcome').modal('show');
            }
        }
    };
})(jQuery);
$(document).ready(function () {
    VNTourism.HomePage.init();
});