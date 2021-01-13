<div id="main">
<h1> 
    Registrations List 
	<?php if(isset($_SESSION['loggedIn']) && $_SESSION['level']=='manager'){ ?>
	
	<?php
    }
?>
</h1>

<table class='table table-bordered table-striped'>
    <thead>
        <tr>
            <th style="width:100px">رقم التسجيل</th>
          
			 <th style="width:250px">نوع النشاط</th>
			 <th style="width:250px">ميلغ النشاط</th>
		 	<th style="width:250px">اسم المتبرع</th>
             <th style="width:250px">الاضافات</th>
			 <th style="width:250px">مبلغ الاضافات</th>
			<?php if(isset($_SESSION['loggedIn']) && $_SESSION['level']=='manager'){ ?>
            <th style="width:40px"></th>
           
			
				<?php
    }
?>
        </tr>
    </thead>
    <tbody>
        <?php
             foreach ($reg as $key => $row) {

                echo '<tr>';
                    echo '<td>'.$row['id'] .'</td>';
					echo '<td>'.$row['ActivityName'] .'</td>';
					echo '<td>'.$row['ActivityFees'] .'</td>';
					echo '<td>'.$row['dname'] .'</td>';
					echo '<td>'.$row['ename'] .'</td>';
				    echo '<td>'.$row['eamount'] .'</td>';
					 if(isset($_SESSION['loggedIn']) && $_SESSION['level']=='manager'){ 
		            echo '<td>'."<a href='". BASEPATH."regist/deletereg/". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>".'</td>';

                  

                    
                echo '</tr>';
					 }

            }
            ?>
    </tbody>
</table>
              

</div>