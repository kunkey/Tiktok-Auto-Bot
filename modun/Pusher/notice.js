document.addEventListener('DOMContentLoaded', function () {
    if (!Notification) {
        alert('Trình duyệt của bạn không hỗ trợ chức năng này.'); 
        return;
    }
    if (Notification.permission !== "granted")
        Notification.requestPermission();
});