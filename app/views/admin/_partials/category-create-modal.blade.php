<!-- Category creation modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="categoryModalLabel">Add new category</h4>
			</div>
			<!-- /.modal-header -->
			<div class="modal-body">
				{{ Notification::showError() }}
				{{ Notification::showInfo() }}
				{{ Notification::showWarning() }}

				{{-- Open Form to prepare for saving new page --}}
				{{-- Don't need to define HTTP method, Form functions via POST --}}
				{{ Form::open(array('route'=>'admin.categories.store')) }}

					<div class="form-group">
						{{ Form::label('category', 'Name') }}
						{{ Form::text('category', null, array('class'=>'form-control','placeholder'=>'Enter a name for the category')) }}
					</div>
			</div>
			<!-- /.modal-body -->
			<div class="modal-footer">					
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					{{ Form::submit('Submit', array('class' => 'btn btn-success')) }}

				{{ Form::close() }}
			</div>
			<!-- /.modal-footer -->
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->