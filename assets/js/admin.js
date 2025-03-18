var base_urls = $('meta[name=base_url]').attr("content");
var base_url = base_urls + '/admin/';
var asset_url = base_urls;
var no_img = base_urls + '/images/profile/no.png';

$("#create_blogcategory").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        blogcategory_table.ajax.url(base_url + "blogcategory_table").load();
        $(this).trigger('reset');
        $("#add-new-blogcategory").modal('hide');
    }
});

$("#edit_blogcategory").on('aftersubmit', function (e, data) {
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $("#edit-blogcategory").modal('hide');
        blogcategory_table.ajax.url(base_url + "blogcategory_table").load();
    }
});

$(".blogcategory_table").on('click', '.delete_blogcategory', function () {
    var id = $(this).attr('category_id');
    var table = 'App\\BlogCategory';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }, function (inputValue) {
        if (inputValue) {
            $.ajax({
                url: base_url + 'delete_record',
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    table: table,
                    key: key,
                    message: 'BlogCategory',
                    _token: token
                },
                success: function (data) {
                    if (data.type === "success") {
                        Lobibox.notify(data.type, {msg: data.message});
                        blogcategory_table.ajax.url(base_url + "blogcategory_table").load();
                    } else {
                        Lobibox.notify(data.type, {msg: data.message});
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
});

var blogtag_table = $('.blogtag_table').removeAttr('width').DataTable({
    serverSide: false, columnDefs: [{responsivePriority: 3, targets: 0}, {responsivePriority: 1, targets: 1}, {responsivePriority: 2, targets: -1}],
    ajax: base_url + 'blogtag_table',
    "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        return nRow;
    },
    "columns": [
        {"data": "sr_no"},
        {"data": "tag"},
        {"data": "action"}
    ],

    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            title: 'Category List'
        },
        {
            extend: 'excel',
            title: 'Category List'
        },
        {
            extend: 'pdf',
            title: 'Category List'
        },
        {
            extend: 'print',
            title: 'Category List'
        },
        {
            extend: 'colvis',
            title: 'Category List'
        }
    ]
});

$("#create_blogtag").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        blogtag_table.ajax.url(base_url + "blogtag_table").load();
        $(this).trigger('reset');
        $("#add-new-blogtag").modal('hide');
    }
});

$("#edit_blogtag").on('aftersubmit', function (e, data) {
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $("#edit-blogtag").modal('hide');
        blogtag_table.ajax.url(base_url + "blogtag_table").load();
    }
});

var blogcategory_table = $('.blogcategory_table').removeAttr('width').DataTable({
    serverSide: false, columnDefs: [{responsivePriority: 3, targets: 0}, {responsivePriority: 1, targets: 1}, {responsivePriority: 2, targets: -1}],
    ajax: base_url + 'blogcategory_table',
    "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        var imgLinks = aData['pic'];
        if (imgLinks == '' || imgLinks == null) {
            $('td:eq(1)', nRow).html('<a class="dt_image" href="' + no_img + '" data-fancybox="images" data-caption=""><img src="' + no_img + '" alt="" class="lightbox-thumb img-thumbnail"></a>');
            $('td:eq(1)', nRow).css('text-align', 'center');
        } else {
            $('td:eq(1)', nRow).html('<a class="dt_image" href="' + asset_url + '/' + imgLinks + '" data-fancybox="images" data-caption=""><img src="' + asset_url + '/' + imgLinks + '" alt="" class="lightbox-thumb img-thumbnail"></a>');
            $('td:eq(1)', nRow).css('text-align', 'center');
        }

        return nRow;
    },
    "columns": [
        {"data": "sr_no"},
        {"data": "pic"},
        {"data": "title"},
        {"data": "slug"},
        {"data": "action"}
    ],

    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            title: 'Category List'
        },
        {
            extend: 'excel',
            title: 'Category List'
        },
        {
            extend: 'pdf',
            title: 'Category List'
        },
        {
            extend: 'print',
            title: 'Category List'
        },
        {
            extend: 'colvis',
            title: 'Category List'
        }
    ]
});

