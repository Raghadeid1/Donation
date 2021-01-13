<div id="main">
<h1> 
    Donor List 
	<?php if(isset($_SESSION['loggedIn']) && $_SESSION['level']=='manager'){ ?>
    <a href="<?php echo BASEPATH; ?>donor/create"><span class="glyphicon glyphicon-plus-sign"></span></a>
	<?php
    }
?>
</h1>

<table class='table table-bordered table-striped'>
    <thead>
        <tr>
            <th style="width:100px">رقم</th>
            <th style="width:250px">الاسم</th>
            <th style="width:250px">رقم الهاتف</th>
            <th style="width:250px">المدينة</th>
			<th style="width:250px">الحي</th>
			<th style="width:250px">العنوان</th>
			<?php if(isset($_SESSION['loggedIn']) && $_SESSION['level']=='manager'){ ?>
            <th style="width:40px"></th>
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
                    echo '<td>'.$row['name'] .'</td>';
                    echo '<td>'.$row['phone'] .'</td>';
					echo '<td>'.$row['gname'] .'</td>';
					 echo '<td>'.$row['cname'] .'</td>';
					 echo '<td>'.$row['address'] .'</td>';
					 if(isset($_SESSION['loggedIn']) && $_SESSION['level']=='manager'){ 
				   echo '<td>'."<a href='". BASEPATH."donor/update/". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>".'</td>';
											
                    echo '<td>'."<a href='". BASEPATH."donor/delete/". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>".'</td>';
					echo '<td>'."<a href='". BASEPATH."donor/receipt/". $row['id'] ."' title='show Recipt' data-toggle='tooltip'>Recipt</a>".'</td>';

                echo '</tr>';
					 }
					
					 


				 
            }
            ?>
    </tbody>
</table>
</div>