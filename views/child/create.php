
<div>
    <h1>Create Child</h1>
</div>

<div class="bs-component">
    <form action="<?php echo BASEPATH; ?>child/storeCreate" method="POST">
        <fieldset>

            <div class="form-group">
                <label>اسم الطفل</label>
                <input type="text" name="name" class="form-control">
            </div>
            
            <div class="form-group">
                <label>تاريخ الميلاد</label>
                <input type="date" name="birthdate" class="form-control">
            </div>
            
            <div class="form-group">
                <label>الحالة</label>
                <input type="text" name="status" class="form-control">
            </div>
            
            <div>
                <input class="btn btn-primary" type="submit" value="إدخال">
            </div>

        </fieldset>
    </form>
</div>