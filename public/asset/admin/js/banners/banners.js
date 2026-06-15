$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    /*
    |--------------------------------------------------------------------------
    | Create Banner
    |--------------------------------------------------------------------------
    */

    $("#createBannerForm").on("submit", function (e) {
        e.preventDefault();

        $(".invalid-feedback").remove();
        $(".is-invalid").removeClass("is-invalid");

        var submitButton = $("#createBannerButton");

        var originalButtonHtml = submitButton.html();

        submitButton.prop("disabled", true);

        submitButton.html(
            '<span class="spinner-border spinner-border-sm me-1" role="status"></span>Loading...',
        );

        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr("action"),
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,

            success: function (response) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    showCloseButton: false,
                }).then(() => {
                    $("#createBannerForm")[0].reset();

                    $("#createBannerModal").modal("hide");

                    $("#banner-table").DataTable().ajax.reload();
                });
            },

            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;

                    $.each(errors, function (key, value) {
                        var inputField = $(`[name="${key}"]`);

                        inputField.addClass("is-invalid");

                        inputField.after(
                            `<div class="invalid-feedback">${value[0]}</div>`,
                        );
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "An unexpected error occurred. Please try again later",
                        icon: "error",
                    });
                }
            },

            complete: function () {
                submitButton.html(originalButtonHtml).prop("disabled", false);
            },
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Get Banner Data
    |--------------------------------------------------------------------------
    */

    $(document).on("click", ".update-banner", function () {
        let id = $(this).data("id");

        $.ajax({
            url: "/banners/" + id + "/edit",
            method: "GET",
            dataType: "json",

            success: function (response) {
                $("#editBannerId").val(response.banner.id);

                $("#edit_title").val(response.banner.title);

                $("#edit_subtitle").val(response.banner.subtitle);

                $("#edit_is_active").val(response.banner.is_active);

                if (response.banner.image) {
                    $("#previewBannerImage")
                        .attr("src", "/storage/" + response.banner.image.path)
                        .removeClass("d-none");
                }

                $("#editBannerModal").modal("show");
            },

            error: function () {
                Swal.fire({
                    title: "Error",
                    text: "There was a problem fetching banner data.",
                    icon: "error",
                });
            },
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Update Banner
    |--------------------------------------------------------------------------
    */

    $("#editBannerForm").on("submit", function (e) {
        e.preventDefault();

        let id = $("#editBannerId").val();

        var formData = new FormData(this);

        $.ajax({
            url: "/banners/" + id,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,

            success: function (response) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    showCloseButton: false,
                }).then(() => {
                    $("#editBannerModal").modal("hide");

                    $("#banner-table").DataTable().ajax.reload();
                });
            },

            error: function () {
                Swal.fire({
                    title: "Error",
                    text: "Something went wrong",
                    icon: "error",
                });
            },
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Delete Banner
    |--------------------------------------------------------------------------
    */

    $("#banner-table").on("submit", ".delete-form", function (e) {
        e.preventDefault();

        Swal.fire({
            title: window.translations.areYouSure,
            text: window.translations.revertText,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: window.translations.yesDelete,
            cancelButtonText: window.translations.cancel,
        }).then((result) => {
            if (result.isConfirmed) {
                let url = $(this).attr("action");

                $.ajax({
                    url: url,
                    type: "DELETE",

                    success: function (response) {
                        Swal.fire({
                            title: window.translations.deleted,
                            text: response.message,
                            icon: "success",
                        }).then(() => {
                            $("#banner-table").DataTable().ajax.reload();
                        });
                    },

                    error: function () {
                        Swal.fire({
                            title: window.translations.error,
                            text: window.translations.failedDelete,
                            icon: "error",
                        });
                    },
                });
            }
        });
    });
});
