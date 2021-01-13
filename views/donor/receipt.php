<div>
    <h1>Receipt</h1>
</div>

<?php echo "الرقم السلسلي للمتبرع:      " .$donor['id']; ?>
<br>
<?php echo "اسم المتبرع:                    ".$donor['name']; ?>
<br>
<?php echo "رقم الهاتف:                       ".$donor['phone']; ?>
<br>
<?php echo "العنوان:                       ".$donor['address']; ?>

<table class='table table-bordered table-striped'>
    <thead>
        <tr>
            <th>رقم</th>
            <th>التاريخ</th>
            <th>الوقت</th>
            <th>المبلغ</th>
            <th>نوع التبرع</th>
            <th>الطفل</th>
			<th>الملاحظات</th>
			   

        </tr>
    </thead>
    <tbody>
	<?php foreach($donationList as $key => $drow) { 
		echo '<tr>';
			echo '<td>'.$drow['id'] .'</td>';
			echo '<td>'. date_format(date_create($drow['date']), 'Y/m/d').'</td>';
			echo '<td>'. date_format(date_create($drow['date']), 'h:i a').'</td>';                    
			echo '<td>'.$drow['amount'] .'</td>';
			echo '<td>'.$drow['type'] .'</td>';
			echo '<td>'.$drow['childName'] .'</td>';
			echo '<td>'.$drow['Notes'] .'</td>';
              
        echo '</tr>';
		
	 } ?>
	 
	 </tbody>
</table>
<button onClick="window.print()" class=" glyphicon glyphicon-print">Print</button>
