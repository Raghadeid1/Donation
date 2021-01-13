<div id="main">
<h1> 
    User List 
    <a href="<?php echo BASEPATH; ?>user/create"><span class="glyphicon glyphicon-plus-sign"></span></a>
</h1>

<table class='table table-bordered table-striped'>
    <thead>
        <tr>
            <th style="width:100px">رقم</th>
            <th style="width:250px">الاسم</th>
            <th style="width:200px">الباسوورد</th>
            <th>نوع الحساب</th>
            <th style="width:40px"></th>
            <th style="width:40px"></th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($data as $key => $row) {

                echo '<tr>';
                    echo '<td>'.$row['id'] .'</td>';
                    echo '<td>'.$row['username'] .'</td>';
                    echo '<td>'.$row['password'] .'</td>';
                    echo '<td>'.$row['accType'] .'</td>';
                    echo '<td>'."<a href='". BASEPATH."user/update/". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>".'</td>';
											
                    echo '<td>'."<a href='". BASEPATH."user/delete/". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>".'</td>';
                    
                echo '</tr>';

            }
            ?>
    </tbody>
</table>
</div>