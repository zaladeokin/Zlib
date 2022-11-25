<?php
session_start();
require_once('C:\xampp\htdocs\Zlib\zlib.php');
//require_once('http://officialsite\zlib.php');

if( isset($_POST['name']) && isset($_POST['test']) ){
    $_SESSION['name']= $_POST['name'];
    $_SESSION['test']= $_POST['test'];
    if($_POST['name']== ""){
        $_SESSION['error']= "Name must be provided";
    }else if( strlen($_POST['name']) < 5){
        $_SESSION['error']= "Name too short";
    }

    if($_POST['test']== ""){
        $_SESSION['te']= "Test must be provided";
    }else if( strlen($_POST['test']) < 5){
        $_SESSION['te']= "Test too short";
    }
    
    header("Location:form.php");
    return;
}
?>


<?php
//View start here
require_once('header.php');
?>
<main>

<section>
<h2>Testing FormFlashMsg() and repopulate()</h2>
<form method="POST">
<label for="v1" class="zl-form-info" <?= FormFlashMsg('error'); ?> >Name</label>
<input type="text" name='name' id="v1" value="<?= repopulate('name'); ?>"><br>
<label for="v2" class="zl-form-info" <?= FormFlashMsg('te'); ?> >Test</label>
<input type="text" name='test' id="v2" value="<?= repopulate('test'); ?>"><br>
<input type="submit" value="send">
</section>

<aside>
<h3>source code</h3>
<code>
    <h4> PHP</h4>
<pre>
session_start();
require_once("zlib.php");
if( isset($_POST['name']) && isset($_POST['test']) ){
    $_SESSION['name']= $_POST['name'];
    $_SESSION['test']= $_POST['test'];
    if($_POST['name']== ""){
        $_SESSION['error']= "Name must be provided";
    }else if( strlen($_POST['name']) < 5){
        $_SESSION['error']= "Name too short";
    }

    if($_POST['test']== ""){
        $_SESSION['te']= "Test must be provided";
    }else if( strlen($_POST['test']) < 5){
        $_SESSION['te']= "Test too short";
    }
    
    header("Location:form.php");
    return;
}
</pre>
</code>

<code>
    <h4> HTML</h4>
<pre>
<?php
$code= '<form method="POST">';
$code .= '<label for="v1" class="zl-form-info" <?= FormFlashMsg(\'error\'); ?> >Name</label>'."\n";
$code .= '<input type="text" name="name" id="v1" value="<?= repopulate(\'name\'); ?>"><br>'."\n";
$code .= '<label for="v2" class="zl-form-info" <?= FormFlashMsg(\'te\'); ?> >Test</label>'."\n";
$code .= '<input type="text" name="test" id="v2" value="<?= repopulate(\'test\'); ?>"><br>'."\n";
$code .= '<input type="submit" value="send">';
echo htmlentities($code);
?>
</pre>
</code>

</aside>

</main>
<?php
//End of file
require_once('footer.php');
?>