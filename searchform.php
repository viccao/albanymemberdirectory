<div class="fields">
    <div class="row">
        <div class="col-sm-6 col-10 mx-auto">
            <input id="member-first" name="first" class="member-field" type="text" required>
            <label>First Name</label>

        </div>
        <div class="col-sm-6 col-10 mx-auto">

            <input id="member-last" name="last" class="member-field" type="text" required>
            <label>Last Name</label>


        </div>

    </div>
</div>


    <form action="/" method="get">
        <div class="search-overlay"></div>

        <div class="row">
            <div class="col-sm-12 col-10 mx-auto">
                <input type="text" name="s" id="search" placeholder="Search" value="<?php the_search_query(); ?>" required/>
                <div class="submit-cover">
                <div class="notice">First and last name are required to search Member ID</div>
                <input type="submit" value="Search" class="btn" disabled="true">
                </div>
            </div>
        </div>
    </form>
