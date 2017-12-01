@if(session('success'))
@include('admin.pages.qce.modals.success')

@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('#modal-success').modal('show');
  });  
</script>
@endsection
@endif