var blog_table = $('.blog_table').removeAttr('width').DataTable({
    serverSide: false, columnDefs: [{responsivePriority: 3, targets: 0}, {responsivePriority: 1, targets: 1}, {responsivePriority: 2, targets: -1}],
    ajax: base_url + 'blog_table',
    "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        var imgLinks = aData['pic'];
        if (imgLinks == '' || imgLinks == null) {
            $('td:eq(3)', nRow).html('<a class="dt_image" href="' + no_img + '" data-fancybox="images" data-caption=""><img src="' + no_img + '" alt="" class="lightbox-thumb img-thumbnail"></a>');
            $('td:eq(3)', nRow).css('text-align', 'center');
        } else {
            $('td:eq(3)', nRow).html('<a class="dt_image" href="' + asset_url + '/' + imgLinks + '" data-fancybox="images" data-caption=""><img src="' + asset_url + '/' + imgLinks + '" alt="" class="lightbox-thumb img-thumbnail"></a>');
            $('td:eq(3)', nRow).css('text-align', 'center');
        }

        return nRow;
    },
    "columns": [
        {"data": "sr_no"},
        {"data": "category"},
        {"data": "tag_id"},
        {"data": "pic"},
        {"data": "title"},
        {"data": "content"},
        {"data": "action"}
    ],

    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            title: 'Category List'
        },
        {
            extend: 'excel',
            title: 'Category List'
        },
        {
            extend: 'pdf',
            title: 'Category List'
        },
        {
            extend: 'print',
            title: 'Category List'
        },
        {
            extend: 'colvis',
            title: 'Category List'
        }
    ]
});

