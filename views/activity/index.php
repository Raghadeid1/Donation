<div id="main">
<h1> 
    Activities List 
	<?php if(isset($_SESSION['loggedIn']) && $_SESSION['level']=='manager'){ ?>
    <a href="<?php echo BASEPATH; ?>activity/create"><span class="glyphicon glyphicon-plus-sign"></span></a>
	
	    <a href="<?php echo BASEPATH; ?>activity/reg"><span class="glyphicon glyphicon-inbox"></span></a>

	<?php
    }
?>
</h1>

<table class='table table-bordered table-striped'>
    <thead>
        <tr>
            <th style="width:100px">رقم</th>
          
			 <th style="width:250px">نوع النشاط</th>
			 <th style="width:250px">تاريخ بداية النشاط</th>
			 <th style="width:250px">تاريخ نهاية النشاط</th>
			 <th style="width:250px">اسم النشاط</th>
			 <th style="width:250px">المبلغ</th>
         
			<?php if(isset($_SESSION['loggedIn']) && $_SESSION['level']=='manager'){ ?>
            <th style="width:40px"></th>
             <th style="width:40px"></th>
			
				<?php
    }
?>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($data as $key => $row) {

                echo '<tr>';
                    echo '<td>'.$row['id'] .'</td>';
                    echo '<td>'.$row['type'] .'</td>';
                    echo '<td>'.$row['ActivitySDate'] .'</td>';
					echo '<td>'.$row['ActivityEDate'] .'</td>';
					echo '<td>'.$row['ActivityName'] .'</td>';
					echo '<td>'.$row['ActivityFees'] .'</td>';
					 if(isset($_SESSION['loggedIn']) && $_SESSION['level']=='manager'){ 
                    echo '<td>'."<a href='". BASEPATH."activity/update/". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>".'</td>';
											
                    echo '<td>'."<a href='". BASEPATH."activity/delete/". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>".'</td>';

                    
                echo '</tr>';
					 }
					
  



            }

            ?>
    </tbody>
</table>
              <label>الاضافات: </label>
	          <a href="<?php echo BASEPATH; ?>activity/extras"><span class="glyphicon glyphicon-certificate"></span></a>

</div>