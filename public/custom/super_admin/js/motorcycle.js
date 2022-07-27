$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr('content');
    var table = $('#motorcycles_table').DataTable({
        responsive: true,
        scrollX: true,
    });

    $("#year").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });
    //delete image
    $(document).on("click", ".image-delete-button", function (e) {
        e.preventDefault();
        var image_id = $(this).attr('data-id')
        $.confirm({
            title: 'Image delete',
            content: 'are you sure that you wnat to delete this image?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                Yes: {
                    text: 'Yes',
                    btnClass: 'btn-red',
                    action: function () {
                        $.ajax({
                            type: 'POST',
                            url: '/super-admin/dashboard/motorcycles-delete-image',
                            data: {
                                _token: token,
                                id: image_id,
                            },
                            success: function (data) {
                                if (data == 1) {
                                    $.confirm({
                                        title: 'Deleted',
                                        content: 'Image has been deleted successfully',
                                        type: 'green',
                                        typeAnimated: true,
                                        buttons: {
                                            tryAgain: {
                                                text: 'Okay',
                                                btnClass: 'btn-green',
                                                action: function () {
                                                    location.reload();
                                                }
                                            },
                                        }
                                    });
                                }

                            },
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            $.confirm({
                                title: 'Technical Error',
                                content: 'Somthing went wrong please try again later.',
                                type: 'red',
                                typeAnimated: true,
                                buttons: {
                                    tryAgain: {
                                        text: 'Okay',
                                        btnClass: 'btn-red',
                                        action: function () {
                                            location.reload();
                                        }
                                    },
                                }
                            });
                        });
                    }
                },
                Cancel: {
                    text: 'Cancel',
                    btnClass: 'btn-green',
                    action: function () {

                    }
                },
            }
        });
    });

    //delete
    $(document).on("click", ".delete", function (e) {

        e.preventDefault();
        var motorcycle_id = $(this).attr('data-id');
        $.confirm({
            title: 'Motorcycle delete',
            content: 'are you sure that you wnat to delete this motorcycle?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                Yes: {
                    text: 'Yes',
                    btnClass: 'btn-red',
                    action: function () {
                        $.ajax({
                            type: 'POST',
                            url: '/super-admin/dashboard/motorcycles-delete',
                            data: {
                                _token: token,
                                id: motorcycle_id,
                            },
                            success: function (data) {
                                if (data == 1) {
                                    $.confirm({
                                        title: 'Deleted',
                                        content: 'Motorcycle has been deleted successfully',
                                        type: 'green',
                                        typeAnimated: true,
                                        buttons: {
                                            tryAgain: {
                                                text: 'Okay',
                                                btnClass: 'btn-green',
                                                action: function () {
                                                    window.location.replace('/super-admin/dashboard/motorcycles-index');
                                                }
                                            },
                                        }
                                    });
                                }

                            },
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            $.confirm({
                                title: 'Technical Error',
                                content: 'Somthing went wrong please try again later.',
                                type: 'red',
                                typeAnimated: true,
                                buttons: {
                                    tryAgain: {
                                        text: 'Okay',
                                        btnClass: 'btn-red',
                                        action: function () {
                                            location.reload();
                                        }
                                    },
                                }
                            });
                        });
                    }
                },
                Cancel: {
                    text: 'Cancel',
                    btnClass: 'btn-green',
                    action: function () {

                    }
                },
            }
        });
    });
});

function preview_image() {
    var images = document.getElementById("images").files.length;
    var validExtensions = ['jpg', 'png', 'jpeg'];

    for (var i = 0; i < images; i++) {
        var fileName = document.getElementById("images").files[i].name;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);

        if ($.inArray(fileNameExt, validExtensions) == -1) {
            $("#images").val(null);
            $.confirm({
                title: 'Validation Error',
                content: 'Only these type of files are accepted: ' + validExtensions.join(', '),
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Okay',
                        btnClass: 'btn-red',
                        action: function () {
                        }
                    },
                }
            });
        } else {
            $('#images_preview').append("<img width='200' height='150' class='rounded p-2' src=" + URL.createObjectURL(event.target.files[i]) + ">");
        }

    }
}