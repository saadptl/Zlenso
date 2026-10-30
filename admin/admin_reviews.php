<?php require_once('header.php'); ?>

<?php
 // Include your database connection



// Approve review
if (isset($_POST['approve']) && isset($_POST['review_id'])) {
    $stmt = $pdo->prepare("UPDATE tbl_rating SET status='approved' WHERE rt_id=?");
    $stmt->execute(array($_POST['review_id']));
    
}

// Reject review
// Reject review (delete from database)
if (isset($_POST['reject']) && isset($_POST['review_id'])) {
    $stmt = $pdo->prepare("DELETE FROM tbl_rating WHERE rt_id=?");
    $stmt->execute(array($_POST['review_id']));

    // Check if the deletion was successful
    if ($stmt->rowCount() > 0) {
        echo "<script>alert('Review rejected and deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error: Review not deleted. Check if review ID exists.');</script>";
    }
}


// Reply to review
if (isset($_POST['reply']) && isset($_POST['review_id'])) {
    $stmt = $pdo->prepare("UPDATE tbl_rating SET reply=? WHERE rt_id=?");
$stmt->execute(array($_POST['admin_reply'], $_POST['review_id']));

}

// Fetch pending reviews
$stmt = $pdo->prepare("SELECT t1.*, t2.cust_name FROM tbl_rating t1 JOIN tbl_customer t2 ON t1.cust_id = t2.cust_id WHERE status='pending'");
$stmt->execute();
$pending_reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch approved reviews
$stmt = $pdo->prepare("SELECT t1.*, t2.cust_name FROM tbl_rating t1 JOIN tbl_customer t2 ON t1.cust_id = t2.cust_id WHERE status='approved'");
$stmt->execute();
$approved_reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<section class="content-header">
    <div class="content-header-left">
        <h1>Manage Reviews</h1>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body table-responsive">
                    <h2>Pending Reviews</h2>
                    <table class="table table-bordered table-hover table-striped">
                    <thead>
    <tr>
        <th>#</th>
        <th>Customer Name</th>
        <th>Product</th>
        <th>Comment</th>
        <th>Rating</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php $i = 0; foreach ($pending_reviews as $review): $i++; ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $review['cust_name']; ?></td>
        
        <td><?php echo $review['comment']; ?></td>
        <td><?php echo $review['rating']; ?> Stars</td>
        <td>
            <form method="post" style="display:inline-block;">
                <input type="hidden" name="review_id" value="<?php echo $review['rt_id']; ?>">
                <button type="submit" name="approve" class="btn btn-success btn-xs">Approve</button>
            </form>
            <form method="post" style="display:inline-block;">
                <input type="hidden" name="review_id" value="<?php echo $review['rt_id']; ?>">
                <button type="submit" name="reject" class="btn btn-danger btn-xs">Reject</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body table-responsive">
                    <h2>Approved Reviews</h2>
                    <table class="table table-bordered table-hover table-striped">
                    <thead>
    <tr>
        <th>#</th>
        <th>Customer Name</th>
        <th>Product</th>
        <th>Comment</th>
        <th>Rating</th>
        <th>Reply</th>
    </tr>
</thead>
<tbody>
    <?php $i = 0; foreach ($approved_reviews as $review): $i++; ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $review['cust_name']; ?></td>
       
        <td><?php echo $review['comment']; ?></td>
        <td><?php echo $review['rating']; ?> Stars</td>
        <td>
            <form method="post">
                <input type="hidden" name="review_id" value="<?php echo isset($review['rt_id']) ? $review['rt_id'] : ''; ?>">
                <textarea name="admin_reply" class="form-control" placeholder="Write a reply..."></textarea>
                <button type="submit" name="reply" class="btn btn-primary btn-xs" style="margin-top:5px;">Reply</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>

