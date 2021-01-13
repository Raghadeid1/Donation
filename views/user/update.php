
<div>
    <h1>Update Child info</h1>
</div>

<div class="bs-component">
    <form action="<?php echo BASEPATH; ?>user/storeUpdate/<?php echo $data['id']; ?>" method="POST">
        <fieldset>
        
            <div class="form-group">
                <label>اسم المستخدم</label>
                <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>">
            </div>
            
            <div class="form-group">
                <label>كلمة السر</label>
                <input type="password" name="password" class="form-control" value="<?php echo $data['password']; ?>">
            </div>
            
            <div class="form-group">
                <label>نوع الحساب</label>
                <select class="form-control form-control-lg" id="accType" name="accType">
                    <option value="admin" <?php if($data['accType']=='admin'){echo "Selected";} ?> >Admin</option>
                    <option value="manager" <?php if($data['accType']=='manager'){echo "Selected";} ?> >Manager</option>
                    <option value="donor" <?php if($data['accType']=='donor'){echo "Selected";} ?> >Donor</option>
                </select>
            </div>
            
            <div>
                <input class="btn btn-primary" type="submit" value="تعديل">
            </div>

        </fieldset>
    </form>
</div>