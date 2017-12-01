@extends('layout.admin')
@section('content')
<!-- general form elements -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Fields with asterisk(*) is required.</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="{{url('/admin/qce/addnew')}}" method="POST" role="form">
    {{ csrf_field() }}
    <div class="box-body">
      <div class="form-group">
        <label for="appendix">Appendix</label>
        <input type="text" name="appendix" class="form-control" id="appendix" placeholder="Example: A" value="{{old('appendix')}}">
      </div>
      <div class="form-group">
        <label for="nbcNumber">NBC No. <span class="field-required">*</span></label>
        <input type="text" name="nbc_number" class="form-control" id="nbc" placeholder="The QCE of the NBC No." value="{{old('nbc_number')}}">
        <div class="has-error">
          <span class="help-block">{{$errors->first('nbc_number')}}</span>
        </div>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" class="form-control" id="description" placeholder="Instrument for Instruction/Teaching Effectiveness" value="{{old('description')}}">
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