@extends('layouts.app')

<style>    .pagination
    {
        display: block;
        width: 75%;
        margin: 1em auto;
        text-align: center;
        &:after
        {
            content: '';
            clear: both;
        }
    }
    .pagination-button
    {
        display: inline-block;
        padding: 5px 10px;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        background-color: rgb(106, 69, 241);
        color:white;
        cursor: pointer;
        transition: background 0.1s, color 0.1s;
        &:hover
        {
            background-color: #ddd;
            color: #3366cc;
        }
        $border-radius: 18px;
        &:first-of-type
        {
            border-radius: $border-radius 0 0 $border-radius;
        }
        &:last-of-type
        {
            border-radius: 0 $border-radius $border-radius 0;
        }
    }</style>
@section('content')

<div class="container-fluid py-4">

    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Sections</p>
                    <h5 class="font-weight-bolder">
                      11
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">This Year</p>
                    <h5 class="font-weight-bolder">
                      22
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Current School Year</p>
                    <h5 class="font-weight-bolder">
                      33
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Current Semester</p>
                    <h5 class="font-weight-bolder">
                       44
                    </h5>

                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row pt-4">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">

            <span class="text-end">
                <button type="button" class="btn btn-primary text-white " data-bs-toggle="modal" data-bs-target="#addedItemsModal">
                    <i class="fa-solid fa-bong"></i> Added Items ( {{ sizeOf(Session::get('addeditems')) -1; }} )
                </button>
            </span>

            <input type="text" class="form-control" placeholder="Search here..." id="searchbox" >
          </div>
          <div class="card-body px-0 pt-0 pb-2">

                <div class="row mx-2" id="contenthere">
                    @php  $index=1; @endphp
                    @foreach ($Apparatus as $apparatus)
                    @if ($apparatus->available > 0)
                        <div class="article-loop col-md-3 col-sm-6 mt-md-3 mt-4">
                            <div class="card">
                                <div class="card-header mx-4 p-3 text-center">
                                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                        <i class="fab fa-paypal opacity-10"></i>
                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">{{ $apparatus->name }}</h6>
                                    <p class="text-xs">{{ $apparatus->location }}</p>
                                    @php
                                        $apparatusindex = array_search($apparatus->id, Session::get('addeditems'));
                                        if ($apparatusindex != null) {
                                            $itemqty = Session::get('qty');
                                            $tosubtract = $itemqty[$apparatusindex];
                                        } else {
                                            $tosubtract = 0;
                                        }
                                    @endphp
                                    <span class="text-success font-weight-bolder">{{ ($apparatus->available - $tosubtract) . ' ' . 'pc(s) Available' }}</span>
                                    <hr class="horizontal dark my-3">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-sm w-100 mt-2" type="number" id="qty_{{ $loop->index + 1 }}" required>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <button type="button" class="btn btn-info w-100 mt-2" onclick="additem({{ $loop->index + 1 }}, {{ $apparatus->id }}, {{ $apparatus->available - $tosubtract }})">
                                                <i class="fa-solid fa-cart-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                </div>
          </div>
        </div>
      </div>
    </div>



    <form action=" {{ route('borrowing.additem') }}" method="POST" id="addItemForm">
        @csrf
        <input type="hidden" id="apparatusid" name="apparatusid">
        <input type="hidden" id="apparatusqty" name="apparatusqty">
    </form>
</div>


<script> //SEARCH SCRIPT
    CSRF = $("meta[name='csrf-token']").attr('content');
    $('#searchbox').on('keyup',function(){

        $.ajax({
            url: '/borrowing/' ,
            type: 'POST',
            data: {_token: CSRF , search:$(this).val()},
            success: function(data)
            {
                // document.getElementById("contenthere").innerHTML = '';
                // data.forEach(apparatus => document.getElementById("contenthere").innerHTML += `<p>` + apparatus.name + `<p>`);
                document.getElementById("contenthere").innerHTML ='';
                for(let i=0; i< data.length; i++)
                {
                    let apparatusindex = @json(Session::get('addeditems')).indexOf(data[i].id.toString());
                    let tosubtract = apparatusindex == -1 ? 0: @json(Session::get('qty'))[apparatusindex];
                    document.getElementById("contenthere").innerHTML += `<div class=" article-loop col-md-3 col-sm-6   mt-md-3 mt-4">
                    <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="fab fa-paypal opacity-10"></i>
                        </div>
                        </div>
                        <div class="card-body pt-0 p-3 text-center">
                        <h6 class="text-center mb-0">`+ data[i].name + `</h6>
                        <p class="text-xs">` + data[i] .location+ `</p>
                        <span class="text-success font-weight-bolder">` + (data[i].available - tosubtract) + `pc(s) Available</span>
                        <hr class="horizontal dark my-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-8">
                                <input class="form-control  form-control-sm w-100 mt-2" type="number" id="qty_` + (i+1) +`" required>
                            </div>
                            <div class="col-sm-12 col-md-4" >
                                <button class="btn btn-info w-100 mt-2" onclick="additem(` +(i+1)+ ',' + data[i].id + ',' +  (data[i].available - tosubtract)  +`)"> <i class="fa-solid fa-cart-plus"></i> </button>
                            </div>
                        </div>
                        <h5 class="mb-0">$455.00</h5>
                        </div>
                    </div>
                    </div>`;
                }
                $('.article-loop').paginate(12);
            }
        })

    });

