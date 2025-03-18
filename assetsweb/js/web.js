var base_urls = $('meta[name=base_url]').attr("content");
var base_url = base_urls + '/admin/';
var asset_url = base_urls;
var no_img = base_urls + '/images/profile/no.png';

$("#contactForm").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    if (data.type === 'success') {
        $(this).trigger('reset');
        $(".message").show();
        $(".message").html(data.message);
        $('.message').delay(5000).fadeOut('slow');
    }
});

$(".select-law").select2({
    allowClear: true,
    maximumSelectionLength: 3
});

$(".select-query").select2({
    allowClear: true,
    maximumSelectionLength: 3
});

$(".select-consultant").select2({
    allowClear: true,
    maximumSelectionLength: 3
});

$("#appoitment-book").on("aftersubmit", function (e, data) {
    console.log('fdghghfd')
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $(this).trigger('reset');
        $('html, body').animate({
            scrollTop: $(".message").offset().top
        }, 2000);
        $(".message").show();
        $(".message").html(data.message);
        $('.message').delay(12000).fadeOut('slow');
    }
});

$('#posts-masonry').imagesLoaded(function () {
    $('#posts-masonry').isotope({
        layoutMode: 'masonry',
        transitionDuration: '0.3s'
    });
});

$("#add_comment").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    if (data.type === 'success') {
        $(this).trigger('reset');
        $(".message").show();
        $(".message").html(data.message);
        $('.message').delay(5000).fadeOut('slow');
        var ins = '<li class="comment">'
                                +'<div class="comment-info">'
                                    +'<img class="pull-left hidden-xs img-circle" src="'+ base_urls +'/assetsweb/images/authors/7.jpg" alt="author">'
                                    +'<div class="author-desc">'
                                        +'<div class="author-title">'
                                            +'<strong>'+ data.data.name +'</strong>'
                                            +'<ul class="list-inline pull-right">'
                                                +'<li><a href="#">'+ data.data.dates +'</a>'
                                                +'</li>'
                                            +'</ul>'
                                        +'</div>'
                                        +'<p>'+ data.data.message +'</p>'
                                    +'</div>'
                                +'</div>'
                            +'</li>';
        $(".comment-list").prepend(ins).hide().show('slow');
    }
});

$("#profile-pic-update").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $(".profile-picture").attr('src', base_urls + '/' + data.data);
    }
});

$("#profile-intro-update").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        
    }
});

$("#profile-edu-update").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        
    }
});

$("#pass-update").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        
    }
});

if ($('#editorcon').length) {
    CKEDITOR.replace('editorcon', {
        extraPlugins: 'uicolor,colorbutton'
    });
}

$('.repeaters').repeater({
    show: function () {
        $(this).slideDown();
        $(this).find('.delTime').attr('val', '')
    },
    hide: function (deleteElement) {
        if (confirm('Are you sure you want to delete this element?')) {
            if ($(this).find('.delTime').attr('val')) {
                $.ajax({
                    url: base_url + 'delete_record',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        id: $(this).find('.delTime').attr('val'),
                        table: 'App\\Education',
                        key: 'id',
                        _token: $('meta[name=csrf-token]').attr("content")
                    },
                    success: function (data) {
                        if (data.type === "success") {
                            Lobibox.notify(data.type, {msg: data.message});
                            $(this).slideUp(deleteElement);
                        } else {
                            Lobibox.notify(data.type, {msg: data.message});
                        }
                    },
                    error: function (data) {
                        console.log('unable to send request..');
                    }
                });
            } else {
                $(this).slideUp(deleteElement);
            }
        }
    },
    ready: function (setIndexes) {

    }
});

var chatemail_table = $('.chatemail_table').removeAttr('width').DataTable({
    serverSide: false, columnDefs: [{responsivePriority: 3, targets: 0}, {responsivePriority: 1, targets: 1}, {responsivePriority: 2, targets: -1}],
    ajax: base_urls + '/chatemail_table/' + $('#allote-con').val(),
    "columns": [
        {"data": "sender"},
        {"data": "messages"},
        {"data": "dates"},
        {"data": "view"}
    ],

    dom: 'Bfrtip'
});

$('.chat-select').select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    closeOnSelect: false,
});

$("#email_chat").on('aftersubmit', function (e, data) {
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $("#email-chat").modal('hide');
        chatemail_table.ajax.url(base_urls + "chatemail_table/" + $('#allote-con').val()).load();
    }
});

$(".chatemail_table").on('click', '.view_appointment_email', function () {
    var id = $(this).attr('tag_id');
    var token = $('meta[name=csrf-token]').attr("content");
    $.ajax({
        url: base_url + 'view_appointment_email',
        type: 'post',
        dataType: 'json',
        data: {
            id: id,
            _token: token
        },
        success: function (data) {
            var category = data.data;
            console.log(category)
            $(".modal-title").html(category.subject);
            $(".modal-body").html(category.message);
            var fil = '';
            $.each(category.file, function (index, daata) {
                fil += '<div class="col-lg-2"><div class="card radius-15 bg-white"><div class="card-body">'
                        + '<div class="d-flex align-items-center gap-2"><div class="fm-file-box bg-light-info text-info"><i class="bx bx-paperclip"></i></div>'
                        + '<div class=""><h6 class="mb-0">' + daata.extra + '</h6><a target="_blank" href="' + base_urls + '/' + daata.attachment + '" class="mb-0">Download</a></div></div></div></div></div>';
            })
            $(".modal-footer-p").html(fil);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});