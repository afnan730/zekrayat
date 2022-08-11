<!-- <?php
        echo $item['photo_id'];
        ?> -->


<div class="card mix <?php echo $item['album'] ?>">
    <img class="card-img-top" src="<?php echo $item['img_path'] ?>" alt="Card image" style="width:100%">
    <div class="card-body">
        <br>
        <form method="POST" action="../controllers/delete.php">
            <input type="hidden" name="img_id" value="<?php echo $item['photo_id'] ?>">
            <button type="submit" style="width:100%" class="btn btn-danger">Delete </button>
        </form>

    </div><br>
</div>