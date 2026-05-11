$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#createWareForm").on("submit", function (e) {
        e.preventDefault();
        $(".invalid-feedback").remove();
        $(".is-invalid").removeClass("is-invalid");

        var submitButton = $("#createUserButton");
        var originalButtonHtml = submitButton.html();

        submitButton.prop("disabled", true);
        submitButton.html(
            '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>Loading...'
        );

        // Create FormData for file upload support
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
                    text: "The warehouse has been Created successfully",
                    icon: "success",
                    showCloseButton: false,
                }).then(() => {
                    $("#createWarehouseModal").modal("hide");
                    $("#warehouse-table").DataTable().ajax.reload();
                });
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        var inputField = $(`[name="${key}"]`);
                        inputField.addClass("is-invalid");
                        inputField.after(
                            `<div class="invalid-feedback">${value[0]}</div>`
                        );
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "An unexpected error occurred. Please try again later",
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                }
            },
            complete: function () {
                // Reset the button after completion
                submitButton.html(originalButtonHtml).prop("disabled", false);
            },
        });
    });


$(document).on("click", ".update-user", function (e) {
        let id = $(this).data("id");

        $.ajax({
            url: "/warehouse/edit/" + id,
            method: "GET",
            dataType: "json",
            success: function (response) {
                // Populate form fields
                $("#editWareId").val(response.warehouse.id);
                $("#edit_name").val(response.warehouse.name);
                $("#edit_location").val(response.warehouse.location);
                $("#edit_manager_id").val(response.warehouse.manager_id);
                $("#edit_description").val(response.warehouse.description);
                $("#edit_Status").val(response.warehouse.is_active);

                $("#editWareModal").modal("show");
            },
            error: function (response) {
                Swal.fire({
                    title: "Error",
                    text: "There was a problem fetching user data.",
                    icon: "error",
                    showCloseButton: false,
                });
            },
        });
    });


$("#editWareForm").on("submit", function (e) {
        e.preventDefault();
        let id = $("#editWareId").val();
        var formData = new FormData(this);

        $.ajax({
            url: "/warehouse/update/" + id,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response) {
                    Swal.fire({
                        title: "Success",
                        text: "The warehouse has been Updated successfully",
                        icon: "success",
                        showCloseButton: false,
                    }).then(() => {
                        $("#editWareModal").modal("hide");
                        $("#warehouse-table").DataTable().ajax.reload();
                    });
                }
            },
            error: function (xhr) {},
        });
    });

$("#warehouse-table").on("submit", ".delete-form", function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                let url = $(this).attr("action");
                $.ajax({
                    url: url,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: response.message,
                                icon: "success",
                                showCloseButton: false,
                            }).then(() => {
                                $("#warehouse-table").DataTable().ajax.reload();
                            });
                        
                    },
                    error: function (response) {
                        Swal.fire({
                            title: "Error!",
                            text: "Failed to delete warehouse",
                            icon: "error",
                        });
                    },
                });
            }
        });
    });

});