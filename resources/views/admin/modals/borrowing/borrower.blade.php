<div class="modal fade" id="borrowerModal" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" >
        <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white">
           Borrower
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action=" {{ route('borrowing.clearItems') }}" method="post" id="clearItemsForm">
            @csrf
        </form>
        <div class="modal-body">
            @if(Session::has('borrowercategory'))
                <h5 class="text-primary"> Borrower Category:         {{ Session::get('borrowercategory') }}</h5>
            @else
                {{ 'No Borrower category selected.' }}
            @endif

            <h5 class="text-primary">Borrowers:</h5>
            @if(Session::get('borrowercategory') =='Student')

                @foreach ($Students->whereIn('id' , Session::get('borrowerid')) as $student)
                    <p class="mx-4 my-1">{{ $student->firstname . ' ' . $student->lastname}}</p>
                @endforeach
            @else
                @foreach ($Sections->whereIn('id' , Session::get('borrowerid')) as $section)
                    <p class="mx-4 my-1">{{ $section->sectionname}}</p>
                @endforeach
            @endif
        </div>
    </div>
    </div>
</div>
{{-- <script type="text/javascript">
    $(document).ready(function() {
        var table = $('#addedItemsTable').DataTable( {
            responsive: true,
            paging:false,
        } );

        new $.fn.dataTable.FixedHeader( table );
    });
</script> --}}
