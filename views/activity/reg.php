
<div>
    <h1>Create Record</h1>
</div>

<div class="bs-component">
    <form action="<?php echo BASEPATH; ?>activity/storeReg" method="POST">
        <fieldset>

             <div class="form-group">
                <label>النشاط</label>
                <select class="form-control form-control-lg" id="acid" name="acid">
                    <?php foreach ($activity as $key => $arow) { ?>
                        <option value="<?php echo $arow['id'] ?>"><?php echo $arow['ActivityName'] ?></option>
                    <?php } ?>
                </select>
            </div>
			
			<div class="form-group">
                <label>اسم المتبرع</label>
                <select class="form-control form-control-lg" id="did" name="did">
                    <?php foreach ($donors as $key => $drow) { ?>
                        <option value="<?php echo $drow['id'] ?>"><?php echo $drow['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>الاضافات</label>
                <select class="form-control form-control-lg" id="extras" name="extras">
                    <?php foreach ($extras as $key => $erow) { ?>
                        <option value="<?php echo $erow['id'] ?>"><?php echo $erow['amount'] ?><?php echo "-" ?><?php echo $erow['name'] ?> </option>
                    <?php } ?>
                </select>
            </div>
            
        
                
            
            <div>
                <input class="btn btn-primary" type="submit" value="إدخال">
            </div>

        </fieldset>
    </form>
</div>