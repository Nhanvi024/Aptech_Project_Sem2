@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")
	<div class="page-wrapper">
		<div class="page-header d-print-none">
			<div class="container-xl">
				<div class="row g-2 align-items-center">
					<div class="col">
						<h2 class="page-title">
							CONTACTS MANAGEMENT
						</h2>
					</div>
					<!-- Page title actions -->
					{{-- <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <div class="ms-auto text-secondary">
                                <a href="{{ route('admin.discount.create') }}" class="btn btn-6 btn-outline-primary w-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 5l0 14"></path>
                                        <path d="M5 12l14 0"></path>
                                    </svg>
                                    Add new Discount
                                </a>
                            </div>
                        </div>
                    </div> --}}
				</div>
			</div>
		</div>
		<!-- Page body -->
		<div class="page-body">
			<div class="container-xl">
				<div class="col-12">
					<div class="card">
						<div class="card-body border-bottom py-3">
							<form method="GET" action="{{ route("admin.contact.index1") }}">
								<div class="row">
									<div class=" col-3">
										<label class="form-label">Search</label>
										<input type="text" class="form-control form-control" name="search" value="{{ request("search") }}"
											placeholder="Enter information">
									</div>
									<div class="col-3">
										<label class="form-label">Subject</label>
										<select name="subject" class="form-select">
											<option value="">- Select subject -</option>
											<option value="order" {{ request("subject") == "order" ? "selected" : "" }}>
												Order</option>
											<option value="Product Information" {{ request("subject") == "Product Information" ? "selected" : "" }}>
												Product
												Information</option>
											<option value="Customer Service" {{ request("subject") == "Customer Service" ? "selected" : "" }}>Customer
												Service</option>
											<option value="Other" {{ request("subject") == "Other" ? "selected" : "" }}>
												Other</option>
										</select>
									</div>
									<div class="col-3">
										<label class="form-label">Status</label>
										<select name="status" class="form-select">
											<option value="">- Choose status -</option>
											<option value= '1' {{ request("status") == "1" ? "selected" : "" }}>
												Replied
											</option>
											<option value= '0' {{ request("status") == "0" ? "selected" : "" }}>
												Pending
											</option>
										</select>
									</div>
									<div class="col-md-2 d-flex ">
										<button type="submit" class="btn btn-primary mt-auto">Apply</button>
										<a href="{{ route("admin.contact.index1") }} " class="btn btn-warning mt-auto">Reset</a>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table card-table table-vcenter text-nowrap datatable">
					<thead>
						<th>ID </th>
						<th>Name</th>
						<th>Email</th>
						<th>Subject</th>
						<th>Phone</th>
						<th>Message</th>
						<th>Reply</th>
						<th>Status</th>
						<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($contacts as $contact)
							<tr>
								<td>
									{{ $contact->id }}
								</td>
								<td>
									{{ Str::limit($contact->name, 10, "...") }}
								</td>
								<td>
									{{ $contact->email }}
								</td>
								<td>
									{{ $contact->subject }}
								</td>
								<td>
									{{ $contact->phone }}
								</td>
								<td>
									{{ Str::limit($contact->message, 10, "...") }}
								</td>
								<td>
									{!! Str::limit($contact->reply, 10, "...") !!}
								</td>
								<td>
									@if ($contact->status == 1)
										<button class="btn btn-sm btn-success">Replied</button>
									@else
										<button class="btn btn-sm btn-danger">Pending</button>
									@endif
								</td>
								<td>
									<a class="btn btn-warning view-detail" data-bs-toggle="modal" data-bs-target="#contactModal"
										data-id="{{ $contact->id }}">
										Detail
									</a>
									@if ($contact->status == 0)
										<a class="btn btn-success" href="{{ route("admin.contact.reply", $contact->id) }}">
											Reply
										</a>
									@endif
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>


			<!-- Pagination -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="mt-2">
						Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of {{ $contacts->total() }} results
					</div>
					<div class="pagination-wrap">
						<ul>
							@if ($contacts->currentPage() > 1)
								<li>
									<a href="{{ $contacts->appends(request()->except("page"))->previousPageUrl() }}"><i
											class="fas fa-angle-left"></i></a>
								</li>
							@endif
							@if ($contacts->currentPage() > 3)
								<li>
									<a href="{{ $contacts->appends(request()->except("page"))->url(1) }}">1</a>
								</li>
								<li> ... </li>
							@endif
							@for ($i = $contacts->currentPage() - 2; $i <= $contacts->currentPage() + 2; $i++)
								@if ($i > 0 && $i <= $contacts->lastPage())
									@if ($contacts->currentPage() == $i)
										<li>
											<a class="active">{{ $i }}</a>
										</li>
									@else
										<li>
											<a href="{{ $contacts->appends(request()->except("page"))->url($i) }}">{{ $i }}</a>
										</li>
									@endif
								@endif
							@endfor
							@if ($contacts->currentPage() < $contacts->lastPage() - 2)
								<li> ... </li>
								<li>
									<a
										href="{{ $contacts->appends(request()->except("page"))->url($contacts->lastPage()) }}">{{ $contacts->lastPage() }}</a>
								</li>
							@endif
							@if ($contacts->currentPage() < $contacts->lastPage())
								<li>
									<a href="{{ $contacts->appends(request()->except("page"))->nextPageUrl() }}"><i
											class="fas fa-angle-right"></i></a>
								</li>
							@endif
						</ul>
					</div>

				</div>
			</div>
			<!-- End Pagination -->

			{{-- Pagination contact --}}
			{{-- {{ $contacts->links("pagination.pagination") }} --}}

		</div>
		{{-- Modal detail contact --}}
		<div class="modal modal-blur fade" id="contactModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title">Contact Detail</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="mb-3">
							<label class="form-label">Name</label>
							<p class="form-control" id="contact-name"></p>
						</div>
						<div class="mb-3">
							<label class="form-label">Subject</label>
							<p class="form-control" id="contact-subject"></p>
						</div>
						<div class="mb-3">
							<label class="form-label">Phone</label>
							<p class="form-control" id="contact-phone"></p>
						</div>
						<div class="mb-3">
							<label class="form-label">Email</label>
							<p class="form-control" id="contact-email"></p>
						</div>
					</div>
					<div class="modal-body">
						<div class="row mb-3">
							<label class="form-label">Message</label>
							<textarea name="message" class="form-control" id="contact-message" cols="30" rows="6" readonly>
                        </textarea>
						</div>
						<div class="row mb-3">
							<label class="form-label">Reply</label>
							<textarea name="reply" class="form-control" id="contact-reply" contenteditable="false" cols="30"
							 rows="6" readonly>
                        </textarea>
						</div>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn btn-link link-secondary btn-3" data-bs-dismiss="modal">
							Cancel
						</a>
						<a class="btn btn-primary" id="btn-reply">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
								stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
								<path d="M12 5l0 14" />
								<path d="M5 12l14 0" />
							</svg>
							Reply
						</a>
					</div>
				</div>
			</div>
		</div>
		<script src="/back/dist/libs/tinymce/tinymce.min.js?1738096684" defer></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script>
			$('#contactModal').on('shown.bs.modal', function() {
				tinymce.init({
					selector: '#contact-reply',
					menubar: false,
					statusbar: false,
					plugins: [
						'advlist autolink lists link image charmap preview anchor',
						'searchreplace visualblocks code fullscreen',
						'insertdatetime media table code help wordcount'
					],
					toolbar: 'undo redo | formatselect | ' +
						'bold italic backcolor | alignleft aligncenter ' +
						'alignright alignjustify | bullist numlist outdent indent | ' +
						'removeformat',
					height: 300,
					setup: function(editor) {
						editor.on('init', function() {
							editor.setContent($('#contact-reply').val());
						});
					}
				});
			});

			$('#contactModal').on('hidden.bs.modal', function() {
				if (tinymce.get('contact-reply')) {
					tinymce.get('contact-reply').remove();
				}
			});
			$(document).on('click', '.view-detail', function() {
				var contactId = $(this).data('id');
				$.ajax({
					url: "/admin/contact/" + contactId,
					type: "GET",
					success: function(response) {
						$('#contact-name').text(response.name);
						$('#contact-email').text(response.email);
						$('#contact-subject').text(response.subject);
						$('#contact-phone').text(response.phone);
						$('#contact-message').val(response.message);
						$('#contact-reply').val(response.reply);
						// if (tinymce.get('contact-reply')) {
						//     tinymce.get('contact-reply').setContent(response.reply);
						// }
						$('#btn-reply').attr('href', "/admin/contact/reply/" + contactId);

						$('#contactModal').modal('show');
					}
				});
			});
		</script>
	@endsection
