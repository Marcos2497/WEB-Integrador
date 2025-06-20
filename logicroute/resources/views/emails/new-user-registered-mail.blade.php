<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Logipack</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }
        
        .header {
            background: linear-gradient(135deg, #a00000, #800000);
            padding: 30px 20px;
            text-align: center;
            color: white;
        }
        
        .logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }
        
        .content {
            padding: 30px;
        }
        
        h1 {
            color: #a00000;
            margin-top: 0;
            font-size: 24px;
            font-weight: 600;
        }
        
        .user-card {
            background: #fff9f9;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            border-left: 4px solid #a00000;
            border-right: 1px solid #f0e0e0;
            border-top: 1px solid #f0e0e0;
            border-bottom: 1px solid #f0e0e0;
        }
        
        .user-detail {
            margin-bottom: 12px;
            display: flex;
        }
        
        .label {
            font-weight: 600;
            color: #a00000;
            display: inline-block;
            width: 140px;
        }
        
        .value {
            color: #333;
            flex: 1;
        }
        
        .password {
            font-family: 'Courier New', monospace;
            font-size: 16px;
            background-color: #f0f0f0;
            padding: 4px 8px;
            border-radius: 4px;
            border: 1px dashed #a00000;
            letter-spacing: 1px;
        }
        
        .footer {
            text-align: center;
            padding: 20px;
            background: #f5f5f5;
            color: #666;
            font-size: 14px;
            border-top: 1px solid #eaeaea;
        }
        
        .button {
            display: inline-block;
            padding: 12px 30px;
            background: #a00000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 500;
            margin: 25px 0 15px;
            transition: background-color 0.3s;
        }
        
        .button:hover {
            background: #800000;
        }
        
        .welcome-icon {
            font-size: 48px;
            margin-bottom: 20px;
            color: #a00000;
        }
        
        .message {
            color: #555;
            line-height: 1.7;
        }
        
        .security-note {
            font-size: 12px;
            color: #888;
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px dashed #ddd;
        }
        
        .password-warning {
            background-color: #fff3f3;
            border-left: 4px solid #a00000;
            padding: 12px;
            margin: 15px 0;
            border-radius: 0 4px 4px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">LOGICPACK</div>
            <h2>¡Tus credenciales de acceso!</h2>
        </div>
        
        <div class="content">
            <div style="text-align: center;">
                <div class="welcome-icon">🔐</div>
                <h1>Hola {{ $user->name }},</h1>
                <p class="message">Tu cuenta administrativa en <strong>Logipack</strong> ha sido creada exitosamente.</p>
            </div>
            
            <div class="user-card">
                <div class="user-detail">
                    <span class="label">Nombre de usuario:</span>
                    <span class="value">{{ $user->name }}</span>
                </div>
                <div class="user-detail">
                    <span class="label">Correo electrónico:</span>
                    <span class="value">{{ $user->email }}</span>
                </div>
                <div class="user-detail">
                    <span class="label">Contraseña temporal:</span>
                    <span class="value"><span class="password">{{ $generatedPassword }}</span></span>
                </div>
                <div class="user-detail">
                    <span class="label">Rol de usuario:</span>
                    <span class="value">{{ $user->getRoleNames()->first() ?? 'Usuario' }}</span>
                </div>
            </div>
            
            <div class="password-warning">
                <strong>⚠️ Importante:</strong> Esta contraseña es temporal. Por seguridad, debes cambiarla después de tu primer acceso al sistema.
            </div>
            
            <p style="text-align: center;">
                <a href="{{ config('app.url') }}" class="button">Acceder a Logipack</a>
            </p>
            
            <p class="message">Para cualquier consulta o asistencia técnica, contacta a nuestro equipo de soporte.</p>
            
            <div class="security-note">
                <strong>Nota de seguridad:</strong> El equipo de Logipack nunca te pedirá tu contraseña por correo. Por favor, no compartas estas credenciales con nadie.
            </div>
        </div>
        
        <div class="footer">
            <p>© {{ date('Y') }} LogicRoute. Todos los derechos reservados.</p>
            <p>
                <small>
                    Este es un mensaje automático, por favor no respondas directamente a este correo.
                </small>
            </p>
        </div>
    </div>
</body>
</html>