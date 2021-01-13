
<div>
    <h1>Create Child</h1>
</div>

<div class="bs-component">
    <form action="<?php echo BASEPATH; ?>user/storeCreate" method="POST">
        <fieldset>

            <div class="form-group">
                <label>اسم المستخدم</label>
                <input type="text" name="username" class="form-control">
            </div>
            
            <div class="form-group">
                <label>كلمة السر</label>
                <input type="password" name="password" class="form-control">
            </div>
            
            <div class="form-group">
                <label>نوع الحساب</label>
                <select class="form-control form-control-lg" id="accType" name="accType">
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="donor">Donor</option>
                </select>
            </div>
            
            <div>
                <input class="btn btn-primary" type="submit" value="إدخال">
            </div>

        </fieldset>
    </form>
</div>