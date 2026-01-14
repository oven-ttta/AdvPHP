<?php
session_start();
session_destroy();

echo "<script>alert('ออกจากระบบเรียบร้อยแล้ว ขอบคุณครับ...'); window.location='index.html';</script>";
exit();
?>