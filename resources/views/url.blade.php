@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="justify-content-center">

		<form id="shortenUrl">
            @csrf
            <div class="input-group mb-3">
              <input type="text" name="url" class="form-control url" placeholder="Shorten your link" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-info shorten_url" type="submit">Shorten</button>
              </div>
            </div>

			<span class="errormsg text-danger mb-5"></span>
        </form>

    	<div class="row">
			<div class="col-12 col-lg-12 col-xxl-12 d-flex">
				<div class="card flex-fill">
					<div class="card-header">

						<h5 class="card-title mb-0">Latest Urls</h5>
					</div>
					<table id="dataTable" class="table table-hover my-0">
						<thead>
							<tr>
								<th>Title</th>
								<th class="d-none d-xl-table-cell">URL</th>
								<th class="d-none d-xl-table-cell">Short URL</th>
								<th class="d-none d-md-table-cell">Created Date</th>
								<th class="d-none d-md-table-cell">Copy</th>
							</tr>
						</thead>
						<tbody>
						@if(!$urls->isEmpty())
						@foreach($urls as $url)
							<tr>
								<td>{{ $url->title }}</td>
								<td class="d-none d-xl-table-cell">{{ $url->url }}</td>
								<td class="d-none d-xl-table-cell">
								<a href="{{ route('shorten.url', $url->title) }}" target="_blank">
									{{ route('shorten.url', $url->title) }}</a></td>
								<td><span class="badge bg-success"> {{$url->created_at}}</span></td>
								<td class="code-container d-none d-md-table-cell">
									<span style="display:none;" class="code"><span>{{ $url->url }}</span></span>
									<button style="margin-left:5px;float:;" 
										onclick="copyToClipboard(this)" type="button" 
										class="btn btn-info btn-xs"><i class="align-middle me-2" data-feather="copy"></i>Copy
									</button> 
									<span id="copy_tooltip" aria-live="assertive" role="tooltip"></span>	
								</td>
							</tr>					
                    	@endforeach
						@else				
    						<td colspan="5">No urls found!</td>
						@endif
						</tbody>
					</table>

					<div class="d-flex mt-5 justify-content-center">
  						{!! $urls->links() !!}
					</div>

				</div>
			</div>
		</div>
    </div>
</div>
@endsection
@section('scripts')


<script>

function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).parents('.code-container').find('.code span').text()).select();
    document.execCommand("copy");
	$(element).parents('.code-container').find('button').text('Copied!');
    $temp.remove();
}

$(document).ready(function() {

$(".url").on("keyup change", function(e) {
	$('.errormsg').text('');
});

$(".shorten_url").click(function (e) {
	e.preventDefault();

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
		}
	});

	var url = $('.url').val();

	if(url!=""){

		$.ajax({
			url: "shorten",
			type: "POST",
			data: {url : url},
			cache: false,
			success: function(response){

				if(response.status == 200){
					swal("Success", "Shorten URL Generated Successfully!", "success");	
					$('.url').val('');
					$('tbody').html("");
				
				
					$.each(response.urls.data, function(key, item) {
						$('tbody').append(
							'<tr>\
							<td>'+item.title+'</td>\
							<td class="d-none d-xl-table-cell">'+item.url+'</td>\
							<td class="d-none d-xl-table-cell">\
							<a href="http://localhost:8000/'+item.title+'" target="_blank">\
							http://localhost:8000/'+item.title+'</a></td>\
							<td><span class="badge bg-success">'+item.created_at+'</span></td>\
							<td class="code-container d-none d-md-table-cell">\
							<span style="display:none;" class="code"><span>'+item.url+'</span></span>\
							<button style="margin-left:5px;float:;"\
							onclick="copyToClipboard(this)" type="button"\
							class="btn btn-info btn-xs"><i class="align-middle me-2" data-feather="copy"></i>Copy\
							</button> <span id="copy_tooltip" aria-live="assertive" role="tooltip"></span>\
							</td>\
							</tr>'
						);
                	});
				}
				else {
					swal("Oops!", "Something went wrong please try again later!", "error");
					$('.url').val('');	
				} 
			}
		});
	}
	else{
		$('.errormsg').text('URL field is required!');
	}

});

});
</script>

@endsection