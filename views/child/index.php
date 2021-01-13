<div id="main">
<h1> 
    Child List 
	<?php
    if(isset($_SESSION['username']) && $_SESSION['level']=='manager'){
?>
    <a href="<?php echo BASEPATH; ?>child/create"><span class="glyphicon glyphicon-plus-sign"></span></a>
		<?php
    }
?>
</h1>

<table class='table table-bordered table-striped'>
    <thead>
        <tr>
            <th style="width:100px">رقم</th>
            <th style="width:250px">الاسم</th>
            <th style="width:200px">تاريخ الميلاد</th>
            <th style="width:150px">العمر</th>
            <th>الحالة</th>
				<?php
    if(isset($_SESSION['username']) && $_SESSION['level']=='manager'){
?>
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
                    echo '<td>'.$row['birthdate'] .'</td>';
                    echo '<td>'. date_diff(date_create($row['birthdate']), date_create('today'))->y .'</td>';
                    echo '<td>'.$row['status'] .'</td>';
					if(isset($_SESSION['username']) && $_SESSION['level']=='manager'){
                    echo '<td>'."<a href='". BASEPATH."child/update/". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>".'</td>';
											
                    echo '<td>'."<a href='". BASEPATH."child/delete/". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>".'</td>';
                    
                echo '</tr>';
					}

            }
            ?>
    </tbody>
</table>
</div>