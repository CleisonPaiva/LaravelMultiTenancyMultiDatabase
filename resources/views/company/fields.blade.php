<div class="row mb-6" >
    <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="fv-row mb-0">
            <label for="text" class="form-label fs-6 fw-bolder mb-3">Company Name</label>
            <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Company Name" name="name" value="{{ old('name') }}" id="name"/>
        </div>
    </div>

    <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="fv-row mb-0">
            <label for="text" class="form-label fs-6 fw-bolder mb-3">SubDomain</label>
            <input type="text" class="form-control form-control-lg form-control-solid" placeholder="SubDomain" name="subdomain" value="{{ old('subdomain') }}" id="subdomain"/>
        </div>
    </div>
</div>
<div class="row mb-6">
    <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="fv-row mb-0">
            <label for="text" class="form-label fs-6 fw-bolder mb-3">Database Name</label>
            <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Database Name" name="db_database" value="{{ old('db_database') }}" id="db_database"/>
        </div>
    </div>

    <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="fv-row mb-0">
            <label for="text" class="form-label fs-6 fw-bolder mb-3">Host Name</label>
            <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Host Name" name="db_hostname" value="{{ old('db_hostname') }}" id="db_hostname"/>
        </div>
    </div>
</div>

<div class="row mb-6">
    <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="fv-row mb-0">
            <label for="text" class="form-label fs-6 fw-bolder mb-3">DB Username</label>
            <input type="text" class="form-control form-control-lg form-control-solid" placeholder="DB Username" name="db_username" value="{{ old('db_username') }}" id="db_username"/>
        </div>
    </div>

    <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="fv-row mb-0">
            <label for="password" class="form-label fs-6 fw-bolder mb-3">DB Password</label>
            <input type="password" class="form-control form-control-lg form-control-solid" placeholder="DB Password" name="db_password" value="{{ old('db_password') }}" id="db_password"/>
        </div>
    </div>
</div>
