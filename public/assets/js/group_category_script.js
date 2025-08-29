$(document).ready(function () {
  $("#addCategoryModal").on("show.bs.modal", function (event) {
    const apiUrl = BASE_URL;

    let button = $(event.relatedTarget);
    let action = "";

    if (button.is("#add-btn")) {
      action = "add";
    } else if (button.hasClass("edit-btn")) {
      action = "edit";
    } else if (button.hasClass("delete-btn")) {
      action = "delete";
    }

    $("#dataForm")[0].reset();
    $("#form-section").removeClass("d-none");
    $("#delete-section").addClass("d-none");
    $("#submitBtn").removeClass("d-none");
    $("#confirmDeleteBtn").addClass("d-none");

    if (action === "add") {
      $("#actionModalLabel").text("Tambah Data");
      $("#submitBtn").text("Tambah");
      $("#submitBtn").show();
      $("#recordId").val("");
    } else if (action === "edit") {
      var id = button.data("id");
      $("#recordId").val(id);
      $("#actionModalLabel").text("Edit Data");
      $("#submitBtn").text("Simpan Perubahan");
      $("#submitBtn").show();

      $.ajax({
        url: apiUrl + "/" + id,
        type: "GET",
        success: function (response) {
          $("#group_name").val(response.group_name);
        },
      });
    } else if (action === "delete") {
      var id = button.data("id");
      $("#recordId").val(id);
      $("#actionModalLabel").text("Hapus Data");
      $("#form-section").addClass("d-none");
      $("#delete-section").removeClass("d-none");
      $("#submitBtn").hide();
      $("#confirmDeleteBtn").removeClass("d-none");
    }
  });

  const submitBtn = $("#submitBtn");

  submitBtn.on("click", function (e) {
    e.preventDefault();

    const spinner = submitBtn.find(".spinner-border");

    let id = $("#recordId").val();

    let apiUrl = BASE_URL;
    const postData = {
      group_name: $("#group_name").val(),
      user_id: $("#user_id").val(),
    };

    let type = "POST";

    if (id) {
      apiUrl += "/" + id;
      type = "PUT";
    }

    $.ajax({
      url: apiUrl,
      method: type,
      contentType: "application/json",
      data: JSON.stringify(postData),
      beforeSend: function () {
        submitBtn.prop("disabled", true);
        spinner.removeClass("d-none");
        $("#modalResponseMessage").html("");
      },
      success: function (response) {
        setTimeout(() => {
          $("#addCategoryModal").modal("hide");

          Toastify({
            text: response.messages.success,
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#4fbe87",
          }).showToast();

          $("#dataForm")[0].reset();
          $("#modalResponseMessage").html("");

          ambilData();
        }, 200);
      },
      error: function (jqXHR) {
        let errorMessages = '<ul class="mb-0">';
        const errors = jqXHR.responseJSON;
        if (typeof errors === "object") {
          errorMessages += `<li><small>${errors.messages.group_name}</small></li>`;
        } else {
          errorMessages += `<li><small>Terjadi kesalahan.</small></li>`;
        }
        errorMessages += "</ul>";

        const errorMsgHtml = `<div class="alert alert-danger">${errorMessages}</div>`;
        $("#modalResponseMessage").html(errorMsgHtml);
      },
      complete: function () {
        submitBtn.prop("disabled", false);
        spinner.addClass("d-none");
      },
    });
  });

  $("#confirmDeleteBtn").on("click", function () {
    var id = $("#recordId").val();
    const apiUrl = BASE_URL + "/" + id;

    $.ajax({
      url: apiUrl,
      type: "DELETE",
      success: function (response) {
        $("#addCategoryModal").modal("hide");

        Toastify({
          text: response.messages.success,
          duration: 3000,
          close: true,
          gravity: "top",
          position: "right",
          backgroundColor: "#4fbe87",
        }).showToast();

        $("#dataForm")[0].reset();
        $("#modalResponseMessage").html("");

        ambilData();
      },
      error: function (xhr, status, error) {
        Toastify({
          text: "Gagal menghapus data.",
          duration: 3000,
          close: true,
          gravity: "top",
          position: "right",
          backgroundColor: "#dc3545",
        }).showToast();
      },
    });
  });

  // $('#addCategoryModal').on('hidden.bs.modal', function(event) {
  //     $('#dataForm')[0].reset();
  //     $('#modalResponseMessage').html('');
  // });

  ambilData();
});

function ambilData() {
  const apiUrl = BASE_URL;

  $("#table_group").DataTable({
    stateSave: true,
    destroy: true,
    ordering: false,
    responsive: true,
    pageLength: 10,
    ajax: {
      type: "GET",
      url: apiUrl,
      dataSrc: function (result) {
        return result;
      },
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "group_name",
      },
      {
        data: null,
        render: function (data, type) {
          let html = "";
          if (type === "display") {
            html =
              `
                            <div class="buttons">

                                <button class="btn btn-sm icon btn-primary edit-btn" data-id="` +
              data.id +
              `" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i class="bi bi-pencil"></i></button>

                                <button class="btn btn-sm icon btn-danger delete-btn"  data-id="` +
              data.id +
              `" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i class="bi bi-x"></i></button>

                            </div>
		    				`;
          }
          return html;
        },
      },
    ],
    columnDefs: [
      {
        className: "dt-center",
        targets: [0],
      },
    ],
  });
}
