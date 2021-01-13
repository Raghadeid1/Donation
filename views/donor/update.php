
<div class="page-header">
    <h1>Update Child info</h1>
</div>

<div class="bs-component">
    <form action="<?php echo BASEPATH; ?>donor/storeUpdate/<?php echo $data['id']; ?>" method="POST">
        <fieldset>

            <div class="form-group">
                <label>اسم المتبرع</label>
                <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>">
            </div>
            
            <div class="form-group">
                <label>رقم التليفون</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $data['phone']; ?>">
            </div>
            
            <div class="form-group">
                <label>العنوان</label>
                <input type="text" name="address" class="form-control" value="<?php echo $data['address']; ?>">
            </div>
			
			<div class="form-group">
                <label>المدينة</label>
                <select class="form-control form-control-lg" id="cid" name="cid" >
                    <?php foreach ($gov as $key => $grow) { ?>
					<?php if(empty($grow['parentid'])){  ?>
                        <option value="<?php echo $grow['id'] ?>"><?php echo $grow['name'] ?></option>
						<?php } ?>
                    <?php } ?>
					
                </select>
            </div>
			
			<div class="form-group">
                <label>الحي</label>
                <select class="form-control form-control-lg" id="govid" name="govid">
                    <?php foreach ($gov as $key => $crow) { ?>
					<?php if(($crow['parentid']!='0')){  ?>
                        <option value="<?php echo $crow['id'] ?>"><?php echo $crow['name'] ?></option>
						<?php } ?>
                    <?php } ?>
                </select>
            </div>

            <div>
                <input class="btn btn-primary" type="submit" value="تعديل">
            </div>

        </fieldset>
    </form>
</div>