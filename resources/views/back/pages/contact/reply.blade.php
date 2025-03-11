@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")

	<div class="page-wrapper">
		<!-- Page header -->
		<div class="page-header d-print-none">
			<div class="container-xl">
				<div class="row g-2 align-items-center">
					<h1 class="page-title">
						Reply contact
					</h1>

				</div>
			</div>
		</div>
		<!-- Page body -->
		<div class="page-body">
			<div class="container-xl">
				<div class="box">
					<div class="col">
						<form action="{{ route("admin.contact.sendEmail", $contacts) }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="mb-3">
								<label class="form-label">Name</label>
								<input type="text" class="form-control" name="name" value="{{ old("name", $contacts->name) }}" readonly>
							</div>
							<div class="mb-3">
								<label class="form-label">Phone number</label>
								<input type="text" class="form-control" name="phone" value="{{ old("phone", $contacts->phone) }}" readonly>
							</div>
							<div class="mb-3">
								<label class="form-label">Email</label>
								<input type="text" class="form-control" name="email" value="{{ old("email", $contacts->email) }}" readonly>
							</div>
							<div class="mb-3">
								<label class="form-label">Subject</label>
								<input type="text" class="form-control" name="subject" value="{{ old("subject", $contacts->subject) }}"
									readonly>
							</div>

							<div class="mb-3">
								<label class="form-label">Message:</label>
								<textarea name="message" class="form-control" id="message" cols="30" rows="5" readonly>{{ old("message", $contacts->message) }}</textarea>
							</div>

							<div class="mb-3">
								<label class="form-label">Reply:</label>
								<textarea name="reply" class="form-control" id="tinymce-mytextarea" cols="30" rows="10">{{ old("reply", $contacts->reply) }}</textarea>
							</div>

							<button type="submit" class="btn btn-6 btn-primary w-100">
								Submit
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="/back/dist/libs/tinymce/tinymce.min.js?1738096684" defer></script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			let options = {
				selector: '#tinymce-mytextarea',
				height: 300,
				menubar: false,
				statusbar: false,
				license_key: 'gpl',
				plugins: [
					'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
					'searchreplace', 'visualblocks', 'code', 'fullscreen',
					'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
				],
				toolbar: 'undo redo | formatselect | ' +
					'bold italic backcolor | alignleft aligncenter ' +
					'alignright alignjustify | bullist numlist outdent indent | ' +
					'removeformat',
				content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
			}
			if (localStorage.getItem("tablerTheme") === 'dark') {
				options.skin = 'oxide-dark';
				options.content_css = 'dark';
			}
			tinyMCE.init(options);
		})
	</script>

@endsection
