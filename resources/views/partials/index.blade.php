@extends('layouts.app-org')

@section('content')
<div class="col-md-10">
		<div class="panel panel-white">
		<div class="panel-body mailbox-content">
		<table class="table">
				<thead>
						<tr>
								<th colspan="1" class="hidden-xs">
										<span><input type="checkbox" class="check-mail-all"></span>
								</th>
								<th class="text-right" colspan="5">
										<span class="text-muted m-r-sm">Showing 20 of 346 </span>
										<a class="btn btn-default m-r-sm" data-toggle="tooltip" data-placement="top" title="Refresh"><i class="fa fa-refresh"></i></a>
										<div class="btn-group">
												<a class="btn btn-default"><i class="fa fa-angle-left"></i></a>
												<a class="btn btn-default"><i class="fa fa-angle-right"></i></a>
										</div>
								</th>
						</tr>
				</thead>
				<tbody>
						@if(isset($emails))
						@foreach($emails as $email)
							<tr class="read">
									<td class="hidden-xs">
											<span><input type="checkbox" class="checkbox-mail"></span>
									</td>
									<td class="hidden-xs">
											<i class="fa fa-star"></i>
									</td>
									<td class="hidden-xs" width="30%">
										{{$email->from}}
												@if(isset($email->seen) == 1)
													<span class="badge badge-success pull-right">Unread</span>
												@endif
									</td>
									<td>
											<a href="/Emails/{{$email->uid}}" class="btn btn-block">
												{{ str_limit( $email->subject, $limit = 50, $end = '.......') }}
											</a>
									</td>
									<td>
											<i class="fa fa-paperclip"></i>
									</td>
									<td>
											{{date("M.j.Y g:i a", strtotime($email->date))}}
									</td>
							</tr>
						@endforeach
						@endif
				</tbody>
		</table>
		</div>
		</div>
</div>
@endsection
