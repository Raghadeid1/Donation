
<div>
    <h1>Update Activity</h1>
</div>

<div class="bs-component">
    <form action="<?php echo BASEPATH; ?>activity/storeUpdate/<?php echo $data['id']; ?>" method="POST">
        <fieldset>

            <div class="form-group">
                <label>نوع النشاط</label>
                <select class="form-control form-control-lg" id="parentid" name="parentid">
                    <?php foreach ($activitylist as $key => $drow) { ?>
                        <option value="<?php echo $drow['id'] ?>" <?php if($drow['id'] == $data['parentid']){echo "SELECTED"; }?> ><?php echo $drow['type'] ?></option>
                    <?php } ?>
                </select>
            </div>

             <div class="form-group">
                <label>تاريخ بداية النشاط</label>
                <input type="date" name="ActivitySDate" class="form-control" value="<?php echo $data['ActivitySDate']; ?>">
            </div>

            <div class="form-group">
                <label>تاريخ نهاية النشاط</label>
                <input type="date" name="ActivityEDate" class="form-control" value="<?php echo $data['ActivityEDate']; ?>">
            </div>

          <div class="form-group">
                <label>اسم النشاط</label>
                <input type="text" name="ActivityName" class="form-control" value="<?php echo $data['ActivityName']; ?>">
            </div>
			
			<div class="form-group">
                <label>المبلغ</label>
                <input type="text" name="ActivityFees" class="form-control" value="<?php echo $data['ActivityFees']; ?>">
            </div>
            
            
            <div>
                <input class="btn btn-primary" type="submit" value="إدخال">
            </div>

        </fieldset>
    </form>
</div>