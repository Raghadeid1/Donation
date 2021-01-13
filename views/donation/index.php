
<div id="main">
<h1> 
    Donation List
<?php if(isset($_SESSION['loggedIn']) && $_SESSION['level']=='manager'){ ?>	
    <a href="<?php echo BASEPATH; ?>donation/create"><span class="glyphicon glyphicon-plus-sign"></span></a>
	<?php
    }
?>
</h1>

<table class='table table-bordered table-striped'>
    <thead>
        <tr>
            <th>رقم</th>
            <th>التاريخ</th>
            <th>الوقت</th>
            <th>المبلغ</th>
            <th>نوع التبرع</th>
            <th>المتبرع</th>
            <th>الطفل</th>
			<th>الملاحظات</th>
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
                    echo '<td>'. date_format(date_create($row['date']), 'Y/m/d').'</td>';
                    echo '<td>'. date_format(date_create($row['date']), 'h:i a').'</td>';                    
                    echo '<td>'.$row['amount'] .'</td>';
                    echo '<td>'.$row['type'] .'</td>';
                    echo '<td>'.$row['donorName'] .'</td>';
                    echo '<td>'.$row['childName'] .'</td>';
					echo '<td>'.$row['Notes'] .'</td>';
					if(isset($_SESSION['loggedIn']) && $_SESSION['level']=='manager'){
                    echo '<td>'."<a href='". BASEPATH."donation/update/". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>".'</td>';
											
                    echo '<td>'."<a href='". BASEPATH."donation/delete/". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>".'</td>';

                    }
                echo '</tr>';

            }
            ?>
    </tbody>
</table>
</div>