
<div>
    <h1>Create Record</h1>
</div>

<div class="bs-component">
    <form action="<?php echo BASEPATH; ?>activity/storeCreate" method="POST">
        <fieldset>

             <div class="form-group">
                <label>النوع</label>
                <select class="form-control form-control-lg" id="parentid" name="parentid">
                    <?php foreach ($activitylist as $key => $drow) { ?>
                        <option value="<?php echo $drow['id'] ?>"><?php echo $drow['type'] ?></option>
                    <?php } ?>
                </select>
            </div>
			 <div class="form-group">
                <label>تاريخ بداية النشاط</label>
                <input type="date" name="ActivitySDate" class="form-control">
            </div>

            <div class="form-group">
                <label>تاريخ نهاية النشاط</label>
                <input type="date" name="ActivityEDate" class="form-control">
            </div>
            
            <div class="form-group">
                <label>اسم النشاط</label>
                <input type="text" name="ActivityName" class="form-control">
            </div>
            
            <div class="form-group">
                <label>المبلغ</label>
                <input type="text" name="ActivityFees" class="form-control">
            </div>
                
            
            <div>
                <input class="btn btn-primary" type="submit" value="إدخال">
            </div>

        </fieldset>
    </form>
</div>