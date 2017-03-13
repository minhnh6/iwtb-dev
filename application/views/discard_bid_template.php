<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Welcome to IWTB company!</title>
</head>
<body>
<p>Dear <?=$contractor_name;?>,</p>
<p>Your proposal for the project "[<?=$project_name;?>]" has been discarded by the client.</p>
<p>Here are your proposal detail: </p>
-----------------------------------------------------------------------
<br>
<big>
    <b>
        <a href="<?=$project_link?>">View Project Detail</a>
    </b>
</big>
<br>
<p>Project Name: <?=$project_name;?></p>
<p>Project budget: <?=$budget;?> USD</p>
<p>Your Bid amount: <?=$bid_amount;?> USD</p>
<p>Your comment:  <?=$bid_proposal;?></p>
<br>
Regards
<br>
The IWTB Team
</body>
</html>