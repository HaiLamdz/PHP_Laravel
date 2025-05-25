<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chào mừng!</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 30px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="20" cellspacing="0" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                    <tr>
                        <td align="center" style="background-color: #4CAF50; color: white; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                            <h1>Chào mừng, {{ $user->name }}!</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Xin cảm ơn bạn đã đăng ký tài khoản với chúng tôi.</p>
                            <p>Bạn giờ đây đã có thể truy cập vào hệ thống và bắt đầu sử dụng các tính năng tuyệt vời mà chúng tôi cung cấp.</p>

                            <p style="text-align: center; margin: 30px 0;">
                                <a href="{{ url('/') }}" style="background-color: #4CAF50; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold;">Bắt đầu ngay</a>
                            </p>

                            <p>Nếu bạn có bất kỳ câu hỏi nào, đừng ngần ngại liên hệ với chúng tôi.</p>

                            <hr style="margin: 30px 0;">
                            <p style="font-size: 14px; color: #777;">
                                Đây là email tự động, vui lòng không trả lời email này.<br>
                                &copy; {{ date('Y') }} Hệ thống của chúng tôi. Mọi quyền được bảo lưu.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size: 13px; color: #aaa;">
                            Liên hệ: support@yourdomain.com | 0123 456 789
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
