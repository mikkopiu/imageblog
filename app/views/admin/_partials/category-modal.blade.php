<!-- Category Modal -->
@foreach ($categories as $i => $category)
<div class="modal fade" id="myModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title" id="myModalLabel">Edit category</h3>
			</div>
			<!-- /.modal-header -->
			<div class="modal-body">
				{{ Form::model($category, array('method' => 'put', 'route' => array('admin.categories.update', $category->id))) }}

					<div class="form-group">
						{{ Form::label('category', 'Name') }}
						{{ Form::text('category', null, array('class'=>'form-control','placeholder'=>'Enter name for category')) }}
					</div>
			</div>
			<!-- /.modal-body -->
			<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
				{{ Form::close() }}
			</div>
			<!-- /.modal-footer -->
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach