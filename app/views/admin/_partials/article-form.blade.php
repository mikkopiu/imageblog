{{-- Open Form to prepare for saving new page --}}
{{-- Don't need to define HTTP method, Form functions via POST --}}
{{ Form::open(array('route'=>'admin.articles.store', 'files'=>true)) }}
	<div class="form-group">
		{{ Form::label('title', 'Title') }}
		{{ Form::text('title', null, array('class'=>'form-control','placeholder'=>'Enter title')) }}
	</div>
	<div class="form-group">
		{{ Form::label('image', 'Image') }}<br>
		{{-- fileinput from Jasny's Bootstrap --}}
		<div class="fileinput fileinput-new" data-provides="fileinput">
			<div class="fileinput-new thumbnail" style="width: 200px;">
				<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image">
			</div>
			<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px;"></div>
			<div>
				<span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{{ Form::file('image') }}</span>
				<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
			</div>
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('body', 'Description') }}
		{{ Form::textarea('body', null, array('class'=>'form-control','rows'=>'3')) }}
	</div>
	<div class="form-group">
		{{ Form::label('category', 'Category') }}
		{{ Form::select('category', array(
			'1' => 'Category 1',
			'2' => 'Category 2',
			'3' => 'Category 3',
			'4' => 'Category 4',
			'5' => 'Category 5',), null, array('class' => 'form-control')); }}
	</div>
	{{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
	{{ Form::reset('Reset', ['class' => 'btn btn-default']) }}
{{ Form::close() }}