<html>
<body>
<h3>সম্মানিত সদস্য, <?= $identity ?><br/></h3>
সরকারি আইসিটি অফিসার্স ফোরামের মেম্বার ম্যানেজমেন্ট সিস্টেম এ আপনার একাউন্টের পাসওয়ার্ড রিসেট করার লিঙ্ক নিম্নে দেয়া হল
	<p><?php echo sprintf(lang('email_forgot_password_subheading'), anchor('auth/reset_password/'. $forgotten_password_code, lang('email_forgot_password_link')));?></p>
</body>
</html>