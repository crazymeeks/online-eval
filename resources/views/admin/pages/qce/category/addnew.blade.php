@extends('layout.admin')
@section('content')
<!-- general form elements -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Fields with asterisk(*) is required.</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="{{url('/admin/qce/category/crud')}}" method="POST" role="form">
    {{ csrf_field() }}
    <input type="hidden" name="action" value="create">
    <div class="box-body">
      <div class="form-group">
        <label>QCE <span class="field-required">*</span></label>
        <select class="form-control" name="qce_id">
          @foreach($qce as $list)
          <option></option>
          <option <?php echo (! old('qce_id')) ?: "selected='true'"; ?> value="{{$list->id}}"><?php echo (!empty($list->appendix)) ? $list->appendix . '. ' . $list->nbc_number : $list->nbc_number;?></option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="nbcNumber">Index</label>
        <input type="text" name="index" class="form-control" id="index" placeholder="This will appear in front of Category. e.g A. Commitment" value="{{old('index')}}">
      </div>

      <div class="form-group">
        <label for="appendix">Category <span class="field-required">*</span></label>
        <input type="text" name="category" class="form-control" id="category" placeholder="Example: Commitment, Knowledge of Subject" value="{{old('category')}}">
        <div class="has-error">
          <span class="help-block">{{$errors->first('category')}}</span>
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