/**
 * @author Mohsin Shafique
 *
 * Generic Ajax Request
 */
$('body').on('click', '.delete_btn', function () {
	let id = $(this).data("id");
    let url = $(this).data("url") + "/" + id;
	Swal.fire({
		title: "Are you sure?",
		text: "You won't be able to revert this!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, delete it!",
	}).then((result) => {
		if (result.value) {
			$.ajax({
				type: "DELETE",
                url: url,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
				success: function (response) {
					if(response.status=='success'){
						Swal.fire("Deleted!", response.message, "success");
					}else{
						Swal.fire("Oops!", response.message, "error");
					}
				},
				complete: function () {
					swal.hideLoading();
					setTimeout(function () {
						location.reload();
					}, 2000);
				},
				error: function () {
					swal.hideLoading();
					swal.fire(
						"!Opps ",
						"Something went wrong, try again later",
						"error"
					);
				},
			});
		}
	});
});

function changeStatus(id, status, passurl) {
	Swal.fire({
		title: "Are you sure?",
		text: "You want to change the status!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, Change it!",
	}).then((result) => {
		if (result.value) {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type: "post",
				url: passurl,
				data: {
					'id': id,
					'status': status
				},
				dataType: "json",
				beforeSend: function () {
					$(".loader-wrapper").fadeIn("slow");
				},
				success: function (response) {
					Swal.fire("Done!", response.message, "success");
					setTimeout(function () {
						location.reload();
					}, 2000);
				},
				error: function (response) {},
				complete: function () {
					$(".loader-wrapper").fadeOut("slow");
				}
			});
		}

	});
}

$("body").on("click", ".editDropdown", function () {
	let baseUrl = $(this).attr("data-url");
	let id = $(this).attr("data-id");
	$.ajax({
		type: "get",
		url: baseUrl,
		dataType: "json",
		data: {
			'id': id,
		},
		success: function (response) {
			$("#dropUpdDownadd #drptitle").val(response.title);
			$("#dropUpdDownadd #dataID").val(response.id);
			$("#updModal").modal("show");
		},
	});
});

$("body").on("submit", "#dropUpdDownadd", function (e) {
	e.preventDefault();
	let id = $("#dataID").val();
	let title = $("#drptitle").val();
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		type: "post",
		url: "event-request-upt/" + id,
		data: {
			'id': id,
			'title': title,
		},
		dataType: "json",
		beforeSend: function () {
			$(".loader-wrapper").fadeIn("slow");
		},
		success: function (response) {
			if (response.status == "success") {
				$("#updModal").modal("hide");
				Swal.fire("Success!", response.message, "success");
				setTimeout(function () {
					location.reload();
				}, 3000);
			}
		},
		error: function (response) {},
		complete: function () {
			$(".loader-wrapper").fadeOut("slow");
		},
	});
});
