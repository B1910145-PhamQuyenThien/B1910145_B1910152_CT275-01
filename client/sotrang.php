<?php 
    if($current_page > 3 ){
        $first_page = 1; ?>
<a style="border: 1px solid #ccc; padding: 5px 9px; color: #000"
    href="?per_page=<?php echo $item_per_page?>&page=<?php echo $first_page?>">First
</a>

<?php }?>


<?php 
    if($current_page > 1 ){
        $prev_page = $current_page - 1; ?>
<a style="border: 1px solid #ccc; padding: 5px 9px; color: #000"
    href="?per_page=<?php echo $item_per_page?>&page=<?php echo $prev_page?>">Previous
</a>

<?php }?>



<?php for($num = 1; $num <= $totalPages; $num++){ ?>
<?php if($num != $current_page) {?>
<?php if ($num > $current_page - 3 && $num < $current_page + 3) {?>
<a style="border: 1px solid #ccc; padding: 5px 9px; color: #000"
    href="?per_page=<?php echo $item_per_page?>&page=<?php echo $num?>"><?php echo $num ?>
</a>
<?php } ?>
<?php } else { ?>
<strong style="border: 1px solid #ccc; padding: 5px 9px; color: #FFF; background: #000"><?php echo $num ?></strong>

<?php } ?>
<?php } ?>


<?php 
    if($current_page < $totalPages - 1 ){
        $next_page = $current_page + 1; ?>
<a style="border: 1px solid #ccc; padding: 5px 9px; color: #000"
    href="?per_page=<?php echo $item_per_page?>&page=<?php echo $next_page?>">Next
</a>

<?php }?>




<?php 
    if($current_page < $totalPages - 3 ){
        $end_page = $totalPages; ?>
<a style="border: 1px solid #ccc; padding: 5px 9px; color: #000"
    href="?per_page=<?php echo $item_per_page?>&page=<?php echo $end_page?>">Last
</a>

<?php }?>