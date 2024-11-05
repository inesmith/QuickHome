<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <!-- Sidebar Navigation -->
    <?php include 'adminNav.php'; ?> <!-- Include the sidebar here -->
        <!-- Flagged Comments Section -->
        <section class="comments-section" >
            <h1 style="margin-top: 35px; margin-left: 235px">Pending Flagged Comments</h1>
            <div class="comment-card">
                <div class="comment-info">
                    <p style="margin-bottom: 10px; font-weigth: lighter; font-size: 17px; margin-top: 15px; margin-left: 20px;">John Doe</p>
                    <p style="margin-bottom: 10px; margin-top: 10px; margin-left: 20px; font-size: 20px; font-weight: bold"><span>This property is amazing!</span></p>
                    <p style="margin-bottom: 10px; margin-top: 30px; margin-left: 20px;">
    <span style="display: inline-block; margin-right: 20px;">Comment ID: <span>12345</span></span>
    <span style="display: inline-block; margin-left: 20px;">Date: <span>2024-11-03</span></span>
</p>                </div>
<div class="comment-actions">
    <button class="approve-btn" style="background-color: #8ec546; color: #ffffff; padding: 10px; border-radius: 8px; cursor: pointer; width: 130px; display: block; margin-bottom: 10px;">Approve</button>
    <button class="decline-btn" style="background-color: #ffffff; color: #2c2c3e; padding: 10px; border-radius: 8px; cursor: pointer; width: 130px; display: block;">Decline</button>
</div>


            </div>
        </section>
    </main>
</body>
</html>

