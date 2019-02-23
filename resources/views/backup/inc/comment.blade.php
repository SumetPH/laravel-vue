<div class="card shadow">
	<div class="card-header">
		<h3 class="card-title text-muted mb-0">แสดงความคิดเห็น</h3>
	</div>
	<div class="card-body">
		<div>
			@foreach ($postcomments as $comm)
			<span>{{ $comm->msg }}</span>
			<p></p>
			<div class="d-flex justify-content-end">
				@if ($comm->username === 'Admin')
				<span class="mr-1 btn btn-success btn-sm" style="cursor: not-allowed">โดย : {{ $comm->username }}</span>
				<span class="mr-1 btn btn-success btn-sm" style="cursor: not-allowed">เวลา : {{ $comm->created_at }}</span>
				@else
				<span class="mr-1 btn btn-info btn-sm" style="cursor: not-allowed">โดย : {{ $comm->username }}</span>
				<span class="mr-1 btn btn-info btn-sm" style="cursor: not-allowed">เวลา : {{ $comm->created_at }}</span>
				@endif
				@if ($comm->username == auth()->user()->firstname)
				<form action="/postcomment/{{$comm->id}}" method="post" onclick="return confirm('คุณต้องการลบความคิดเห็นนี้ใช่หรือไม่')">
					<input type="hidden" name="_method" value="delete">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="mr-1 btn btn-danger btn-sm" style="cursor: pointer;">ลบ</button>
				</form>
				@endif
			</div>
			<hr class="m-3">
			@endforeach
		</div>
		<form action="/postcomment" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="post_id" value="{{ $post->id or $post_id }}">
			<input type="hidden" name="username" value="{{ auth()->user()->firstname }}">
			<div class="form-group">
				<textarea class="form-control" name="msg" rows="2" required></textarea>
				<br>
				<button class="btn btn-primary" type="submit">แสดงความคิดเห็น</button>
			</div>
		</form>
	</div>
</div>