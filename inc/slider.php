
<div class="slidersection templete clear">
        <div id="slider">
<?php
$query = "SELECT * FROM tbl_slider ORDER BY id DESC";
$slider = $db->select($query);
if($slider){
    while($result = $slider->fetch_assoc()){
?>
            <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="<?php echo $result['image'];?>" title="<?php echo $result['title'];?>" /></a>
    <?php } } ?>

        </div>

</div>
<!--

    <a href="#"><img src="images/slideshow/01.jpg" alt="nature 1" title="This is slider one Title or Description" /></a>
            <a href="#"><img src="images/slideshow/02.jpg" alt="nature 2" title="This is slider Two Title or Description" /></a>
            <a href="#"><img src="images/slideshow/03.jpg" alt="nature 3" title="This is slider three Title or Description" /></a>
            <a href="#"><img src="images/slideshow/04.jpg" alt="nature 4" title="This is slider four Title or Description" /></a>
-->