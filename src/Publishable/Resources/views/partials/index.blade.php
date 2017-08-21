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
						<a class="refreshMails btn btn-default m-r-sm" data-toggle="tooltip" id="refreshMails" data-placement="top" title="Refresh"><i class="fa fa-refresh"></i></a>
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
@section('page-scripts')
	<script>
        $( document ).ready(function() {
            $('.refreshMails').on('click', function (e) {
                e.stopPropagation();
                e.preventDefault();
                //1.2 fetch the emails
                $.ajax({
                    type: "GET",
                    url: "mail/ajax"
                })
                    .done(function(data)
                    {
                        // 1. remove all existing rows
                        $("tr:has(td)").remove();
                        var keys = Object.assign([], data).reverse(); //reverse the data to have the latest first
                        // 2. get each article
                        $.each(keys, function (index, email) {

                            // 2.2 Create checkbox
                            var td_checkbox = $("<td class='hidden-xs' />");
								var span_checkbox = $("<span><input type='checkbox' class='checkbox-mail'></span>");
								td_checkbox.append(span_checkbox);
							// 2.2 Create star
                            var td_star = $("<td class='hidden-xs' />");
								var span_star = $("<i class='fa fa-star icon-state-warning'></i>");
								td_star.append(span_star);
							// 2.2 Create paper clip
                            var td_paper_clip = $("<td/>");
								var span_clip = $("<i class='fa fa-paperclip'></i>");
                            	td_paper_clip.append(span_clip);
                            var the_date = new Date(email.date);
                            //identify css options
							if(email.seen === 0){
                                var css_option = 'unread'
							}else {
                                var css_option = 'read'
							}


                            // 2.6 Create a new row and append 3 columns (title+url, categories, tags)
                            $("#emailId").append($("<tr class='"+css_option+"' data-id='"+email.uid+"' />")
                                .append(td_checkbox)
                                .append(td_star)
                                .append($('<td/>').text(email.from))
                                .append($('<td/>').text(email.subject))
                                .append(td_paper_clip)
                                .append($('<td/>').text(the_date))
                            );
                        });
                    });


            })

        });

	</script>
@endsection