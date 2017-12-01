@extends('layout.admin')
@section('content')
<!-- general form elements -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Fields with asterisk(*) is required.</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="{{url('/admin/qce/category/question/crud')}}" method="POST" role="form">
    {{ csrf_field() }}
    <input type="hidden" name="action" value="create">
    <div class="box-body">
      <div class="form-group">
        <label>Category <span class="field-required">*</span></label>
        <select class="form-control" name="qce_category_id">
          <option></option>
          @foreach($categories as $category)
          <option <?php echo (! old('qce_category_id')) ?: "selected='true'"; ?> value="{{$category->id}}">{{$category->category}}</option>
          @endforeach
        </select>
        <div class="has-error">
          <span class="help-block">{{$errors->first('qce_category_id')}}</span>
        </div>
      </div>

     <div class="form-group">
        <label>Description <span class="field-required">*</span></label>
        <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."><?php if(old('description')){echo old('description');}?></textarea>
        <div class="has-error">
          <span class="help-block">{{$errors->first('description')}}</span>
        </div>
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

<!-- /.box -->
@include('admin.pages.reusable.messagesuccess')

@endsection