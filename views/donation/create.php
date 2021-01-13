
<div>
    <h1>Create Donation</h1>
</div>

<div class="bs-component">
    <form action="<?php echo BASEPATH; ?>donation/storeCreate" method="POST">
        <fieldset>

            <div class="form-group">
                <label>المتبرع</label>
                <select class="form-control form-control-lg" id="donor_id" name="donor_id">
                    <?php foreach ($donors as $key => $drow) { ?>
                        <option value="<?php echo $drow['id'] ?>"><?php echo $drow['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>الطفل</label>
                <select class="form-control form-control-lg" id="child_id" name="child_id">
                    <?php foreach ($childs as $key => $crow) { ?>
                        <option value="<?php echo $crow['id'] ?>"><?php echo $crow['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>المبلغ</label>
                <input type="text" name="amount" class="form-control">
            </div>
            
            <div class="form-group">
                <label>نوع التبرع</label>
                <select class="form-control form-control-lg" id="type" name="type">
                    <option value="waranty">Waranty</option>
                    <option value="cash">Cash</option>
                    <option value="inkind">Inkind</option>
                    <option value="activities">Activities</option>
                </select>
            </div>
			
            <div class="form-group">
                <label>الملاحظات</label>
                <input type="text" name="Notes" class="form-control">
            </div>
            
        
            <div>
                <input class="btn btn-primary" type="submit" value="إدخال">
            </div>

        </fieldset>
    </form>
</div>