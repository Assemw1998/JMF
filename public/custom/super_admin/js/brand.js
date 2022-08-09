$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr('content');
    var table=$('#brand_table').DataTable({
        responsive: true ,
        sScrollX: '100%',
        sScrollXInner: "100%",  
    });


    //delete
    $(document).on("click", ".delete", function (e) {

        e.preventDefault();
        var model_id = $(this).attr('data-id');
        $.confirm({
            title: 'Brand delete',
            content: 'Are you sure that you wnat to delete this brand?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                Yes: {
                    text: 'Yes',
                    btnClass: 'btn-red',
                    action: function () {
                        $.ajax({
                            type: 'POST',
                            url: '/super-admin/dashboard/brand-delete',
                            data: {
                                _token: token,
                                id: model_id,
                            },
                            success: function (data) {
                                if (data == 1) {
                                    $.confirm({
                                        title: 'Deleted',
                                        content: 'Brand has been deleted successfully',
                                        type: 'green',
                                        typeAnimated: true,
                                        buttons: {
                                            tryAgain: {
                                                text: 'Okay',
                                                btnClass: 'btn-green',
                                                action: function () {
                                                    window.location.replace('/super-admin/dashboard/brand-index');
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
