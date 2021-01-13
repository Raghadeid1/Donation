
<div>
    <h1>Create Record</h1>
</div>

<div class="bs-component">
    <form action="<?php echo BASEPATH; ?>activity/storeExtra" method="POST">
        <fieldset>

             <div class="form-group">
                <label>الاسم</label>
                <input type="text" name="name" class="form-control">
            </div>
			
			<div class="form-group">
                <label>المبلغ</label>
                <input type="text" name="amount" class="form-control">
            </div>

            
            
        
                
            
            <div>
                <input class="btn btn-primary" type="submit" value="إدخال">
            </div>

        </fieldset>
    </form>
</div>