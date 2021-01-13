
<div class="page-header">
    <h1>Update Child info</h1>
</div>

<div class="bs-component">
    <form action="<?php echo BASEPATH; ?>child/storeUpdate/<?php echo $data['id']; ?>" method="POST">
        <fieldset>

            <div class="form-group">
                <label>اسم الطفل</label>
                <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>">
            </div>
            
            <div class="form-group">
                <label>تاريخ الميلاد</label>
                <input type="date" name="birthdate" class="form-control" value="<?php echo $data['birthdate']; ?>">
            </div>
            
            <div class="form-group">
                <label>الحالة</label>
                <input type="text" name="status" class="form-control" value="<?php echo $data['status']; ?>">
            </div>

            <div>
                <input class="btn btn-primary" type="submit" value="تعديل">
            </div>

        </fieldset>
    </form>
</div>