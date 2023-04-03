@if (Session::get('message'))
    <script>
        $(function()
        {
            $('#notifModal').modal('show');
        });
    </script>
    <div class="modal fade" id="notifModal" role="dialog" >
        <div class="modal-dialog" role="document" >
        <div class="modal-content" >
            <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="exampleModalLabel" style="color:white">
                CLIMS Notification
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="">{{ Session('message') }}</p>
                {{-- @php $request->session()->forget('message');  @endphp --}}
            </div>
        </div>
        </div>
    </div>
@endif
