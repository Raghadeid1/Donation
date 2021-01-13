
<div>
    <h1>Update Donation</h1>
</div>

<div class="bs-component">
    <form action="<?php echo BASEPATH; ?>donation/storeUpdate/<?php echo $data['id']; ?>" method="POST">
        <fieldset>

            <div class="form-group">
                <label>المتبرع</label>
                <select class="form-control form-control-lg" id="donor_id" name="donor_id">
                    <?php foreach ($donors as $key => $drow) { ?>
                        <option value="<?php echo $drow['id'] ?>" <?php if($drow['id'] == $data['donor_id']){echo "SELECTED"; }?> ><?php echo $drow['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>الطفل</label>
                <select class="form-control form-control-lg" id="child_id" name="child_id">
                    <?php foreach ($childs as $key => $crow) { ?>
                        <option value="<?php echo $crow['id'] ?>" <?php if($crow['id'] == $data['child_id']){echo "SELECTED"; }?> ><?php echo $crow['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>المبلغ</label>
                <input type="text" name="amount" class="form-control" value="<?php echo $data['amount']; ?>">
            </div>

            <div class="form-group">
                <label>نوع التبرع</label>
                <select class="form-control form-control-lg" id="type" name="type">
                    <option value="waranty" <?php if($data['type'] == "waranty"){echo "SELECTED"; }?> >Waranty</option>
                    <option value="cash" <?php if($data['type'] == "cash"){echo "SELECTED"; }?> >Cash</option>
                    <option value="inkind" <?php if($data['type'] == "inkind"){echo "SELECTED"; }?> >Inkind</option>
                    <option value="activities" <?php if($data['type'] == "activities"){echo "SELECTED"; }?> >Activities</option>
                </select>
            </div>
			
			<div class="form-group">
                <label>الملاحظات</label>
                <input type="text" name="Notes" class="form-control" value="<?php echo $data['Notes']; ?>">
            </div>
            
            <div>
                <input class="btn btn-primary" type="submit" value="إدخال">
            </div>

        </fieldset>
    </form>
</div>