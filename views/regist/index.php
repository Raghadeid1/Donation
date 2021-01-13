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
            <th style="width:100px">رقم</th>
          
			 <th style="width:250px">نوع النشاط</th>
			 <th style="width:250px">اسم النشاط</th>
			
         
			<?php if(isset($_SESSION['loggedIn']) && $_SESSION['level']=='manager'){ ?>
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
					echo '<td>'.$row['ActivityName'] .'</td>';
			
					 if(isset($_SESSION['loggedIn']) && $_SESSION['level']=='manager'){ 
                    echo '<td>'."<a href='". BASEPATH."regist/list/". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-plus'></span></a>".'</td>';
											
                  

                    
                echo '</tr>';
					 }
					
  



            }

            ?>
    </tbody>
</table>
              

</div>