$(".blogcategory_table").on('click', '.edit-blogcategory', function () {
    var id = $(this).attr('category_id');
    var table = 'blog_categories';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    $.ajax({
        url: base_url + 'retrieve',
        type: 'post',
        dataType: 'json',
        data: {
            id: id,
            table: table,
            key: key,
            _token: token
        },
        success: function (data) {
            var category = data.data[0];
            $("#category_id").val(category.id);
            $("#category_name").val(category.title);
            $("#ucategory_old").val(category.pic);
            if (category.pic == '' || category.pic == null) {
                $("#ucategory_image").attr('src', no_img);
            } else {
                $("#ucategory_image").attr('src', asset_url + '/' + category.pic);
            }

        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$(".blogtag_table").on('click', '.edit-blogtag', function () {
    var id = $(this).attr('tag_id');
    var table = 'blog_tags';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    $.ajax({
        url: base_url + 'retrieve',
        type: 'post',
        dataType: 'json',
        data: {
            id: id,
            table: table,
            key: key,
            _token: token
        },
        success: function (data) {
            var category = data.data[0];
            $("#tag_id").val(category.id);
            $("#tag_name").val(category.tag);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$(".blogtag_table").on('click', '.delete_blogtag', function () {
    var id = $(this).attr('tag_id');
    var table = 'App\\BlogTag';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }, function (inputValue) {
        if (inputValue) {
            $.ajax({
                url: base_url + 'delete_record',
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    table: table,
                    key: key,
                    message: 'BlogCategory',
                    _token: token
                },
                success: function (data) {
                    if (data.type === "success") {
                        Lobibox.notify(data.type, {msg: data.message});
                        blogtag_table.ajax.url(base_url + "blogtag_table").load();
                    } else {
                        Lobibox.notify(data.type, {msg: data.message});
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
});

$("#create_blog").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $(this).trigger('reset');
        window.location.href = base_url + 'blog';
    }
});

$("#edit_blogss").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $(this).trigger('reset');
        window.location.href = base_url + 'blog';
    }
});

$(".blog_table").on('click', '.delete_blog', function () {
    var id = $(this).attr('tag_id');
    var table = 'App\\Blog';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }, function (inputValue) {
        if (inputValue) {
            $.ajax({
                url: base_url + 'delete_record',
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    table: table,
                    key: key,
                    message: 'Blog',
                    _token: token
                },
                success: function (data) {
                    if (data.type === "success") {
                        Lobibox.notify(data.type, {msg: data.message});
                        blog_table.ajax.url(base_url + "blog_table").load();
                    } else {
                        Lobibox.notify(data.type, {msg: data.message});
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
});

if ($('#editorpok').length) {
    CKEDITOR.replace('editorpok', {
        extraPlugins: 'uicolor,colorbutton'
    });
}

if ($('#editorpokw').length) {
    CKEDITOR.replace('editorpokw', {
        extraPlugins: 'uicolor,colorbutton'
    });
}

if ($('#editorpok11').length) {
    CKEDITOR.replace('editorpok11', {
        extraPlugins: 'uicolor,colorbutton'
    });
}

if ($('#editorpok12').length) {
    CKEDITOR.replace('editorpok12', {
        extraPlugins: 'uicolor,colorbutton'
    });
}

if ($('#editorpok13').length) {
    CKEDITOR.replace('editorpok13', {
        extraPlugins: 'uicolor,colorbutton'
    });
}

if ($('#editorpok14').length) {
    CKEDITOR.replace('editorpok14', {
        extraPlugins: 'uicolor,colorbutton'
    });
}

var slider_table = $('.slider_table').removeAttr('width').DataTable({
    serverSide: false, columnDefs: [{responsivePriority: 3, targets: 0}, {responsivePriority: 1, targets: 1}, {responsivePriority: 2, targets: -1}],
    ajax: base_url + 'slider_table',
    "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        var imgLinks = aData['pic'];
        if (imgLinks == '' || imgLinks == null) {
            $('td:eq(1)', nRow).html('<a class="dt_image" href="' + no_img + '" data-fancybox="images" data-caption=""><img src="' + no_img + '" alt="" class="lightbox-thumb img-thumbnail"></a>');
            $('td:eq(1)', nRow).css('text-align', 'center');
        } else {
            $('td:eq(1)', nRow).html('<a class="dt_image" href="' + asset_url + '/' + imgLinks + '" data-fancybox="images" data-caption=""><img src="' + asset_url + '/' + imgLinks + '" alt="" class="lightbox-thumb img-thumbnail"></a>');
            $('td:eq(1)', nRow).css('text-align', 'center');
        }

        return nRow;
    },
    "columns": [
        {"data": "sr_no"},
        {"data": "pic"},
        {"data": "title"},
        {"data": "action"}
    ],

    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            title: 'Slider List'
        },
        {
            extend: 'excel',
            title: 'Slider List'
        },
        {
            extend: 'pdf',
            title: 'Slider List'
        },
        {
            extend: 'print',
            title: 'Slider List'
        },
        {
            extend: 'colvis',
            title: 'Slider List'
        }
    ]
});

$("#create_slider").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        slider_table.ajax.url(base_url + "slider_table").load();
        $(this).trigger('reset');
        $("#add-new-slider").modal('hide');
    }
});

$("#edit_slider").on('aftersubmit', function (e, data) {
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $("#edit-slider").modal('hide');
        slider_table.ajax.url(base_url + "slider_table").load();
    }
});

$(".slider_table").on('click', '.delete_slider', function () {
    var id = $(this).attr('category_id');
    var table = 'App\\Slider';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }, function (inputValue) {
        if (inputValue) {
            $.ajax({
                url: base_url + 'delete_record',
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    table: table,
                    key: key,
                    _token: token
                },
                success: function (data) {
                    if (data.type === "success") {
                        Lobibox.notify(data.type, {msg: data.message});
                        slider_table.ajax.url(base_url + "slider_table").load();
                    } else {
                        Lobibox.notify(data.type, {msg: data.message});
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
});

$(".slider_table").on('click', '.edit-slider', function () {
    var id = $(this).attr('category_id');
    var table = 'sliders';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    $.ajax({
        url: base_url + 'retrieve',
        type: 'post',
        dataType: 'json',
        data: {
            id: id,
            table: table,
            key: key,
            _token: token
        },
        success: function (data) {
            var category = data.data[0];
            $("#category_id").val(category.id);
            $("#category_name").val(category.title);
            $("#category_link").val(category.link);
            $("#category_content").val(category.content);
            $("#ucategory_old").val(category.pic);
            if (category.pic == '' || category.pic == null) {
                $("#ucategory_image").attr('src', no_img);
            } else {
                $("#ucategory_image").attr('src', asset_url + '/' + category.pic);
            }

        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

var testimonial_table = $('.testimonial_table').removeAttr('width').DataTable({
    serverSide: false, columnDefs: [{responsivePriority: 3, targets: 0}, {responsivePriority: 1, targets: 1}, {responsivePriority: 2, targets: -1}],
    ajax: base_url + 'testimonial_table',
    "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        var imgLinks = aData['pic'];
        if (imgLinks == '' || imgLinks == null) {
            $('td:eq(1)', nRow).html('<a class="dt_image" href="' + no_img + '" data-fancybox="images" data-caption=""><img src="' + no_img + '" alt="" class="lightbox-thumb img-thumbnail"></a>');
            $('td:eq(1)', nRow).css('text-align', 'center');
        } else {
            $('td:eq(1)', nRow).html('<a class="dt_image" href="' + asset_url + '/' + imgLinks + '" data-fancybox="images" data-caption=""><img src="' + asset_url + '/' + imgLinks + '" alt="" class="lightbox-thumb img-thumbnail"></a>');
            $('td:eq(1)', nRow).css('text-align', 'center');
        }

        return nRow;
    },
    "columns": [
        {"data": "sr_no"},
        {"data": "pic"},
        {"data": "name"},
        {"data": "message"},
        {"data": "action"}
    ],

    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            title: 'testimonial List'
        },
        {
            extend: 'excel',
            title: 'testimonial List'
        },
        {
            extend: 'pdf',
            title: 'testimonial List'
        },
        {
            extend: 'print',
            title: 'testimonial List'
        },
        {
            extend: 'colvis',
            title: 'testimonial List'
        }
    ]
});

$("#create_testimonial").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        testimonial_table.ajax.url(base_url + "testimonial_table").load();
        $(this).trigger('reset');
        $("#add-new-testimonial").modal('hide');
    }
});

$("#edit_testimonial").on('aftersubmit', function (e, data) {
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $("#edit-testimonial").modal('hide');
        testimonial_table.ajax.url(base_url + "testimonial_table").load();
    }
});

$(".testimonial_table").on('click', '.delete_testimonial', function () {
    var id = $(this).attr('category_id');
    var table = 'App\\Testimonial';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }, function (inputValue) {
        if (inputValue) {
            $.ajax({
                url: base_url + 'delete_record',
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    table: table,
                    key: key,
                    _token: token
                },
                success: function (data) {
                    if (data.type === "success") {
                        Lobibox.notify(data.type, {msg: data.message});
                        testimonial_table.ajax.url(base_url + "testimonial_table").load();
                    } else {
                        Lobibox.notify(data.type, {msg: data.message});
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
});

$(".testimonial_table").on('click', '.edit-testimonial', function () {
    var id = $(this).attr('category_id');
    var table = 'testimonials';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    $.ajax({
        url: base_url + 'retrieve',
        type: 'post',
        dataType: 'json',
        data: {
            id: id,
            table: table,
            key: key,
            _token: token
        },
        success: function (data) {
            var category = data.data[0];
            $("#testimonial_id").val(category.id);
            $("#testimonial_name").val(category.name);
            $("#customRange2").val(category.subject);
            $("#testimonial_message").val(category.message);
            $("#ucategory_old").val(category.pic);
            if (category.pic == '' || category.pic == null) {
                $("#ucategory_image").attr('src', no_img);
            } else {
                $("#ucategory_image").attr('src', asset_url + '/' + category.pic);
            }

        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

var client_table = $('.client_table').removeAttr('width').DataTable({
    serverSide: false, columnDefs: [{responsivePriority: 3, targets: 0}, {responsivePriority: 1, targets: 1}, {responsivePriority: 2, targets: -1}],
    ajax: base_url + 'client_table',
    "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        var imgLinks = aData['pic'];
        if (imgLinks == '' || imgLinks == null) {
            $('td:eq(1)', nRow).html('<a class="dt_image" href="' + no_img + '" data-fancybox="images" data-caption=""><img src="' + no_img + '" alt="" class="lightbox-thumb img-thumbnail"></a>');
            $('td:eq(1)', nRow).css('text-align', 'center');
        } else {
            $('td:eq(1)', nRow).html('<a class="dt_image" href="' + asset_url + '/' + imgLinks + '" data-fancybox="images" data-caption=""><img src="' + asset_url + '/' + imgLinks + '" alt="" class="lightbox-thumb img-thumbnail"></a>');
            $('td:eq(1)', nRow).css('text-align', 'center');
        }

        return nRow;
    },
    "columns": [
        {"data": "sr_no"},
        {"data": "pic"},
        {"data": "title"},
        {"data": "action"}
    ],

    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            title: 'client List'
        },
        {
            extend: 'excel',
            title: 'client List'
        },
        {
            extend: 'pdf',
            title: 'client List'
        },
        {
            extend: 'print',
            title: 'client List'
        },
        {
            extend: 'colvis',
            title: 'client List'
        }
    ]
});

$("#create_client").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        client_table.ajax.url(base_url + "client_table").load();
        $(this).trigger('reset');
        $("#add-new-client").modal('hide');
    }
});

$("#edit_client").on('aftersubmit', function (e, data) {
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $("#edit-client").modal('hide');
        client_table.ajax.url(base_url + "client_table").load();
    }
});

$(".client_table").on('click', '.delete_client', function () {
    var id = $(this).attr('category_id');
    var table = 'App\\Client';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }, function (inputValue) {
        if (inputValue) {
            $.ajax({
                url: base_url + 'delete_record',
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    table: table,
                    key: key,
                    _token: token
                },
                success: function (data) {
                    if (data.type === "success") {
                        Lobibox.notify(data.type, {msg: data.message});
                        client_table.ajax.url(base_url + "client_table").load();
                    } else {
                        Lobibox.notify(data.type, {msg: data.message});
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
});

$(".client_table").on('click', '.edit-client', function () {
    var id = $(this).attr('category_id');
    var table = 'clients';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    $.ajax({
        url: base_url + 'retrieve',
        type: 'post',
        dataType: 'json',
        data: {
            id: id,
            table: table,
            key: key,
            _token: token
        },
        success: function (data) {
            var category = data.data[0];
            $("#client_id").val(category.id);
            $("#client_name").val(category.title);
            $("#ucategory_old").val(category.pic);
            if (category.pic == '' || category.pic == null) {
                $("#ucategory_image").attr('src', no_img);
            } else {
                $("#ucategory_image").attr('src', asset_url + '/' + category.pic);
            }

        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$("#generalsave").on('aftersubmit', function (e, data) {
    Lobibox.notify(data.type, {msg: data.message});
});

var consultants_table = $('.consultants_table').removeAttr('width').DataTable({
    serverSide: false, columnDefs: [{responsivePriority: 3, targets: 0}, {responsivePriority: 1, targets: 1}, {responsivePriority: 2, targets: -1}],
    ajax: base_url + 'consultants_table',
    "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        var imgLinks = aData['pic'];
        if (imgLinks == '' || imgLinks == null) {
            $('td:eq(1)', nRow).html('<a class="dt_image" href="' + no_img + '" data-fancybox="images" data-caption=""><img src="' + no_img + '" alt="" class="lightbox-thumb img-thumbnail"></a>');
            $('td:eq(1)', nRow).css('text-align', 'center');
        } else {
            $('td:eq(1)', nRow).html('<a class="dt_image" href="' + asset_url + '/' + imgLinks + '" data-fancybox="images" data-caption=""><img src="' + asset_url + '/' + imgLinks + '" alt="" class="lightbox-thumb img-thumbnail"></a>');
            $('td:eq(1)', nRow).css('text-align', 'center');
        }

        return nRow;
    },
    "columns": [
        {"data": "sr_no"},
        {"data": "pic"},
        {"data": "name"},
        {"data": "email"},
        {"data": "extra1"},
        {"data": "action"}
    ],

    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            title: 'consultants List'
        },
        {
            extend: 'excel',
            title: 'consultants List'
        },
        {
            extend: 'pdf',
            title: 'consultants List'
        },
        {
            extend: 'print',
            title: 'consultants List'
        },
        {
            extend: 'colvis',
            title: 'consultants List'
        }
    ]
});

$("#create_consultants").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        consultants_table.ajax.url(base_url + "consultants_table").load();
        $(this).trigger('reset');
        $("#add-new-consultants").modal('hide');
    }
});

$("#edit_consultants").on('aftersubmit', function (e, data) {
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $("#edit-consultants").modal('hide');
        consultants_table.ajax.url(base_url + "consultants_table").load();
    }
});

$(".consultants_table").on('click', '.edit-consultants', function () {
    var id = $(this).attr('category_id');
    var table = 'users';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    $.ajax({
        url: base_url + 'retrieve',
        type: 'post',
        dataType: 'json',
        data: {
            id: id,
            table: table,
            key: key,
            _token: token
        },
        success: function (data) {
            var category = data.data[0];
            $("#consultants_id").val(category.id);
            $("#consultants_name").val(category.name);
            $("#consultants_title").val(category.title);
            $("#consultants_mobile").val(category.extra1);
            $("#consultants_facebook").val(category.facebook);
            $("#consultants_twitter").val(category.twitter);
            $("#consultants_instagram").val(category.instagram);
            $("#consultants_linkedin").val(category.linkedin);
            CKEDITOR.instances['consultants_about'].setData(category.about);
            $("#ucategory_old").val(category.pic);
            if (category.pic == '' || category.pic == null) {
                $("#ucategory_image").attr('src', no_img);
            } else {
                $("#ucategory_image").attr('src', asset_url + '/' + category.pic);
            }

        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

if ($('#editorcon').length) {
    CKEDITOR.replace('editorcon', {
        extraPlugins: 'uicolor,colorbutton',
        height: 100
    });
}

if ($('#consultants_about').length) {
    CKEDITOR.replace('consultants_about', {
        extraPlugins: 'uicolor,colorbutton',
        height: 100
    });
}

var laws_table = $('.laws_table').removeAttr('width').DataTable({
    serverSide: false, columnDefs: [{responsivePriority: 3, targets: 0}, {responsivePriority: 1, targets: 1}, {responsivePriority: 2, targets: -1}],
    ajax: base_url + 'laws_table',
    "columns": [
        {"data": "sr_no"},
        {"data": "title"},
        {"data": "action"}
    ],

    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            title: 'laws List'
        },
        {
            extend: 'excel',
            title: 'laws List'
        },
        {
            extend: 'pdf',
            title: 'laws List'
        },
        {
            extend: 'print',
            title: 'laws List'
        },
        {
            extend: 'colvis',
            title: 'laws List'
        }
    ]
});

$("#create_laws").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        laws_table.ajax.url(base_url + "laws_table").load();
        $(this).trigger('reset');
        $("#add-new-laws").modal('hide');
    }
});

$("#edit_laws").on('aftersubmit', function (e, data) {
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $("#edit-laws").modal('hide');
        laws_table.ajax.url(base_url + "laws_table").load();
    }
});

$(".laws_table").on('click', '.delete_laws', function () {
    var id = $(this).attr('category_id');
    var table = 'App\\Laws';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }, function (inputValue) {
        if (inputValue) {
            $.ajax({
                url: base_url + 'delete_record',
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    table: table,
                    key: key,
                    _token: token
                },
                success: function (data) {
                    if (data.type === "success") {
                        Lobibox.notify(data.type, {msg: data.message});
                        laws_table.ajax.url(base_url + "laws_table").load();
                    } else {
                        Lobibox.notify(data.type, {msg: data.message});
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
});

$(".laws_table").on('click', '.edit-laws', function () {
    var id = $(this).attr('category_id');
    var table = 'laws';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    $.ajax({
        url: base_url + 'retrieve',
        type: 'post',
        dataType: 'json',
        data: {
            id: id,
            table: table,
            key: key,
            _token: token
        },
        success: function (data) {
            var category = data.data[0];
            $("#laws_id").val(category.id);
            $("#laws_title").val(category.title);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

var query_table = $('.query_table').removeAttr('width').DataTable({
    serverSide: false, columnDefs: [{responsivePriority: 3, targets: 0}, {responsivePriority: 1, targets: 1}, {responsivePriority: 2, targets: -1}],
    ajax: base_url + 'query_table',
    "columns": [
        {"data": "sr_no"},
        {"data": "title"},
        {"data": "action"}
    ],

    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            title: 'query List'
        },
        {
            extend: 'excel',
            title: 'query List'
        },
        {
            extend: 'pdf',
            title: 'query List'
        },
        {
            extend: 'print',
            title: 'query List'
        },
        {
            extend: 'colvis',
            title: 'query List'
        }
    ]
});

$("#create_query").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        query_table.ajax.url(base_url + "query_table").load();
        $(this).trigger('reset');
        $("#add-new-query").modal('hide');
    }
});

$("#edit_query").on('aftersubmit', function (e, data) {
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $("#edit-query").modal('hide');
        query_table.ajax.url(base_url + "query_table").load();
    }
});

$(".query_table").on('click', '.delete_query', function () {
    var id = $(this).attr('category_id');
    var table = 'App\\Query';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }, function (inputValue) {
        if (inputValue) {
            $.ajax({
                url: base_url + 'delete_record',
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    table: table,
                    key: key,
                    _token: token
                },
                success: function (data) {
                    if (data.type === "success") {
                        Lobibox.notify(data.type, {msg: data.message});
                        query_table.ajax.url(base_url + "query_table").load();
                    } else {
                        Lobibox.notify(data.type, {msg: data.message});
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
});

$(".query_table").on('click', '.edit-query', function () {
    var id = $(this).attr('category_id');
    var table = 'queries';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    $.ajax({
        url: base_url + 'retrieve',
        type: 'post',
        dataType: 'json',
        data: {
            id: id,
            table: table,
            key: key,
            _token: token
        },
        success: function (data) {
            var category = data.data[0];
            $("#query_id").val(category.id);
            $("#query_title").val(category.title);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

$('#multiple-tag-field').select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    closeOnSelect: false,
});

$('#multiple-tag2-field').select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    closeOnSelect: false,
});

var appointment_table = $('.appointment_table').removeAttr('width').DataTable({
    serverSide: false, columnDefs: [{responsivePriority: 3, targets: 0}, {responsivePriority: 1, targets: 1}, {responsivePriority: 2, targets: -1}],
    ajax: base_url + 'appointment_table',
    "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        var imgLinks = aData['status'];
        if (imgLinks == 1) {
            $('td:eq(6)', nRow).html('<span class="badge rounded-pill bg-primary">Pending</span>');
            $('td:eq(6)', nRow).css('text-align', 'center');
        } else if (imgLinks == 2) {
            $('td:eq(6)', nRow).html('<span class="badge rounded-pill bg-info">Alloted</span>');
            $('td:eq(6)', nRow).css('text-align', 'center');
        } else {
            $('td:eq(6)', nRow).html('<span class="badge rounded-pill bg-success">Resolved</span>');
            $('td:eq(6)', nRow).css('text-align', 'center');
        }

        return nRow;
    },
    "columns": [
        {"data": "sr_no"},
        {"data": "your_name"},
        {"data": "email"},
        {"data": "mobile"},
        {"data": "qtitle"},
        {"data": "ltitle"},
        {"data": "status"},
        {"data": "action"}
    ],

    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            title: 'Appointment List'
        },
        {
            extend: 'excel',
            title: 'Appointment List'
        },
        {
            extend: 'pdf',
            title: 'Appointment List'
        },
        {
            extend: 'print',
            title: 'Appointment List'
        },
        {
            extend: 'colvis',
            title: 'Appointment List'
        }
    ]
});

$("#allote_consultant").on('aftersubmit', function (e, data) {
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $("#allote-consultant").modal('hide');
        $("#allote-consultss").html(data.data.name);
        appointment_table.ajax.url(base_url + "appointment_table").load();
    }
});

$(document).on('click', '#allote-con', function () {
    var id = $(this).attr('pid');
    var table = 'appointments';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    $.ajax({
        url: base_url + 'retrieve',
        type: 'post',
        dataType: 'json',
        data: {
            id: id,
            table: table,
            key: key,
            _token: token
        },
        success: function (data) {
            var category = data.data[0];
            $("#allote-consult").val(category.consultant_id);
        },
        error: function (data) {
            console.log('unable to send request..');
        }
    });
});

var chatemail_table = $('.chatemail_table').removeAttr('width').DataTable({
    serverSide: false, columnDefs: [{responsivePriority: 3, targets: 0}, {responsivePriority: 1, targets: 1}, {responsivePriority: 2, targets: -1}],
    ajax: base_url + 'chatemail_table/' + $('#allote-con').attr('pid'),
    "columns": [
        {"data": "sender"},
        {"data": "messages"},
        {"data": "dates"},
        {"data": "view"}
    ],

    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            title: 'Chat List'
        },
        {
            extend: 'excel',
            title: 'Chat List'
        },
        {
            extend: 'pdf',
            title: 'Chat List'
        },
        {
            extend: 'print',
            title: 'Chat List'
        },
        {
            extend: 'colvis',
            title: 'Chat List'
        }
    ]
});

$("#email_chat").on('aftersubmit', function (e, data) {
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $("#email-chat").modal('hide');
        chatemail_table.ajax.url(base_url + "chatemail_table/" + $('#allote-con').attr('pid')).load();
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

$('.chat-select').select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    closeOnSelect: false,
});

var news_table = $('.news_table').removeAttr('width').DataTable({
    serverSide: false, columnDefs: [{responsivePriority: 3, targets: 0}, {responsivePriority: 1, targets: 1}, {responsivePriority: 2, targets: -1}],
    ajax: base_url + 'news_table',
    "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        var imgLinks = aData['pic'];
        if (imgLinks == '' || imgLinks == null) {
            $('td:eq(1)', nRow).html('<a class="dt_image" href="' + no_img + '" data-fancybox="images" data-caption=""><img src="' + no_img + '" alt="" class="lightbox-thumb img-thumbnail"></a>');
            $('td:eq(1)', nRow).css('text-align', 'center');
        } else {
            $('td:eq(1)', nRow).html('<a class="dt_image" href="' + asset_url + '/' + imgLinks + '" data-fancybox="images" data-caption=""><img src="' + asset_url + '/' + imgLinks + '" alt="" class="lightbox-thumb img-thumbnail"></a>');
            $('td:eq(1)', nRow).css('text-align', 'center');
        }

        return nRow;
    },
    "columns": [
        {"data": "sr_no"},
        {"data": "pic"},
        {"data": "title"},
        {"data": "content"},
        {"data": "action"}
    ],

    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            title: 'News List'
        },
        {
            extend: 'excel',
            title: 'News List'
        },
        {
            extend: 'pdf',
            title: 'News List'
        },
        {
            extend: 'print',
            title: 'News List'
        },
        {
            extend: 'colvis',
            title: 'News List'
        }
    ]
});

$("#add_news").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $(this).trigger('reset');
        window.location.href = base_url + 'news';
    }
});

$("#edit_newss").on("aftersubmit", function (e, data) {
    $('#pleasewait').modal('hide');
    Lobibox.notify(data.type, {msg: data.message});
    if (data.type === 'success') {
        $(this).trigger('reset');
        window.location.href = base_url + 'news';
    }
});

$(".news_table").on('click', '.delete_news', function () {
    var id = $(this).attr('tid');
    var table = 'App\\News';
    var key = 'id';
    var token = $('meta[name=csrf-token]').attr("content");
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete !'
    }, function (inputValue) {
        if (inputValue) {
            $.ajax({
                url: base_url + 'delete_record',
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    table: table,
                    key: key,
                    _token: token
                },
                success: function (data) {
                    if (data.type === "success") {
                        Lobibox.notify(data.type, {msg: data.message});
                        news_table.ajax.url(base_url + "news_table").load();
                    } else {
                        Lobibox.notify(data.type, {msg: data.message});
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
});