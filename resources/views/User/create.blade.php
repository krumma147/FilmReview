Create Page
<div class="container">
    <form action="/users" method="POST">
    @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text"
                class="form-control" name="name" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text"
                class="form-control" name="email" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text"
                class="form-control" name="password"  aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
            <label for="usertype" class="form-label">User Type</label>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="radio" class="btn-check" name="usertype" value="1" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck1">Admin</label>
                
                <input type="radio" class="btn-check" name="usertype" value="0" autocomplete="off">
                <label class="btn btn-outline-primary" for="btncheck2">User</label>
            </div>
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div>
    
        <div class="d-grid gap-2">
            <button type="submit" name="" id="" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>