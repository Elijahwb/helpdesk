@extends('layouts.admin')

@section('content')
		<div class="content-body">
			<div class="container-fluid">
				<div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Tickets</a></li>
						<li class="breadcrumb-item active"><a href="/ticketdetails">ticket list</a></li>
					</ol>
				</div>
				<!-- row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<div class="email-left-box px-0 mb-3">
									<div class="p-0 ">
										<a  class="btn btn-primary btn-block" data-toggle="modal" data-target="#newticket">
											<i class="fa fa-plus  align-middle mr-2"></i>Create New Ticket</a>
									</div>
									<div class="mail-list mt-4">
										<a href="/tickets" class="list-group-item active"><i
												class="fa fa-inbox font-18 align-middle mr-2"></i> Unassigned <span
												class="badge badge-primary badge-sm float-right">{{count($newtickets)}}</span> </a>
												
									<a href="/pendingtickets" class="list-group-item"><i
											class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Pending</a>
										<a href="/opentickets" class="list-group-item"><i
											class="fa fa-paper-plane font-18 align-middle mr-2"></i>Open </a>
									
											<!--		<a-->
									<!--	href="" class="list-group-item"><i-->
									<!--		class="fa fa-star font-18 align-middle mr-2"></i>Due Today <span-->
									<!--		class="badge badge-danger text-white badge-sm float-right">47</span>-->
									<!--</a>-->
											<a
										href="/closedtickets" class="list-group-item"><i
											class="fa fa-trash font-18 align-middle mr-2"></i>Closed</a>
									</div>
									<div class="intro-title d-flex justify-content-between">
										<h5>Categories</h5>
										<i class="icon-arrow-down" aria-hidden="true"></i>
									</div>
									<div class="mail-list mt-4">
										<a href="email-inbox.html" class="list-group-item"><span class="icon-warning"><i
													class="fa fa-circle" aria-hidden="true"></i></span>
											Refunds </a>
										<a href="email-inbox.html" class="list-group-item"><span class="icon-primary"><i
													class="fa fa-circle" aria-hidden="true"></i></span>
											Escalating </a>
										<a href="email-inbox.html" class="list-group-item"><span class="icon-success"><i
													class="fa fa-circle" aria-hidden="true"></i></span>
											Support </a>
										<a href="email-inbox.html" class="list-group-item"><span class="icon-dpink"><i
													class="fa fa-circle" aria-hidden="true"></i></span>
											Satisfaction </a>
									</div>
								</div>
								<div class="email-right-box ml-0 ml-sm-4 ml-sm-0">
									<div role="toolbar" class="toolbar ml-1 ml-sm-0">
										<div class="btn-group mb-1">
											<div class="custom-control custom-ch
											eckbox pl-2">
												<input type="checkbox" class="custom-control-input" id="checkbox1">
												<label class="custom-control-label" for="checkbox1"></label>
											</div>
										</div>
										<div class="btn-group mb-1">
											<button class="btn btn-primary light px-3" type="button"><i
													class="ti-reload"></i>
											</button>
										</div>
										<div class="btn-group mb-1">
											<button aria-expanded="false" data-toggle="dropdown"
												class="btn btn-primary px-3 light dropdown-toggle" type="button">More
												<span class="caret"></span>
											</button>
											<div class="dropdown-menu"> <a href="javascript: void(0);"
													class="dropdown-item">Mark all as assigned</a> <a
													href="javascript: void(0);" class="dropdown-item">Close All</a>
												<a href="javascript: void(0);" class="dropdown-item">Add Star</a> <a
													href="javascript: void(0);" class="dropdown-item">Mute</a>
											</div>
										</div>
									</div>
									<div class="email-list mt-3">
									@if(count($ticket)<=0)
									<div class="subject">No pending tickets right now!!!</div>
									@endif
									@foreach ($ticket as $newticket)
										<div class="message">
											<div>
												<div class="d-flex message-single">
													<div class="pl-1 align-self-center">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input"
																id="checkbox7">
															<label class="custom-control-label" for="checkbox7"></label>
														</div>
													</div>
													<div class="ml-2">
														<button class="border-0 bg-transparent align-middle p-0"><i
																class="fa fa-star" aria-hidden="true"></i></button>
													</div>
												</div>
												<a href="/ticketdetails/{{$newticket->id}}" class="col-mail col-mail-2">
													<div class="subject">{{$newticket->body}}</div>
													<div class="date">{{$newticket->created_at}}</div>
												</a>
											</div>
										</div>
										@endforeach

									</div>
									<!-- panel pagination -->
									<!-- <div class="row mt-4">
										<div class="col-12 pl-3">
											<nav>
												<ul
													class="pagination pagination-gutter pagination-primary pagination-sm no-bg">
													<li class="page-item page-indicator"><a class="page-link"
															href="javascript:void()"><i
																class="la la-angle-left"></i></a></li>
													<li class="page-item "><a class="page-link"
															href="javascript:void()">1</a></li>
													<li class="page-item active"><a class="page-link"
															href="javascript:void()">2</a></li>
													<li class="page-item"><a class="page-link"
															href="javascript:void()">3</a></li>
													<li class="page-item"><a class="page-link"
															href="javascript:void()">4</a></li>
													<li class="page-item page-indicator"><a class="page-link"
															href="javascript:void()"><i
																class="la la-angle-right"></i></a></li>
												</ul>
											</nav>
										</div>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!--**********************************
            Content body end
        ***********************************-->
