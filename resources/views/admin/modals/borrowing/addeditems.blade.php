<div class="modal fade" id="addedItemsModal" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" >
        <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white">
            Added Items
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action=" {{ route('borrowing.clearItems') }}" method="post" id="clearItemsForm">
            @csrf
        </form>
        <div class="modal-body">
            <div class="table-responsive p-0 mx-2" >
                <table class="table align-items-center mb-0 table-bordered table-striped nowrap w-100 " id="addedItemsTable"   >
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Item</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Qty</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($Apparatus->whereIn('id',Session::get('addeditems')) as $apparatus)
                        <tr>
                            @php
                                $apparatusindex = array_search($apparatus->id,Session::get('addeditems'));
                            @endphp
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $apparatus->name }}</td>
                            <td class="text-center"> {{ Session::get('qty')[$apparatusindex] }}</td>
                            <td class="text-center">
                                <button class="btn btn-primary px-2">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                  </tbody>
                </table>
            </div>
            <div class="d-flex flex-row-reverse ">
                <div class="p-2 ">
                    <button class="btn btn-danger" onclick="event.preventDefault();
                    document.getElementById('clearItemsForm').submit();">Clear</button>
                </div>
                <div class="p-2 ">
                    <a type="button" class="btn btn-primary" href=" {{ route('borrowing.borrowing') }}">Sumit</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#addedItemsTable').DataTable( {
            responsive: true,
            paging:false,
        } );

        new $.fn.dataTable.FixedHeader( table );
    });
</script>
