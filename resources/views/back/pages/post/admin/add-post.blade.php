@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")


@section("content")

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<!-- Bootstrap Tags Input CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

	@yield("styles")

	{{-- csrf_token --}}
	{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}


	<div class="page-wrapper">
		@if ($mess = Session::has("message"))
			<div class="alert alert-info">
				<strong>Info!</strong> {{ Session::get("message") }}
			</div>
		@endif
		<!-- Page header -->
		<div class="page-header d-print-none">
			<div class="container-xl">
				<div class="row g-2 align-items-center">
					<div class="col">
						<div class="page-title">
							<h2>Add Post</h2>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="{{ route("admin.admin.manage") }}">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									Add Post
								</li>
							</ol>
						</nav>
					</div>
					<div class="col-auto ms-auto d-print-none">
						<div class="d-flex">
							<a href="{{ route("admin.posts") }}" class="btn btn-primary">
								View All Posts
							</a>
						</div>

					</div>
				</div>
			</div>
		</div>

		<!-- Page body -->
		<div class="page-body">
			<div class="container-xl">

				<form action="{{ route("admin.store.post") }}" method="POST" enctype="multipart/form-data" id="addPostForm">
					@csrf
					<div class="row">
						<div class="col-md-9">
							<div class="card card-box mb-2">
								<div class="card-body">
									<div class="form-group">
										<label for="title"><b>Title</b><b style="color: red">*</b>:</label>
										<input type="text" class="form-control" value="{{ old("title") }}" name="title"
											placeholder="Enter post title">
										@error("title")
											<p style="color: red; font-size: 14px">{{ $message }}</p>
										@enderror
									</div>
									<div id="contentFields">
										@php
											$savedContents = session("temp_content", []);
											$savedImages = session("temp_images", []);
										@endphp

										@if (empty($savedContents))
											<div class="content-item">
												<div class="form-group">
													<label for="content"><b>Content</b><b style="color: red">*</b>:</label>
													<textarea name="content[]" cols="30" rows="5" class="form-control" placeholder="Enter post content here..."></textarea>
												</div>
											</div>
										@else
											@foreach ($savedContents as $content)
												<div class="content-item">
													<div class="form-group">
														<label for="content"><b>Content</b><b style="color: red">*</b>:</label>
														<textarea name="content[]" id="" cols="30" rows="5" class="form-control"
														 placeholder="Enter post content here...">{{ $content }}</textarea>
														@error("content.*")
															<p style="color: red; font-size: 14px">{{ $message }}</p>
														@enderror
													</div>
												</div>
											@endforeach
										@endif
									</div>
									<div id="imageFields">
										{{-- <div id="imageFields"> --}}
										{{-- @php

                                            @endphp --}}

										@foreach ($savedImages as $image)
											<div class="image-item">
												{{-- @php
                                                $uniqueId = 'subImage_' . uniqid();
                                            @endphp --}}
												<div class="form-group">
													<label for="content_image"><b>Content Image</b>:</label>
													<input type="file" name="content_image[]" id="subImage" class="form-control-file form-control"
														height="auto">
													{{-- <input type="hidden" name="types[]" value="image"> --}}
													@error("content_image.*")
														<p style="color: red; font-size: 14px">{{ $message }}</p>
													@enderror
													@if ($image)
														<div class="d-block mb-3" style="max-width: 250px; margin-top: 10px;">
															<img id="preview_{{ $uniqueId }}" hidden src="{{ asset("storage/" . $image) }}" alt="your image"
																class="img-thumbnail" width="150" />
														</div>
													@endif
												</div>
												<button type="button" class="btn btn-secondary remove-image" onclick="removeImageField(this)">Delete
													Image</button>
											</div>
										@endforeach
									</div>
								</div>
							</div>
							<div class="mb-3">
								<button class="btn btn-primary" type="button" onclick="addContentField()">Add New
									Paragraph</button>

								<button class="btn btn-success" type="button" onclick="addImageField()">Add New
									Image</button>

							</div>
							<div class="card card-box mb-2">
								<div class="card-header weight-500">SEO</div>
								<div class="card-body">
									<div class="form-group">
										<label for="meta_keywords"><b>Post meta keywords</b><b style="color: red">*</b>:
											<small>(Separated by
												coma.)</small></label>
										<input type="text" class="form-control" value="{{ old("meta_keywords") }}" name="meta_keywords"
											placeholder="Enter post meta keywords">
										@error("meta_keywords")
											<p style="color: red; font-size: 14px">{{ $message }}</p>
										@enderror
									</div>

									<div class="form-group">
										<label for="meta_description"><b>Post meta description</b>:</label>
										<textarea name="meta_description" id="" cols="30" rows="10" class="form-control"
										 placeholder="Enter post meta description...">{{ old("meta_description") }}</textarea>
									</div>


								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card card-box mb-2">
								<div class="card-body">
									<div class="form-group">
										<div>
											<label for=""><b>Post Category <b style="color: red">*</b></b>:</label>
											<select name="category" id="">
												<option value="">--Choose Category--</option>
												@foreach ($categories as $item)
													<option value="{{ $item->id }}">{{ $item->catName }}</option>
												@endforeach
											</select>
											@error("category")
												<p style="color: red; font-size: 14px">{{ $message }}</p>
											@enderror
										</div>

									</div>

									<div class="form-group">
										<label for="post_featured_image"><b>Post Featured image</b><b style="color: red">*</b>:</label>
										<input type="file" name="post_featured_image" id="postImage" class="form-control-file form-control"
											height="auto" value="{{ old("post_featured_image") }}">
										@error("post_featured_image")
											<p style="color: red; font-size: 14px">{{ $message }}</p>
										@enderror
										<div class="d-block mb-3" style="max-width: 250px; margin-top: 10px;">
											<img id="image_preview" hidden src="#" alt="your image" class="img-thumbnail" width="150" />
										</div>
									</div>


									<hr>
									<div class="form-group">
										<label for="tags"><b>Tags</b><small>(Separated by
												coma.)</small>:</label>
										<input type="text" class="form-control tagsinput" name="tags" id="tags" data-role="tagsinput"
											value="{{ old("tags") }}">
									</div>

									<hr>

									<div>
										<label for="author">Author<b style="color: red">*</b></label>
										<select name="author" id="">
											<option value="">--Choose--</option>
											@foreach ($admins as $item)
												<option value="{{ $item->id }}">{{ $item->username }}</option>
											@endforeach
										</select>
										@error("author")
											<p style="color: red; font-size: 14px">{{ $message }}</p>
										@enderror
									</div>

									<hr>
									<div class="form-control">
										<label for="visibility"><b>Visibility</b>:</label>
										<div class="custom-control custom-radio mb-5">
											<input type="radio" name="visibility" id="customRadio1" class="custom-control-input" value="1"
												{{ old("visibility") == 1 ? "checked" : "" }}>
											<label for="customRadio1" class="custom-control-label">Public</label>
										</div>

										<div class="custom-control custom-radio mb-5">
											<input type="radio" name="visibility" id="customRadio2" class="custom-control-input" value="0"
												{{ old("visibility") == 0 ? "checked" : "" }}>
											<label for="customRadio2" class="custom-control-label">Private</label>
										</div>
									</div>



								</div>
							</div>

						</div>
					</div>
					<div class="mb-3">
						<button type="submit" class="btn btn-primary">Create post</button>

					</div>
				</form>
			</div>

		</div>
		<footer class="footer footer-transparent d-print-none">
			<div class="container-xl">
				<div class="row text-center align-items-center flex-row-reverse">
					<div class="col-lg-auto ms-lg-auto">
						<ul class="list-inline list-inline-dots mb-0">
							<li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary"
									rel="noopener">Documentation</a></li>
							<li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a>
							</li>
							<li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary"
									rel="noopener">Source code</a></li>
							<li class="list-inline-item">
								<a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
									<!-- Download SVG icon from http://tabler-icons.io/i/heart -->
									<svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24"
										height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
										stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
										</path>
									</svg>
									Sponsor
								</a>
							</li>
						</ul>
					</div>
					<div class="col-12 col-lg-auto mt-3 mt-lg-0">
						<ul class="list-inline list-inline-dots mb-0">
							<li class="list-inline-item">
								Copyright © 2023
								<a href="." class="link-secondary">Tabler</a>.
								All rights reserved.
							</li>
							<li class="list-inline-item">
								<a href="./changelog.html" class="link-secondary" rel="noopener">
									v1.0.0-beta20
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	</div>



	{{-- jQuery libary --}}
	{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Bootstrap Tags Input JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script> --}}

	<script>
		postImage.onchange = evt => {
			const [file] = postImage.files
			//console.log("lot xuong day", file);
			if (file) {
				image_preview.removeAttribute("hidden"); // xóa hidden khi đã có hình
				image_preview.src = URL.createObjectURL(file)
			}
		}





		// subImage.onchange = evt => {
		//     const [file] = subImage.files
		//     //console.log("lot xuong day", file);
		//     if (file) {
		//         sub_image_preview.removeAttribute("hidden"); // xóa hidden khi đã có hình
		//         sub_image_preview.src = URL.createObjectURL(file)
		//     }
		// }

		function addContentField() {
			const contentFields = document.getElementById('contentFields');
			// const index = document.querySelectorAll('.content-item').length;
			const items = contentFields.querySelectorAll('.content-item');
			const index = items.length + 1;
			// const lastItem = contentFields.querySelector(".content-item:last-of-type, .image-item:last-of-type");

			const newField = document.createElement('div');
			newField.classList.add('content-item', 'mt-3');
			newField.innerHTML = `
                <div class="form-group">
                    <label for="content"><b>Content ${index}</b>:</label>
                    <textarea name="content[]" id="" cols="30" rows="5" class="form-control"
                        placeholder="Enter post content here..."></textarea>

                    @error("content.*")
                        <p style="color: red; font-size: 14px">{{ $message }}</p>
                     @enderror
                </div>
                <button type="button" class="btn btn-secondary mt-2 remove-content"
                        onclick="removeContentField(this)">Delete</button>
            </div>
            `;
			const lastItem = contentFields.querySelector('.content-item:last-of-type, .image-item:last-of-type');
			if (lastItem) {
				lastItem.insertAdjacentElement("afterend", newField);
			} else {
				contentFields.appendChild(newField); // Nếu chưa có đoạn nào, thêm ảnh vào đầu
			}
		}



		function addImageField() {
			const imageFields = document.getElementById('imageFields');
			// const uniqueId = 'image_' + Date.now(); // Tạo ID duy nhất
			const items = contentFields.querySelectorAll('.image-item');
			const index = items.length + 1;
			// const lastItem = imageFields.querySelector(".content-item:last-of-type, .image-item:last-of-type");
			const newImgField = document.createElement('div');
			newImgField.classList.add('image-item', 'mt-3');
			newImgField.innerHTML = `

                <div class="form-group">
                        <label for="content_image"><b>Content Image ${index}</b>:</label>
                        <input type="file" name="content_image[]"
                            class="form-control-file form-control" height="auto"
                            value="{{ old("content_image") }}">

                        @error("content_image.*")
                            <p style="color: red; font-size: 14px">{{ $message }}</p>
                        @enderror
                        <div class="d-block mb-3" style="max-width: 250px; margin-top: 10px;">
                        <img id="preview" hidden src="#" alt="your image"
                        class="img-thumbnail" width="150" />
                </div>
                <button type="button" class="btn btn-secondary remove-image"
                        onclick="removeImageField(this)">Delete Image</button>
            </div>
            `;
			const lastItem = contentFields.querySelector('.content-item:last-of-type, .image-item:last-of-type');
			if (lastItem) {
				lastItem.insertAdjacentElement("afterend", newImgField);
			} else {
				imageFields.appendChild(newImgField); // Nếu chưa có đoạn nào, thêm ảnh vào đầu
			}
		}




		// function addImageField() {
		//     const contentFields = document.getElementById('contentFields');
		//     const uniqueId = 'image_' + Date.now(); // Tạo ID duy nhất

		//     const lastContentItem = contentFields.querySelector("content-image-item:last-of-type");

		//     const newImgField = document.createElement('div');
		//     newImgField.classList.add('content-item', 'mt-3');
		//     newImgField.innerHTML = `

	//     <div class="form-group">
	//             <label for="content_image"><b>Content Image</b>:</label>
	//             <input type="file" name="content_image[]" id="${uniqueId}"
	//                 class="form-control-file form-control" height="auto">
	//                 <input type="hidden" name="content_type[]" value="image">
	//             @error("content_image.*")
	//                 <p style="color: red; font-size: 14px">{{ $message }}</p>
	//             @enderror
	//             <div class="d-block mb-3" style="max-width: 250px; margin-top: 10px;">
	//             <img id="preview${uniqueId}" hidden src="#" alt="your image"
	//             class="img-thumbnail" width="150" />
	//     </div>
	//     <button type="button" class="btn btn-secondary remove-image"
	//             onclick="removeImageField(this)">Delete Image</button>
	// </div>
	// `;
		//     if (lastContentItem) {
		//         lastContentItem.insertAdjacentElement("afterend", newImgField);
		//     } else {
		//         contentFields.appendChild(newImgField); // Nếu chưa có đoạn nào, thêm ảnh vào đầu
		//     }

		// }


		function removeContentField(button) {
			button.closest('.content-item').remove();
		}

		function removeImageField(button) {
		    button.closest('.image-item').remove();
		}

		function previewImage(event, id) {
			const input = event.target.file[0];
			// const preview = document.getElementById('preview_' + id);

			if (file) {
				const reader = new FileReader();
				reader.onload = function(e) {
					const preview = document.getElementById('preview_' + id);
					preview.src = e.target.result;
					preview.hidden = false;
				};
				reader.readAsDataURL(file);
			}
			// if (input.files && input.files[0]) {
			//     const reader = new FileReader();
			//     reader.onload = function(e) {
			//         preview.src = e.target.result;
			//         preview.hidden = false;
			//     };
			//     reader.readAsDataURL(input.files[0]);
			// }
		}

		$(document).ready(function() {
			$('#tags').tagsinput({
				trimValue: true,
				confirmKeys: [13, 44] // Enter (13) hoặc dấu phẩy (44) để tạo tag
			});

		});

		// document.addEventListener("DOMContentLoaded", function() {
		//     document.getElementById("addPostForm").addEventListener("submit", function(event) {
		//         event.preventDefault();

		//         let formData = new FormData(this);
		//         let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		//         formData.append('_token', csrfToken);

		//         fetch('/admin/post/new', {
		//                 method: 'POST',
		//                 body: formData
		//             })
		//             .then(response => {
		//                 // Kiểm tra xem response có phải JSON không
		//                 let contentType = response.headers.get("content-type");
		//                 if (contentType && contentType.includes("application/json")) {
		//                     return response.json();
		//                 }
		//                 return response.text().then(text => {
		//                     throw new Error("Unexpected response: " + text);
		//                 });
		//             })
		//             .then(data => console.log("Success:", data))
		//             .catch(error => console.error("Error:", error));
		//     });
		// });
		setTimeout(function() {
			document.querySelector('.alert').style.display = 'none';
		}, 3000);
	</script>

	<style>
		.bootstrap-tagsinput {
			width: 100% !important;
			/* Đảm bảo input full width */
			min-height: 38px;
			/* Chiều cao tối thiểu */
			display: block;
			padding: 5px;
		}

		.bootstrap-tagsinput .tag {
			color: black !important;
			/* Chữ trong tag phải có màu */
			background: rgb(196, 193, 193);
			padding: 5px;
			margin-right: 5px;
			border-radius: 3px;
		}

		.bootstrap-tagsinput input {
			color: black !important;
			/* Chữ nhập vào input */
		}
	</style>

@endsection