<!-- Create new ticket modal -->
<div class="modal fade" id="newticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Create New Ticket</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		    <div class="compose-content">
				<form action="tickets" method="post" id="createticket">
					@csrf
					<div class="form-group">
					<label for="sender">Origin</label>
						<input type="text" id="sender" class="form-control bg-transparent" placeholder="Sender:" name="sender" required>
					</div>
					<div class="form-group">
					<label for="subject">Subject</label>
						<input type="text" class="form-control bg-transparent" placeholder=" Subject:" name="subject" id="subject" required>
					</div>
					<div class="form-group">
					<label for="status">Ticket Status</label>
						<input type="text" class="form-control bg-transparent text-muted" id="status" value="unassigned" name="status" readonly>
					</div>
					<div class="form-group">
                        <label class="mb-1"><strong>Ticket Source</strong></label>
                        <select class="form-control" name="source">
                            <option>Contact form</option>
        					<option>Phone Call</option>
        					<option>FaceBook</option>
        					<option>Whatsap</option>
        					<option>ChatBot</option>
                        </select>
                    </div>
				<div class="form-group">
					<label>Ticket priority</label>
					<select class="form-control" id="ticketpriority" name="priority">
					<option>low</option>
					<option>Medium</option>
					<option>High</option>
					</select>
				</div>
				<div class="form-group">
					<label>Assign to group (optional)</label>
					<select class="form-control" id="ticketgroup" name="group">
					<option>select group</option>
					<option>refunds</option>
					<option>satisfaction</option>
					<option>technical</option>
					<option>others</option>
					</select>
				</div>
					<div class="form-group">
					<label for="ticketsource">Ticket description</label>
						<textarea id="ticketdescription" class="textarea_editor form-control bg-transparent" rows="8" placeholder="Enter ticket description..." name="description" required>
						</textarea>
					</div>
				</form>
			</div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
		  <button type="submit" class="btn btn-primary" form="createticket">create ticket</button>
		</div>
	  </div>
	</div>
  </div>
</div>

<!--**********************************
        Scripts
    ***********************************-->
	<!-- Required vendors -->
	<script src="{{ URL::asset('vendor/global/global.min.js')}}"></script>
	<script src="{{ URL::asset('js/custom.min.js')}}"></script>
	<script src="{{ URL::asset('js/deznav-init.js')}}"></script>
@endsection