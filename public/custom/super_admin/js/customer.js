$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr('content');
    var table = $('#customer_table').DataTable({
        responsive: true,
        scrollX: true,
    });
    $("#date_of_birth , #license_expiry_date, #license_issue_date, #id_expiry_date").datepicker({  format: 'yyyy-mm-dd' });

    $(document).on("click", ".show", function (e) {
        $("#password").attr("type","text");
        $(this).children().removeClass("fa-eye");
        $(this).children().addClass("fa-eye-slash");
        $(this).removeClass("show");
        $(this).addClass("hide");
    });
    $(document).on("click", ".hide", function (e) {
        $("#password").attr("type","password");
        $(this).children().removeClass("fa-eye-slash");
        $(this).children().addClass("fa-eye");
        $(this).removeClass("hide");
        $(this).addClass("show");
    });
    $(document).on("click", ".generate-password", function (e) {
        let password=generatePassword();
        $("#password").val(password);
    });

    //delete image
    $(document).on("click", ".image-delete-button", function (e) {
        e.preventDefault();
        var image_id = $(this).attr('data-id')
        var model_name = $(this).attr('data-name')
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
                            url: '/super-admin/dashboard/customer-delete-image',
                            data: {
                                _token: token,
                                id: image_id,
                                model_name:model_name,
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
        var customer_id = $(this).attr('data-id');
        $.confirm({
            title: 'Customer delete',
            content: 'Are you sure that you wnat to delete this customer?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                Yes: {
                    text: 'Yes',
                    btnClass: 'btn-red',
                    action: function () {
                        $.ajax({
                            type: 'POST',
                            url: '/super-admin/dashboard/customer-delete',
                            data: {
                                _token: token,
                                id: customer_id,
                            },
                            success: function (data) {
                                if (data == 1) {
                                    $.confirm({
                                        title: 'Deleted',
                                        content: 'Customer has been deleted successfully',
                                        type: 'green',
                                        typeAnimated: true,
                                        buttons: {
                                            tryAgain: {
                                                text: 'Okay',
                                                btnClass: 'btn-green',
                                                action: function () {
                                                    window.location.replace('/super-admin/dashboard/customer-index');
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

function preview_image(id,area) {
    var images = document.getElementById(id).files.length;
    var validExtensions = ['jpg', 'png', 'jpeg'];
    $(area).empty();
    for (var i = 0; i < images; i++) {

        var fileName = document.getElementById(id).files[i].name;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);

        if ($.inArray(fileNameExt, validExtensions) == -1) {
            $(id).val(null);
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
            $(area).append("<img width='200' height='150' class='rounded p-2' src=" + URL.createObjectURL(event.target.files[i]) + ">");
        }

    }
}

const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

function generatePassword(length=10) {
    let result = ' ';
    const charactersLength = characters.length;
    for ( let i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;
}