<form action="{!! route($action) !!}" method="GET">
    <div class="row g-3 align-items-center mb-4">
        <div class="col-5">
            <input type="text" name="name" id="name" class="form-control" placeholder="Search By Name . . . "
            value="{{ Request::get('name') ?? '' }}">
        </div>

        <div class="col-5">
            <input type="text" name="email" id="email" class="form-control" placeholder="Search By Email . . . "
            value="{{ Request::get('email') ?? '' }}">
        </div>

        <div class="col-2">
            <button type="submit" class="btn btn-primary w-100 search-btn rounded-0">
                Search
            </button>
        </div>
    </div>
</form>
