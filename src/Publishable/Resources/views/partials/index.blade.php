@extends(config('temail.views.layouts.master'))

@section('content')
	<div class="col-md-12">
		<div class="mailbox-content">
			<table class="table" id="emailId">
				<thead>
				<tr>
					<th colspan="1" class="hidden-xs">
						<span><input type="checkbox" class="check-mail-all"></span>
					</th>
					<th class="text-right" colspan="5">
						<span class="text-muted m-r-sm">Showing 20 of 346 </span>
						<a class="btn btn-default m-r-sm" data-toggle="tooltip" data-placement="top" title="Refresh"><i class="fa fa-refresh"></i></a>
						<div class="btn-group m-r-sm mail-hidden-options">
							<a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
							<a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Report Spam"><i class="fa fa-exclamation-circle"></i></a>
							<a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Mark as Important"><i class="fa fa-star"></i></a>
							<a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Mark as Read"><i class="fa fa-pencil"></i></a>
						</div>
						<div class="btn-group m-r-sm mail-hidden-options">
							<div class="btn-group">
								<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-folder"></i> <span class="caret"></span></a>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="#">Social</a></li>
									<li><a href="#">Forums</a></li>
									<li><a href="#">Updates</a></li>
									<li class="divider"></li>
									<li><a href="#">Spam</a></li>
									<li><a href="#">Trash</a></li>
									<li class="divider"></li>
									<li><a href="#">New</a></li>
								</ul>
							</div>
							<div class="btn-group">
								<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tags"></i> <span class="caret"></span></a>
								<ul class="dropdown-menu dropdown-menu-right" role="menu">
									<li><a href="#">Work</a></li>
									<li><a href="#">Family</a></li>
									<li><a href="#">Social</a></li>
									<li class="divider"></li>
									<li><a href="#">Primary</a></li>
									<li><a href="#">Promotions</a></li>
									<li><a href="#">Forums</a></li>
								</ul>
							</div>
						</div>
						<div class="btn-group">
							<a class="btn btn-default"><i class="fa fa-angle-left"></i></a>
							<a class="btn btn-default"><i class="fa fa-angle-right"></i></a>
						</div>
					</th>
				</tr>
				</thead>
				<tbody >
				@if(isset($emails))
					@foreach($emails as $email)
						<tr    @if($email->seen === 0)
							   class="unread"
							   @else
							   class="read"
							   @endif
							   data-id="{{$email->uid}}"
						>
							<td class="hidden-xs">
								<span><input type="checkbox" class="checkbox-mail"></span>
							</td>
							<td class="hidden-xs">
								<i class="fa fa-star icon-state-warning"></i>
							</td>
							<td class="hidden-xs">
								{{$email->from}}
							</td>
							<td>
								{{--<a href="/Emails/{{$email->uid}}" class="btn btn-block">
                                    {{ str_limit( $email->subject, $limit = 50, $end = '.......') }}
                                </a>--}}
								{{ str_limit( $email->subject, $limit = 50, $end = '.......') }}
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
				{{--<tbody>
                <tr class="unread">
                    <td class="hidden-xs">
                        <span><input type="checkbox" class="checkbox-mail"></span>
                    </td>
                    <td class="hidden-xs">
                        <i class="fa fa-star icon-state-warning"></i>
                    </td>
                    <td class="hidden-xs">
                        Themeforest
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit
                    </td>
                    <td>
                    </td>
                    <td>
                        20 march
                    </td>
                </tr>
                </tbody>--}}
			</table>
		</div>
	</div>
@endsection
