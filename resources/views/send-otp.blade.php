<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Send OTP</title>
</head>

<body>
    <h1>Send OTP</h1>
    <form id="otpForm" action="{{ route('sendOtp') }}" method="POST">
        @csrf
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required>
        <button type="submit">Send OTP</button>
    </form>

    <script>
        document.getElementById('otpForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Ngăn không cho biểu mẫu gửi theo cách mặc định

            const phone = document.getElementById('phone').value;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('http://127.0.0.1:8000/send-otp-sms', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken // Thêm CSRF token vào header
                },
                body: JSON.stringify({
                    phone: phone // Sử dụng giá trị từ trường nhập liệu
                })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json(); // Đọc như JSON để kiểm tra phản hồi
                })
                .then(data => {
                    console.log('Success:', data);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>