</script>

<script type="text/javascript"> //PAGING SCRIPT
    (function($)
    {
        var paginate = {
            startPos: function(pageNumber, perPage) {
                // determine what array position to start from
                // based on current page and # per page
                return pageNumber * perPage;
            },
            getPage: function(items, startPos, perPage) {
                // declare an empty array to hold our page items
                var page = [];
                // only get items after the starting position
                items = items.slice(startPos, items.length);
                // loop remaining items until max per page
                for (var i=0; i < perPage; i++) {
                    page.push(items[i]); }
                return page;
            },
            totalPages: function(items, perPage) {
                // determine total number of pages
                return Math.ceil(items.length / perPage);
            },
            createBtns: function(totalPages, currentPage) {
                // create buttons to manipulate current page
                var pagination = $('<div class="pagination" />');
                // add a "first" button
                pagination.append('<span class="pagination-button">&laquo;</span>');
                // add pages inbetween
                for (var i=1; i <= totalPages; i++) {
                    // truncate list when too large
                    if (totalPages > 5 && currentPage !== i) {
                        // if on first two pages
                        if (currentPage === 1 || currentPage === 2) {
                            // show first 5 pages
                            if (i > 5) continue;
                        // if on last two pages
                        } else if (currentPage === totalPages || currentPage === totalPages - 1) {
                            // show last 5 pages
                            if (i < totalPages - 4) continue;
                        // otherwise show 5 pages w/ current in middle
                        } else {
                            if (i < currentPage - 2 || i > currentPage + 2) {
                                continue; }
                        }
                    }
                    // markup for page button
                    var pageBtn = $('<span class="pagination-button page-num" />');
                    // add active class for current page
                    if (i == currentPage) {
                        pageBtn.addClass('active'); }
                    // set text to the page number
                    pageBtn.text(i);
                    // add button to the container
                    pagination.append(pageBtn);
                }
                // add a "last" button
                pagination.append($('<span class="pagination-button">&raquo;</span>'));
                return pagination;
            },
            createPage: function(items, currentPage, perPage) {
                // remove pagination from the page
                $('.pagination').remove();
                // set context for the items
                var container = items.parent(),
                    // detach items from the page and cast as array
                    items = items.detach().toArray(),
                    // get start position and select items for page
                    startPos = this.startPos(currentPage - 1, perPage),
                    page = this.getPage(items, startPos, perPage);
                // loop items and readd to page
                $.each(page, function(){
                    // prevent empty items that return as Window
                    if (this.window === undefined) {
                        container.append($(this)); }
                });
                // prep pagination buttons and add to page
                var totalPages = this.totalPages(items, perPage),
                    pageButtons = this.createBtns(totalPages, currentPage);
                container.after(pageButtons);
            }
        };
        // stuff it all into a jQuery method!
        $.fn.paginate = function(perPage) {
            var items = $(this);
            // default perPage to 5
            if (isNaN(perPage) || perPage === undefined) {
                perPage = 5; }
            // don't fire if fewer items than perPage
            if (items.length <= perPage) {
                return true; }
            // ensure items stay in the same DOM position
            if (items.length !== items.parent()[0].children.length) {
                items.wrapAll('<div class="pagination-items" />');
            }
            // paginate the items starting at page 1
            paginate.createPage(items, 1, perPage);
            // handle click events on the buttons
            $(document).on('click', '.pagination-button', function(e) {
                // get current page from active button
                var currentPage = parseInt($('.pagination-button.active').text(), 10),
                    newPage = currentPage,
                    totalPages = paginate.totalPages(items, perPage),
                    target = $(e.target);
                // get numbered page
                newPage = parseInt(target.text(), 10);
                if (target.text() == '«') newPage = 1;
                if (target.text() == '»') newPage = totalPages;
                // ensure newPage is in available range
                if (newPage > 0 && newPage <= totalPages) {
                    paginate.createPage(items, newPage, perPage); }
            });
        };
    })(jQuery);
    $('.article-loop').paginate(12);
</script>


<script>
    function additem(id, apparatusid ,limitqty)
    {

        var qty=document.getElementById('qty_' + id).value;

        if (qty =='' || qty < 0 || qty > limitqty)
        {
            document.getElementById('qty_' + id).focus();
        }
        else
        {
            document.getElementById('apparatusid').value =  apparatusid ;
            document.getElementById('apparatusqty').value = qty ;
            document.getElementById('addItemForm').submit();
            console.log(qty);
        }
    }
</script>


@include('admin.modals.borrowing.addeditems')
@include('components.notification')
@endsection
