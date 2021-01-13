
<?php
    if(isset($_SESSION['username']) && $_SESSION['level']=='manager'){
?>
<div class="sidenav">
    <a href="<?php echo BASEPATH; ?>donation/index"><span class="glyphicon glyphicon-envelope"></span> التبرعات</a>
    <a href="<?php echo BASEPATH; ?>donor"><span class="glyphicon glyphicon-user"></span> المتبرعين</a>
    <a href="<?php echo BASEPATH; ?>child"><span class="glyphicon glyphicon-user"></span> الأطفال</a>
    <a href="<?php echo BASEPATH; ?>donation/waranty"><span class="glyphicon glyphicon-th-list"></span> كفالة</a>
    <a href="<?php echo BASEPATH; ?>donation/cash"><span class="glyphicon glyphicon-usd"></span> التبرع النقدي</a>
    <a href="<?php echo BASEPATH; ?>donation/Inkind"><span class="glyphicon glyphicon-book"></span> التبرع العيني</a>
    <a href="<?php echo BASEPATH; ?>user"><span class="glyphicon glyphicon-asterisk"></span> Users</a>
    <a href="<?php echo BASEPATH; ?>activity"><span class="glyphicon glyphicon-dashboard"></span> النشاطات</a>
    <a href="<?php echo BASEPATH; ?>regist"><span class="glyphicon glyphicon-globe"></span> التسجيلات</a>
    <a href="<?php echo BASEPATH; ?>login/runLogout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
</div>
<?php
    }
?>
<?php
    if(isset($_SESSION['username']) && $_SESSION['level']=='admin'){
?>
<div class="sidenav">
    <a href="<?php echo BASEPATH; ?>donation/index"><span class="glyphicon glyphicon-envelope"></span> التبرعات</a>
    <a href="<?php echo BASEPATH; ?>donor"><span class="glyphicon glyphicon-user"></span> المتبرعين</a>
    <a href="<?php echo BASEPATH; ?>child"><span class="glyphicon glyphicon-user"></span> الأطفال</a>
    <a href="<?php echo BASEPATH; ?>donation/waranty"><span class="glyphicon glyphicon-th-list"></span> كفالة</a>
    <a href="<?php echo BASEPATH; ?>donation/cash"><span class="glyphicon glyphicon-usd"></span> التبرع النقدي</a>
    <a href="<?php echo BASEPATH; ?>donation/Inkind"><span class="glyphicon glyphicon-book"></span> التبرع العيني</a>
    
    <a href="<?php echo BASEPATH; ?>activity"><span class="glyphicon glyphicon-dashboard"></span> النشاطات</a>
    <a href="<?php echo BASEPATH; ?>regist"><span class="glyphicon glyphicon-globe"></span> التسجيلات</a>
    <a href="<?php echo BASEPATH; ?>login/runLogout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
</div>
<?php
    }
?>